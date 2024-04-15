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
        Schema::create('sensorids', function (Blueprint $table) {
            $table->id();
            $table->String("sensorid", 15);
            $table->String("cameraNaam");
            $table->String("cameraBeeld")->default("./");
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('senorids', function (Blueprint $table){
            $table->id();
            $table->String('senor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensorids');
    }
};
