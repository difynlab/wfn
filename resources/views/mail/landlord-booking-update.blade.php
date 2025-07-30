<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Booking Updated for Your Warehouse - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">Booking Updated on Your Warehouse</h2>

            <p style="font-size: 16px; color: #333333;">Hi {{ $mail_data['landlord_name'] }},</p>

            <p style="font-size: 16px; color: #333333;">
                The booking for your warehouse <strong>{{ $mail_data['warehouse'] }}</strong> has been updated. Here are the updated details:
            </p>

            @include('mail.booking-update-details', ['mail_data' => $mail_data])

            <p style="text-align: center; margin: 40px 0;">
                <a href="{{ route('landlord.bookings.edit', $mail_data['booking_id']) }}"
                style="background-color: #E31D1D; color: #ffffff; padding: 14px 30px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                    View Booking
                </a>
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