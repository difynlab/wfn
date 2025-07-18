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
        Schema::create('warehouse_contents', function (Blueprint $table) {
            $table->id();

            $table->text('page_name_en');
            $table->text('page_name_ar');

            // English fields
            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_description_en')->nullable();

            $table->text('section_2_title_en')->nullable();
            $table->text('section_2_warehouses_en')->nullable();
            $table->text('section_2_map_view_en')->nullable();
            $table->text('section_2_search_en')->nullable();
            $table->text('section_2_size_en')->nullable();
            $table->text('section_2_type_en')->nullable();
            $table->text('section_2_price_en')->nullable();
            $table->text('section_2_button_en')->nullable();

            $table->text('section_3_new_en')->nullable();
            $table->text('section_3_unlock_en')->nullable();
            $table->text('section_3_listed_en')->nullable();
            $table->text('section_3_day_ago_en')->nullable();
            $table->text('section_3_like_en')->nullable();
            $table->text('section_3_share_en')->nullable();
            $table->text('section_3_report_en')->nullable();
            $table->text('section_3_popular_en')->nullable();
            $table->text('section_3_nearby_en')->nullable();

            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_unlock_en')->nullable();

            // Arabic fields
            $table->text('section_1_title_ar')->nullable();
            $table->text('section_1_description_ar')->nullable();

            $table->text('section_2_title_ar')->nullable();
            $table->text('section_2_warehouses_ar')->nullable();
            $table->text('section_2_map_view_ar')->nullable();
            $table->text('section_2_search_ar')->nullable();
            $table->text('section_2_size_ar')->nullable();
            $table->text('section_2_type_ar')->nullable();
            $table->text('section_2_price_ar')->nullable();
            $table->text('section_2_button_ar')->nullable();

            $table->text('section_3_new_ar')->nullable();
            $table->text('section_3_unlock_ar')->nullable();
            $table->text('section_3_listed_ar')->nullable();
            $table->text('section_3_day_ago_ar')->nullable();
            $table->text('section_3_like_ar')->nullable();
            $table->text('section_3_share_ar')->nullable();
            $table->text('section_3_report_ar')->nullable();
            $table->text('section_3_popular_ar')->nullable();
            $table->text('section_3_nearby_ar')->nullable();

            $table->text('section_4_title_ar')->nullable();
            $table->text('section_4_unlock_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_contents');
    }
};
