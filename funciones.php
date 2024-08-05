<?php

function conectar() // Función conectar BD
{
    $servidorBD = "localhost";
    $usuarioBD = "root";
    $passBD = "";
    $nombreBD = "farmacia";

    $conn = mysqli_connect($servidorBD, $usuarioBD, $passBD, $nombreBD) or die("No se pudo conectar");
    return $conn; 
};

function act_dro() // Actualizacion Drogas Admin
{
    $dro = $_GET['droga_id'];
    $comp = $_GET['dro_componentes'];
    $dos = $_GET['dro_dosis'];
    $conn = conectar();

    $sql = "UPDATE droga
    set droga_id='$dro',dro_componentes='$comp',dro_dosis='$dos'
    WHERE droga_id='$dro'";

    $resulset = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensaje'] = "Los datos se actualizaron exitosamente";
        $_SESSION['tipo_mensaje'] = 'success';
        if ($resulset) {
            header("location:./droga.php");
        }
    } else {
        $_SESSION['mensaje'] = "No se pudo actualizar los datos";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset) {
            header("location: ./droga.php");
        }
    }
};

function act_emp() // Actualizacion Empleados Admin
{
    $id = $_GET['emp_id'];
    $nom = $_GET['emp_nom'];
    $ape = $_GET['emp_ape'];
    $dni = $_GET['emp_dni'];
    $tel = $_GET['emp_tel'];
    $usu = $_GET['emp_usu'];
    $pass = $_GET['emp_pass'];
    $rol = $_GET['rol'];
    $conn = conectar();

    $sql = "UPDATE empleados
    set emp_nom='$nom',emp_ape='$ape',emp_dni='$dni',emp_tel='$tel',emp_usu='$usu',emp_pass='$pass',rol_id='$rol'
    WHERE emp_id='$id'";

    $resulset = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensaje'] = "El usuario $nom $ape fue actualizado exitosamente";
        $_SESSION['tipo_mensaje'] = 'success';
        if ($resulset) {
            header("location:./nuevoemp.php");
        }
    } else {
        $_SESSION['mensaje'] = "No se pudo actualizar el empleado $nom $ape";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset) {
            header("location: ./nuevoemp.php");
        }
    }
};

function act_lab() // Actualización Laboratorio Admin
{
    $id = $_GET['lab_id'];
    $nom = $_GET['lab_nombre'];
    $conn = conectar();

    $sql = "UPDATE laboratorios
    set lab_nombre='$nom'
    WHERE lab_id='$id'";

    $resulset = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensaje'] = "Nombre del laboratorio:$nom  actualizado exitosamente";
        $_SESSION['tipo_mensaje'] = 'success';
        if ($resulset) {
            header("location:./laboratorio.php");
        }
    } else {
        $_SESSION['mensaje'] = "No se pudo actualizar el laboratorio $nom";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset) {
            header("location: ./laboratorio.php");
        }
    }
};

function act_lote() // Actualización Lote Admin
{
    $lote = $_GET['actual'];
    $id = $_GET['lote_id'];
    $fec_ing = $_GET['lote_fec_ing'];
    $ven = $_GET['lote_venci'];
    $cant = $_GET['lote_cant'];
    $prod = $_GET['producto'];
    $emp = $_SESSION['id'];
    $conn = conectar();

    $b = "SELECT*FROM productos WHERE prod_id='$prod'";

    $n = mysqli_query($conn, $b);

    while ($fila = mysqli_fetch_assoc($n)) {
        $a = $fila['prod_stock_actual'];
    }

    $re = "SELECT*FROM lotes WHERE lote_id='$lote'";
    $res = mysqli_query($conn, $re);

    while ($fila = mysqli_fetch_assoc($res)) {
        $resto = $fila['lote_cant'];
    }

    $a = $a - $resto;

    $a = $a + $cant;

    if ($a < 0) {
        $a = 0;
    }

    if ($cant < 0) {
        $cant = 0;
    }

    $act = "UPDATE productos
     SET prod_stock_actual=$a
      WHERE prod_id='$prod'";
    $resul = mysqli_query($conn, $act);


    $sql = "UPDATE lotes
    set lote_id='$id',lote_fec_ing='$fec_ing',lote_venci='$ven',lote_cant='$cant',prod_id='$prod',emp_id='$emp'
    WHERE lote_id='$lote'";

    $resulset = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensaje'] = "El lote se actualizo exitosamente";
        $_SESSION['tipo_mensaje'] = 'success';
        if ($resulset) {
            header("location:./list.php");
        }
    } else {
        $_SESSION['mensaje'] = "No se pudo actualizar el lote";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset) {
            header("location: list.php");
        }
    }
};

