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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('logo');
            $table->string('footer_logo');
            $table->string('favicon');
            $table->string('guest_image');
            $table->string('no_image');
            $table->string('no_profile_image');

            $table->string('fb_en')->nullable();
            $table->string('instagram_en')->nullable();
            $table->string('fb_ar')->nullable();
            $table->string('instagram_ar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
