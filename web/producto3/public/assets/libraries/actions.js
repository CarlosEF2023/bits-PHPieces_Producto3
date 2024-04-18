$(document).ready(function(e) {

/* PRINCIPAL */

    $("#reservas").on("click", function(e) {
        e.preventDefault();
        $("#principal").load("/views/reservas/frm_reservas.php");
    });
    

    $("#crearcuentaviajero").on("click", function(e) {
        e.preventDefault();
        $("#principal").load("views/crearcuentaviajero.php");
    });

    $("#datospersonales_viajero").on("click", function(e) {
        e.preventDefault();
        $("#principal").load("controllers/datospersonales_viajero_ctr.php");
    });

    $("#listarreservas").on("click", function(e) {
        // Viajero
        e.preventDefault();
        $("#principal").load("reservas/frm_listar_reservas.php");
    });

    $("#listarreservassinconductor").on("click", function(e) {
        // listado de reservas sin conductor
        e.preventDefault();
        $("#principal").load("conrollers/listar_reservas_sinconductor_ctr.php");
    });

    $("#crearusuario").on("click", function(e) {
        e.preventDefault();
        // Puede ser Hotel, Conductor o viajero
        $("#principal").load("about.php");
    });

    $("#datospersonales_administrador").on("click", function(e) {
        e.preventDefault();
        $("#principal").load("./frm_datos_personales_admin.php");
    });
    $("#datospersonales_hotel").on("click", function(e) {
        e.preventDefault();
        $("#principal").load("./frm_datos_personales_hotel.php");
    });

    $("#vistatrayectosconductor").on("click", function(e) {
        e.preventDefault();
        $("#principal").load("about.php");
    });

    $("#datospersonales_conductor").on("click", function(e) {
        e.preventDefault();
        $("#principal").load("about.php");
    });

});
