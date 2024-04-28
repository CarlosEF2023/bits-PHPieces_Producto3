<?php

namespace App\Http\Controllers\reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferReservas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservaMailController;


class transfer_crearreservaController extends Controller
{

    public function index($valor){
        if ($valor=="1"){
            return view('/reservas/aeropuerto/crear_reservaaeropuerto');
        }
        if ($valor=="2"){
            return view('/reservas/hotel/crear_reservahotel');
        }
        if ($valor=="3"){
            return view('/reservas/completo/crear_reservacompleto');
        }
    }


    public function store(Request $request)
    {
        // Procesar los datos del formulario aquí
        log::channel('mylog')->info(json_encode($request->all()));

        // Valida los datos del formulario
        /*$validatedData = $request->validate([
            'localizador' => 'required|string|max:100',
            'id_hotel' => 'nullable|integer',
            'id_tipo_reserva' => 'required|integer',
            'email_cliente' => 'required|email|max:100',
            'fecha_reserva' => 'required|date',
            'fecha_modificacion' => 'required|date',
            'id_destino' => 'required|integer',
            'fecha_entrada' => 'required|date',
            'hora_entrada' => 'required|date_format:H:i:s',
            'numero_vuelo_entrada' => 'required|string|max:50',
            'origen_vuelo_entrada' => 'required|string|max:50',
            'hora_vuelo_salida' => 'required|date_format:H:i:s',
            'hora_recogida_hotel' => 'required|date_format:H:i:s',
            'fecha_vuelo_salida' => 'required|date',
            'num_viajeros' => 'required|integer',
            'id_vehiculo' => 'required|integer',
        ]);
        */

        // Crea una nueva instancia del modelo TransferReserva con los datos validados
        $transfer_reserva = new TransferReservas();
        
        switch ($request->idtiporeserva=="1"){
            case "1":
                $transfer_reserva->id_reserva = null;
                $transfer_reserva->localizador = $this->generarLocalizador(10);
                $transfer_reserva->id_hotel = $request->idhotelreserva; 
                $transfer_reserva->id_tipo_reserva = "1";
                $transfer_reserva->email_cliente = $request->emailreserva;
                $transfer_reserva->fecha_reserva = date("Y-m-d H:i:s");
                $transfer_reserva->fecha_modificacion = date("Y-m-d H:i:s");
                $transfer_reserva->id_destino  = $request->Hotel_Destino;
                $transfer_reserva->fecha_entrada = $request->diadesalida;
                $transfer_reserva->hora_entrada = $request->horadellegada.":00";
                $transfer_reserva->numero_vuelo_entrada = $request->numerovuelo;
                $transfer_reserva->origen_vuelo_entrada = $request->aeropuertoorigen;
                $transfer_reserva->hora_vuelo_salida = "00:00:00";
                $transfer_reserva->hora_recogida_hotel = "00:00:00";
                $transfer_reserva->fecha_vuelo_salida = "9999-12-31";
                $transfer_reserva->num_viajeros = $request->numeroviajeros;
                $transfer_reserva->id_vehiculo = "9999";  // Tiene que ser 9999 para luego asignarlo
                break;
            case "2":
                $transfer_reserva->id_reserva = null;
                $transfer_reserva->localizador = $this->generarLocalizador(10);
                $transfer_reserva->id_hotel = $request->idhotelreserva;
                $transfer_reserva->id_tipo_reserva = "2";
                $transfer_reserva->email_cliente = $request->emailreserva;
                $transfer_reserva->fecha_reserva = date("Y-m-d H:i:s");
                $transfer_reserva->fecha_modificacion = date("Y-m-d H:i:s");
                $transfer_reserva->id_destino  = $request->hotelrecogida;
                $transfer_reserva->fecha_entrada = $request->diadesalida;
                $transfer_reserva->hora_entrada = $request->horaderecogida;
                $transfer_reserva->numero_vuelo_entrada = $request->numerovuelo;
                $transfer_reserva->origen_vuelo_entrada = $request->aeropuertodestino;
                $transfer_reserva->hora_vuelo_salida = $request->horadesalida;
                $transfer_reserva->hora_recogida_hotel = $request->horaderecogida;
                $transfer_reserva->fecha_vuelo_salida = $request->diadesalida;
                $transfer_reserva->num_viajeros = $request->numeroviajeros;
                $transfer_reserva->id_vehiculo = "9999";  // Tiene que ser 9999 para luego asignarlo
                break;
            case "3":
                $transfer_reserva->id_reserva = null;
                $transfer_reserva->localizador = $this->generarLocalizador(10);
                $transfer_reserva->id_hotel = $request->idhotelreserva; 
                $transfer_reserva->id_tipo_reserva = "3";
                $transfer_reserva->email_cliente = $request->emailreserva;
                $transfer_reserva->fecha_reserva = date("Y-m-d H:i:s");
                $transfer_reserva->fecha_modificacion = date("Y-m-d H:i:s");
                $transfer_reserva->id_destino  = $request->Hotel_Destino;
                $transfer_reserva->fecha_entrada = $request->diadesalida;
                $transfer_reserva->hora_entrada = $request->horadellegada.":00";
                $transfer_reserva->numero_vuelo_entrada = $request->numerovuelo;
                $transfer_reserva->origen_vuelo_entrada = $request->aeropuertoorigen;
                $transfer_reserva->hora_vuelo_salida = $request->horadesalida;
                $transfer_reserva->hora_recogida_hotel = $request->horaderecogida;
                $transfer_reserva->fecha_vuelo_salida = $request->diadesalida;
                $transfer_reserva->num_viajeros = $request->numeroviajeros;
                $transfer_reserva->id_vehiculo = "9999";  // Tiene que ser 9999 para luego asignarlo
                break;
        }

        // Guarda el modelo en la base de datos
        $transfer_reserva->save();

        // Registra un mensaje de log con los datos del formulario
        Log::channel('mylog')->info(json_encode($request));

        // Redirecciona a donde desees después de procesar el formulario
        return redirect()->back()->with('success', '¡Reserva creada correctamente!');

    }

