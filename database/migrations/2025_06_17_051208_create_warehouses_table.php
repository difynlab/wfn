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
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('contact_person_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone');
            $table->integer('pallets');
            $table->string('thumbnail');
            $table->text('images')->nullable();
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
