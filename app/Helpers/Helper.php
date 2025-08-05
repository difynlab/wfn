<?php

use App\Models\Favorite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

if(!function_exists('isFavorite')) {
    function isFavorite($user_id, $warehouse_id) {
        $check = Favorite::where('user_id', $user_id)->where('warehouse_id', $warehouse_id)->exists();

        return $check;
    }
}

if(!function_exists('send_email')) {
    function send_email($mailable, $email){
        try {
            Mail::to($email)->send($mailable);
        }
        catch(\Exception $e) {
            Log::error("Failed to send email to {$email}: " . $e->getMessage());
        }
    }
}