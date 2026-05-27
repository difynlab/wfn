<?php

namespace App\Http\Controllers\Backend\Tenant;

use App\Http\Controllers\Controller;
use App\Mail\AdminCompanyUpdateMail;
use App\Mail\CompanyUpdateMail;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $countries = config('countries');

        return view('backend.tenant.settings.index', [
            'company' => $user->company,
            'user' => $user,
            'countries' => $countries
        ]);
    }

    public function profile(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'email' => 'required|email|min:0|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|regex:/^\+?[0-9]+$/|unique:users,phone,'.$user->id,
            'new_image' => 'nullable|max:30720'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('tenant.settings.index')
            ]);
        }

        // Image
            if($request->file('new_image')) {
                $processed_image = process_image($request->file('new_image'), 'backend/users', $request->old_image);
            }
            else {
                $processed_image = $request->old_image;
            }
        // Image
        
        $data = $request->only([
            'first_name',
            'last_name',
            'email',
            'phone',
            'phone_code',
            'address',
            'city',
            'country',
        ]);

        $data['image'] = $processed_image;
        $user->fill($data)->save();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('tenant.settings.index')
        ]);
    }

    public function company(Request $request, User $user, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'address' => 'required|min:3|max:255',
            'cr_number' => 'required|string|digits:10',
            'email' => 'required|email|min:0|max:255|unique:companies,email,'.$company->id,
            'phone' => 'required|min:3|max:255|regex:/^\+?[0-9]+$/|unique:companies,phone,'.$company->id,
            'website' => 'nullable|regex:/^(https?:\/\/)?([\w\-]+\.)+[\w\-]{2,}(\/[\w\-._~:\/?#[\]@!$&\'()*+,;=]*)?$/',
            'industry' => 'required|min:3|max:255',
            'date' => 'nullable|date',
            'new_registration_certificates.*' => 'max:30720'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'active_tab' => 'company',
                'error' => 'Update Failed!',
                'route' => route('tenant.settings.index')
            ]);
        }

        if($company->registration_certificates == null && $request->new_registration_certificates == null) {
            return redirect()->back()->withErrors([
                'new_registration_certificates.*' => 'Registration certificate is required.'
            ])
            ->withInput()->with([
                'active_tab' => 'company',
                'error' => 'Update Failed!',
                'route' => route('tenant.settings.index')
            ]);
        }

        // Registration certificates
            $existing_registration_certificates = json_decode($company->registration_certificates ?? '[]', true);
            $current_registration_certificates  = json_decode(htmlspecialchars_decode($request->old_registration_certificates ?? '[]'), true);

            foreach(array_diff($existing_registration_certificates, $current_registration_certificates) as $registration_certificate) {
                $processed_image = process_image(null, 'backend/warehouses', $registration_certificate);
                $processed_image = process_image(null, 'backend/warehouses/thumbnails', $registration_certificate);
            }

            if($request->file('new_registration_certificates')) {
                foreach($request->file('new_registration_certificates') as $registration_certificate) {
                    $processed_image = process_image($registration_certificate, 'backend/warehouses');
                    $current_registration_certificates[] = $processed_image;
                }
            }
            
            $registration_certificates = $current_registration_certificates ? json_encode($current_registration_certificates) : null;
        // Registration certificates

        $company->fill($request->only([
            'name',
            'address',
            'cr_number',
            'email',
            'phone',
            'website',
            'industry',
            'company_size',
            'establishment_date',
        ]));
        $company->forceFill([
            'registration_certificates' => $registration_certificates,
            'status' => 2,
        ])->save();

        $mail_data = [
            'id' => $user->id,
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email
        ];

        send_email(new CompanyUpdateMail($mail_data), $user->email);
        send_email(new AdminCompanyUpdateMail($mail_data), config('app.admin_email'));

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('tenant.settings.index')
        ]);
    }

    public function password(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'active_tab' => 'password',
                'error' => 'Update Failed!',
                'route' => route('tenant.settings.index')
            ]);
        }

        if(!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors([
                'old_password' => 'Incorrect current password'
            ])
            ->withInput()->with([
                'active_tab' => 'password',
                'error' => 'Update Failed!',
                'route' => route('tenant.settings.index')
            ]);
        }

        Auth::logoutOtherDevices($request->old_password);

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::logout();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('tenant.settings.index')
        ]);
    }
}