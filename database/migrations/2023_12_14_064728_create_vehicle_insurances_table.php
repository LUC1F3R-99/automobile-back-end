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
        Schema::create('vehicle_insurances', function (Blueprint $table) {
            $table->id();
            $table->string('vehicleNumber')->nullable();
            $table->string('insuranceId')->nullable();
            $table->string('company')->nullable();
            $table->string('accidentYear')->nullable();
            $table->string('isActive')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_insurances');
    }
};
