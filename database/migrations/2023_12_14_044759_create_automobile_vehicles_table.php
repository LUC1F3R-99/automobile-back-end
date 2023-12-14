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
        Schema::create('automobile_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicleNumber');
            $table->string('customerId');
            $table->string('make');
            $table->string('model');
            $table->string('isActive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automobile_vehicles');
    }
};
