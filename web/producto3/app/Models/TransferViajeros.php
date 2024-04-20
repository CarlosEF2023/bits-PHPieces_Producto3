<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferViajeros extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

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
} {
}
