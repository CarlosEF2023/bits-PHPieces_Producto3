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
        Schema::create('transfer_administrador', function (Blueprint $table) {
            $table->id('id_usuario')->unique();
            $table->string('Username',100)->unique();
            $table->string('Password',100);
            $table->string('Nombre',255);
            $table->string('email',100)->unique();
            $table->string('Apellido1',255);
            $table->string('Apellido2',255);
            $table->integer('Id_tipo_usuario');
            $table->rememberToken();
        });

        Schema::create('transfer_hotel', function (Blueprint $table) {
            $table->id('id_hotel')->unique();
            $table->string('NombreHotel',255)->unique();
            $table->string('Caracteristicas',255);
            $table->integer('id_zona');
            $table->integer('Comision');
            $table->string('usuario',255);
            $table->string('password',100);
            $table->integer('Id_tipo_usuario');
            $table->string('email',100);
            $table->rememberToken();
        });

        Schema::create('transfer_precios', function (Blueprint $table) {
            $table->id('id_precios')->unique();
            $table->integer('id_vehiculo');
            $table->integer('id_hotel');
            $table->integer('Precio');
            $table->rememberToken();
        });

        Schema::create('transfer_reservas', function (Blueprint $table) {
            $table->id('id_reserva')->unique();
            $table->string('localizador',100)->unique();
            $table->integer('id_hotel');
            $table->integer('id_tipo_reserva');
            $table->string('email_cliente',100);
            $table->dateTime('fecha_reserva')->nullable();
            $table->dateTime('fecha_modificacion')->nullable();
            $table->integer('id_destino');
            $table->date('fecha_entrada')->nullable();
            $table->time('hora_entrada')->nullable();
            $table->string('numero_vuelo_entrada',50)->nullable();
            $table->string('origen_vuelo_entrada',50)->nullable();
            $table->time('hora_vuelo_salida')->nullable();
            $table->time('hora_recogida_hotel')->nullable();
            $table->date('fecha_vuelo_salida')->nullable();
            $table->integer('num_viajeros');
            $table->integer('id_vehiculo');
            $table->rememberToken();
        });

        Schema::create('transfer_tipo_reserva', function (Blueprint $table) {
            $table->id('id_tipo_reserva')->unique();
            $table->string('Descripción',100);
            $table->rememberToken();
        });

        Schema::create('transfer_usuarios_tipo', function (Blueprint $table) {
            $table->id('Id_tipo_usuario')->unique();
            $table->string('Decripcion',100);
            $table->rememberToken();
        });

        Schema::create('transfer_vehiculo', function (Blueprint $table) {
            $table->id('id_vehiculo')->unique();
            $table->string('Decripcion',100);
            $table->string('email_conductor',100)->unique();
            $table->string('password',100);
            $table->integer('Id_tipo_usuario');
            $table->rememberToken();
        });

        Schema::create('transfer_viajero', function (Blueprint $table) {
            $table->id('id_viajero')->unique();
            $table->string('nombre',100);
            $table->string('apellido1',100);
            $table->string('apellido2',100);
            $table->string('direccion',100);
            $table->string('codigoPostal',100);
            $table->string('ciudad',100);
            $table->string('pais',100);
            $table->string('email',100)->unique();
            $table->string('password',100);
            $table->integer('Id_tipo_usuario');
            $table->rememberToken();
        });

        Schema::create('transfer_zona', function (Blueprint $table) {
            $table->id('id_zona')->unique();
            $table->string('descripcion',255);
            $table->rememberToken();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_administrador');
        Schema::dropIfExists('transfer_hotel');
        Schema::dropIfExists('transfer_precios');
        Schema::dropIfExists('transfer_reservas');
        Schema::dropIfExists('transfer_tipo_reserva');
        Schema::dropIfExists('transfer_usuarios_tipo');
        Schema::dropIfExists('transfer_vehiculo');
        Schema::dropIfExists('transfer_viajero');
        Schema::dropIfExists('transfer_zona');

    }
};
