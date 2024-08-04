<?php
session_start();

// Verificar si el usuario está autenticado y es administrador
if (!isset($_SESSION['id']) || $_SESSION['tipoUsuario'] != 1) {
    echo '<div style="text-align:center;">';
    echo '<h1 style="color:red;">Página Prohibida. Inicie Sesión</h1>';
    echo '<br><br><a href="index.php">Iniciar sesión</a>';
    echo '</div>';
    exit();
}

include "header.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <title>Nuevo Producto</title>
</head>
<body>
<main class="d-flex flex-nowrap">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
        <span class="fs-4"><a href="admin.php"><img src="imagenes/vecefarm.png" alt="Logo" style="width: 240px;"></a></span>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item"><a href="producto.php" class="nav-link text-white active"><i class="fa-solid fa-suitcase-medical"></i> Nuevo Producto</a></li>
            <li><a href="droga.php" class="nav-link text-white"><i class="fa-solid fa-capsules"></i> Nueva Droga</a></li>
            <li><a href="lote.php" class="nav-link text-white"><i class="fa-solid fa-box"></i> Nuevo Lote</a></li>
            <li><a href="laboratorio.php" class="nav-link text-white"><i class="fa-solid fa-industry"></i> Nuevo Laboratorio</a></li>
            <li><a href="nuevoemp.php" class="nav-link text-white"><i class="fa-solid fa-user-plus"></i> Nuevo Empleado</a></li>
            <li><a href="prod_list.php" class="nav-link text-white"><i class="fa-sharp fa-solid fa-clipboard-list"></i> Listar Productos</a></li>
            <li><a href="list.php" class="nav-link text-white"><i class="fa-solid fa-table-list"></i> Listar Lotes</a></li>
        </ul>
        <hr>
        <div class="dropup">
            <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
                <img src="imagenes/v.png" alt="Admin" width="32" height="32" class="rounded-circle me-2">
                <strong>Admin</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>

    <div class="b-example-divider b-example-vr"></div>

    <div class="container p-3">
        <div class="row">
            <div class="col-12">
                <?php if (isset($_SESSION['mensaje'])): ?>
                    <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['mensaje']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['mensaje']); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <h1>Nuevo Producto</h1>
        </div>

        <div class="row">
            <form action="alta_prod.php" method="POST" class="form-control">
                <div class="form-group">
                    <!-- <label for="id">Id Producto</label> -->
                    <!-- <input type="number" id="id" name="id" class="form-control" placeholder="Id Producto" required> -->
                </div>
                <div class="form-group">
                    <label for="marca">Laboratorio</label>
                    <input type="text" id="marca" name="marca" class="form-control" placeholder="Laboratorio" required>
                </div>
                <div class="form-group">
                    <label for="min">Stock Mínimo</label>
                    <input type="number" id="min" name="min" class="form-control" placeholder="Stock Mínimo" required>
                </div>
                <div class="form-group">
                    <label for="comp">Comprimidos</label>
                    <input type="number" id="comp" name="comp" class="form-control" placeholder="Comprimidos" required>
                </div>
                <div class="form-group">
                    <label for="pre">Precio</label>
                    <input type="number" id="pre" name="pre" class="form-control" placeholder="Precio $" required>
                </div>

                <?php
                require "funciones.php";
                $conn = conectar();
                $labQuery = "SELECT * FROM laboratorios";
                $labRes = mysqli_query($conn, $labQuery);

                if (mysqli_num_rows($labRes) > 0): ?>
                    <div class="form-group">
                        <label for="lab_p">Laboratorio</label>
                        <select name="lab_p" id="lab_p" class="form-select">
                            <?php while ($fila = mysqli_fetch_assoc($labRes)): ?>
                                <option value="<?= $fila["lab_id"] ?>"><?= $fila["lab_nombre"] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger" role="alert">
                        No hay laboratorios cargados.
                    </div>
                <?php endif; ?>

                <?php
                $drQuery = "SELECT * FROM droga";
                $drRes = mysqli_query($conn, $drQuery);

                if (mysqli_num_rows($drRes) > 0): ?>
                    <div class="form-group">
                        <label for="dro_p">Droga</label>
                        <select name="dro_p" id="dro_p" class="form-select">
                            <?php while ($fila = mysqli_fetch_assoc($drRes)): ?>
                                <option value="<?= $fila["droga_id"] ?>"><?= $fila["dro_componentes"] . " " . $fila["dro_dosis"] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger" role="alert">
                        No hay drogas cargadas.
                    </div>
                <?php endif; ?>

                <button class="btn-info" type="submit">Cargar Producto</button>
            </form>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://getbootstrap.com/docs/5.3/examples/sidebars/sidebars.js"></script>
</body>
</html>


      
