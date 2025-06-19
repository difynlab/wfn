<?php

namespace App\Http\Controllers\Backend\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\HomepageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomepageController extends Controller
{
    private function shortCode($language) {
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
        $contents = HomepageContent::find(1);
        $short_code = $this->shortCode($language);

        return view('backend.admin.pages.homepage', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language)
    {
        $validator = Validator::make($request->all(), [
            'new_section_1_image' => 'nullable|max:30720',
            'new_section_4_image' => 'nullable|max:30720'
        ], [
            'new_section_1_image.max' => 'Image must not be greater than 30 MB',
            'new_section_1_image.max' => 'Image must not be greater than 200 MB',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('admin.pages.index')
            ]);
        }

        $contents = HomepageContent::find(1);
        $short_code = $this->shortCode($language);

        // Section 1 image
            if($request->file('new_section_1_image')) {
                if($request->old_section_1_image) {
                    Storage::delete('backend/pages/' . $request->old_section_1_image);
                }

                $new_section_1_image = $request->file('new_section_1_image');
                $section_1_image_name = Str::random(40) . '.' . $new_section_1_image->getClientOriginalExtension();
                $new_section_1_image->storeAs('backend/pages', $section_1_image_name);
            }
            else if($request->old_section_1_image == null) {
                if($contents->{'section_1_image_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_1_image_' . $short_code});
                }

                $section_1_image_name = null;
            }
            else {
                $section_1_image_name = $request->old_section_1_image;
            }
        // Section 1 image

        // Section 4 image
            if($request->file('new_section_4_image')) {
                if($request->old_section_4_image) {
                    Storage::delete('backend/pages/' . $request->old_section_4_image);
                }

                $new_section_4_image = $request->file('new_section_4_image');
                $section_4_image_name = Str::random(40) . '.' . $new_section_4_image->getClientOriginalExtension();
                $new_section_4_image->storeAs('backend/pages', $section_4_image_name);
            }
            else if($request->old_section_4_image == null) {
                if($contents->{'section_4_image_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_4_image_' . $short_code});
                }

                $section_4_image_name = null;
            }
            else {
                $section_4_image_name = $request->old_section_4_image;
            }
        // Section 4 image

        $data = $request->except(
            'old_section_1_image',
            'new_section_1_image',
            'old_section_4_image',
            'new_section_4_image'
        );

        $data['section_1_image_' . '' . $short_code] = $section_1_image_name;
        $data['section_4_image_' . '' . $short_code] = $section_4_image_name;
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}