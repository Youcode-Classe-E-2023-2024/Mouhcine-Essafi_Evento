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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->date('date');
            $table->time('time');
            $table->decimal('price');
            $table->integer('nbr_place');
            $table->text('description');
            $table->enum('reservation_type', ['automatic', 'manuel']);
            $table->string('image');
            $table->unsignedBigInteger('creator');
            $table->unsignedBigInteger('category');

            $table->foreign('creator')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');

            $table->enum('status', ['En attente', 'Public', 'Decline'])->default('En attente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
