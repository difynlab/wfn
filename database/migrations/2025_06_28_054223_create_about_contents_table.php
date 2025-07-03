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
        Schema::create('about_contents', function (Blueprint $table) {
            $table->id();

            $table->text('page_name_en');
            $table->text('page_name_ar');

            // English fields
            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_description_en')->nullable();

            $table->text('section_2_image_en')->nullable();
            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_description_en')->nullable();
            $table->text('section_2_number_1_en')->nullable();
            $table->text('section_2_text_1_en')->nullable();
            $table->text('section_2_number_2_en')->nullable();
            $table->text('section_2_text_2_en')->nullable();
            $table->text('section_2_number_3_en')->nullable();
            $table->text('section_2_text_3_en')->nullable();

            $table->text('section_3_left_title_1_en')->nullable();
            $table->text('section_3_left_description_1_en')->nullable();
            $table->text('section_3_left_title_2_en')->nullable();
            $table->text('section_3_left_description_2_en')->nullable();
            $table->text('section_3_left_title_3_en')->nullable();
            $table->text('section_3_left_description_3_en')->nullable();
            $table->text('section_3_right_title_1_en')->nullable();
            $table->text('section_3_right_description_1_en')->nullable();
            $table->text('section_3_right_title_2_en')->nullable();
            $table->text('section_3_right_description_2_en')->nullable();
            $table->text('section_3_right_title_3_en')->nullable();
            $table->text('section_3_right_description_3_en')->nullable();

            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_description_en')->nullable();
            $table->text('section_4_button_en')->nullable();
            $table->text('section_4_image_1_en')->nullable();
            $table->text('section_4_image_1_title_en')->nullable();
            $table->text('section_4_image_2_en')->nullable();
            $table->text('section_4_image_2_title_en')->nullable();

            $table->text('section_5_video_en')->nullable();
            $table->text('section_5_title_en')->nullable();
            $table->text('section_5_description_en')->nullable();
            $table->text('section_5_point_1_en')->nullable();
            $table->text('section_5_point_1_description_en')->nullable();
            $table->text('section_5_point_2_en')->nullable();
            $table->text('section_5_point_2_description_en')->nullable();
            $table->text('section_5_point_3_en')->nullable();
            $table->text('section_5_point_3_description_en')->nullable();
            $table->text('section_5_point_4_en')->nullable();
            $table->text('section_5_point_4_description_en')->nullable();
            $table->text('section_5_point_5_en')->nullable();
            $table->text('section_5_point_5_description_en')->nullable();

            $table->text('section_6_title_en')->nullable();
            $table->text('section_6_point_1_en')->nullable();
            $table->text('section_6_point_1_description_en')->nullable();
            $table->text('section_6_point_2_en')->nullable();
            $table->text('section_6_point_2_description_en')->nullable();
            $table->text('section_6_point_3_en')->nullable();
            $table->text('section_6_point_3_description_en')->nullable();
            $table->text('section_6_point_4_en')->nullable();
            $table->text('section_6_point_4_description_en')->nullable();
            $table->text('section_6_point_5_en')->nullable();
            $table->text('section_6_point_5_description_en')->nullable();
            $table->text('section_6_point_6_en')->nullable();
            $table->text('section_6_point_6_description_en')->nullable();

            $table->text('section_7_title_en')->nullable();
            $table->text('section_7_description_en')->nullable();
            $table->text('section_7_image_en')->nullable();
            $table->text('section_7_signature_en')->nullable();

            $table->text('section_8_title_en')->nullable();
            $table->text('section_8_description_en')->nullable();
            $table->text('section_8_video_en')->nullable();
            $table->text('section_8_name_en')->nullable();
            $table->text('section_8_name_placeholder_en')->nullable();
            $table->text('section_8_email_en')->nullable();
            $table->text('section_8_email_placeholder_en')->nullable();
            $table->text('section_8_check_label_en')->nullable();
            $table->text('section_8_button_en')->nullable();

            $table->text('section_9_title_en')->nullable();
            $table->text('section_9_description_en')->nullable();

            $table->text('section_10_title_en')->nullable();
            $table->text('section_10_image_en')->nullable();

            $table->text('section_11_title_en')->nullable();
            $table->text('section_11_description_en')->nullable();
            $table->text('section_11_faqs_en')->nullable();

            // Arabic fields
            $table->text('section_1_title_ar')->nullable();
            $table->text('section_1_description_ar')->nullable();

            $table->text('section_2_image_ar')->nullable();
            $table->text('section_2_title_ar')->nullable();
            $table->text('section_2_description_ar')->nullable();
            $table->text('section_2_number_1_ar')->nullable();
            $table->text('section_2_text_1_ar')->nullable();
            $table->text('section_2_number_2_ar')->nullable();
            $table->text('section_2_text_2_ar')->nullable();
            $table->text('section_2_number_3_ar')->nullable();
            $table->text('section_2_text_3_ar')->nullable();

            $table->text('section_3_left_title_1_ar')->nullable();
            $table->text('section_3_left_description_1_ar')->nullable();
            $table->text('section_3_left_title_2_ar')->nullable();
            $table->text('section_3_left_description_2_ar')->nullable();
            $table->text('section_3_left_title_3_ar')->nullable();
            $table->text('section_3_left_description_3_ar')->nullable();
            $table->text('section_3_right_title_1_ar')->nullable();
            $table->text('section_3_right_description_1_ar')->nullable();
            $table->text('section_3_right_title_2_ar')->nullable();
            $table->text('section_3_right_description_2_ar')->nullable();
            $table->text('section_3_right_title_3_ar')->nullable();
            $table->text('section_3_right_description_3_ar')->nullable();

            $table->text('section_4_title_ar')->nullable();
            $table->text('section_4_description_ar')->nullable();
            $table->text('section_4_button_ar')->nullable();
            $table->text('section_4_image_1_ar')->nullable();
            $table->text('section_4_image_1_title_ar')->nullable();
            $table->text('section_4_image_2_ar')->nullable();
            $table->text('section_4_image_2_title_ar')->nullable();

            $table->text('section_5_video_ar')->nullable();
            $table->text('section_5_title_ar')->nullable();
            $table->text('section_5_description_ar')->nullable();
            $table->text('section_5_point_1_ar')->nullable();
            $table->text('section_5_point_1_description_ar')->nullable();
            $table->text('section_5_point_2_ar')->nullable();
            $table->text('section_5_point_2_description_ar')->nullable();
            $table->text('section_5_point_3_ar')->nullable();
            $table->text('section_5_point_3_description_ar')->nullable();
            $table->text('section_5_point_4_ar')->nullable();
            $table->text('section_5_point_4_description_ar')->nullable();
            $table->text('section_5_point_5_ar')->nullable();
            $table->text('section_5_point_5_description_ar')->nullable();

            $table->text('section_6_title_ar')->nullable();
            $table->text('section_6_point_1_ar')->nullable();
            $table->text('section_6_point_1_description_ar')->nullable();
            $table->text('section_6_point_2_ar')->nullable();
            $table->text('section_6_point_2_description_ar')->nullable();
            $table->text('section_6_point_3_ar')->nullable();
            $table->text('section_6_point_3_description_ar')->nullable();
            $table->text('section_6_point_4_ar')->nullable();
            $table->text('section_6_point_4_description_ar')->nullable();
            $table->text('section_6_point_5_ar')->nullable();
            $table->text('section_6_point_5_description_ar')->nullable();
            $table->text('section_6_point_6_ar')->nullable();
            $table->text('section_6_point_6_description_ar')->nullable();

            $table->text('section_7_title_ar')->nullable();
            $table->text('section_7_description_ar')->nullable();
            $table->text('section_7_image_ar')->nullable();
            $table->text('section_7_signature_ar')->nullable();

            $table->text('section_8_title_ar')->nullable();
            $table->text('section_8_description_ar')->nullable();
            $table->text('section_8_video_ar')->nullable();
            $table->text('section_8_name_ar')->nullable();
            $table->text('section_8_name_placeholder_ar')->nullable();
            $table->text('section_8_email_ar')->nullable();
            $table->text('section_8_email_placeholder_ar')->nullable();
            $table->text('section_8_check_label_ar')->nullable();
            $table->text('section_8_button_ar')->nullable();

            $table->text('section_9_title_ar')->nullable();
            $table->text('section_9_description_ar')->nullable();

            $table->text('section_10_title_ar')->nullable();
            $table->text('section_10_image_ar')->nullable();

            $table->text('section_11_title_ar')->nullable();
            $table->text('section_11_description_ar')->nullable();
            $table->text('section_11_faqs_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_contents');
    }
};
