<?php
session_start();

require_once "funciones.php";
$conn = conectar();

$id=$_GET['sel'];
$nom=$_GET['nom'];
$ape=$_GET['ape'];
$emp=$_SESSION['id'];

$p="SELECT * FROM empleados WHERE emp_id='$id'";
$pr=mysqli_query($conn,$p);
if($id!=0){
    if($id!=$emp){
$re="SELECT*FROM lotes WHERE emp_id='$id'";

$r=mysqli_query($conn,$re);
while($fila=mysqli_fetch_assoc($r)){
    $lot=$fila["lote_id"];
    
$up="UPDATE lotes
set emp_id=0
WHERE lote_id='$lot'";

$fin=mysqli_query($conn,$up);
}
$el="DELETE FROM empleados WHERE emp_id='$id'";

$resul=mysqli_query($conn,$el);

if(mysqli_affected_rows($conn)>0){
 $_SESSION['mensaje'] = "El usuario $nom $ape fue eliminado exitosamente";
 $_SESSION['tipo_mensaje'] = 'success';
    if ($resul){
        header("location:./nuevoemp.php");
    }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pude eliminar al usuario $nom $ape";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resul){
            header("location: ./nuevoemp.php");
        }
    }
    
}else{  $_SESSION['mensaje'] = "No se pude eliminar el usuario con el que estas logueado ";
        $_SESSION['tipo_mensaje'] = 'danger';
            header("location: ./nuevoemp.php");}
            
}else{
        $_SESSION['mensaje'] = "No se pude eliminar al usuario $nom (Super Usuario) ";
        $_SESSION['tipo_mensaje'] = 'danger';
            header("location: ./nuevoemp.php");
        
    }

?>