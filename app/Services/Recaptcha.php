<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Recaptcha
{
    public static function verify(string $token, string $expected_action): array
    {
        $secret = config('services.recaptcha.secret_key');
        $min_score = (float) config('services.recaptcha.score');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => $secret,
            'response' => $token,
        ])->json();

        $success = (bool)($response['success'] ?? false);
        $score   = (float)($response['score'] ?? 0.0);
        $action  = (string)($response['action'] ?? '');

        $passes = $success && $action === $expected_action && $score >= $min_score;

        return compact('passes', 'success', 'score', 'action', 'response');
    }
}
