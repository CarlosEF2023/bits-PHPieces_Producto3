<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferReservas extends Model
{
    use HasFactory;

    protected $table = 'transfer_reservas';
    public $timestamps = false;

    protected $fillable = [
        'id_reserva',
        'localizador',
        'id_hotel',
        'id_tipo_reserva',
        'email_cliente',
        'fecha_reserva',
        'fecha_modificacion',
        'id_destino',
        'fecha_entrada',
        'hora_entrada',
        'numero_vuelo_entrada',
        'origen_vuelo_entrada',
        'hora_vuelo_salida',
        'hora_recogida_hotel',
        'fecha_vuelo_salida',
        'num_viajeros',
        'id_vehiculo',
    ];
}
