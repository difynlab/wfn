<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AboutController extends Controller
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
        $contents = AboutContent::find(1);
        $short_code = $this->shortCode($language);

        return view('backend.admin.pages.about', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language)
    {
        $validator = Validator::make($request->all(), [
            'new_section_2_image' => 'nullable|max:30720',
            'new_section_4_image_1' => 'nullable|max:30720',
            'new_section_4_image_2' => 'nullable|max:30720',
            'new_section_5_video' => 'nullable|max:204800',
            'new_section_7_image' => 'nullable|max:30720',
            'new_section_8_video' => 'nullable|max:204800',
            'new_section_10_image' => 'nullable|max:30720',
        ], [
            'new_section_2_image.max' => 'Image must not be greater than 30 MB.',
            'new_section_4_image_1.max' => 'Image must not be greater than 30 MB.',
            'new_section_4_image_2.max' => 'Image must not be greater than 30 MB.',
            'new_section_5_video.max' => 'Video must not be greater than 200 MB.',
            'new_section_7_image.max' => 'Image must not be greater than 30 MB.',
            'new_section_8_video.max' => 'Video must not be greater than 200 MB.',
            'new_section_10_image.max' => 'Image must not be greater than 30 MB.'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'error' => 'Update Failed!',
                'route' => route('backend.pages.index')
            ]);
        }

        $contents = AboutContent::find(1);
        $short_code = $this->shortCode($language);

        // Section 2 image
            if($request->file('new_section_2_image')) {
                if($request->old_section_2_image) {
                    Storage::delete('backend/pages/' . $request->old_section_2_image);
                }

                $new_section_2_image = $request->file('new_section_2_image');
                $section_2_image_name = Str::random(40) . '.' . $new_section_2_image->getClientOriginalExtension();
                $new_section_2_image->storeAs('backend/pages', $section_2_image_name);
            }
            else if($request->old_section_2_image == null) {
                if($contents->{'section_2_image_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_2_image_' . $short_code});
                }

                $section_2_image_name = null;
            }
            else {
                $section_2_image_name = $request->old_section_2_image;
            }
        // Section 2 image

        // Section 4 image 1
            if($request->file('new_section_4_image_1')) {
                if($request->old_section_4_image_1) {
                    Storage::delete('backend/pages/' . $request->old_section_4_image_1);
                }

                $new_section_4_image_1 = $request->file('new_section_4_image_1');
                $section_4_image_1_name = Str::random(40) . '.' . $new_section_4_image_1->getClientOriginalExtension();
                $new_section_4_image_1->storeAs('backend/pages', $section_4_image_1_name);
            }
            else if($request->old_section_4_image_1 == null) {
                if($contents->{'section_4_image_1_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_4_image_1_' . $short_code});
                }

                $section_4_image_1_name = null;
            }
            else {
                $section_4_image_1_name = $request->old_section_4_image_1;
            }
        // Section 4 image 1

        // Section 4 image 2
            if($request->file('new_section_4_image_2')) {
                if($request->old_section_4_image_2) {
                    Storage::delete('backend/pages/' . $request->old_section_4_image_2);
                }

                $new_section_4_image_2 = $request->file('new_section_4_image_2');
                $section_4_image_2_name = Str::random(40) . '.' . $new_section_4_image_2->getClientOriginalExtension();
                $new_section_4_image_2->storeAs('backend/pages', $section_4_image_2_name);
            }
            else if($request->old_section_4_image_2 == null) {
                if($contents->{'section_4_image_2_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_4_image_2_' . $short_code});
                }

                $section_4_image_2_name = null;
            }
            else {
                $section_4_image_2_name = $request->old_section_4_image_2;
            }
        // Section 4 image 2

        // Section 5 video
            if($request->file('new_section_5_video')) {
                if($request->old_section_5_video) {
                    Storage::delete('backend/pages/' . $request->old_section_5_video);
                }

                $new_section_5_video = $request->file('new_section_5_video');
                $section_5_video_name = Str::random(40) . '.' . $new_section_5_video->getClientOriginalExtension();
                $new_section_5_video->storeAs('backend/pages', $section_5_video_name);
            }
            else if($request->old_section_5_video == null) {
                if($contents->{'section_5_video_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_5_video_' . $short_code});
                }

                $section_5_video_name = null;
            }
            else {
                $section_5_video_name = $request->old_section_5_video;
            }
        // Section 5 video

        // Section 7 image
            if($request->file('new_section_7_image')) {
                if($request->old_section_7_image) {
                    Storage::delete('backend/pages/' . $request->old_section_7_image);
                }

                $new_section_7_image = $request->file('new_section_7_image');
                $section_7_image_name = Str::random(40) . '.' . $new_section_7_image->getClientOriginalExtension();
                $new_section_7_image->storeAs('backend/pages', $section_7_image_name);
            }
            else if($request->old_section_7_image == null) {
                if($contents->{'section_7_image_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_7_image_' . $short_code});
                }

                $section_7_image_name = null;
            }
            else {
                $section_7_image_name = $request->old_section_7_image;
            }
        // Section 7 image

        // Section 8 video
            if($request->file('new_section_8_video')) {
                if($request->old_section_8_video) {
                    Storage::delete('backend/pages/' . $request->old_section_8_video);
                }

                $new_section_8_video = $request->file('new_section_8_video');
                $section_8_video_name = Str::random(40) . '.' . $new_section_8_video->getClientOriginalExtension();
                $new_section_8_video->storeAs('backend/pages', $section_8_video_name);
            }
            else if($request->old_section_8_video == null) {
                if($contents->{'section_8_video_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_8_video_' . $short_code});
                }

                $section_8_video_name = null;
            }
            else {
                $section_8_video_name = $request->old_section_8_video;
            }
        // Section 8 video

        // Section 10 image
            if($request->file('new_section_10_image')) {
                if($request->old_section_10_image) {
                    Storage::delete('backend/pages/' . $request->old_section_10_image);
                }

                $new_section_10_image = $request->file('new_section_10_image');
                $section_10_image_name = Str::random(40) . '.' . $new_section_10_image->getClientOriginalExtension();
                $new_section_10_image->storeAs('backend/pages', $section_10_image_name);
            }
            else if($request->old_section_10_image == null) {
                if($contents->{'section_10_image_' . $short_code}) {
                    Storage::delete('backend/pages/' . $contents->{'section_10_image_' . $short_code});
                }

                $section_10_image_name = null;
            }
            else {
                $section_10_image_name = $request->old_section_10_image;
            }
        // Section 10 image

        // FAQs
            if($request->questions) {
                $faqs = [];
                foreach($request->questions as $key => $question) {
                    array_push($faqs, [
                        'question' => $question,
                        'answer' => $request->answers[$key] ?? null
                    ]);
                }
            }
            $faqs = $faqs ? json_encode($faqs) : null;
        // FAQs

        $data = $request->except(
            'old_section_2_image',
            'new_section_2_image',
            'old_section_4_image_1',
            'new_section_4_image_1',
            'old_section_4_image_2',
            'new_section_4_image_2',
            'old_section_5_video',
            'new_section_5_video',
            'old_section_7_image',
            'new_section_7_image',
            'old_section_8_video',
            'new_section_8_video',
            'old_section_10_image',
            'new_section_10_image',
            'questions',
            'answers'
        );

        $data['section_2_image_' . '' . $short_code] = $section_2_image_name;
        $data['section_4_image_1_' . '' . $short_code] = $section_4_image_1_name;
        $data['section_4_image_2_' . '' . $short_code] = $section_4_image_2_name;
        $data['section_5_video_' . '' . $short_code] = $section_5_video_name;
        $data['section_7_image_' . '' . $short_code] = $section_7_image_name;
        $data['section_8_video_' . '' . $short_code] = $section_8_video_name;
        $data['section_10_image_' . '' . $short_code] = $section_10_image_name;
        $data['section_11_faqs_' . '' . $short_code] = $faqs;
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}