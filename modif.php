<?php
function modif($dato){
require "conect.php";    
$sql="SELECT * FROM lotes
INNER JOIN productos on lotes.prod_id=productos.prod_id
INNER JOIN empleados on lotes.emp_id=empleados.emp_id
INNER JOIN laboratorios on productos.lab_id=laboratorios.lab_id
INNER JOIN droga on productos.droga_id=droga.droga_id WHERE lote_id='$dato'";

$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){
 ?>
  <br><br><br><br><br><br>
 <form style="text-align:center;">
     <table class="table table-dark table-sm" style="width:600px;margin:auto;">
         <thead>
         <tr><th>Dato</th><th>Actual</th><th>Modificacion</th></tr>
         </thead>
        <?php  while($fila=mysqli_fetch_assoc($res)){   
          $longitud = strlen($fila['lote_id']);?>
        <tbody>
          <input type=hidden name=actual value=<?php echo $fila["lote_id"] ?>>  
         <tr><th>Lote ID</th><td><?php echo $fila["lote_id"] ?></td>                       
         <td><input type=number   name=lote_id value="<?php echo($fila['lote_id'])?>" required style="width:70px;height:20%;"></td></tr>  
         <tr><th>Fecha de Ingreso</th><td><?php echo $fila["lote_fec_ing"] ?></td>                        
         <td><input type=date   name=lote_fec_ing value="<?php echo($fila['lote_fec_ing'])?>" required></td></tr>
         
         <tr><th>Fecha de Vencimiento</th><td><?php echo $fila["lote_venci"] ?></td>                        
         <td><input type=date   name=lote_venci value="<?php echo($fila['lote_venci'])?>" required></td></tr>
         
         <tr><th>Lote Cantidad</th><td><?php echo $fila["lote_cant"] ?></td>                        
         <td><input type=number   name=lote_cant value="<?php echo($fila['lote_cant'])?>" required style="width:70px;height:50%;"></td></tr>
         
         <tr><th>Producto</th><td><?php echo $fila["prod_marca"] ?>, <?php echo $fila["dro_componentes"] ?>   <?php echo $fila["dro_dosis"] ?></td>
         <td><select name="producto">
                                                <?php
                                          require "conect.php";
                                          $pro="SELECT * FROM productos INNER JOIN droga on productos.droga_id=droga.droga_id";
                                        
                                          $res=mysqli_query($conn,$pro);
                                          if(mysqli_affected_rows($conn)>0){
                                              while($fila=mysqli_fetch_assoc($res)){

                                          ?>

                                      <option value=<?php echo $fila["prod_id"] ?>><?php echo $fila["prod_marca"] ?> ,
                                      <?php echo $fila["dro_componentes"] ?>   <?php echo $fila["dro_dosis"] ?>  </option>

                                      <?php
                                          }
                                        }else{
                                            ?>
                                          <option>No hay Productos cargados</option>
                                          <?php
                                        }
                                      ?>
                          </select></td></tr>
     
     
     </tbody>
     <?php } ?>

     </table>
     
     <input type=submit  value="Guardar cambios"  formaction="act_lote.php" class="btn btn-success">
     <input type=submit value="Cancelar"  formaction="list.php" class="btn btn-danger">
     <br><br><br><br><br><br><br><br><br><br><br>
 </form>  
 
<?php    
}
  
    
} 

function modif_dro($dato){
require "conect.php";     
$sql="SELECT*FROM droga WHERE droga_id='$dato'";

$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){?>

 <br><br><br><br><br><br><br><br>
 <form style="text-align:center;">
     <table class="table table-dark table-sm" style="width:600px;margin:auto;">
         <thead>
         <tr><th>Dato</th><th>Actual</th><th>Modificacion</th></tr>
         </thead>
        <?php  while($fila=mysqli_fetch_assoc($res)){   
          $longitud = strlen($fila['droga_id']);?>
        <tbody>
            
          <input type=hidden name=droga_id value=<?php echo $fila["droga_id"] ?>>  
          
         <tr><th>Componente</th><td><?php echo $fila["dro_componentes"] ?></td>                        
         <td><input type=text   name=dro_componentes value="<?php echo($fila['dro_componentes'])?>" required style="width:100px;height:80%;"></td></tr>
         
         <tr><th>Dosificación (Mg)</th><td><?php echo $fila["dro_dosis"] ?></td>                        
         <td><input type=number placeholder="Dosis 1.0" step="0.01" min="0" max="2000"   name=dro_dosis value="<?php echo($fila['dro_dosis'])?>" required style="width:70px;height:50%;"></td></tr>
        
     </tbody>
     <?php } ?>

     </table>
     
     <input type=submit  value="Guardar cambios"  formaction="act_dro.php" class="btn btn-success">
     <input type=submit value="Cancelar"  formaction="droga.php" class="btn btn-danger">
     <br><br><br><br><br><br><br><br><br><br><br>
 </form>  
 
<?php    
}

    

    
}

