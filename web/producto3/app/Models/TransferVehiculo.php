<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use App\Models\TransferReservas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferVehiculo extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $table = 'transfer_vehiculo';
    public $timestamps = false;
    protected static $alertas = [];
    // Por defecto laravel en las consultas por identificador busca la columna id
    // si tu tabla tiene otra columna como clave primaria debes especificarlo
    protected $primaryKey = 'id_vehiculo';
    protected $fillable = [
        'Descripcion',
        'email_conductor',
        'Id_tipo_usuario',
        'id_vehiculo',
        'password',
    ];
    
    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }
    // Validación
    public static function getAlertas() {
        return static::$alertas;
    }

    public function filtrarPorConductorYTramo($tramo, $fecha, $idConductor)
    {
        return TransferReservas::leftJoin('transfer_tipo_reserva', 'transfer_reservas.id_tipo_reserva', '=', 'transfer_tipo_reserva.id_tipo_reserva')
            ->leftJoin('transfer_hotel', 'transfer_reservas.id_destino', '=', 'transfer_hotel.id_hotel')
            ->where('transfer_reservas.id_vehiculo', $idConductor)
            ->where(function ($query) use ($tramo, $fecha) {
                switch ($tramo) {
                    case 'dia':
                        $query->whereDate('transfer_reservas.fecha_entrada', $fecha)
                            ->orWhereDate('transfer_reservas.fecha_vuelo_salida', $fecha);
                        break;
                    case 'semana':
                        $startOfWeek = now()->startOfWeek()->format('Y-m-d');
                        $endOfWeek = now()->endOfWeek()->format('Y-m-d');
                        $query->whereBetween('transfer_reservas.fecha_entrada', [$startOfWeek, $endOfWeek])
                            ->orWhereBetween('transfer_reservas.fecha_vuelo_salida', [$startOfWeek, $endOfWeek]);
                        break;
                    case 'mes':
                        $startOfMonth = now()->startOfMonth()->format('Y-m-d');
                        $endOfMonth = now()->endOfMonth()->format('Y-m-d');
                        $query->whereBetween('transfer_reservas.fecha_entrada', [$startOfMonth, $endOfMonth])
                            ->orWhereBetween('transfer_reservas.fecha_vuelo_salida', [$startOfMonth, $endOfMonth]);
                        break;
                }
            })
            ->orderBy('transfer_reservas.hora_entrada')
            ->orderBy('transfer_reservas.hora_vuelo_salida')
            ->get();
    }

}