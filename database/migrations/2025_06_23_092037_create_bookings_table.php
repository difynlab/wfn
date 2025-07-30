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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->integer('no_of_pallets');
            $table->decimal('total_rent', 10, 2)->nullable();
            $table->date('tenancy_date');
            $table->date('renewal_date');
            $table->text('documents')->nullable();
            $table->boolean('is_admin_new')->default(1);
            $table->boolean('is_landlord_new')->default(1);
            $table->boolean('status')->default(1);

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
