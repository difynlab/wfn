<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Newsletter Subscription - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">New Subscriber Alert</h2>

            <p style="font-size: 16px; color: #333333;">
                A new user has subscribed to your newsletter.
            </p>

            <p style="font-size: 16px; color: #333333;">
                <strong>Email:</strong> {{ $mail_data['email'] }}
            </p>

            <p style="text-align: center; margin: 40px 0;">
                <a href="{{ route('admin.subscriptions.index') }}"
                style="background-color: #E31D1D; color: #ffffff; padding: 14px 30px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                    View in Admin Panel
                </a>
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} System</strong>
            </p>
        </div>
    </body>
</html>