function act_prod() // Actualización Producto Admin
{
    $prod = $_GET['prod_id'];
    $marc = $_GET['prod_marca'];
    $stock_min = $_GET['prod_stock_min'];
    $comp = $_GET['prod_cant_comprimidos'];
    $pre = $_GET['prod_precio'];
    $dro = $_GET['dro'];
    $lab = $_GET['lab'];
    $conn = conectar();

    $sql = "UPDATE productos
    set prod_marca='$marc',prod_stock_min='$stock_min',prod_cant_comprimidos='$comp',prod_precio='$pre',droga_id='$dro',lab_id='$lab'
    WHERE prod_id='$prod'";

    $resulset = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensaje'] = "Los datos se actualizaron exitosamente";
        $_SESSION['tipo_mensaje'] = 'success';
        if ($resulset) {
            header("location:./producto.php");
        }
    } else {
        $_SESSION['mensaje'] = "No se pudo actualizar los datos";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset) {
            header("location: ./producto.php");
        }
    }
};

// function act_pass(){
//     $pass = $_GET['password-input'];
//     $conn = conectar();
//     $sql="SELECT * FROM empleados where emp_id='$id'";

//     $resulset=mysqli_query($conn,$sql);

//     $registro=mysqli_fetch_assoc($resulset);

//     if ($pass == $registro['emp_pass']){
//         $_SESSION['mensaje'] = 'El password no puede ser igual al anterior';
//         $_SESSION['tipo_mensaje'] = 'danger';}

// }