    function generarLocalizador($longitud = 10) {
        // Caracteres posibles para el localizador
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    
        // Obtener la longitud total de los caracteres
        $longitudCaracteres = strlen($caracteres);
    
        // Inicializar el localizador como una cadena vacía
        $localizador = '';
    
        // Generar el localizador aleatorio
        for ($i = 0; $i < $longitud; $i++) {
            // Obtener un carácter aleatorio del conjunto de caracteres
            $caracterAleatorio = $caracteres[mt_rand(0, $longitudCaracteres - 1)];
    
            // Agregar el carácter aleatorio al localizador
            $localizador .= $caracterAleatorio;
        }
    
        return $localizador;
    }

    public function enviarmail($Localizador){
        $reserva = TransferReservas::where('localizador', $Localizador)->first();
        $valor = $reserva->id_tipo_reserva;
        
        $to = $valor->email_cliente;
        $subject = "Reserva de itinerario localizador: " . $valor->localizador;

        // Construir el mensaje
        $message = "Hola " . $valor->email_cliente . ",<br>";
        $message .= "A continuación pasamos a enviarle la información relativa a su reserva:<br>";
        switch ($valor->id_tipo_reserva) {
            case "1":
                $message .= "<div style='border:1; border-radius: 5px; padding: 10px'>";
                $message .= "<h1>Localizador <b>" . $valor->localizador . "</b> </h1><hr>";
                $message .= "Fecha reserva: " . $valor->fecha_reserva . "<hr>";
                $message .= "Aeropuerto Origen: " . $valor->origen_vuelo_entrada . "<br>";
                $message .= "Número de vuelo: " . $valor->numero_vuelo_entrada . "<br>";
                $message .= "Día llegada: " . $valor->origen_vuelo_entrada . "<br>";
                $message .= "Hora llegada: " . $valor->origen_vuelo_entrada . "<hr>";
                $message .= "Hotel destino: " . $valor->id_destino . "<br>";
                $message .= "Número de pasajeros: " . $valor->num_viajeros . "<hr>";
                $message .= "email de la reserva: " . $valor->email_cliente . "<hr>";
                if ($valor->fecha_reserva == $valor->fecha_modificacion) {
                    $message .= "Esta reserva permite 1 cambio.<br>";
                } else {
                    $message .= "Esta reserva no permite modificaciones.<br>";
                    $message .= "Último cambio realizado el día: " . $valor->fecha_modificacion . "<br>";
                }
                $message .= "<br>Para cualquier consulta no dude en contactar con <b>Isla Travels</b>.";
                break;
            case "2":
                // Otras opciones de tipo de reserva
                break;
            case "3":
                // Otras opciones de tipo de reserva
                break;
        }

        // Enviar el correo electrónico utilizando la clase Mail de Laravel
        try {
            Mail::to($to)->send(new ReservaMailController($subject, $message));
            return true; // Correo enviado con éxito
        } catch (\Exception $e) {
            return false; // Error al enviar el correo electrónico
        }
    }

    
}
