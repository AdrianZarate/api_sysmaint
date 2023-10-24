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
        Schema::create('client_devices', function (Blueprint $table) {
            $table->id();
        
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('device_id');
        
            $table->foreign('client_id')->references('user_id')->on('clients')->onDelete('cascade');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_devices');
    }
};
