<?php

namespace App\Http\Controllers\Backend\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\AuthenticationContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    private function shortCode($language)
    {
        switch($language){
            case 'english':
                $short_code = 'en';
                break;
            case 'arabic':
                $short_code = 'ar';
                break;
            default:
                $short_code = 'en';
                break;
        }

        return $short_code;
    }

    public function index($language)
    {
        $contents = AuthenticationContent::find(1);
        $short_code = $this->shortCode($language);

        return view('backend.admin.pages.authentications', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language)
    {
        $validator = Validator::make($request->all(), [
            'new_login_image' => 'nullable|max:30720',
        ], [
            'new_login_image.max' => 'Image must not be greater than 30 MB.'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.pages.index')
            ]);
        }

        $contents = AuthenticationContent::find(1);
        $short_code = $this->shortCode($language);

        // Login image
            if($request->file('new_login_image')) {
                $login_image = process_image($request->file('new_login_image'), 'backend/pages', $request->old_login_image);
            }
            else {
                $login_image = $request->old_login_image;
            }
        // Login image

        // Register image
            if($request->file('new_register_image')) {
                $register_image = process_image($request->file('new_register_image'), 'backend/pages', $request->old_register_image);
            }
            else {
                $register_image = $request->old_register_image;
            }
        // Register image

        $data = $request->except(
            'old_login_image',
            'new_login_image',
            'old_register_image',
            'new_register_image',
        );

        $data['login_image_' . '' . $short_code] = $login_image;
        $data['register_image_' . '' . $short_code] = $register_image;
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}