function modif_prod($dato){
require "conect.php";     
$sql="SELECT*FROM productos 
INNER JOIN laboratorios on productos.lab_id=laboratorios.lab_id
INNER JOIN droga on productos.droga_id=droga.droga_id
WHERE prod_id='$dato'";

$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){?>

 <br><br><br><br><br><br><br><br>
 <div style="height: 465px; overflow-y: scroll;">
 <form style="text-align:center;overflow-y: scroll;">
     
     <table class="table table-dark table-sm" style="width:600px;margin:auto;">
         <thead>
         <tr><th>Dato</th><th>Actual</th><th>Modificacion</th></tr>
         </thead>
        <?php  while($fila=mysqli_fetch_assoc($res)){ ?>
        
        <tbody>
         <input type=hidden name=prod_id value=<?php echo $fila["prod_id"] ?>>  
          <tr><th>Marca</th><td><?php echo $fila["prod_marca"] ?></td>                        
         <td><input type=text   name=prod_marca value="<?php echo($fila['prod_marca'])?>" required style="width:100px;height:80%;"></td></tr>
           <tr><th>Stock Min</th><td><?php echo $fila["prod_stock_min"] ?></td>                        
         <td><input type=number  name=prod_stock_min value="<?php echo($fila['prod_stock_min'])?>" required style="width:70px;height:50%;"></td></tr>
        <tr><th>Comprimidos</th><td><?php echo $fila["prod_cant_comprimidos"] ?></td>                        
         <td><input type=number  name=prod_cant_comprimidos value="<?php echo($fila['prod_cant_comprimidos'])?>" required style="width:70px;height:50%;"></td></tr>
        <tr><th>Precio</th><td><?php echo $fila["prod_precio"] ?></td>                        
         <td><input type=number  name=prod_precio value="<?php echo($fila['prod_precio'])?>" required style="width:70px;height:50%;"></td></tr>
<?php        

if(mysqli_num_rows($res)>0){ ?>
         <tr><th>droga</th><td> <?php echo $fila["dro_componentes"] ?>   <?php echo $fila["dro_dosis"] ?></td>
         <td><select name="dro">
                                                <?php
                                          require "conect.php";
                                          $pro="SELECT * FROM  droga  ";
                                        
                                          $res=mysqli_query($conn,$pro);
                                          if(mysqli_affected_rows($conn)>0){
                                              while($fila=mysqli_fetch_assoc($res)){

                                          ?>

                                      <option value=<?php echo $fila["droga_id"] ?>>
                                      <?php echo $fila["dro_componentes"] ?>   <?php echo $fila["dro_dosis"] ?>  </option>

                                      <?php
                                          }
                                        }else{
                                            ?>
                                          <option>No hay Productos cargados</option>
                                          <?php
                                        }
                                      ?>
                          </select></td>
        <?php 
}else{?><strong style="text-align:center;color:red;">No hay Drogas cargados</strong><?php } ?> </tr>

<?php

require "conect.php";     
$sql="SELECT*FROM productos 
INNER JOIN laboratorios on productos.lab_id=laboratorios.lab_id
INNER JOIN droga on productos.droga_id=droga.droga_id
WHERE prod_id='$dato'";

$res=mysqli_query($conn,$sql);
  while($fila=mysqli_fetch_assoc($res)){
if(mysqli_num_rows($res)>0){ ?>
         <tr><th>Laboratorios</th><td><?php echo $fila["lab_nombre"] ?> </td>
         <td><select name="lab">
                                                     <?php
                                          require "conect.php";
                                          $la="SELECT * FROM  laboratorios";
                                        
                                          $lab=mysqli_query($conn,$la);
                                          if(mysqli_affected_rows($conn)>0){
                                              while($fila=mysqli_fetch_assoc($lab)){

                                          ?>

                                      <option value=<?php echo $fila["lab_id"] ?>><?php echo $fila["lab_nombre"] ?></option>

                                      <?php
                                          }
                                        }else{
                                            ?>
                                          <option>No hay Productos cargados</option>
                                          <?php
                                        }
                                      ?>
                          </select></td></tr>
        <?php 
}else{?><strong style="text-align:center;color:red;">No hay Laboratorios cargados</strong><?php } }?> </tr>
        
        
     </tbody>
     <?php } ?>

     </table>
     
     <input type=submit  value="Guardar cambios"  formaction="act_prod.php" class="btn btn-success">
     <input type=submit value="Cancelar"  formaction="producto.php" class="btn btn-danger">
     
     <br><br><br><br><br><br><br><br><br><br><br>
 </form>  
 </div>
<?php    
}    
}

