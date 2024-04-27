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
    protected $primaryKey = 'id_viajero';
    protected static $alertas = [];
    
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

    public function validarNuevaCuenta(){
        if (!$this->nombre) {
            self::$alertas['alert-danger'][] = 'El nombre es obligatorio';
        }
        if (!$this->apellido1) {
            self::$alertas['alert-danger'][] = 'El primer apellido es obligatorio';
        }
        if (!$this->apellido2) {
            self::$alertas['alert-danger'][] = 'El segundo apellido es obligatorio';
        }
        if (!$this->direccion) {
            self::$alertas['alert-danger'][] = 'La dirección es obligatoria';
        }
        if (!$this->codigoPostal) {
            self::$alertas['alert-danger'][] = 'El código postal es obligatorio';
        }
        if (!$this->ciudad) {
            self::$alertas['alert-danger'][] = 'La ciudad es obligatoria';
        }
        if (!$this->pais) {
            self::$alertas['alert-danger'][] = 'El país es obligatorio';
        }
        if (!$this->email) {
            self::$alertas['alert-danger'][] = 'El email es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['alert-danger'][] = 'La contraseña es obligatoria';
        } elseif (strlen($this->password) < 6) {
            self::$alertas['alert-danger'][] = 'La contraseña debe contener al menos 6 caracteres';
        }
        
        return self::$alertas;
    }

    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }
    // Validación
    public static function getAlertas() {
        return static::$alertas;
    }
} {
}
