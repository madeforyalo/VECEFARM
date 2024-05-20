<?php
  session_start();
  if(isset($_SESSION['id']) && $_SESSION['tipoUsuario']==2){
  //todo ok

  }
  else{?>
    <div style="text-align:center;">
    <?php      
    echo"<h1 style= color:red; >Pagina Prohibida. Inicie Sesion";
?>
<br><br><a href="index.php">Iniciar sesion</a>
<?php   
  exit();
  ?>
  </div>
  <?php
  }

  include "header.php";
?>

<html>
  <body>
    <main class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
          <span class="fs-4"><a href="empleado.php"><img src="imagenes/vecefar.png" alt="" style="width: 240px;"></a></span>

        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="emp_prod.php" class="nav-link text-white" aria-current="page">
            <i class="fa-solid fa-suitcase-medical" width="16" height="16"></i>
              Nuevo Producto
            </a>
          </li>
          <li>
            <a href="emp_lote.php" class="nav-link text-white">
            <i class="fa-solid fa-box" width="16" height="16"></i>
              Nuevo Lote
            </a>
          </li>
          <li>
            <a href="emp_lpro.php" class="nav-link text-white">
                <i class="fa-sharp fa-solid fa-clipboard-list" width="16" height="16"></i>
              Listar productos
            </a>
          </li>
          <li>
            <a href="emp_list.php" class="nav-link text-white">
                <i class="fa-solid fa-table-list" width="16" height="16"></i>
              Listar lotes
            </a>
          </li>
        </ul> 
        <hr>
         <div class="dropup">
          <a  class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"  aria-expanded="false"  data-bs-toggle="dropdown">
            <img src="imagenes/v.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Empleado</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>
          </ul>
        </div>
    </div>

      <div class="b-example-divider b-example-vr"></div>

    </main>
    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

      
  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://getbootstrap.com/docs/5.3/examples/sidebars/sidebars.js"></script>

  </body>
</html>