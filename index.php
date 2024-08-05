<?php
session_start();


?>
<!doctype html>
<html lang="es" data-bs-theme="dark">

<head>
  <title>Inicio - VECEFARM</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="icon" href="imagenes/v.png"> 
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }

    html,
    body {
      height: 100%;
    }

    .form-signin {
      max-width: 330px;
      padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    #caps-lock-message {
            display: none;
            color: white;
            font-weight: 200;
            margin-top: 5px;
            /* display: flex; */
            align-items: center;
        }
        .capslock-icon {
            margin-right: 2px;
        }
  </style>

</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

  <main class="form-signin w-100 m-auto">

    <div class="col-sm-12">
      <?php if (isset($_SESSION['mensaje'])) { ?>
          <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
              <?= $_SESSION['mensaje'] ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      <?php unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']);
      } ?>
    </div>

    <div class="container">
        <form action="loggin.php" class="needs-validation" novalidate method="POST">
            <img class="mb-4" src="imagenes/vecefarm.png" alt="" width="300" height="auto">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Usuario" name="usuario" required>
                <label for="floatingInput">Usuario</label>
                <div class="valid-feedback">Ok</div>
                <div class="invalid-feedback">Ingrese usuario</div>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="contra" required>
                <label for="floatingPassword">Password</label>
                <div class="valid-feedback">Ok</div>
                <div class="invalid-feedback">Ingrese contraseña</div>
            </div>

            <div id="caps-lock-message">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock-fill capslock-icon" viewBox="0 0 16 16">
                    <path d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816zM4.5 13.5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1z"/>
                </svg>
                Bloq Mayus está activado.
            </div>

            <div class="form-check text-start my-3">
                <a href="olvidePass.php" class="link-opacity-100-hover">Olvidé mi contraseña</a>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit" value="Loggin" name="aceptar">Ingresar</button>
        </form>
    </div>
  </main>

  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    <?php
      require "validaciondecampos.js";
    ?>
  </script>
   <script src="script.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
</body>

</html>