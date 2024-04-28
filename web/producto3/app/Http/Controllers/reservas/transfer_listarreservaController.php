<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class transfer_listarreservaController extends Controller
{
    public function listar_todos (){
        $reservas = TransferReservas::all();
        return view('listado', ['reservas' => $reservas]);
    }


    public function listarReservasConductor($tramo, $fecha, $conductor)
    {
        switch ($tramo) {
            case 'dia':
                $reservas = TransferReservas::select('*')
                    ->leftJoin('transfer_tipo_reserva', 'transfer_reservas.id_tipo_reserva', '=', 'transfer_tipo_reserva.id_tipo_reserva')
                    ->leftJoin('transfer_hotel', 'transfer_reservas.id_destino', '=', 'transfer_hotel.id_hotel')
                    ->where('transfer_reservas.id_vehiculo', $conductor)
                    ->where(function ($query) use ($fecha) {
                        $query->whereDate('transfer_reservas.fecha_entrada', $fecha)
                            ->orWhereDate('transfer_reservas.fecha_vuelo_salida', $fecha);
                    })
                    ->orderBy('hora_entrada')
                    ->orderBy('hora_vuelo_salida')
                    ->get();
                break;
            case 'semana':
                $startOfWeek = date('Y-m-d', strtotime('last Monday', strtotime($fecha)));
                $endOfWeek = date('Y-m-d', strtotime('next Sunday', strtotime($fecha)));
                $reservas = TransferReservas::select('*')
                    ->leftJoin('transfer_tipo_reserva', 'transfer_reservas.id_tipo_reserva', '=', 'transfer_tipo_reserva.id_tipo_reserva')
                    ->leftJoin('transfer_hotel', 'transfer_reservas.id_destino', '=', 'transfer_hotel.id_hotel')
                    ->where('transfer_reservas.id_vehiculo', $conductor)
                    ->where(function ($query) use ($startOfWeek, $endOfWeek) {
                        $query->whereBetween('transfer_reservas.fecha_entrada', [$startOfWeek, $endOfWeek])
                            ->orWhereBetween('transfer_reservas.fecha_vuelo_salida', [$startOfWeek, $endOfWeek]);
                    })
                    ->orderBy('hora_entrada')
                    ->orderBy('hora_vuelo_salida')
                    ->get();
                break;
            case 'mes':
                $startOfMonth = date('Y-m-01', strtotime($fecha));
                $endOfMonth = date('Y-m-t', strtotime($fecha));
                $reservas = TransferReservas::select('*')
                    ->leftJoin('transfer_tipo_reserva', 'transfer_reservas.id_tipo_reserva', '=', 'transfer_tipo_reserva.id_tipo_reserva')
                    ->leftJoin('transfer_hotel', 'transfer_reservas.id_destino', '=', 'transfer_hotel.id_hotel')
                    ->where('transfer_reservas.id_vehiculo', $conductor)
                    ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                        $query->whereBetween('transfer_reservas.fecha_entrada', [$startOfMonth, $endOfMonth])
                            ->orWhereBetween('transfer_reservas.fecha_vuelo_salida', [$startOfMonth, $endOfMonth]);
                    })
                    ->orderBy('hora_entrada')
                    ->orderBy('hora_vuelo_salida')
                    ->get();
                break;
            default:
                // Tramo no válido
                return false;
        }

        return $reservas;
    }

    public function listarReservasSinConductor()
    {
        $reservas = TransferReservas::select('*')
            ->leftJoin('transfer_tipo_reserva', 'transfer_reservas.id_tipo_reserva', '=', 'transfer_tipo_reserva.id_tipo_reserva')
            ->leftJoin('transfer_hotel', 'transfer_reservas.id_destino', '=', 'transfer_hotel.id_hotel')
            ->where('transfer_reservas.id_vehiculo', 9999)
            ->get();

        return $reservas;
    }    

    public function listarTipoReserva($tipoReporte, $tipoDeReserva, $id, $tipoUsuario)
    {

        $fecha = now()->format('Y-m-d');
        
        $query = TransferReservas::leftJoin('transfer_tipo_reserva', 'transfer_reservas.id_tipo_reserva', '=', 'transfer_tipo_reserva.id_tipo_reserva')
            ->leftJoin('transfer_hotel', 'transfer_reservas.id_destino', '=', 'transfer_hotel.id_hotel')
            ->where(function ($query) use ($tipoUsuario, $id) {
                switch ($tipoUsuario) {
                    case '3':
                        // Administrador
                        // No aplicar ningún filtro adicional
                        break;
                    case '4':
                        // Conductor
                        $query->where('transfer_reservas.id_vehiculo', $id);
                        break;
                    case '5':
                        // Hotel
                        $query->where('transfer_reservas.id_destino', $id);
                        break;
                    case '6':
                        // Viajero
                        $query->where('transfer_reservas.email_cliente', $id);
                        break;
                }
            })
            ->where(function ($query) use ($tipoReporte, $fecha) {
                switch ($tipoReporte) {
                    case 'dia':
                        $query->where(function ($query) use ($fecha) {
                            $query->whereDate('transfer_reservas.fecha_entrada', $fecha)
                                ->orWhereDate('transfer_reservas.fecha_vuelo_salida', $fecha);
                        });
                        break;
                    case 'semana':
                        $startOfWeek = now()->startOfWeek()->format('Y-m-d');
                        $endOfWeek = now()->endOfWeek()->format('Y-m-d');
                        $query->where(function ($query) use ($startOfWeek, $endOfWeek) {
                            $query->whereBetween('transfer_reservas.fecha_entrada', [$startOfWeek, $endOfWeek])
                                ->orWhereBetween('transfer_reservas.fecha_vuelo_salida', [$startOfWeek, $endOfWeek]);
                        });
                        break;
                    case 'mes':
                        $startOfMonth = now()->startOfMonth()->format('Y-m-d');
                        $endOfMonth = now()->endOfMonth()->format('Y-m-d');
                        $query->where(function ($query) use ($startOfMonth, $endOfMonth) {
                            $query->whereBetween('transfer_reservas.fecha_entrada', [$startOfMonth, $endOfMonth])
                                ->orWhereBetween('transfer_reservas.fecha_vuelo_salida', [$startOfMonth, $endOfMonth]);
                        });
                        break;
                }
            });

        if ($tipoDeReserva != 9999) {
            $query->where('transfer_reservas.id_tipo_reserva', $tipoDeReserva);
        }

        $listadofinal = $query->get();
        
        //dd($query->toSql());

        switch ($tipoReporte) {
            case 'dia':
                return view('reservas.listados.ver_reservas_dia', ['matrizresultado' => $listadofinal]);
                break;
            case 'semana':
                return view('reservas.listados.ver_reservas_semana', ['matrizresultado' => $listadofinal]);
                break;    
            case 'mes':
                return view('reservas.listados.ver_reservas_mes', ['matrizresultado' => $listadofinal]);
                break;
            case 'todos':
                return view('reservas.listados.ver_reservas_total', ['matrizresultado' => $listadofinal]);
                break;
        }
    }    

}
