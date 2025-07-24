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
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();

            $table->text('page_name_en');
            $table->text('page_name_ar');

            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_description_en')->nullable();
            $table->text('section_1_image_en')->nullable();
            $table->text('section_1_label_1_en')->nullable();
            $table->text('section_1_placeholder_1_en')->nullable();
            $table->text('section_1_label_2_en')->nullable();
            $table->text('section_1_placeholder_2_en')->nullable();
            $table->text('section_1_label_3_en')->nullable();
            $table->text('section_1_placeholder_3_en')->nullable();
            $table->text('section_1_label_4_en')->nullable();
            $table->text('section_1_placeholder_4_en')->nullable();
            $table->text('section_1_button_en')->nullable();
            $table->text('section_1_size_en')->nullable();
            $table->text('section_1_size_1_en')->nullable();
            $table->text('section_1_size_2_en')->nullable();
            $table->text('section_1_size_3_en')->nullable();
            $table->text('section_1_size_4_en')->nullable();
            $table->text('section_1_type_en')->nullable();
            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_description_en')->nullable();
            $table->text('section_2_city_1_en')->nullable();
            $table->text('section_2_city_2_en')->nullable();
            $table->text('section_2_city_3_en')->nullable();
            $table->text('section_2_city_4_en')->nullable();
            $table->text('section_2_listed_en')->nullable();
            $table->text('section_2_day_ago_en')->nullable();
            $table->text('section_2_share_en')->nullable();
            // $table->text('section_2_report_en')->nullable();
            $table->text('section_3_title_en')->nullable();
            $table->text('section_3_description_en')->nullable();
            $table->text('section_3_checkout_en')->nullable();
            $table->text('section_3_page_1_title_en')->nullable();
            $table->text('section_3_page_1_description_en')->nullable();
            $table->text('section_3_page_1_content_en')->nullable();
            $table->text('section_3_page_1_thumbnail_en')->nullable();
            $table->text('section_3_page_2_title_en')->nullable();
            $table->text('section_3_page_2_description_en')->nullable();
            $table->text('section_3_page_2_content_en')->nullable();
            $table->text('section_3_page_2_thumbnail_en')->nullable();
            $table->text('section_3_page_3_title_en')->nullable();
            $table->text('section_3_page_3_description_en')->nullable();
            $table->text('section_3_page_3_content_en')->nullable();
            $table->text('section_3_page_3_thumbnail_en')->nullable();
            $table->text('section_3_page_4_title_en')->nullable();
            $table->text('section_3_page_4_description_en')->nullable();
            $table->text('section_3_page_4_content_en')->nullable();
            $table->text('section_3_page_4_thumbnail_en')->nullable();
            $table->text('section_3_advertisement_title_en')->nullable();
            $table->text('section_3_advertisement_sub_title_en')->nullable();
            $table->text('section_3_advertisement_button_en')->nullable();
            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_description_en')->nullable();
            $table->text('section_4_placeholder_en')->nullable();
            $table->text('section_4_button_en')->nullable();
            $table->text('section_4_image_en')->nullable();
            $table->text('section_5_title_en')->nullable();
            $table->text('section_5_description_en')->nullable();
            $table->text('section_5_button_en')->nullable();
            $table->text('section_5_read_more_en')->nullable();
            $table->text('section_6_title_en')->nullable();
            $table->text('section_6_sub_title_en')->nullable();
            $table->text('section_6_button_en')->nullable();

            $table->text('section_1_title_ar')->nullable();
            $table->text('section_1_description_ar')->nullable();
            $table->text('section_1_image_ar')->nullable();
            $table->text('section_1_label_1_ar')->nullable();
            $table->text('section_1_placeholder_1_ar')->nullable();
            $table->text('section_1_label_2_ar')->nullable();
            $table->text('section_1_placeholder_2_ar')->nullable();
            $table->text('section_1_label_3_ar')->nullable();
            $table->text('section_1_placeholder_3_ar')->nullable();
            $table->text('section_1_label_4_ar')->nullable();
            $table->text('section_1_placeholder_4_ar')->nullable();
            $table->text('section_1_button_ar')->nullable();
            $table->text('section_1_size_ar')->nullable();
            $table->text('section_1_size_1_ar')->nullable();
            $table->text('section_1_size_2_ar')->nullable();
            $table->text('section_1_size_3_ar')->nullable();
            $table->text('section_1_size_4_ar')->nullable();
            $table->text('section_1_type_ar')->nullable();
            $table->text('section_2_title_ar')->nullable();
            $table->text('section_2_description_ar')->nullable();
            $table->text('section_2_city_1_ar')->nullable();
            $table->text('section_2_city_2_ar')->nullable();
            $table->text('section_2_city_3_ar')->nullable();
            $table->text('section_2_city_4_ar')->nullable();
            $table->text('section_2_listed_ar')->nullable();
            $table->text('section_2_day_ago_ar')->nullable();
            $table->text('section_2_share_ar')->nullable();
            // $table->text('section_2_report_ar')->nullable();
            $table->text('section_3_title_ar')->nullable();
            $table->text('section_3_description_ar')->nullable();
            $table->text('section_3_checkout_ar')->nullable();
            $table->text('section_3_page_1_title_ar')->nullable();
            $table->text('section_3_page_1_description_ar')->nullable();
            $table->text('section_3_page_1_content_ar')->nullable();
            $table->text('section_3_page_1_thumbnail_ar')->nullable();
            $table->text('section_3_page_2_title_ar')->nullable();
            $table->text('section_3_page_2_description_ar')->nullable();
            $table->text('section_3_page_2_content_ar')->nullable();
            $table->text('section_3_page_2_thumbnail_ar')->nullable();
            $table->text('section_3_page_3_title_ar')->nullable();
            $table->text('section_3_page_3_description_ar')->nullable();
            $table->text('section_3_page_3_content_ar')->nullable();
            $table->text('section_3_page_3_thumbnail_ar')->nullable();
            $table->text('section_3_advertisement_title_ar')->nullable();
            $table->text('section_3_advertisement_sub_title_ar')->nullable();
            $table->text('section_3_advertisement_button_ar')->nullable();
            $table->text('section_3_page_4_title_ar')->nullable();
            $table->text('section_3_page_4_description_ar')->nullable();
            $table->text('section_3_page_4_content_ar')->nullable();
            $table->text('section_3_page_4_thumbnail_ar')->nullable();
            $table->text('section_4_title_ar')->nullable();
            $table->text('section_4_description_ar')->nullable();
            $table->text('section_4_placeholder_ar')->nullable();
            $table->text('section_4_button_ar')->nullable();
            $table->text('section_4_image_ar')->nullable();
            $table->text('section_5_title_ar')->nullable();
            $table->text('section_5_description_ar')->nullable();
            $table->text('section_5_button_ar')->nullable();
            $table->text('section_5_read_more_ar')->nullable();
            $table->text('section_6_title_ar')->nullable();
            $table->text('section_6_sub_title_ar')->nullable();
            $table->text('section_6_button_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};
