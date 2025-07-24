<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authentication_contents', function (Blueprint $table) {
            $table->id();

            $table->text('login_name_en')->nullable();
            $table->text('login_title_en')->nullable();
            $table->text('login_description_en')->nullable();
            $table->text('login_image_en')->nullable();
            $table->text('login_username_en')->nullable();
            $table->text('login_username_placeholder_en')->nullable();
            $table->text('login_password_en')->nullable();
            $table->text('login_remember_en')->nullable();
            $table->text('login_forgot_password_en')->nullable();
            $table->text('login_button_en')->nullable();
            $table->text('login_no_account_en')->nullable();
            $table->text('login_register_en')->nullable();

            $table->text('register_name_en')->nullable();
            $table->text('register_title_en')->nullable();
            $table->text('register_description_en')->nullable();
            $table->text('register_agent_en')->nullable();
            $table->text('register_company_en')->nullable();
            $table->text('register_first_name_en')->nullable();
            $table->text('register_first_name_placeholder_en')->nullable();
            $table->text('register_last_name_en')->nullable();
            $table->text('register_last_name_placeholder_en')->nullable();
            $table->text('register_email_en')->nullable();
            $table->text('register_email_placeholder_en')->nullable();
            $table->text('register_country_en')->nullable();
            $table->text('register_country_placeholder_en')->nullable();
            $table->text('register_phone_en')->nullable();
            $table->text('register_phone_placeholder_en')->nullable();
            $table->text('register_city_en')->nullable();
            $table->text('register_city_placeholder_en')->nullable();
            $table->text('register_password_en')->nullable();
            $table->text('register_confirm_password_en')->nullable();
            $table->text('register_button_en')->nullable();
            $table->text('register_have_account_en')->nullable();
            $table->text('register_login_en')->nullable();

            $table->text('forgot_name_en')->nullable();
            $table->text('forgot_title_en')->nullable();
            $table->text('forgot_description_en')->nullable();
            $table->text('forgot_email_en')->nullable();
            $table->text('forgot_email_placeholder_en')->nullable();
            $table->text('forgot_button_en')->nullable();
            $table->text('forgot_remember_en')->nullable();
            $table->text('forgot_login_en')->nullable();

            $table->text('reset_name_en')->nullable();
            $table->text('reset_title_en')->nullable();
            $table->text('reset_description_en')->nullable();
            $table->text('reset_new_password_en')->nullable();
            $table->text('reset_confirm_password_en')->nullable();
            $table->text('reset_button_en')->nullable();


            $table->text('login_name_ar')->nullable();
            $table->text('login_title_ar')->nullable();
            $table->text('login_description_ar')->nullable();
            $table->text('login_image_ar')->nullable();
            $table->text('login_username_ar')->nullable();
            $table->text('login_username_placeholder_ar')->nullable();
            $table->text('login_password_ar')->nullable();
            $table->text('login_remember_ar')->nullable();
            $table->text('login_forgot_password_ar')->nullable();
            $table->text('login_button_ar')->nullable();
            $table->text('login_no_account_ar')->nullable();
            $table->text('login_register_ar')->nullable();

            $table->text('register_name_ar')->nullable();
            $table->text('register_title_ar')->nullable();
            $table->text('register_description_ar')->nullable();
            $table->text('register_agent_ar')->nullable();
            $table->text('register_company_ar')->nullable();
            $table->text('register_first_name_ar')->nullable();
            $table->text('register_first_name_placeholder_ar')->nullable();
            $table->text('register_last_name_ar')->nullable();
            $table->text('register_last_name_placeholder_ar')->nullable();
            $table->text('register_email_ar')->nullable();
            $table->text('register_email_placeholder_ar')->nullable();
            $table->text('register_country_ar')->nullable();
            $table->text('register_country_placeholder_ar')->nullable();
            $table->text('register_phone_ar')->nullable();
            $table->text('register_phone_placeholder_ar')->nullable();
            $table->text('register_city_ar')->nullable();
            $table->text('register_city_placeholder_ar')->nullable();
            $table->text('register_password_ar')->nullable();
            $table->text('register_confirm_password_ar')->nullable();
            $table->text('register_button_ar')->nullable();
            $table->text('register_have_account_ar')->nullable();
            $table->text('register_login_ar')->nullable();

            $table->text('forgot_name_ar')->nullable();
            $table->text('forgot_title_ar')->nullable();
            $table->text('forgot_description_ar')->nullable();
            $table->text('forgot_email_ar')->nullable();
            $table->text('forgot_email_placeholder_ar')->nullable();
            $table->text('forgot_button_ar')->nullable();
            $table->text('forgot_remember_ar')->nullable();
            $table->text('forgot_login_ar')->nullable();

            $table->text('reset_name_ar')->nullable();
            $table->text('reset_title_ar')->nullable();
            $table->text('reset_description_ar')->nullable();
            $table->text('reset_new_password_ar')->nullable();
            $table->text('reset_confirm_password_ar')->nullable();
            $table->text('reset_button_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authentication_contents');
    }
};
