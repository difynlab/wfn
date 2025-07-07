<p>Dear {{ $mail_data['first_name'] }} {{ $mail_data['last_name'] }},</p>

<p style="margin-bottom: 35px;">Please click on the below button to reset your password.</p>

<a href="{{ route('admin.reset-password', [$mail_data['email'], $mail_data['token']]) }}" style="background-color: #E31D1D; color: white; padding: 20px; font-size: 16px; text-decoration: none; border-radius: 8px;">Reset Password</a>

<p style="margin-top: 35px; margin-bottom: 3px;">Best regards,</p>

<p style="margin-top: 0px;">WFN</p>