function al_emp_lote() // Alta Lote Empleado
{
    if (isset($_GET['producto'])) {
        $id = $_GET['id'];
        $fec_in = $_GET['fec_in'];
        $ven = $_GET['venc'];
        $cant = $_GET['cant'];
        $prod = $_GET['producto'];
        $emp = $_SESSION['id'];
        $conn = conectar();

        if ($fec_in < $ven) {
            $ver = "SELECT*FROM lotes WHERE lote_id='$id'";

            $verif = mysqli_query($conn, $ver);

            if (mysqli_fetch_assoc($verif) == 0) {

                if ($cant > 0) {
                    $r = "INSERT INTO lotes values('$id','$fec_in','$ven','$cant','$prod','$emp')";

                    $resulset = mysqli_query($conn, $r);


                    if (mysqli_affected_rows($conn) > 0) {

                        $b = "SELECT*FROM productos WHERE prod_id='$prod'";

                        $n = mysqli_query($conn, $b);

                        while ($fila = mysqli_fetch_assoc($n)) {
                            $a = $fila['prod_stock_actual'];
                        }
                        $a = $a + $cant;

                        $res = "UPDATE productos
                                SET prod_stock_actual=$a
                                WHERE prod_id=$prod";
                        $resul = mysqli_query($conn, $res);

                        if (mysqli_affected_rows($conn) > 0) {
                            $_SESSION['mensaje'] = "El lote se cargo exitosamente";
                            $_SESSION['tipo_mensaje'] = 'success';
                            if ($resulset) {
                                header("location:./emp_lote.php");
                            }
                        } else {
                            $_SESSION['mensaje'] = "No se pudo cargar el lote";
                            $_SESSION['tipo_mensaje'] = 'danger';
                            if ($resulset) {
                                header("location:/emp_lote.php");
                            }
                        }
                    }
                } else {
                    $_SESSION['mensaje'] = "No se pudo cargar el lote la cantidad es menor a 0";
                    $_SESSION['tipo_mensaje'] = 'danger';

                    header("location:/emp_lote.php");
                }
            } else {
                $_SESSION['mensaje'] = "No se pudo cargar el lote";
                $_SESSION['tipo_mensaje'] = 'danger';
                if ($verif) {
                    header("location: /emp_lote.php");
                }
            }
        } else {
            $_SESSION['mensaje'] = "No se pude cargar el lote las fechas estan mal cargadas";
            $_SESSION['tipo_mensaje'] = 'danger';

            header("location: /emp_lote.php");
        }
    } else {
        $_SESSION['mensaje'] = "No se pude cargar el lote hasta que cargue el producto";
        $_SESSION['tipo_mensaje'] = 'danger';
        header("location: /emp_lote.php");
    }
};
function alta_lab($nombre) {
    // Conectar a la base de datos
    $conn = conectar();
    if (!$conn) {
        $_SESSION['mensaje'] = "Error de conexión a la base de datos";
        $_SESSION['tipo_mensaje'] = 'danger';
        header("Location: laboratorio.php");
        exit();
    }

    // Preparar y ejecutar la consulta para verificar si el laboratorio ya existe
    $sql = $conn->prepare("SELECT * FROM laboratorios WHERE lab_nombre = ?");
    if (!$sql) {
        $_SESSION['mensaje'] = "Error al preparar la consulta: " . $conn->error;
        $_SESSION['tipo_mensaje'] = 'danger';
        header("Location: laboratorio.php");
        exit();
    }
    
    $sql->bind_param("s", $nombre);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // Si el laboratorio ya existe
        $_SESSION['mensaje'] = "El laboratorio con el nombre $nombre ya existe";
        $_SESSION['tipo_mensaje'] = 'warning';
    } else {
        // Si el laboratorio no existe, insertar uno nuevo
        $sql_insert = $conn->prepare("INSERT INTO laboratorios (lab_nombre) VALUES (?)");
        if (!$sql_insert) {
            $_SESSION['mensaje'] = "Error al preparar la consulta de inserción: " . $conn->error;
            $_SESSION['tipo_mensaje'] = 'danger';
            header("Location: laboratorio.php");
            exit();
        }
        
        $sql_insert->bind_param("s", $nombre);
        if ($sql_insert->execute()) {
            $_SESSION['mensaje'] = "El laboratorio $nombre fue cargado con éxito";
            $_SESSION['tipo_mensaje'] = 'success';
        } else {
            $_SESSION['mensaje'] = "No se pudo cargar el laboratorio $nombre";
            $_SESSION['tipo_mensaje'] = 'danger';
        }
    }

    // Cerrar conexiones y liberaciones de recursos
    $sql->close();
    $sql_insert->close();
    $conn->close();

    // Redirigir a la página laboratorio.php
    // header("Location: laboratorio.php");
    // exit();
}




