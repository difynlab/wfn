<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Your Company Has Been Approved - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">

            <h2 style="color: #333333;">Your Company Has Been Approved</h2>

            <p style="font-size: 16px; color: #555555;">Hi {{ $mail_data['name'] ?? 'there' }},</p>

            <p style="font-size: 16px; color: #555555;">
                We're happy to let you know that your updated company information has been successfully reviewed and approved on <strong>{{ config('app.name') }}</strong>.
            </p>

            <p style="font-size: 16px; color: #555555; margin-bottom: 25px;">
                You can now fully access all platform features.
            </p>

            <p style="text-align: center; margin: 40px 0;">
                <a href="{{ $mail_data['role'] == 'landlord' ? route('landlord.dashboard') : route('tenant.dashboard') }}"
                style="background-color: #28a745; color: white; padding: 14px 30px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                    Go to Dashboard
                </a>
            </p>

            <p style="font-size: 14px; color: #888888;">
                If you have any questions, feel free to reach out to us at <a href="mailto:support@wfn.com">support@wfn.com</a>.
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} Team</strong>
            </p>
        </div>
    </body>
</html>