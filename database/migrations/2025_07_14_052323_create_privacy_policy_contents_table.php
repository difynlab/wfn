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
        Schema::create('privacy_policy_contents', function (Blueprint $table) {
            $table->id();

            $table->text('page_name_en');
            $table->text('page_name_ar');

            // English fields
            $table->text('title_en')->nullable();
            $table->text('description_en')->nullable();
            $table->text('content_en')->nullable();

            // Arabic fields
            $table->text('title_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('content_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_policy_contents');
    }
};
