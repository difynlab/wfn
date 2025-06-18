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

            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_description_en')->nullable();
            $table->text('section_1_image_en')->nullable();
            $table->text('section_1_label_1_en')->nullable();
            $table->text('section_1_placeholder_1_en')->nullable();
            $table->text('section_1_label_2_en')->nullable();
            $table->text('section_1_placeholder_2_en')->nullable();
            $table->text('section_1_label_3_en')->nullable();
            $table->text('section_1_placeholder_3_en')->nullable();
            $table->text('section_1_button_en')->nullable();


            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_description_en')->nullable();
            $table->text('section_2_tab_1_en')->nullable();
            $table->text('section_2_tab_2_en')->nullable();
            $table->text('section_2_tab_3_en')->nullable();
            $table->text('section_2_tab_4_en')->nullable();


            $table->text('section_2_points_en')->nullable();
            $table->string('section_2_video_en')->nullable();
            $table->text('section_3_title_en')->nullable();
            $table->text('section_3_description_en')->nullable();
            $table->text('section_3_label_en')->nullable();
            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_description_en')->nullable();
            $table->string('section_4_video_en')->nullable();
            $table->text('section_5_title_en')->nullable();
            $table->text('section_5_description_en')->nullable();
            $table->text('section_5_images_en')->nullable();
            $table->text('section_6_title_en')->nullable();
            $table->text('section_6_description_en')->nullable();
            $table->text('section_6_label_en')->nullable();
            $table->text('section_6_label_link_en')->nullable();
            $table->text('section_7_title_en')->nullable();
            $table->text('section_7_description_en')->nullable();
            $table->text('section_7_label_link_en')->nullable();
            $table->text('section_8_title_en')->nullable();
            $table->text('section_8_description_en')->nullable();
            $table->text('section_8_sub_description_en')->nullable();
            $table->text('section_8_labels_links_en')->nullable();
            $table->text('section_9_title_en')->nullable();
            $table->text('section_9_description_en')->nullable();
            $table->text('section_9_button_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_description_zh')->nullable();
            $table->string('section_1_image_zh')->nullable();
            $table->text('section_1_label_zh')->nullable();
            $table->text('section_1_label_link_zh')->nullable();
            $table->text('section_2_title_zh')->nullable();
            $table->text('section_2_points_zh')->nullable();
            $table->string('section_2_video_zh')->nullable();
            $table->text('section_3_title_zh')->nullable();
            $table->text('section_3_description_zh')->nullable();
            $table->text('section_3_label_zh')->nullable();
            $table->text('section_4_title_zh')->nullable();
            $table->text('section_4_description_zh')->nullable();
            $table->string('section_4_video_zh')->nullable();
            $table->text('section_5_title_zh')->nullable();
            $table->text('section_5_description_zh')->nullable();
            $table->text('section_5_images_zh')->nullable();
            $table->text('section_6_title_zh')->nullable();
            $table->text('section_6_description_zh')->nullable();
            $table->text('section_6_label_zh')->nullable();
            $table->text('section_6_label_link_zh')->nullable();
            $table->text('section_7_title_zh')->nullable();
            $table->text('section_7_description_zh')->nullable();
            $table->text('section_7_label_link_zh')->nullable();
            $table->text('section_8_title_zh')->nullable();
            $table->text('section_8_description_zh')->nullable();
            $table->text('section_8_sub_description_zh')->nullable();
            $table->text('section_8_labels_links_zh')->nullable();
            $table->text('section_9_title_zh')->nullable();
            $table->text('section_9_description_zh')->nullable();
            $table->text('section_9_button_zh')->nullable();

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
