<?php
session_start();
require_once "funciones.php";
$conn = conectar();


$id=$_GET['emp_id'];
$nom=$_GET['emp_nom'];
$ape=$_GET['emp_ape'];
$dni=$_GET['emp_dni'];
$tel=$_GET['emp_tel'];
$email=$_GET['emp_email'];
$usu=$_GET['emp_usu'];
$pass=$_GET['emp_pass'];
$rol=$_GET['rol'];



$sql="UPDATE empleados
set emp_nom='$nom',emp_ape='$ape',emp_dni='$dni',emp_tel='$tel', emp_email='$email',emp_usu='$usu',emp_pass='$pass',rol_id='$rol'
WHERE emp_id='$id'";

$resulset=mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "El usuario $nom $ape fue actualizado exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resulset){
        header("location:./nuevoemp.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo actualizar el empleado $nom $ape";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset){
            header("location: ./nuevoemp.php");
        }
    }


?>