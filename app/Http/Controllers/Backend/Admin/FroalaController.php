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
            $processed_image = process_image($request->file('upload'), 'backend/froala');
            $url = asset('storage/backend/froala/' . $processed_image);
            
            return response()->json([
                'link' => $url
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function delete(Request $request)
    {
        $src = $request->input('src');

        if (!is_string($src) || $src === '') {
            return response()->json(['deleted' => false, 'error' => 'Invalid path'], 400);
        }

        $relative_path = Str::after($src, '/storage/');
        $relative_path = str_replace('\\', '/', $relative_path);
        $relative_path = ltrim($relative_path, '/');

        if (
            $relative_path === ''
            || str_contains($relative_path, '..')
            || !Str::startsWith($relative_path, 'backend/froala/')
        ) {
            return response()->json(['deleted' => false, 'error' => 'Invalid path'], 400);
        }

        $full_path = Storage::disk('public')->path($relative_path);
        $allowed_root = realpath(Storage::disk('public')->path('backend/froala'));

        if ($allowed_root === false || !is_file($full_path)) {
            return response()->json(['deleted' => false], 404);
        }

        $resolved = realpath($full_path);

        if ($resolved === false || !Str::startsWith($resolved, $allowed_root . DIRECTORY_SEPARATOR)) {
            return response()->json(['deleted' => false, 'error' => 'Invalid path'], 400);
        }

        $deleted = Storage::disk('public')->delete($relative_path);

        return response()->json(['deleted' => $deleted]);
    }
}