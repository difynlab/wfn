<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Your Account Has Been Approved - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            @if($mail_data['role'] === 'landlord')
                <h2 style="color: #333333;">Your Account Has Been Approved</h2>
                <p style="font-size: 16px; color: #555555;">Hi {{ $mail_data['name'] ?? 'there' }},</p>

                <p style="font-size: 16px; color: #555555;">
                    Great news! Your landlord account on <strong>{{ config('app.name') }}</strong> has been successfully approved.
                </p>

                <p style="font-size: 16px; color: #555555;">
                    You can now:
                    <br>- List your warehouse spaces
                    <br>- Manage listings and bookings
                    <br>- Connect with thousands of potential renters
                </p>

                <p style="text-align: center; margin: 40px 0;">
                    <a href="{{ route('landlord.dashboard') }}"
                    style="background-color: #28a745; color: #ffffff; padding: 14px 25px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                        Go to Dashboard
                    </a>
                </p>
            @else
                <h2 style="color: #333333;">Your Account Has Been Approved</h2>
                <p style="font-size: 16px; color: #555555;">Hi {{ $mail_data['name'] ?? 'there' }},</p>

                <p style="font-size: 16px; color: #555555;">
                    Your account on <strong>{{ config('app.name') }}</strong> is now approved and ready to use!
                </p>

                <p style="font-size: 16px; color: #555555;">
                    You can now:
                    <br>- Browse and compare warehouse listings
                    <br>- Use search filters to find the right space
                    <br>- Book warehouses directly from the platform
                </p>

                <p style="text-align: center; margin: 40px 0;">
                    <a href="{{ route('tenant.dashboard') }}"
                    style="background-color: #28a745; color: #ffffff; padding: 14px 25px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                        Login & Explore
                    </a>
                </p>
            @endif

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