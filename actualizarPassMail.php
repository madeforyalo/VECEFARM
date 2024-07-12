<?php
    $pass_input = $_GET['password-input'];
    $id = $_GET['idEmp'];
    echo $pass_input;
    echo $id;
    // require "funciones.php";
    // $conn = conectar();

    // $sql="SELECT * FROM empleados where emp_id='$id'";
    // $resulset=mysqli_query($conn,$sql);
    // $registro=mysqli_fetch_assoc($resulset);
    // $pass = $registro['emp_pass'];
        
    //     if ($pass_input == $pass){
    //         $_SESSION['mensaje'] = 'El password no puede ser igual al anterior';
    //         $_SESSION['tipo_mensaje'] = 'danger';
    //         $url = 'http://' . $_SERVER["SERVER_NAME"] . '/vecefarm/cambioPassMail.php?id='. $registro['emp_id'];
    //         header("location:$url");
    //     }else{
    //         $sql1="UPDATE empleados set emp_pass='$pass_input' where emp_id='$id'";
    //         $resulset1=mysqli_query($conn,$sql1);
    //         $_SESSION['mensaje'] = "Se actualizo la contraseña correctamente";
    //         $_SESSION['tipo_mensaje'] = 'success';
    //         header("location:index.php");
    //     }
    
      ?>
