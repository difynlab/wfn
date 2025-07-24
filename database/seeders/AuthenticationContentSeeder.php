<?php

namespace Database\Seeders;

use App\Models\AuthenticationContent;
use Illuminate\Database\Seeder;

class AuthenticationContentSeeder extends Seeder
{
    public function run()
    {
        $records = [
            [
                // English fields
                'id'                        => 1,
                'login_name_en'             => 'Log In',
                'login_title_en'            => 'Get Started Now',
                'login_description_en'      => 'Log in to access the portal, track progress, and manage requests.',
                'login_username_en'         => 'Username',
                'login_username_placeholder_en' => 'Please enter your username',
                'login_password_en'         => 'Password',
                'login_remember_en'=> 'Remember Me',
                'login_forgot_password_en' => 'Forgot Password?',
                'login_button_en'           => 'Login Now',
                'login_no_account_en'      => 'Don\'t have an account?',
                'login_register_en'        => 'Register here',

                'register_name_en'          => 'Register Now',
                'register_title_en'         => 'User Registration Form',
                'register_description_en'   => 'Fill out this quick form and get started with your complete experience with us.',
                'register_agent_en'         => 'Register as an Agent',
                'register_company_en'       => 'Register as a Company',
                'register_first_name_en'    => 'First Name',
                'register_first_name_placeholder_en' => 'Please enter your first name',
                'register_last_name_en'     => 'Last Name',
                'register_last_name_placeholder_en' => 'Please enter your last name',
                'register_email_en'         => 'Email Address',
                'register_email_placeholder_en' => 'johnmercury@gmail.com',
                'register_country_en'         => 'Country',
                'register_country_placeholder_en' => 'Select country',
                'register_phone_en'         => 'Phone',
                'register_phone_placeholder_en' => 'E.g.: 999 999 9999',
                'register_city_en'          => 'City',
                'register_city_placeholder_en' => 'Please enter your city',
                'register_password_en'      => 'Password',
                'register_confirm_password_en' => 'Confirm Password',
                'register_button_en'        => 'Register Now',
                'register_have_account_en'  => 'Already have an account?',
                'register_login_en'         => 'Login',

                'forgot_name_en'            => 'Forgot Password',
                'forgot_title_en'           => 'Forgot Your Password',
                'forgot_description_en'     => 'Don\'t worry! Resetting your password is easy. Just type in the email you registered for Warehouse Exchange.',
                'forgot_email_en'           => 'Email Address',
                'forgot_email_placeholder_en' => 'Please enter your email address',
                'forgot_button_en'          => 'Send Now',
                'forgot_remember_en'        => 'Did you remember your password?',
                'forgot_login_en'           => 'Login',

                'reset_name_en'             => 'Reset Password',
                'reset_title_en'            => 'Change Password',
                'reset_description_en'      => 'Need a new password? Fill in the details below to update it.',
                'reset_new_password_en'     => 'New Password',
                'reset_confirm_password_en' => 'Confirm Password',
                'reset_button_en'           => 'Update Now',

                // Arabic fields
                'login_name_ar' => 'تسجيل الدخول',
                'login_title_ar' => 'ابدأ الآن',
                'login_description_ar' => 'سجّل دخولك للوصول إلى البوابة، ومتابعة التقدم، وإدارة الطلبات',
                'login_username_ar' => 'اسم المستخدم',
                'login_username_placeholder_ar' => 'يرجى إدخال اسم المستخدم',
                'login_password_ar' => 'كلمة المرور',
                'login_remember_ar' => 'تذكرني',
                'login_forgot_password_ar' => 'نسيت كلمة المرور',
                'login_button_ar' => 'سجّل الآن',
                'login_no_account_ar' => 'ليس لديك حساب؟',
                'login_register_ar' => 'سجّل هنا',

                'register_name_ar' => 'يسجل',
                'register_title_ar' => 'نموذج تسجيل المستخدم',
                'register_description_ar' => 'املأ هذا النموذج السريع وابدأ تجربتك الكاملة معنا.',
                'register_agent_ar' => 'سجّل كوكيل',
                'register_company_ar' => 'سجّل كشركة',
                'register_first_name_ar' => 'الاسم الأول',
                'register_first_name_placeholder_ar' => 'يرجى إدخال اسمك الأول',
                'register_last_name_ar' => 'اسم العائلة',
                'register_last_name_placeholder_ar' => 'يرجى إدخال اسم عائلتك',
                'register_email_ar' => 'البريد الإلكتروني',
                'register_email_placeholder_ar' => 'johnmercury@gmail.com',
                'register_country_ar'         => 'دولة',
                'register_country_placeholder_ar' => 'اختر البلد',
                'register_phone_ar' => 'رقم الهاتف',
                'register_phone_placeholder_ar' => 'مثال: 999 999 9999',
                'register_city_ar' => 'المدينة',
                'register_city_placeholder_ar' => 'يرجى إدخال مدينتك',
                'register_password_ar' => 'كلمة المرور',
                'register_confirm_password_ar' => 'تأكيد كلمة المرور',
                'register_button_ar' => 'سجّل الآن',
                'register_have_account_ar' => 'هل لديك حساب بالفعل؟',
                'register_login_ar' => 'تسجيل الدخول',

                'forgot_name_ar' => 'نسيت كلمة المرور',
                'forgot_title_ar' => 'نسيت كلمة مرورك',
                'forgot_description_ar' => 'لا تقلق! إعادة تعيين كلمة مرورك سهلة. ما عليك سوى إدخال بريدك الإلكتروني الذي سجلت به في خدمة تبادل المستودعات.',
                'forgot_email_ar' => 'عنوان البريد الإلكتروني',
                'forgot_email_placeholder_ar' => 'يرجى إدخال بريدك الإلكتروني',
                'forgot_button_ar' => 'إرسال الآن',
                'forgot_remember_ar' => 'هل تذكرت كلمة مرورك؟',
                'forgot_login_ar' => 'تسجيل الدخول',

                'reset_name_ar' => 'إعادة تعيين كلمة المرور',
                'reset_title_ar' => 'تغيير كلمة المرور',
                'reset_description_ar' => 'هل تحتاج إلى كلمة مرور جديدة؟ املأ التفاصيل أدناه لتحديثها.',
                'reset_new_password_ar' => 'كلمة مرور جديدة',
                'reset_confirm_password_ar' => 'تأكيد كلمة المرور',
                'reset_button_ar' => 'تحديث الآن',
            ]
        ];

        foreach($records as $record) {
            AuthenticationContent::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
