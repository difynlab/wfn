<?php

use App\Models\Favorite;
use Illuminate\Http\Response;
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

if(!function_exists('normalize_email_recipients')) {
    function normalize_email_recipients(mixed $emails): array
    {
        if (is_array($emails)) {
            $list = $emails;
        } else {
            $value = trim((string) $emails);
            $value = trim($value, "[]");
            $list = preg_split('/\s*,\s*/', $value) ?: [];
        }

        $normalized = [];

        foreach ($list as $email) {
            $email = trim((string) $email, " \"'");

            if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $normalized[] = $email;
            }
        }

        return array_values(array_unique($normalized));
    }
}

if(!function_exists('send_email')) {
    function send_email($mailable, $emails){
        foreach(normalize_email_recipients($emails) as $email) {
            try {
                Mail::to($email)->queue(clone $mailable);
            }
            catch (\Throwable $e) {
                Log::error("Failed to send email to {$email}: " . $e->getMessage());
                continue;
            }
        }
    }
}

if(!function_exists('clamp_pagination')) {
    function clamp_pagination(mixed $value, int $min = 1, int $max = 100, int $default = 10): int
    {
        if ($value === null || $value === '') {
            return $default;
        }

        return min(max((int) $value, $min), $max);
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

        if ($source instanceof UploadedFile) {
            $mime = $source->getMimeType();
            $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/bmp', 'image/avif'];

            if ($mime === null || !in_array($mime, $allowed, true)) {
                throw new \InvalidArgumentException('Invalid image upload.');
            }
        }

        try {
            $image = Image::read($source);
            $filename = Str::uuid()->toString().'.webp';

            $main = (clone $image)->toWebp(80);
            Storage::put("$base_path/$filename", (string) $main);

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
        } catch (\Throwable $e) {
            Log::error('process_image failed: ' . $e->getMessage());
            throw $e;
        }
    }
}

if(!function_exists('apiResponse')) {
    function apiResponse($message, $status, $data = []) {
        return response()->json([
            'http_status' => $status,
            'http_status_message' => Response::$statusTexts[$status],
            'message' => $message,
            'data' => $data
        ], $status);
    }
}