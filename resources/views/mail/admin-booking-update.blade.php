<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Booking Record Updated - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">Booking Update Logged</h2>

            <p style="font-size: 16px; color: #555555;">
                A booking was updated on the platform. Below are the latest details of the booking:
            </p>

            @include('mail.booking-update-details', ['mail_data' => $mail_data])

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