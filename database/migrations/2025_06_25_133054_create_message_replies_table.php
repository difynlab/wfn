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
        Schema::create('message_replies', function (Blueprint $table) {
            $table->id();

            $table->string('replier');
            $table->text('message');
            $table->date('date');
            $table->time('time');
            $table->boolean('admin_view')->default(0);
            $table->boolean('user_view')->default(0);
            $table->boolean('status')->default(1);

            $table->foreignId('message_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_replies');
    }
};
