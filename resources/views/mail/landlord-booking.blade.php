<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Booking Request - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f4f4f4; padding: 30px;">
        <div style="background-color: #ffffff; padding: 30px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">You Have a New Booking Request</h2>

            <p style="font-size: 16px; color: #555555;">Hi {{ $mail_data['landlord_name'] }},</p>

            <p style="font-size: 16px; color: #555555;">Your warehouse <strong>{{ $mail_data['warehouse_name'] }}</strong> has received a booking request.</p>

            <p style="font-size: 16px; color: #555555;">
                <strong>Booking Details:</strong>
                <br>
                Tenancy Date: {{ $mail_data['tenancy_date'] }}
                <br>
                Renewal Date: {{ $mail_data['renewal_date'] }}
                <br>
                No of Pallets: {{ $mail_data['no_of_pallets'] }}
            </p>

            <p style="text-align: center; margin: 40px 0;">
                <a href="{{ route('landlord.bookings.edit', $mail_data['booking_id']) }}"
                style="background-color: #E31D1D; color: #ffffff; padding: 14px 30px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                    View Booking
                </a>
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} Team</strong>
            </p>
        </div>
    </body>
</html>