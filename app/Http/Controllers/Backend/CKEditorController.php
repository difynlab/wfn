<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $image = $request->file('upload');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('backend/ckeditor', $image_name);
            $url = asset('storage/backend/ckeditor/' . $image_name);
            
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }
    }
}