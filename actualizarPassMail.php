<?php
    $pass_input = $_GET['password-input'];
    $id = $_GET['idEmp'];
    
    require "funciones.php";
    $conn = conectar();

    $sql="SELECT * FROM empleados where emp_id='$id'";
    $resulset=mysqli_query($conn,$sql);
    $registro=mysqli_fetch_assoc($resulset);
    $pass = $registro['emp_pass'];
        
        if ($pass_input == $pass){
            $_SESSION['mensaje'] = 'El password no puede ser igual al anterior';
            $_SESSION['tipo_mensaje'] = 'danger';
            // $url = 'http://' . $_SERVER["SERVER_NAME"] . '/vecefarm/cambioPassMail.php?id='. $registro['emp_id'];
            // header("location:$url");
            echo "La contraseña ya fue utilizada";
        }else{
            $sql1="UPDATE empleados set emp_pass='$pass_input' where emp_id='$id'";
            $resulset1=mysqli_query($conn,$sql1);

            echo "La contraseña se actualizo correctamente.";
            ?>
            <a href="index.php" class= "btn btn-info"> Volver a Inicio</a>
          
            <?php

              // $_SESSION['mensaje'] = "Se actualizo la contraseña correctamente";
            // $_SESSION['tipo_mensaje'] = 'success';
            // header("location:index.php");
        }
        ?>
    
     
