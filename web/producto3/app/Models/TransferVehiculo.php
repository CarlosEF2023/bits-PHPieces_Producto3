<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferVehiculo extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
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