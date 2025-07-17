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
            'new_section_4_image' => 'nullable|max:30720',
            'new_section_3_page_1_thumbnail' => 'nullable|max:30720',
            'new_section_3_page_2_thumbnail' => 'nullable|max:30720',
            'new_section_3_page_3_thumbnail' => 'nullable|max:30720',
            'new_section_3_page_4_thumbnail' => 'nullable|max:30720',
        ], [
            'new_section_1_image.max' => 'Image must not be greater than 30 MB.',
            'new_section_4_image.max' => 'Image must not be greater than 30 MB.',
            'new_section_3_page_1_thumbnail.max' => 'Image must not be greater than 30 MB.',
            'new_section_3_page_2_thumbnail.max' => 'Image must not be greater than 30 MB.',
            'new_section_3_page_3_thumbnail.max' => 'Image must not be greater than 30 MB.',
            'new_section_3_page_4_thumbnail.max' => 'Image must not be greater than 30 MB.',
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

        // Section 3 page 1 thumbnail
            if($request->file('new_section_3_page_1_thumbnail')) {
                if($request->old_section_3_page_1_thumbnail) {
                    Storage::delete('backend/pages/' . $request->old_section_3_page_1_thumbnail);
                }

                $new_section_3_page_1_thumbnail = $request->file('new_section_3_page_1_thumbnail');
                $section_3_page_1_thumbnail_name = Str::random(40) . '.' . $new_section_3_page_1_thumbnail->getClientOriginalExtension();
                $new_section_3_page_1_thumbnail->storeAs('backend/pages', $section_3_page_1_thumbnail_name);
            }
            else if($request->old_section_3_page_1_thumbnail == null) {
                if($contents->{'section_3_page_1_thumbnail_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_3_page_1_thumbnail_' . $short_code});
                }

                $section_3_page_1_thumbnail_name = null;
            }
            else {
                $section_3_page_1_thumbnail_name = $request->old_section_3_page_1_thumbnail;
            }
        // Section 3 page 1 thumbnail

        // Section 3 page 2 thumbnail
            if($request->file('new_section_3_page_2_thumbnail')) {
                if($request->old_section_3_page_2_thumbnail) {
                    Storage::delete('backend/pages/' . $request->old_section_3_page_2_thumbnail);
                }

                $new_section_3_page_2_thumbnail = $request->file('new_section_3_page_2_thumbnail');
                $section_3_page_2_thumbnail_name = Str::random(40) . '.' . $new_section_3_page_2_thumbnail->getClientOriginalExtension();
                $new_section_3_page_2_thumbnail->storeAs('backend/pages', $section_3_page_2_thumbnail_name);
            }
            else if($request->old_section_3_page_2_thumbnail == null) {
                if($contents->{'section_3_page_2_thumbnail_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_3_page_2_thumbnail_' . $short_code});
                }

                $section_3_page_2_thumbnail_name = null;
            }
            else {
                $section_3_page_2_thumbnail_name = $request->old_section_3_page_2_thumbnail;
            }
        // Section 3 page 2 thumbnail

        // Section 3 page 3 thumbnail
            if($request->file('new_section_3_page_3_thumbnail')) {
                if($request->old_section_3_page_3_thumbnail) {
                    Storage::delete('backend/pages/' . $request->old_section_3_page_3_thumbnail);
                }

                $new_section_3_page_3_thumbnail = $request->file('new_section_3_page_3_thumbnail');
                $section_3_page_3_thumbnail_name = Str::random(40) . '.' . $new_section_3_page_3_thumbnail->getClientOriginalExtension();
                $new_section_3_page_3_thumbnail->storeAs('backend/pages', $section_3_page_3_thumbnail_name);
            }
            else if($request->old_section_3_page_3_thumbnail == null) {
                if($contents->{'section_3_page_3_thumbnail_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_3_page_3_thumbnail_' . $short_code});
                }

                $section_3_page_3_thumbnail_name = null;
            }
            else {
                $section_3_page_3_thumbnail_name = $request->old_section_3_page_3_thumbnail;
            }
        // Section 3 page 3 thumbnail

        // Section 3 page 4 thumbnail
            if($request->file('new_section_3_page_4_thumbnail')) {
                if($request->old_section_3_page_4_thumbnail) {
                    Storage::delete('backend/pages/' . $request->old_section_3_page_4_thumbnail);
                }

                $new_section_3_page_4_thumbnail = $request->file('new_section_3_page_4_thumbnail');
                $section_3_page_4_thumbnail_name = Str::random(40) . '.' . $new_section_3_page_4_thumbnail->getClientOriginalExtension();
                $new_section_3_page_4_thumbnail->storeAs('backend/pages', $section_3_page_4_thumbnail_name);
            }
            else if($request->old_section_3_page_4_thumbnail == null) {
                if($contents->{'section_3_page_4_thumbnail_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_3_page_4_thumbnail_' . $short_code});
                }

                $section_3_page_4_thumbnail_name = null;
            }
            else {
                $section_3_page_4_thumbnail_name = $request->old_section_3_page_4_thumbnail;
            }
        // Section 3 page 4 thumbnail

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
            'old_section_3_page_1_thumbnail',
            'new_section_3_page_1_thumbnail',
            'old_section_3_page_2_thumbnail',
            'new_section_3_page_2_thumbnail',
            'old_section_3_page_3_thumbnail',
            'new_section_3_page_3_thumbnail',
            'old_section_3_page_4_thumbnail',
            'new_section_3_page_4_thumbnail',
            'old_section_4_image',
            'new_section_4_image'
        );

        $data['section_1_image_' . '' . $short_code] = $section_1_image_name;
        $data['section_3_page_1_thumbnail_' . '' . $short_code] = $section_3_page_1_thumbnail_name;
        $data['section_3_page_2_thumbnail_' . '' . $short_code] = $section_3_page_2_thumbnail_name;
        $data['section_3_page_3_thumbnail_' . '' . $short_code] = $section_3_page_3_thumbnail_name;
        $data['section_3_page_4_thumbnail_' . '' . $short_code] = $section_3_page_4_thumbnail_name;
        $data['section_4_image_' . '' . $short_code] = $section_4_image_name;
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}