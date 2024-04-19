<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferUsuariosTipo extends Model
{
    use HasFactory;

    protected $table = 'transfer_usuarios_tipo';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion',
        'Id_tipo_usuario',
    ];
}
