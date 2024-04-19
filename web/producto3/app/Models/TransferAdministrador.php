<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferAdministrador extends Model
{
    use HasFactory;

    protected $table = 'transfer_administrador';
    // Laravel utiliza estas columnas para las marcas de tiempo de creación y 
    // actualización de los modelos Eloquent. Si tu tabla no tiene estas columnas 
    // y no quieres que Laravel las utilice, puedes desactivarlas en tu modelo Administrador 
    // añadiendo la propiedad public $timestamps = false; a la clase del modelo.
    public $timestamps = false;
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