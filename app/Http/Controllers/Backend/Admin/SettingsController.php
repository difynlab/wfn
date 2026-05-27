<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
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
        $items = Setting::find(1);

        return view('backend.admin.settings.index', [
            'items' => $items,
            'user' => $user,
            'countries' => config('countries'),
        ]);
    }

    public function profile(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'email' => 'required|email|min:0|max:255|unique:users,email,'.$user->id,
            'new_image' => 'nullable|max:30720'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.settings.index')
            ]);
        }

        if($request->file('new_image')) {
            $processed_image = process_image($request->file('new_image'), 'backend/users', $request->old_image);
        }
        else {
            $processed_image = $request->old_image;
        }

        $data = $request->only([
            'first_name',
            'last_name',
            'email',
        ]);
        $data['image'] = $processed_image;
        $user->fill($data)->save();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.settings.index')
        ]);
    }

    public function website(Request $request, Setting $setting)
    {
        $validator = Validator::make($request->all(), [
            'new_logo' => 'nullable|max:30720',
            'new_favicon' => 'nullable|max:30720',
            'new_guest_image' => 'nullable|max:30720',
            'new_no_image' => 'nullable|max:30720',
            'new_no_profile_image' => 'nullable|max:30720'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'active_tab' => 'website',
                'error' => 'Update Failed!',
                'route' => route('admin.settings.index')
            ]);
        }

        if($request->file('new_logo')) {
            $logo = process_image($request->file('new_logo'), 'backend/global', $request->old_logo);
        }
        else {
            $logo = $request->old_logo;
        }

        if($request->file('new_favicon')) {
            $favicon = process_image($request->file('new_favicon'), 'backend/global', $request->old_favicon);
        }
        else {
            $favicon = $request->old_favicon;
        }

        if($request->file('new_guest_image')) {
            $guest_image = process_image($request->file('new_guest_image'), 'backend/global', $request->old_guest_image);
        }
        else {
            $guest_image = $request->old_guest_image;
        }

        if($request->file('new_footer_logo')) {
            $footer_logo = process_image($request->file('new_footer_logo'), 'backend/global', $request->old_footer_logo);
        }
        else {
            $footer_logo = $request->old_footer_logo;
        }

        if($request->file('new_no_image')) {
            $no_image = process_image($request->file('new_no_image'), 'backend/global', $request->old_no_image);
        }
        else {
            $no_image = $request->old_no_image;
        }

        if($request->file('new_no_profile_image')) {
            $no_profile_image = process_image($request->file('new_no_profile_image'), 'backend/global', $request->old_no_profile_image);
        }
        else {
            $no_profile_image = $request->old_no_profile_image;
        }

        $data = $request->only([
            'name',
            'fb_en',
            'instagram_en',
            'fb_ar',
            'instagram_ar',
        ]);

        $data['logo'] = $logo;
        $data['favicon'] = $favicon;
        $data['guest_image'] = $guest_image;
        $data['footer_logo'] = $footer_logo;
        $data['no_image'] = $no_image;
        $data['no_profile_image'] = $no_profile_image;
        $setting->fill($data)->save();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.settings.index')
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
                'route' => route('admin.settings.index')
            ]);
        }

        if(!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors([
                'old_password' => 'Incorrect current password'
            ])
            ->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.settings.index')
            ]);
        }

        Auth::logoutOtherDevices($request->old_password);

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::logout();

        return redirect()->back()->with([
            'success' => "Update Successful!",
            'route' => route('admin.settings.index')
        ]);
    }
}