function alta_lote() // Alta Lote Admin
{
    if (isset($_GET['producto'])) {
        $id = $_GET['id'];
        $fec_in = $_GET['fec_in'];
        $ven = $_GET['venc'];
        $cant = $_GET['cant'];
        $prod = $_GET['producto'];
        $emp = $_SESSION['id'];
        $conn = conectar();

        if ($fec_in < $ven) {
            $ver = "SELECT*FROM lotes WHERE lote_id='$id'";

            $verif = mysqli_query($conn, $ver);

            if (mysqli_fetch_assoc($verif) == 0) {
                if ($cant > 0) {
                    $r = "INSERT  INTO lotes values('$id','$fec_in','$ven','$cant','$prod','$emp')";

                    $resulset = mysqli_query($conn, $r);


                    if (mysqli_affected_rows($conn) > 0) {

                        $b = "SELECT*FROM productos WHERE prod_id='$prod'";

                        $n = mysqli_query($conn, $b);

                        while ($fila = mysqli_fetch_assoc($n)) {
                            $a = $fila['prod_stock_actual'];
                        }
                        $a = $a + $cant;

                        $res = "UPDATE productos
         SET prod_stock_actual=$a
          WHERE prod_id=$prod";
                        $resul = mysqli_query($conn, $res);

                        if (mysqli_affected_rows($conn) > 0) {
                            $_SESSION['mensaje'] = "El lote se cargo exitosamente";
                            $_SESSION['tipo_mensaje'] = 'success';
                            if ($resulset) {
                                header("location:./lote.php");
                            }
                        } else {
                            $_SESSION['mensaje'] = "No se pudo cargar el lote";
                            $_SESSION['tipo_mensaje'] = 'danger';
                            if ($resulset) {
                                header("location: lote.php");
                            }
                        }
                    }
                } else {
                    $_SESSION['mensaje'] = "No se pude cargar el lote la cantidad ingresada es menor a 0";
                    $_SESSION['tipo_mensaje'] = 'danger';
                    if ($verif) {
                        header("location: lote.php");
                    }
                }
            } else {
                $_SESSION['mensaje'] = "No se pudo cargar el lote";
                $_SESSION['tipo_mensaje'] = 'danger';
                if ($verif) {
                    header("location: lote.php");
                }
            }
        } else {
            $_SESSION['mensaje'] = "No se pude cargar el lote las fechas estan mal cargadas";
            $_SESSION['tipo_mensaje'] = 'danger';

            header("location: lote.php");
        }
    } else {
        $_SESSION['mensaje'] = "No se pude cargar el lote hasta que cargue el producto";
        $_SESSION['tipo_mensaje'] = 'danger';
        header("location: lote.php");
    }
};

function alta_prod_emp() // Alta Producto Empleado
{
    $conn = conectar();
    $id = $_GET['id'];
    $marca = $_GET['marca'];
    $act = 0;
    $min = $_GET['min'];
    $comp = $_GET['comp'];
    $pre = $_GET['pre'];
    if (isset($_GET['lab_p']) && isset($_GET['dro_p'])) {
        $lab = $_GET['lab_p'];
        $dro = $_GET['dro_p'];

        $sq = "SELECT*FROM productos WHERE prod_id='$id'";
        $ver = mysqli_query($conn, $sq);

        if (mysqli_num_rows($ver) < 1) {

            $s = "INSERT INTO productos values('$id','$marca','$act','$min','$comp','$pre','$dro','$lab')";

            $resulset = mysqli_query($conn, $s);


            if (mysqli_affected_rows($conn) > 0) {
                $_SESSION['mensaje'] = "El producto de la marca $marca se cargo exitosamente";
                $_SESSION['tipo_mensaje'] = 'success';
                if ($resulset) {
                    header("location: emp_prod.php");
                }
            } else {
                $_SESSION['mensaje'] = "No se pudo cargar el producto de $marca";
                $_SESSION['tipo_mensaje'] = 'danger';
                if ($resulset) {
                    header("location: emp_prod.php");
                }
            }
        } else {
            $_SESSION['mensaje'] = "No se pude cargar el producto de $marca  ya que esta previamente cargado";
            $_SESSION['tipo_mensaje'] = 'danger';
            header("location: emp_prod.php");
        }
    } else {
        $_SESSION['mensaje'] = "No se pude cargar el producto de $marca hasta que cargue los laboratorios y drogas";
        $_SESSION['tipo_mensaje'] = 'danger';
        header("location: emp_prod.php");
    }
};

