<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Booking Logged - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">New Booking Notification</h2>

            <p style="font-size: 16px; color: #555555;">
                A new booking has been made on the platform.
            </p>

            <p style="font-size: 16px; color: #555555;">
                <strong>Details:</strong><br>
                Warehouse: {{ $mail_data['warehouse_name'] }}<br>
                Tenant: {{ $mail_data['tenant_name'] }} ({{ $mail_data['tenant_email'] }})<br>
                Landlord: {{ $mail_data['landlord_name'] }} ({{ $mail_data['landlord_email'] }})<br>
                Tenancy Date: {{ $mail_data['tenancy_date'] }}<br>
                Renewal Date: {{ $mail_data['renewal_date'] }}<br>
                No of Pallets: {{ $mail_data['no_of_pallets'] }}
            </p>

            <p style="text-align: center; margin: 40px 0;">
                <a href="{{ route('admin.bookings.edit', $mail_data['booking_id']) }}"
                style="background-color: #E31D1D; color: #ffffff; padding: 14px 30px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                    View Booking
                </a>
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} System</strong>
            </p>
        </div>
    </body>
</html>
