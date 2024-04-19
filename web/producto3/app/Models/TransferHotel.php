<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferHotel extends Model
{
    use HasFactory;

    protected $table = 'transfer_hotel';
    public $timestamps = false;

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