function alta_prod() // Alta producto Admin
{
    $conn = conectar();
    $id = $_GET['id'];
    $marca = $_GET['marca'];
    $act = 0;
    $min = $_GET['min'];
    $comp = $_GET['comp'];
    $pre = $_GET['pre'];
    if (isset($_GET['lab_p']) && isset($_GET['dro_p'])) {
        $lab = $_GET['lab_p'];
        $dro = $_GET['dro_p'];

        $sq = "SELECT*FROM productos WHERE prod_id='$id'";
        $ver = mysqli_query($conn, $sq);

        if (mysqli_num_rows($ver) < 1) {

            $s = "INSERT INTO productos values('$id','$marca','$act','$min','$comp','$pre','$dro','$lab')";

            $resulset = mysqli_query($conn, $s);


            if (mysqli_affected_rows($conn) > 0) {
                $_SESSION['mensaje'] = "El producto de la marca $marca se cargo exitosamente";
                $_SESSION['tipo_mensaje'] = 'success';
                if ($resulset) {
                    header("location: producto.php");
                }
            } else {
                $_SESSION['mensaje'] = "No se pudo cargar el producto de $marca";
                $_SESSION['tipo_mensaje'] = 'danger';
                if ($resulset) {
                    header("location: producto.php");
                }
            }
        } else {
            $_SESSION['mensaje'] = "No se pude cargar el producto de $marca  ya que esta previamente cargado";
            $_SESSION['tipo_mensaje'] = 'danger';
            header("location: producto.php");
        }
    } else {
        $_SESSION['mensaje'] = "No se pude cargar el producto de $marca hasta que cargue los laboratorios y drogas";
        $_SESSION['tipo_mensaje'] = 'danger';
        header("location: producto.php");
    }
};

function car_drog() // Cargar Droga Empleado y Admin
{
    $conn = conectar();
    $id=$_GET['id'];
    $comp=$_GET['comp'];
    $dosis=$_GET['dosis'];

    $SQL="INSERT INTO droga values('$id','$comp','$dosis')";

    $resulset=mysqli_query($conn,$SQL);


    if(mysqli_affected_rows($conn)>0){

        $_SESSION['mensaje'] = "La Droga $comp se cargo exitosamente";
        $_SESSION['tipo_mensaje'] = 'success';
        if ($resulset){
            header("location: droga.php");
        }
        
        }
    else{
        $_SESSION['mensaje'] = "No se pudo cargar la droga $comp";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset){
            header("location: droga.php");
        }
    }
};

function carga() // Carga de Nuevo Empleado
{
    $conn = conectar();
    $id=$_GET['id'];
    $nom=$_GET['nom'];
    $ape=$_GET['ape'];
    $dni=$_GET['dni'];
    $tel=$_GET['tel'];
    $usu=$_GET['usu'];
    $cont=$_GET['pass'];
    $tipo=$_GET['tipo'];

    require "conect.php";

    $SQL="INSERT INTO empleados(emp_id,emp_nom,emp_ape,emp_dni,emp_tel,emp_usu,emp_pass,rol_id) 
    values ('$id','$nom','$ape','$dni','$tel','$usu','$cont','$tipo')";

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
};

function elim_dro() // Eliminar Droga
{
    $elec=$_GET['elec'];
    $comp=$_GET['comp'];
    $dosis=$_GET['dosis'];
    $conn = conectar();

    $p="SELECT * FROM productos WHERE droga_id='$elec'";
    $pr=mysqli_query($conn,$p);
    while($fila=mysqli_fetch_assoc($pr)){
        $prod=$fila['prod_id'];


    $lot="DELETE FROM lotes WHERE prod_id='$prod'";
    $fa=mysqli_query($conn,$lot);

    $pro="DELETE FROM productos WHERE prod_id='$prod'";

    $j=mysqli_query($conn,$pro);
    }

    $el="DELETE FROM droga WHERE droga_id='$elec'";

    $resul=mysqli_query($conn,$el);

    if(mysqli_affected_rows($conn)>0){
    $_SESSION['mensaje'] = "La droga:$comp $dosis fue eliminada exitosamente";
    $_SESSION['tipo_mensaje'] = 'success';
        if ($resul){
            header("location:./droga.php");
        }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo eliminar la droga: $comp $dosis";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resul){
            header("location: ./droga.php");
        }
    }
};

