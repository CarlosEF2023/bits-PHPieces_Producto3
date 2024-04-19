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
        'email_cliente',
        'fecha_entrada',
        'fecha_modificacion',
        'fecha_reserva',
        'fecha_vuelo_salida',
        'hora_entrada',
        'hora_recogida_hotel',
        'hora_vuelo_salida',
        'id_destino',
        'id_hotel',
        'id_reserva',
        'id_tipo_reserva',
        'id_vehiculo',
        'localizador',
        'num_viajeros',
        'numero_vuelo_entrada',
        'origen_vuelo_entrada',
    ];
}
