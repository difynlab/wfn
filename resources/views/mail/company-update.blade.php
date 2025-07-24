<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Company Update Submitted - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            
            <h2 style="color: #333333;">Company Information Update Received</h2>

            <p style="font-size: 16px; color: #555555;">
                Hi {{ $mail_data['name'] ?? 'there' }},
            </p>

            <p style="font-size: 16px; color: #555555; margin-bottom: 25px;">
                Thank you for updating your company details on <strong>{{ config('app.name') }}</strong>.
            </p>

            <p style="font-size: 16px; color: #555555; margin-bottom: 25px;">
                Our team will now review your submission. Once approved, you'll receive a confirmation email, and your account will be activated on the platform.
            </p>

            <p style="font-size: 16px; color: #555555;">
                No action is required at this time. We appreciate your patience during the review process.
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} Team</strong>
            </p>
        </div>
    </body>
</html>