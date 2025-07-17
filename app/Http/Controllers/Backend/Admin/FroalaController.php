<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FroalaController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $image = $request->file('upload');
            $image_name = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('backend/froala', $image_name);
            $url = asset('storage/backend/froala/' . $image_name);
            
            return response()->json([
                'link' => $url
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function delete(Request $request)
    {
        $src = $request->src;
        $relative_path = Str::after($src, '/storage/');
        $deleted = Storage::disk('public')->delete($relative_path);
        return response()->json(['deleted' => $deleted]);
    }
}