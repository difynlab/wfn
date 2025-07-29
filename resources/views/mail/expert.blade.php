<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Support Message Received - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">We've Received Your Message</h2>

            <p style="font-size: 16px; color: #555555;">Hi {{ $mail_data['user'] }},</p>

            <p style="font-size: 16px; color: #555555;">
                Thank you for contacting expert support regarding <strong>{{ $mail_data['subject'] }}</strong>.
            </p>

            <p style="font-size: 16px; color: #555555;">
                Our team is reviewing your message and will get back to you as soon as possible.
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