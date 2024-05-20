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
        <h1 style="margin-left: 434px;padding: 31px;"> Listado por  Productos </h1>
       </div>
        </div>
        <div class="row">
<form style="text-align:center"> 
     <input type=text name="Buscar" required><br><br>
<select name="buscador">
     <option value="prod_id">Producto N°</option>
     <option value="dro_componentes">Droga</option>
     <option value="lab_nombre">Laboratorio</option>
</select>
     <input type=submit name=buscar value=buscar>
</form>


<?php

if(isset($_GET['buscar'])){
    $que=$_GET['Buscar'];
    $donde=$_GET['buscador'];
    
    $sql="SELECT * FROM productos
INNER JOIN laboratorios on productos.lab_id=laboratorios.lab_id
INNER JOIN droga on productos.droga_id=droga.droga_id 
where $donde like '$que'";

}else{
    
$sql="SELECT * FROM productos
INNER JOIN laboratorios on productos.lab_id=laboratorios.lab_id
INNER JOIN droga on productos.droga_id=droga.droga_id order by prod_id asc";
}
require "conect.php";
$resulset=mysqli_query($conn,$sql);
 if(mysqli_num_rows($resulset)>0){
 
     
     
?>
<div style="height: 465px; overflow-y: scroll;">
    <br>
<table class="table table-dark">
    <thead>
        <tr>
            <th>Producto n°</th>
            <th>Marca</th>
            <th>Stock Actual</th>
            <th>Stock Minimo</th>
            <th>Comprimidos</th>
            <th>Precio</th>
            <th>Droga </th>
            <th>Laboratorio</th>
        </tr>
    

    </thead>
    
    <tbody>
        <?php
        
            while($fila=mysqli_fetch_assoc($resulset)){
$ac=$fila['prod_stock_actual'];
$min=$fila['prod_stock_min'];
$dif=$ac-$min;
if ($ac>$min && $dif>10) {
    $color = "green";
} elseif ($ac>$min) {
    $color = "yellow";
} elseif ($ac<$min) {
    $color = "red";
}

        ?>

        <tr style="color: <?php echo $color ?>">
            <td><?php echo $fila["prod_id"] ?></td>
            <td><?php echo $fila["prod_marca"] ?></td>
            <td><?php echo $fila["prod_stock_actual"] ?></td>
            <td><?php echo $fila["prod_stock_min"] ?></td>
            <td><?php echo $fila["prod_cant_comprimidos"] ?></td>
            <td><?php echo $fila["prod_precio"] ?></td>
            <td><?php echo $fila["dro_componentes"] ?> <?php echo $fila["dro_dosis"] ?></td>
            <td><?php echo $fila["lab_nombre"]?></td>
            
        </tr>
 
       
    
    <?php 
            }
            
        ?>
    </tbody>    
</table>
</div>
<?php
}else{echo"<br><br><h1 style= text-align:center;color:red;>Producto/Lote No encontrado</h1>";}
?>          
                </div>
            </div>
        </div>

    </main>

  
          
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
        <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://getbootstrap.com/docs/5.3/examples/sidebars/sidebars.js"></script>

  </body>
</html>