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
        Schema::create('drone-plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drone_id')->unsigned();
            $table->foreign('drone_id')->references('id')->on('drones')->onDelete('cascade');
            $table->unsignedBigInteger('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
<<<<<<< HEAD:Agricultural_Drone_API/database/migrations/2023_05_23_082813_create_drone-plans_table.php
=======

>>>>>>> 7adf5ffc64a859c54691a21a772300843f868880:Agricultural_Drone_API/database/migrations/2023_05_23_120233_create_drone_plans_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drone-plans');
    }
};
