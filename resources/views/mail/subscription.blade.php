<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>You're Subscribed - {{ config('app.name') }}</title>
    </head>

    <body style="font-family: Manrope, serif; background-color: #f9f9f9; padding: 30px;">
        <div style="background-color: #ffffff; padding: 40px; border-radius: 10px; max-width: 600px; margin: auto;">
            <h2 style="color: #333333;">Welcome to Our Newsletter</h2>

            <p style="font-size: 16px; color: #333333;">Hi there,</p>

            <p style="font-size: 16px; color: #333333;">
                Thank you for subscribing to <strong>{{ config('app.name') }}</strong>'s newsletter. You'll now receive the latest updates, offers, and news directly in your inbox.
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