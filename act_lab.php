<?php

session_start();
require_once "funciones.php";
$conn = conectar();

$id=$_GET['lab_id'];
$nom=$_GET['lab_nombre'];

$sql1= "SELECT * FROM laboratorios WHERE lab_nombre = '$nom'";
mysqli_query($conn,$sql1);
if (mysqli_affected_rows($conn)>0)
{
    $_SESSION['mensaje'] = "El laboratorio con el nombre $nombre ya existe";
    $_SESSION['tipo_mensaje'] = 'warning';
    header("location:laboratorio.php");
} else {

    $sql = "UPDATE laboratorios
        set lab_nombre='$nom'
        WHERE lab_id='$id'";
    
    $resulset=mysqli_query($conn,$sql);
    
    if(mysqli_affected_rows($conn)>0){
     $_SESSION['mensaje'] = "El laboratorio $nom fue actualizado exitosamente";
     $_SESSION['tipo_mensaje'] = 'success';
        if ($resulset){
            header("location:laboratorio.php");
        }
        
    
        }
        else{
            $_SESSION['mensaje'] = "No se pudo actualizar el laboratorio $nom";
            $_SESSION['tipo_mensaje'] = 'danger';
            if ($resulset){
                header("location: laboratorio.php");
            }
        }
}



?>