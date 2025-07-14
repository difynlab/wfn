<?php

namespace App\Http\Controllers\Backend\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\TermsOfUseContent;
use Illuminate\Http\Request;

class TermsOfUseController extends Controller
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
        $contents = TermsOfUseContent::find(1);
        $short_code = $this->shortCode($language);

        return view('backend.admin.pages.terms-of-use', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language)
    {
        $contents = TermsOfUseContent::find(1);
        $short_code = $this->shortCode($language);

        // Tabs
            if($request->tab_titles) {
                $tabs = [];
                foreach($request->tab_titles as $key => $tab_title) {
                    array_push($tabs, [
                        'title' => $tab_title,
                        'content' => $request->tab_contents[$key] ?? null
                    ]);
                }
            }
            $tabs = $tabs ? json_encode($tabs) : null;
        // Tabs

        $data = $request->except(
            'tab_titles',
            'tab_contents'
        );
        $data['content_' . '' . $short_code] = $tabs;
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}