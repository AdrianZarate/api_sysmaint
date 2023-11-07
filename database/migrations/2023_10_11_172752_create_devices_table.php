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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->notNullable();
            $table->string('brand'); //marca
            $table->string('model');
            $table->string('serial_number');
            $table->date('purchase_date'); //fecha de compra
            $table->string('location');
            $table->text('physical_state'); // estado fisico
            $table->text('status_description');
            $table->text('technical_specifications');
            $table->date('installation_date');
            $table->string('garantia');
            $table->string('accessories');
            $table->float('current_value');
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
