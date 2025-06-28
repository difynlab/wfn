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
        Schema::create('article_contents', function (Blueprint $table) {
            $table->id();

            $table->text('page_name_en');
            $table->text('page_name_ar');

            $table->text('title_en')->nullable();
            $table->text('description_en')->nullable();
            $table->text('recent_en')->nullable();
            $table->text('read_more_en')->nullable();
            $table->text('written_by_en')->nullable();
            $table->text('related_articles_en')->nullable();

            $table->text('title_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('recent_ar')->nullable();
            $table->text('read_more_ar')->nullable();
            $table->text('written_by_ar')->nullable();
            $table->text('related_articles_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_contents');
    }
};
