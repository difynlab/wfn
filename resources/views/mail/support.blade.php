<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Support Message Received - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">Thank You for Contacting Us</h2>

            <p style="font-size: 16px; color: #555555;">Hi {{ $mail_data['name'] }},</p>

            <p style="font-size: 16px; color: #555555;">
                We've received your message regarding <strong>{{ $mail_data['subject'] }}</strong>.
            </p>

            <p style="font-size: 16px; color: #555555;">
                One of our support team members will get back to you shortly.
            </p>

            <p style="font-size: 14px; color: #888888;">
                Need help? Reach out to us at <a href="mailto:support@wfn.com">support@wfn.com</a>.
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} Team</strong>
            </p>
        </div>
    </body>
</html>