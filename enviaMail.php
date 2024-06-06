<?php
  session_start();
  $mail=$_GET['mail'];
  
  require "funciones.php";
  $conn = conectar();
  
  $sql="SELECT * FROM empleados where emp_email='$mail'";

  $resulset=mysqli_query($conn,$sql);

  $registro=mysqli_fetch_assoc($resulset);


    if($mail==$registro['emp_email']){
        $_SESSION['mensaje'] = 'Se envió el mail de recuperación a ' . $mail;
        $_SESSION['tipo_mensaje'] = 'success';
        header("location:index.php");
    }else {
        $_SESSION['mensaje'] = 'No existe el mail ' . $mail . ' en nuestra base' ;
        $_SESSION['tipo_mensaje'] = 'danger';
        header("location:olvidePass.php");
    }


?>