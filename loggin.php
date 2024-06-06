<?php
  session_start();
  $nombre=$_GET['usuario'];
  $contra=$_GET['contra'];

  require "funciones.php";
  $conn = conectar();
  
  $sql="SELECT * FROM empleados where emp_usu='$nombre'";

  $resulset=mysqli_query($conn,$sql);

  $registro=mysqli_fetch_assoc($resulset);

  if(mysqli_affected_rows($conn)>0){

    if($nombre==$registro['emp_usu']){
      if($contra==$registro['emp_pass']){
        $_SESSION['id']=$registro['emp_id'];
        $_SESSION['nombre']=$registro['emp_nom'];
        $_SESSION['tipoUsuario']=$registro['rol_id'];

        switch($registro['rol_id']){
          case 1:
            header("Location:./admin.php");
            break;
          case 2:
            header("Location:./empleado.php");
            break;
          default:
          break;          
        }
    }else {
      $_SESSION['mensaje'] = 'El Usuario y/o Contraseña son incorrectos';
      $_SESSION['tipo_mensaje'] = 'danger';
      header("location:index.php");        
    }
  }
}
   else {
    $_SESSION['mensaje'] = 'El Usuario y/o Contraseña son incorrectos';
    $_SESSION['tipo_mensaje'] = 'danger';
    header("location:index.php");
   }

?>