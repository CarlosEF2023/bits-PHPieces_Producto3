<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferHotel extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $table = 'transfer_hotel';
    public $timestamps = false;
    // Por defecto laravel en las consultas por identificador busca la columna id
    // si tu tabla tiene otra columna como clave primaria debes especificarlo
    protected $primaryKey = 'id_hotel';
    protected $fillable = [
        'Caracteristicas',
        'Comision',
        'email',
        'id_hotel',
        'Id_tipo_usuario',
        'id_zona',
        'NombreHotel',
        'password',
        'usuario',
    ];
}