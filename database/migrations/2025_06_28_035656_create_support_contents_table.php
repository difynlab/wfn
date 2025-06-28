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
        Schema::create('support_contents', function (Blueprint $table) {
            $table->id();

            $table->text('page_name_en');
            $table->text('page_name_ar');

            $table->text('title_en')->nullable();
            $table->text('description_en')->nullable();
            $table->text('name_en')->nullable();
            $table->text('name_placeholder_en')->nullable();
            $table->text('phone_en')->nullable();
            $table->text('phone_placeholder_en')->nullable();
            $table->text('email_en')->nullable();
            $table->text('email_placeholder_en')->nullable();
            $table->text('category_en')->nullable();
            $table->text('category_placeholder_en')->nullable();
            $table->text('category_1_en')->nullable();
            $table->text('category_2_en')->nullable();
            $table->text('category_3_en')->nullable();
            $table->text('subject_en')->nullable();
            $table->text('subject_placeholder_en')->nullable();
            $table->text('message_en')->nullable();
            $table->text('message_placeholder_en')->nullable();
            $table->text('button_en')->nullable();

            $table->text('title_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('name_ar')->nullable();
            $table->text('name_placeholder_ar')->nullable();
            $table->text('phone_ar')->nullable();
            $table->text('phone_placeholder_ar')->nullable();
            $table->text('email_ar')->nullable();
            $table->text('email_placeholder_ar')->nullable();
            $table->text('category_ar')->nullable();
            $table->text('category_placeholder_ar')->nullable();
            $table->text('category_1_ar')->nullable();
            $table->text('category_2_ar')->nullable();
            $table->text('category_3_ar')->nullable();
            $table->text('subject_ar')->nullable();
            $table->text('subject_placeholder_ar')->nullable();
            $table->text('message_ar')->nullable();
            $table->text('message_placeholder_ar')->nullable();
            $table->text('button_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_contents');
    }
};
