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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client');
            $table->foreign('client')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('event');
            $table->foreign('event')->references('id')->on('events')->onDelete('cascade');

            $table->enum('status', ['Reservée', 'En attente', 'Refusée', 'Acceptée']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
