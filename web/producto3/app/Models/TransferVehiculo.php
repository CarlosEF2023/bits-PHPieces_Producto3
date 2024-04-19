<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferVehiculo extends Model
{
    use HasFactory;

    protected $table = 'transfer_vehiculo';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'email_conductor',
        'Id_tipo_usuario',
        'id_vehiculo',
        'password',
    ];
}