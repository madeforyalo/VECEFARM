<?php
    session_start();

    require_once "funciones.php";
    $conn = conectar();
   
    $nom=$_GET['nom'];
    $ape=$_GET['ape'];
    $dni=$_GET['dni'];
    $tel=$_GET['tel'];
    $email=$_GET['email'];
    $usu=$_GET['usu'];
    $cont=$_GET['pass'];
    $tipo=$_GET['tipo'];

   

    $SQL="INSERT INTO empleados(emp_nom,emp_ape,emp_dni,emp_tel,emp_email,emp_usu,emp_pass,rol_id) 
    values ('$nom','$ape','$dni','$tel','$email','$usu','$cont','$tipo')";

    $resulset=mysqli_query($conn,$SQL);


    if(mysqli_affected_rows($conn)>0){

        $_SESSION['mensaje'] = "El usuario $nom $ape  fue cargado con exito";
        $_SESSION['tipo_mensaje'] = 'success';
        if ($resulset){
            header("location: nuevoemp.php");
        }
        
        }
    else{
        $_SESSION['mensaje'] = "No se pudo cargar al cliente $nom $ape";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset){
            header("location: nuevoemp.php");
        }

    }
?>