function modif_lab($id){
   require "conect.php";     
$sql="SELECT*FROM laboratorios WHERE lab_id='$id'";

$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){?>

 <br><br><br><br><br><br>
 <form style="text-align:center;">
     <table class="table table-dark table-sm" style="width:600px;margin:auto;">
         <thead>
         <tr><th>Dato</th><th>Actual</th><th>Modificacion</th></tr>
         </thead>
        <?php  while($fila=mysqli_fetch_assoc($res)){   
         ?>
        <tbody>
            <input type=hidden name=lab_id value=<?php echo $fila["lab_id"] ?>> 
         <tr><th>Laboratorio</th><td><?php echo $fila["lab_nombre"] ?></td>                        
         <td><input type=text  name=lab_nombre value="<?php echo($fila['lab_nombre'])?>" required style="width:70px;height:50%;"></td></tr>
        
     </tbody>
     <?php } ?>

     </table>
     
     <input type=submit  value="Guardar cambios"  formaction="act_lab.php" class="btn btn-success">
     <input type=submit value="Cancelar"  formaction="laboratorio.php" class="btn btn-danger">
     <br><br><br><br><br><br><br><br><br><br><br>
 </form>  
 
<?php  
}
}

function modif_emp($id){
   require "conect.php"; 
   
$sql="SELECT*FROM empleados WHERE emp_id='$id'";

$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){?>

 <br><br><br><br><br><br><br><br>
 <div style="height: 465px; overflow-y: scroll;">
 <form style="text-align:center;overflow-y: scroll;">
     <table class="table table-dark table-sm" style="width:600px;margin:auto;">
         <thead>
         <tr><th>Dato</th><th>Actual</th><th>Modificacion</th></tr>
         </thead>
        <?php  while($fila=mysqli_fetch_assoc($res)){   
         ?>
        <tbody>
            <input type=hidden name=emp_id value=<?php echo $fila["emp_id"] ?>> 
         <tr><th>Nombre</th><td><?php echo $fila["emp_nom"] ?></td>                        
         <td><input type=text  name=emp_nom value="<?php echo($fila['emp_nom'])?>" required style="width:110px;height:70%;"></td></tr>
         
         <tr><th>Apellido</th><td><?php echo $fila["emp_ape"] ?></td>                        
         <td><input type=text  name=emp_ape value="<?php echo($fila['emp_ape'])?>" required style="width:110px;height:50%;"></td></tr>
         
         <tr><th>DNI</th><td><?php echo $fila["emp_dni"] ?></td>                        
         <td><input type=number  name=emp_dni value="<?php echo($fila['emp_dni'])?>" required style="width:110px;height:50%;"></td></tr>
         
         <tr><th>Telefono</th><td><?php echo $fila["emp_tel"] ?></td>                        
         <td><input type=text  name=emp_tel value="<?php echo($fila['emp_tel'])?>" required style="width:115px;height:50%;"></td></tr>
         
         <tr><th>Usuario</th><td><?php echo $fila["emp_usu"] ?></td>                        
         <td><input type=text  name=emp_usu value="<?php echo($fila['emp_usu'])?>" required style="width:110px;height:50%;"></td></tr>
         
         <tr><th>Contraseña</th><td><?php echo $fila["emp_pass"] ?></td>                        
         <td><input type=text  name=emp_pass value="<?php echo($fila['emp_pass'])?>" required style="width:110px;height:50%;"></td></tr>
         
         <?php     
         
$sql="SELECT*FROM empleados
INNER JOIN rol on empleados.rol_id=rol.rol_id
WHERE emp_id='$id'";

$res=mysqli_query($conn,$sql);

while($fila=mysqli_fetch_assoc($res)){
if(mysqli_num_rows($res)>0){ ?>
         <tr><th>Tipo de Usuario</th><td> <?php echo $fila["rol_desc"] ?></td>
         <td><select name="rol">
                                                <?php
                                          require "conect.php";
                                          $pro="SELECT * FROM rol";
                                        
                                          $res=mysqli_query($conn,$pro);
                                          if(mysqli_affected_rows($conn)>0){
                                              while($fila=mysqli_fetch_assoc($res)){

                                          ?>

                                      <option value=<?php echo $fila["rol_id"] ?>>
                                      <?php echo $fila["rol_desc"] ?></option>

                                      <?php
                                          }
                                        }else{
                                            ?>
                                          <option>No hay Productos cargados</option>
                                          <?php
                                        }
                                      ?>
                          </select></td>
        <?php 
}else{?><strong style="text-align:center;color:red;">No hay Drogas cargados</strong><?php } }?> </tr>
         
        
     </tbody>
     <?php } ?>

     </table>
     
     <input type=submit  value="Guardar cambios"  formaction="act_emp.php" class="btn btn-success">
     <input type=submit value="Cancelar"  formaction="nuevoemp.php" class="btn btn-danger">
     <br><br><br><br><br><br><br>
 </form>  
</div> 
<?php  
}
}
?>