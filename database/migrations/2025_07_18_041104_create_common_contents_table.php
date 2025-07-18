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
        Schema::create('common_contents', function (Blueprint $table) {
            $table->id();

            // English fields
            $table->text('header_dashboard_en')->nullable();
            $table->text('header_logout_en')->nullable();
            $table->text('footer_title_en')->nullable();
            $table->text('footer_sub_title_en')->nullable();
            $table->text('footer_button_en')->nullable();
            $table->text('footer_first_menu_en')->nullable();
            $table->text('footer_second_menu_en')->nullable();
            $table->text('footer_third_menu_en')->nullable();
            $table->text('footer_fourth_menu_en')->nullable();
            $table->text('footer_facebook_en')->nullable();
            $table->text('footer_instagram_en')->nullable();
            $table->text('footer_copyright_en')->nullable();

            // Arabic fields
            $table->text('header_dashboard_ar')->nullable();
            $table->text('header_logout_ar')->nullable();
            $table->text('footer_title_ar')->nullable();
            $table->text('footer_sub_title_ar')->nullable();
            $table->text('footer_button_ar')->nullable();
            $table->text('footer_first_menu_ar')->nullable();
            $table->text('footer_second_menu_ar')->nullable();
            $table->text('footer_third_menu_ar')->nullable();
            $table->text('footer_fourth_menu_ar')->nullable();
            $table->text('footer_facebook_ar')->nullable();
            $table->text('footer_instagram_ar')->nullable();
            $table->text('footer_copyright_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_contents');
    }
};
