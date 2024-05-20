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

      <div class="container p-3">
        <div class="row">
          <div class="col12">
        
                 <div class="col-sm-12">
    <?php if(isset($_SESSION['mensaje'])){ ?>
        <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['mensaje']; ?>
            <a href=""> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-top: 20px;padding: unset;"></button></a>
        </div>
        <?php unset($_SESSION['mensaje']); ?>
    <?php } ?>
</div>      
              
            <h1 style="margin-left: 434px;padding: 31px;">Nuevo Producto </h1>
          </div>
        </div>
        <div class="row">
          <form action="alta_prod_emp.php">

            <div class="row">
                <div class="col-4" style="width: unset;"><input type=number name=id placeholder="Id Producto" required></div>
                <div class="col-4" style="width: unset;"><input type=text name=marca placeholder="Marca" required></div>
                <div class="col-4" style="width: unset;"><input type=text name=min placeholder="Stock Minimo" required></div>
                <div class="col-3" style="width: unset;"><input type=number name=comp placeholder="Comprimidos" required></div>
                <div class="col-3" style="width: unset;"><input type=number name=pre placeholder="Precio" required></div>
            </div>
            
            <?php
            require "conect.php";
            $lab="SELECT * FROM laboratorios";
            $res=mysqli_query($conn,$lab);

            if(mysqli_affected_rows($conn)>0){
            ?>
            <div class="row">
              <div class="col-3">
                <label for="lab_p">Laboratorio</label>  
                  <select name="lab_p" class="select">
                    <?php
                      require "conect.php";
                      $lab="SELECT * FROM laboratorios";
                      $res=mysqli_query($conn,$lab);
                      
                      if(mysqli_affected_rows($conn)>0){
                        while($fila=mysqli_fetch_assoc($res)){
                    ?>
                    <option value=<?php echo $fila["lab_id"] ?>><?php echo $fila["lab_nombre"] ?></option>
                    <?php
                        }
                      }else{
                          ?>
                         <option>No hay laboratorios cargados</option>
                          <?php
                      }
                    ?>
                  </select>
              </div>
<?php
             }else{
              ?>
             <strong style="text-align:center;color:red;">No hay laboratorios cargados      </strong>
              <?php
              }
              
            $dr="SELECT * FROM droga";
            $res=mysqli_query($conn,$dr);

            if(mysqli_affected_rows($conn)>0){
            ?>
                <div class="col-3" >
                  <label for="dro_p">Droga</label>  
                  <select name="dro_p" class="select">
                    <?php
                      require "conect.php";
                      $dro="SELECT * FROM droga";
                      $res=mysqli_query($conn,$dro);
                      
                      if(mysqli_affected_rows($conn)>0){
                        while($fila=mysqli_fetch_assoc($res)){
                    ?>
                    <option value=<?php echo $fila["droga_id"] ?>><?php echo $fila["dro_componentes"]?> <?php echo $fila["dro_dosis"]?></option>
                    <?php
                        }
                      }else{
                          ?>
                         <option>No hay Drogas cargadas</option>
                          <?php
                      }
                    ?>
                  </select>
              </div>
              <?php
             }else{
              ?>
             <br><br><strong style="text-align:center;color:red;">No hay drogas cargadas</strong>
              <?php
              }
              ?>
            </div>
            
            
            <button class="btn-info" type="submit">Cargar Producto</button>
          </form>
                     </div>
            </div>
        </div>

    </main>

  
          
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
        <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://getbootstrap.com/docs/5.3/examples/sidebars/sidebars.js"></script>

  </body>
</html>
      
