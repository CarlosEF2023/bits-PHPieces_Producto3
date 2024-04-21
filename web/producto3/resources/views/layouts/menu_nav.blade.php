@section("nav")
<?php
//if (!isset($_SESSION['login']) || $_SESSION['login'] == "") {



//}else{

    ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-dark shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <?php
        echo "<img src='assets/Isla_Transfers_Logo.jpeg' width='64px' height='64px'></span></a>";
        ?>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
          <div class="hamburger-toggle">
            <div class="hamburger">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
          <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Isla Transfer</a>
            </li>
          <?php
          
          switch ($_SESSION["usertype"]) {
            case "5":
              // Hotel
              $menuItems = [
                ['label' => 'Registro Entradas/Salidas', 'idname' => 'Hotel_Entrada_Salida'],
                ['label' => 'Datos Personales', 'idname' => 'datospersonales_hotel']
              ];
              break;
            case "6":
              // Viajero
              $menuItems = [
                ['label' => 'Reservas', 'idname' => 'reservas'],
                ['label' => 'ver reservas', 'idname' => 'listarreservas'],
                ['label' => 'Datos Personales', 'idname' => 'datospersonales_viajero']
              ];
              break;
            case "3":
              // Administración
              $menuItems = [
                ['label' => 'Dashboard', 'idname' => 'dashboard_administrador'],
                ['label' => 'Datos Personales', 'idname' => 'datospersonales_administrador']
              ];
              break;
            case "4":
              // Conductor
              $menuItems = [
                ['label' => 'Vista Trayectos', 'idname' => 'vistatrayectosconductor'],
                ['label' => 'Datos Personales', 'idname' => 'datospersonales_conductor']
              ];
              break;
            default:
              $menuItems = [
                ['label' => 'Inicio', 'idname' => 'inicio'],
              ];
              break;
          };

          echo "<li class='nav-item'><a class='nav-link' href='#'>Hola  <b>" . $_SESSION['email'] . " !</a></b>";
          foreach ($menuItems as $menuItem) {
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="#" id="' . $menuItem['idname'] . '" name="' . $menuItem['idname'] . '">' . $menuItem['label'] . '</a>';
            echo '</li>';
          }
//        }

        echo "</ul>";
        echo "<a class='nav-link' style='align:right;' href='#' id='cerraraplicacion' name='cerraraplicacion'>Salir</a>";
          ?>
        </div>
    </div>
  </nav>
  
@endsection