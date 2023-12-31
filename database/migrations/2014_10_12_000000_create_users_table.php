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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // id() es de tipo integer, unsigned e increment
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');

            //*relacion con la tabla roles de uno a muchos
            $table->unsignedInteger('rol_id'); // para que solo se le pueda asigna un rol al usuario

            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken(); //! Esto es para el token
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
