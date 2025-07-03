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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address_name');
            $table->string('address_en');
            $table->string('city_en');
            $table->string('address_ar');
            $table->string('city_ar');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('total_area');
            $table->integer('total_pallets');
            $table->integer('available_pallets');
            $table->string('pallet_dimension');
            $table->enum('temperature_type', ['dry', 'ambient', 'cold', 'freezer']);
            $table->string('temperature_range');
            $table->enum('wms', ['yes', 'no']);
            $table->enum('equipment_handling', ['yes', 'no']);
            $table->enum('temperature_sensor', ['yes', 'no']);
            $table->enum('humidity_sensor', ['yes', 'no']);
            $table->string('thumbnail')->nullable();
            $table->text('images')->nullable();
            $table->text('videos')->nullable();
            $table->text('licenses')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('status')->default(1);

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('storage_type_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
