<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Your Booking Was Updated - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">Your Booking Has Been Updated</h2>

            <p style="font-size: 16px; color: #555555;">Hi {{ $mail_data['tenant_name'] }},</p>

            <p style="font-size: 16px; color: #555555;">
                The details of your booking for <strong>{{ $mail_data['warehouse'] }}</strong> have been updated. Please review the updated information below:
            </p>

            @include('mail.booking-update-details', ['mail_data' => $mail_data])

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
