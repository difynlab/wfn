<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Your Booking Confirmation - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">Booking Confirmed</h2>

            <p style="font-size: 16px; color: #555555;">Hi {{ $mail_data['tenant_name'] }},</p>

            <p style="font-size: 16px; color: #555555;">You've successfully booked <strong>{{ $mail_data['warehouse_name'] }}</strong>.</p>

            <p style="font-size: 16px; color: #555555;">
                <strong>Booking Details:</strong>
                <br>
                Tenancy Date: {{ $mail_data['tenancy_date'] }}
                <br>
                Renewal Date: {{ $mail_data['renewal_date'] }}
                <br>
                No of Pallets: {{ $mail_data['no_of_pallets'] }}
            </p>

            <p style="font-size: 16px; color: #555555;">We'll notify you once the landlord responds. You can check the status in your dashboard.</p>

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