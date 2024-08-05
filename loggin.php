<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['usuario'];
    $contra = $_POST['contra'];

    require "funciones.php";
    $conn = conectar();

    // Consulta preparada para evitar inyección SQL
    $stmt = $conn->prepare("SELECT * FROM empleados WHERE emp_usu = ?");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $result = $stmt->get_result();
    $registro = $result->fetch_assoc();

    if ($registro) {
        if ($nombre === $registro['emp_usu'] && $contra === $registro['emp_pass']) {
            $_SESSION['id'] = $registro['emp_id'];
            $_SESSION['nombre'] = $registro['emp_nom'];
            $_SESSION['tipoUsuario'] = $registro['rol_id'];

            switch ($registro['rol_id']) {
                case 1:
                    header("Location: ./admin.php");
                    break;
                case 2:
                    header("Location: ./empleado.php");
                    break;
                default:
                    header("Location: ./index.php");
                    break;          
            }
            exit();
        } else {
            $_SESSION['mensaje'] = 'El Usuario y/o Contraseña son incorrectos';
            $_SESSION['tipo_mensaje'] = 'danger';
            header("Location: index.php");
            exit();
        }
    } else {
        $_SESSION['mensaje'] = 'El Usuario y/o Contraseña son incorrectos';
        $_SESSION['tipo_mensaje'] = 'danger';
        header("Location: index.php");
        exit();
    }
} else {
    $_SESSION['mensaje'] = 'Método no permitido';
    $_SESSION['tipo_mensaje'] = 'danger';
    header("Location: index.php");
    exit();
}
?>
