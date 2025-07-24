<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reset Your Password - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">Reset Your Password</h2>

            <p style="font-size: 16px; color: #555555;">
                Hi {{ $mail_data['name'] ?? 'there' }},
            </p>

            <p style="font-size: 16px; color: #555555; margin-bottom: 30px;">
                We received a request to reset your password. Click the button below to set a new one. If you didn't request this, you can safely ignore this email.
            </p>

            <p style="text-align: center; margin: 40px 0;">
                <a href="{{ route('reset-password', [$mail_data['email'], $mail_data['token']]) }}"
                style="background-color: #E31D1D; color: white; padding: 14px 30px; font-size: 16px; text-decoration: none; border-radius: 8px;">
                    Reset Password
                </a>
            </p>

            <p style="font-size: 15px; color: #555555;">
                If the button doesn't work, copy and paste the following URL into your browser:
            </p>

            <p style="font-size: 15px; color: #555555; word-break: break-all;">
                {{ route('reset-password', [$mail_data['email'], $mail_data['token']]) }}
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} Team</strong>
            </p>
        </div>
    </body>
</html>