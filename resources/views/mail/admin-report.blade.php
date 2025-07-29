<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Warehouse Report - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">New Warehouse Report Submitted from {{ $mail_data['user'] }}</h2>

            <p style="font-size: 16px; color: #555555;">
                <strong>Reported Warehouse:</strong> {{ $mail_data['warehouse'] }}<br>
                <strong>Tenant:</strong> {{ $mail_data['user'] }} ({{ $mail_data['user_email'] }})
            </p>

            <p style="font-size: 16px; margin-top: 20px; color: #555555;">
                <strong>Reported Reason:</strong><br>
                {{ $mail_data['reason'] }}
            </p>

            <p style="text-align: center; margin: 40px 0;">
                <a href="{{ route('admin.reports.edit', $mail_data['report_id']) }}"
                style="background-color: #E31D1D; color: #ffffff; padding: 14px 30px; font-size: 16px; text-decoration: none; border-radius: 6px;">
                    View in Admin Panel
                </a>
            </p>

            <p style="font-size: 14px; color: #888888; margin-top: 10px;">
                Best regards,<br>
                <strong>{{ config('app.name') }} System</strong>
            </p>
        </div>
    </body>
</html>