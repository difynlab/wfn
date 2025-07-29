<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Report Received - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">We've Received Your Report</h2>

            <p style="font-size: 16px; color: #555555;">Hi {{ $mail_data['user'] }},</p>

            <p style="font-size: 16px; color: #555555;">
                Thank you for reporting the warehouse <strong>{{ $mail_data['warehouse'] }}</strong>
            </p>

            <p style="font-size: 16px; color: #555555;">
                <strong>Your Reason:</strong> {{ $mail_data['reason'] }}
            </p>

            <p style="font-size: 16px; color: #555555;">Our team will review the report and take appropriate action if necessary.</p>

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