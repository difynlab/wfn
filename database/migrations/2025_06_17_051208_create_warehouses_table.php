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

            // English fields
            $table->string('name_en');
            $table->string('address_en');
            $table->string('city_en');
            $table->text('description_en')->nullable();
            $table->text('features_en')->nullable();
            $table->text('amenities_en')->nullable();
            $table->text('details_en')->nullable();

            // Arabic fields
            $table->string('name_ar')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('city_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('features_ar')->nullable();
            $table->text('amenities_ar')->nullable();
            $table->text('details_ar')->nullable();

            $table->string('address_name');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('total_area');
            $table->integer('total_pallets');
            $table->integer('available_pallets');
            $table->decimal('rent_per_pallet', 10, 2);
            $table->string('pallet_dimension');
            $table->string('pallet_dimension_other_value')->nullable();
            $table->enum('temperature_type', ['dry', 'ambient', 'cold', 'freezer']);
            $table->string('temperature_range');
            $table->enum('wms', ['yes', 'no']);
            $table->enum('equipment_handling', ['yes', 'no']);
            $table->enum('temperature_sensor', ['yes', 'no']);
            $table->enum('humidity_sensor', ['yes', 'no']);
            $table->string('thumbnail')->nullable();
            $table->string('outside_image')->nullable();
            $table->string('loading_image')->nullable();
            $table->string('off_loading_image')->nullable();
            $table->string('handling_equipment_image')->nullable();
            $table->string('storage_area_image')->nullable();
            $table->text('videos')->nullable();
            $table->text('licenses')->nullable();
            $table->boolean('is_new')->default(1);
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
