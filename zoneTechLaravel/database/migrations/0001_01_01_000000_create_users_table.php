<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabla de Usuarios (Adaptada a tu estructura de ZoneTech)
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Esto ya es BIGINT, UNSIGNED y AUTO_INCREMENT por defecto
            $table->string('dni', 9)->unique();
            $table->string('nombre', 100);
            $table->string('apellido1', 150);
            $table->string('apellido2', 100)->nullable();
            $table->string('pais', 100);
            $table->string('ciudad', 50);
            $table->string('poblacion', 110);
            $table->mediumInteger('codigoPostal');
            $table->string('direccion', 250);
            $table->string('email', 255)->unique(); // En Laravel no hace falta notNullValue, es por defecto
            $table->string('telefono', 20)->nullable();
            $table->string('contraseña_hash', 300);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('rol', 50)->default('cliente');
            // Si no quieres timestamps (created_at), puedes borrar la línea de abajo
            // Pero para backend es muy útil saber cuándo se registró un usuario.
            $table->timestamps();
        });

        // 2. Tabla para recuperar contraseñas
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 3. Tabla de Sesiones (La que te daba el error antes)
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
