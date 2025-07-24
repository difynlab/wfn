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
            $table->text('section_2_size_1_en')->nullable();
            $table->text('section_2_size_2_en')->nullable();
            $table->text('section_2_size_3_en')->nullable();
            $table->text('section_2_size_4_en')->nullable();
            $table->text('section_2_type_en')->nullable();
            $table->text('section_2_price_en')->nullable();
            $table->text('section_2_button_en')->nullable();

            $table->text('section_3_new_en')->nullable();
            $table->text('section_3_unlock_en')->nullable();
            $table->text('section_3_listed_en')->nullable();
            $table->text('section_3_day_ago_en')->nullable();
            $table->text('section_3_like_en')->nullable();
            $table->text('section_3_share_en')->nullable();
            // $table->text('section_3_report_en')->nullable();
            $table->text('section_3_popular_en')->nullable();
            $table->text('section_3_top_rated_en')->nullable();

            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_unlock_en')->nullable();

            $table->text('inner_page_section_2_description_en')->nullable();
            $table->text('inner_page_section_2_talk_to_expert_en')->nullable();
            $table->text('inner_page_section_2_rating_en')->nullable();
            $table->text('inner_page_section_2_reviews_en')->nullable();
            $table->text('inner_page_section_2_total_cost_en')->nullable();
            $table->text('inner_page_section_2_unlock_en')->nullable();
            $table->text('inner_page_section_2_tenure_start_en')->nullable();
            $table->text('inner_page_section_2_tenure_end_en')->nullable();
            $table->text('inner_page_section_2_add_date_en')->nullable();
            $table->text('inner_page_section_2_button_en')->nullable();
            $table->text('inner_page_section_2_note_en')->nullable();
            $table->text('inner_page_section_2_report_listing_en')->nullable();
            $table->text('inner_page_section_3_title_en')->nullable();
            $table->text('inner_page_section_5_title_en')->nullable();
            $table->text('inner_page_section_6_title_en')->nullable();
            $table->text('inner_page_section_7_title_en')->nullable();
            $table->text('inner_page_section_7_unlock_en')->nullable();

            $table->text('inner_page_modal_title_en')->nullable();
            $table->text('inner_page_modal_description_en')->nullable();
            $table->text('inner_page_modal_reviews_en')->nullable();
            $table->text('inner_page_modal_details_en')->nullable();
            $table->text('inner_page_modal_tenure_start_date_en')->nullable();
            $table->text('inner_page_modal_tenure_end_date_en')->nullable();
            $table->text('inner_page_modal_no_of_pallets_en')->nullable();
            $table->text('inner_page_modal_button_en')->nullable();

            $table->text('inner_page_expert_modal_title_en')->nullable();
            $table->text('inner_page_expert_modal_description_en')->nullable();
            $table->text('inner_page_expert_modal_subject_en')->nullable();
            $table->text('inner_page_expert_modal_subject_placeholder_en')->nullable();
            $table->text('inner_page_expert_modal_message_en')->nullable();
            $table->text('inner_page_expert_modal_message_placeholder_en')->nullable();
            $table->text('inner_page_expert_modal_button_en')->nullable();

            $table->text('inner_page_report_modal_title_en')->nullable();
            $table->text('inner_page_report_modal_description_en')->nullable();
            $table->text('inner_page_report_modal_reason_en')->nullable();
            $table->text('inner_page_report_modal_reason_placeholder_en')->nullable();
            $table->text('inner_page_report_modal_button_en')->nullable();

            // Arabic fields
            $table->text('section_1_title_ar')->nullable();
            $table->text('section_1_description_ar')->nullable();

            $table->text('section_2_title_ar')->nullable();
            $table->text('section_2_warehouses_ar')->nullable();
            $table->text('section_2_map_view_ar')->nullable();
            $table->text('section_2_search_ar')->nullable();
            $table->text('section_2_size_ar')->nullable();
            $table->text('section_2_size_1_ar')->nullable();
            $table->text('section_2_size_2_ar')->nullable();
            $table->text('section_2_size_3_ar')->nullable();
            $table->text('section_2_size_4_ar')->nullable();
            $table->text('section_2_type_ar')->nullable();
            $table->text('section_2_price_ar')->nullable();
            $table->text('section_2_button_ar')->nullable();

            $table->text('section_3_new_ar')->nullable();
            $table->text('section_3_unlock_ar')->nullable();
            $table->text('section_3_listed_ar')->nullable();
            $table->text('section_3_day_ago_ar')->nullable();
            $table->text('section_3_like_ar')->nullable();
            $table->text('section_3_share_ar')->nullable();
            // $table->text('section_3_report_ar')->nullable();
            $table->text('section_3_popular_ar')->nullable();
            $table->text('section_3_top_rated_ar')->nullable();

            $table->text('section_4_title_ar')->nullable();
            $table->text('section_4_unlock_ar')->nullable();

            $table->text('inner_page_section_2_description_ar')->nullable();
            $table->text('inner_page_section_2_talk_to_expert_ar')->nullable();
            $table->text('inner_page_section_2_rating_ar')->nullable();
            $table->text('inner_page_section_2_reviews_ar')->nullable();
            $table->text('inner_page_section_2_total_cost_ar')->nullable();
            $table->text('inner_page_section_2_unlock_ar')->nullable();
            $table->text('inner_page_section_2_tenure_start_ar')->nullable();
            $table->text('inner_page_section_2_tenure_end_ar')->nullable();
            $table->text('inner_page_section_2_add_date_ar')->nullable();
            $table->text('inner_page_section_2_button_ar')->nullable();
            $table->text('inner_page_section_2_note_ar')->nullable();
            $table->text('inner_page_section_2_report_listing_ar')->nullable();
            $table->text('inner_page_section_3_title_ar')->nullable();
            $table->text('inner_page_section_5_title_ar')->nullable();
            $table->text('inner_page_section_6_title_ar')->nullable();
            $table->text('inner_page_section_7_title_ar')->nullable();
            $table->text('inner_page_section_7_unlock_ar')->nullable();

            $table->text('inner_page_modal_title_ar')->nullable();
            $table->text('inner_page_modal_description_ar')->nullable();
            $table->text('inner_page_modal_reviews_ar')->nullable();
            $table->text('inner_page_modal_details_ar')->nullable();
            $table->text('inner_page_modal_tenure_start_date_ar')->nullable();
            $table->text('inner_page_modal_tenure_end_date_ar')->nullable();
            $table->text('inner_page_modal_no_of_pallets_ar')->nullable();
            $table->text('inner_page_modal_button_ar')->nullable();

            $table->text('inner_page_expert_modal_title_ar')->nullable();
            $table->text('inner_page_expert_modal_description_ar')->nullable();
            $table->text('inner_page_expert_modal_subject_ar')->nullable();
            $table->text('inner_page_expert_modal_subject_placeholder_ar')->nullable();
            $table->text('inner_page_expert_modal_message_ar')->nullable();
            $table->text('inner_page_expert_modal_message_placeholder_ar')->nullable();
            $table->text('inner_page_expert_modal_button_ar')->nullable();

            $table->text('inner_page_report_modal_title_ar')->nullable();
            $table->text('inner_page_report_modal_description_ar')->nullable();
            $table->text('inner_page_report_modal_reason_ar')->nullable();
            $table->text('inner_page_report_modal_reason_placeholder_ar')->nullable();
            $table->text('inner_page_report_modal_button_ar')->nullable();

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
