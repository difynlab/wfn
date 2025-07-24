<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New User Registration</title>
    </head>
    <body style="font-family: Manrope, serif; background-color: #f4f4f4; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">New {{ ucfirst($mail_data['role']) }} Registered</h2>

            <p><strong>Name:</strong> {{ $mail_data['name'] }}</p>
            <p><strong>Email:</strong> {{ $mail_data['email'] }}</p>
            <p><strong>Registered At:</strong> {{ $mail_data['created_at']->format('Y-m-d H:i:s') }}</p>

            <p style="margin-top: 20px; font-size: 14px; color: #555555;">
                You can review and approve this account in the admin dashboard.
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} System</strong>
            </p>
        </div>
    </body>
</html>