<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Company Update Submitted</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f4f4f4; padding: 30px;">
        <div style="background-color: #ffffff; padding: 30px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">Company Details Updated</h2>

            <p style="font-size: 16px; color: #555555;">
                A user has updated their company information on <strong>{{ config('app.name') }}</strong>.
            </p>

            <p style="font-size: 16px; color: #555555;">
                <strong>User:</strong> {{ $mail_data['name'] }}<br>
                <strong>Email:</strong> {{ $mail_data['email'] }}
            </p>

            <p style="font-size: 16px; color: #555555;">
                Please review the submitted company details and take the necessary action in the admin dashboard.
            </p>

            <p style="text-align: center; margin: 40px 0;">
                <a href="{{ route('admin.users.company.index', $mail_data['id']) }}"
                style="background-color: #E31D1D; color: #ffffff; padding: 14px 30px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                    Review Company
                </a>
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} System</strong>
            </p>
        </div>
    </body>
</html>