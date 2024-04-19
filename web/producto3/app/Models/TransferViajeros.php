<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferViajeros extends Model
{
    use HasFactory;

    protected $table = 'transfer_viajeros';
    public $timestamps = false;

    protected $fillable = [
        'apellido1',
        'apellido2',
        'ciudad',
        'codigoPostal',
        'direccion',
        'email',
        'Id_tipo_usuario',
        'id_viajero',
        'nombre',
        'pais',
        'password',
    ];
}