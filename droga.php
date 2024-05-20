<?php
  session_start();
  if(isset($_SESSION['id']) && $_SESSION['tipoUsuario']==1){
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
        <span class="fs-4"><a href="admin.php"><img src="imagenes/vecefar.png" alt="" style="width: 240px;"></a></span>

      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="producto.php" class="nav-link text-white" aria-current="page">
            <i class="fa-solid fa-suitcase-medical" width="16" height="16"></i>
              Nuevo Producto
            </a>
          </li>
        <li>
            <a href="droga.php" class="nav-link text-white active">
            <i class="fa-solid fa-capsules" width="16" height="16"></i>
              Nueva Droga
            </a>
          </li>
          <li>
            <a href="lote.php" class="nav-link text-white">
            <i class="fa-solid fa-box" width="16" height="16"></i>
              Nuevo Lote
            </a>
          </li>
        <li>
            <a href="laboratorio.php" class="nav-link text-white">
            <i class="fa-solid fa-industry" width="16" height="16"></i>
              Nuevo laboratorio
            </a>
          </li>
          <li>
            <a href="nuevoemp.php" class="nav-link text-white">
                <i class="fa-solid fa-user-plus" width="16" height="16"></i>
              Nuevo Empleado
            </a>
          </li>
          <li>
            <a href="prod_list.php" class="nav-link text-white">
               <i class="fa-sharp fa-solid fa-clipboard-list" width="16" height="16"></i>
              Listar productos
            </a>
          </li>
          <li>
            <a href="list.php" class="nav-link text-white">
                <i class="fa-solid fa-table-list" width="16" height="16"></i>
              Listar Lotes
            </a>
          </li>
      </ul>
      <hr>
      <div class="dropup">
          <a  class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"  aria-expanded="false"  data-bs-toggle="dropdown">
            <img src="imagenes/v.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>Admin</strong>
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
                  <h1 style="margin-left: 434px;padding: 31px;">Nueva Droga</h1>
                  </div>
              </div>
              
              <div class="row">
                  <form action="car_drog.php">
                      <div class="row">
                        <div class="col-4" style="width: unset;"><input type=number name=id placeholder="cod Droga" required></div>
                        <div class="col-4" style="width: unset;"><input type=text name=comp placeholder="Componentes" required></div>
                        <div class="col-4" style="width: unset;"><input type=number name=dosis placeholder="Dosis 1.0" step="0.01" min="0" max="2000" required></div>
                        <button class="btn-info" type="submit" href="carga.php">Cargar Droga</button>
                    </form>
                    
                        </div>
                        
                        
 <?php 
if(isset($_GET['modif'])){
require "modif.php";
$dat=$_GET['dato'];
modif_dro($dat);
}
 
 if(isset($_GET['conf'])){
$elec=$_GET['conf'];
$comp=$_GET['comp'];   
$dosis=$_GET['dos'];
    ?>
    <div class="container p-5 my-5 bg-danger text-center mx-auto  text-white">
    <form>
     <?php
    
    echo"<br><br><h2>Se eliminara la droga:$comp $dosis </h2><br>";
    echo"<h2>Y tambien todos los datos asociados a esta droga </h2><br>";
    echo "<h2>¿Desea Confirmar la operacion?</h2><br>";
    ?>
    <input type=hidden name=dosis value=<?php echo($dosis)?>>
    <input type=hidden name=comp value=<?php echo($comp)?>>
    <input type=hidden name=elec value=<?php echo($elec)?>> 
    <input type=submit name=eli value="  SI  "  class="btn btn-secondary btn-lg" formaction=elim_dro.php>
    <input type=submit value="NO" formaction=droga.php class="btn btn-secondary btn-lg">
    <!--<a href=list.php><button>NO</button></a>-->
    </form><br><br><br><br>
    </div>
    
<?php
}
 
 require "conect.php";
$sql="SELECT * FROM droga"; 
$resulset=mysqli_query($conn,$sql);
 if(mysqli_num_rows($resulset)>0){
 
     
     
?>        
<div style="height: 465px; overflow-y: scroll;">
<table class="table table-dark" style="width:800px;margin:auto;">
    <thead>
        <tr>
            <th>ID Droga</th>
            <th>Componentes</th>
            <th>Dosificación(Mg)</th>
            <th></th>
            <th></th>
        </tr>
    

    </thead>
    
    <tbody>
        <?php while($fila=mysqli_fetch_assoc($resulset)){ ?>
        <tr>
            <td><?php echo $fila["droga_id"] ?></td>
            <td><?php echo $fila["dro_componentes"] ?></td>
            <td><?php echo $fila["dro_dosis"] ?></td>
            <td><a href=droga.php?modif=<?php ?>&&dato=<?php echo $fila["droga_id"]?>><i class="fa-solid fa-pen-to-square" style="color: #eff1f6;"></i></a></td>   
            
    <td><a href=droga.php?conf=<?php echo $fila["droga_id"] ?>&&comp=<?php echo $fila["dro_componentes"] ?>&&dos=<?php echo $fila["dro_dosis"] ?>><i class="fa-solid fa-trash " style="color: #f50505;" ></i></a></td>
            
        </tr>
 
       
    
    <?php 
           
            }
            
        ?>
    </tbody>    
</table>
</div>
<?php
}else{echo"<br><br><h1 style= text-align:center;color:red;>Drogas No cargadas</h1>";}
?>
  </main>
   

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      
  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://getbootstrap.com/docs/5.3/examples/sidebars/sidebars.js"></script>

  </body>
</html>