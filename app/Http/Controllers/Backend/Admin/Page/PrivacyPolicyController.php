<?php

namespace App\Http\Controllers\Backend\Admin\Page;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicyContent;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
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
        $contents = PrivacyPolicyContent::find(1);
        $short_code = $this->shortCode($language);

        return view('backend.admin.pages.privacy-policy', [
            'contents' => $contents,
            'language' => $language,
            'short_code' => $short_code
        ]);
    }

    public function update(Request $request, $language)
    {
        $contents = PrivacyPolicyContent::find(1);

        $data = $request->all();
        $contents->fill($data)->save();

        return redirect()->back()->with('success', "Successfully updated!");
    }
}