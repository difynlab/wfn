<?php

use App\Models\Favorite;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

if(!function_exists('isFavorite')) {
    function isFavorite($user_id, $warehouse_id) {
        $check = Favorite::where('user_id', $user_id)->where('warehouse_id', $warehouse_id)->exists();

        return $check;
    }
}

if(!function_exists('send_email')) {
    function send_email($mailable, $emails){
        if(!is_array($emails)) {
            $emails = explode(", ", trim($emails, "[]"));
        }

        foreach($emails as $email) {
            try {
                Mail::to($email)->send(clone $mailable);
            }
            catch (\Throwable $e) {
                Log::error("Failed to send email to {$email}: " . $e->getMessage());
                continue;
            }
        }
    }
}

if(!function_exists('process_image')) {
    function process_image(UploadedFile|string|null $source, string $base_path, ?string $old_filename = null): ?string {
        if(!$source && $old_filename) {
            Storage::delete("$base_path/$old_filename");
            Storage::delete("$base_path/thumbnails/$old_filename");
            return null;
        }

        if(!$source) {
            return null;
        }

        $image = Image::read($source);
        $filename = Str::uuid()->toString().'.webp';

        // Main image
        $main = (clone $image)->toWebp(80);
        Storage::put("$base_path/$filename", (string) $main);

        // Blurred thumbnail
        $thumbnail = (clone $image)
            ->resize(20, null, fn ($c) => $c->aspectRatio())
            ->blur(15)
            ->toWebp(40);

        Storage::put("$base_path/thumbnails/$filename", (string) $thumbnail);

        if($old_filename) {
            Storage::delete("$base_path/$old_filename");
            Storage::delete("$base_path/thumbnails/$old_filename");
        }

        return $filename;
    }
}