function elim_emp() // Eliminar Empleado
{
    $id=$_GET['sel'];
    $nom=$_GET['nom'];
    $ape=$_GET['ape'];
    $emp=$_SESSION['id'];
    $conn = conectar();

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
};

function elim_lab() // Elimina Laboratorio
{
    $id=$_GET['id'];
    $nom=$_GET['nom'];
    $conn = conectar();

    $p="SELECT * FROM productos WHERE lab_id='$id'";
    $pr=mysqli_query($conn,$p);
    while($fila=mysqli_fetch_assoc($pr)){
        $prod=$fila['prod_id'];


    $lot="DELETE FROM lotes WHERE prod_id='$prod'";
    $fa=mysqli_query($conn,$lot);

    $pro="DELETE FROM productos WHERE prod_id='$prod'";

    $j=mysqli_query($conn,$pro);
    }

    $el="DELETE FROM laboratorios WHERE lab_id='$id'";

    $resul=mysqli_query($conn,$el);

    if(mysqli_affected_rows($conn)>0){
    $_SESSION['mensaje'] = "el laboratorio $nom fue eliminado exitosamente";
    $_SESSION['tipo_mensaje'] = 'success';
        if ($resul){
            header("location:./laboratorio.php");
        }

    }
    else{
        $_SESSION['mensaje'] = "No se pudo eliminar el laboratorio $nom";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resul){
            header("location: ./laboratorio.php");
        }
    }
};

function elim_prod() // Elimina Producto
{
    $prod=$_GET['sel'];
    $comp=$_GET['comp'];
    $dosis=$_GET['dos'];
    $marc=$_GET['marc'];
    $conn = conectar();

    $p="SELECT * FROM lotes WHERE prod_id='$prod'";
    $pr=mysqli_query($conn,$p);
    while($fila=mysqli_fetch_assoc($pr)){
        $lot=$fila['lote_id'];


    $lot="DELETE FROM lotes WHERE lote_id='$lot'";

    $fa=mysqli_query($conn,$lot);

    }


    $pro="DELETE FROM productos WHERE prod_id='$prod'";

    $resul=mysqli_query($conn,$pro);

    if(mysqli_affected_rows($conn)>0){
    $_SESSION['mensaje'] = "El Producto:$comp $dosis de la marca $marc fue eliminado exitosamente";
    $_SESSION['tipo_mensaje'] = 'success';
        if ($resul){
            header("location:./prod_list.php");
        }
    

    }
    else{
        $_SESSION['mensaje'] = "No se pudo eliminar el producto";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resul){
            header("location: ./prod_list.php");
        }
    }
};

function elim_lote() //Este se llamaba elim.php 
{
    $el=$_GET['sel'];
    $cant=$_GET['cant'];
    $prod=$_GET['prod'];
    $conn = conectar();

    $r="DELETE FROM lotes WHERE lote_id='$el'";

    $resulset=mysqli_query($conn,$r);


    if(mysqli_affected_rows($conn)>0){

    $b="SELECT*FROM productos WHERE prod_id='$prod'";

    $n=mysqli_query($conn,$b);

    while($fila=mysqli_fetch_assoc($n)){
        $a=$fila['prod_stock_actual'];
    }
    $a=$a-$cant;

    if($a<0){
        $a=0;
    }

    $res="UPDATE productos
    SET prod_stock_actual=$a
    WHERE prod_id='$prod'";
    $resul=mysqli_query($conn,$res);

    if(mysqli_affected_rows($conn)>0){
    $_SESSION['mensaje'] = "El lote fue eliminado exitosamente";
    $_SESSION['tipo_mensaje'] = 'success';
        if ($resulset){
            header("location:./list.php");
        }
    
    }
    else{
        $_SESSION['mensaje'] = "No se pudo eliminar el lote";
        $_SESSION['tipo_mensaje'] = 'danger';
        if ($resulset){
            header("location: ./list.php");
        }
    }
    }
};

