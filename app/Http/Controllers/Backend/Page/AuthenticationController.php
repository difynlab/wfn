<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\AuthenticationContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
                'route' => route('backend.pages.index')
            ]);
        }

        $contents = AuthenticationContent::find(1);
        $short_code = $this->shortCode($language);

        // Login image
            if($request->file('new_login_image')) {
                if($request->old_login_image) {
                    Storage::delete('backend/pages/' . $request->old_login_image);
                }

                $new_login_image = $request->file('new_login_image');
                $login_image_name = Str::random(40) . '.' . $new_login_image->getClientOriginalExtension();
                $new_login_image->storeAs('backend/pages', $login_image_name);
            }
            else if($request->old_login_image == null) {
                if($contents->{'login_image_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'login_image_' . $short_code});
                }

                $login_image_name = null;
            }
            else {
                $login_image_name = $request->old_login_image;
            }
        // Login image

        $data = $request->except(
            'old_login_image',
            'new_login_image',
        );

        $data['login_image_' . '' . $short_code] = $login_image_name;
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}