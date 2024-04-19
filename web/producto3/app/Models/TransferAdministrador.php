<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferAdministrador extends Model
{
    use HasFactory;

    protected $table = 'transfer_administrador';

    protected $fillable = [
        'Id_usuario',
        'Username',
        'Password',
        'Nombre',
        'email',
        'Apellido1',
        'Apellido2',
        'Id_tipo_usuario',
    ];
}