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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('report_date');
            $table->string('service_type');
            $table->text('service_description');
            $table->string('equipment_status');
            $table->string('replaced_parts');
            $table->float('service_cost');
            $table->string('service_time'); // tiempo de servicio
            $table->text('remarks');
            $table->string('imagen')->nullable();

            //*Relacion uno a muchos-------
            $table->unsignedBigInteger('technician_id')->nullable();
            $table->unsignedBigInteger('client_device_id')->nullable();

            $table->foreign('technician_id')->references('user_id')->on('technicians')->onDelete('set null');
            $table->foreign('client_device_id')->references('id')->on('client_devices')->onDelete('set null');

            //*----------------------------
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
