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
  <link rel="stylesheet" href="icon/css/all.css">
    <link rel="stylesheet" href="icon/css/fontawesome.min.css">
  <style>
    .wrong .fa-check {
    display: none;
    }

    .good .fa-times {
        display: none;
    }

    .valid-feedback,
    .invalid-feedback {
    margin-left: calc(2em + 0.25rem + 1.5rem);
    }

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

    <form class="" action="actualizarPassMail.php" method="GET" novalidate>

                <?php
                $id = $_GET['id'];

                require "funciones.php";
                $conn = conectar();

                $sql="SELECT * FROM empleados where emp_id='$id'";
                $resulset=mysqli_query($conn,$sql);
                $registro=mysqli_fetch_assoc($resulset);

                $pass = $registro['emp_pass'];


                ?>

      <img class="mb-4" src="imagenes/vecefarm.png" alt="" width="300" height="auto">

      <input type="text" name="idEmp" id="idEmp" value="<?php $registro['emp_id'] ?>">

      <div class="form-floating">
        <input type="password" class="form-control" id="password-input" name="password-input" required>
        <label for="password-input">Nueva contraseña:</label>
        <div class="valid-feedback">Ok!</div>
        <div class="invalid-feedback">Ingrese contraseña valida</div>
      </div>
      <div class="col-6 mt-4 mt-xxl-0 w-auto h-auto">

    <div
      data-mdb-alert-init class="alert px-4 py-3 mb-0 d-none"
      role="alert"
      data-mdb-color="warning"
      id="password-alert"
      >
      <ul class="list-unstyled mb-0">
        <li class="requirements leng">
          <i class="fas fa-check text-success me-2"></i>
          <i class="fas fa-times text-danger me-3"></i>
          Su contraseña debe tener al menos 8 caracteres</li>
        <li class="requirements big-letter">
          <i class="fas fa-check text-success me-2"></i>
          <i class="fas fa-times text-danger me-3"></i>
          Su contraseña debe tener al menos 1 letra mayuscula.</li>
        <li class="requirements num">
          <i class="fas fa-check text-success me-2"></i>
          <i class="fas fa-times text-danger me-3"></i>
          Su contraseña debe tener al menos 1 numero.</li>
      </ul>
    </div>

      <?php
      
      ?>
      <div class="form-floating">
        <input type="password" class="form-control" id="confirm-password-input" name="confirm-password-input" required>
        <label for="confirm-password-input">Confirmar Contraseña:</label>
        <div class="valid-feedback">
          Ok
        </div>
        <div class="invalid-feedback">
          Las contraseñas tienen que ser iguales
        </div>
      </div>
      
      
      <button class="btn btn-primary w-100 py-2 mt-3" type="submit" name="aceptar">Aceptar</button>
    </form>

    
  </main>

    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        addEventListener("DOMContentLoaded", (event) => {
        const password = document.getElementById("password-input");
        const confirmPassword = document.getElementById("confirm-password-input");
        const passwordAlert = document.getElementById("password-alert");
        const confirmPasswordAlert = document.getElementById("confirm-password-alert");
        const requirements = document.querySelectorAll(".requirements");
        const leng = document.querySelector(".leng");
        const bigLetter = document.querySelector(".big-letter");
        const num = document.querySelector(".num");

        requirements.forEach((element) => element.classList.add("wrong"));

        password.addEventListener("focus", () => {
            passwordAlert.classList.remove("d-none");
            if (!password.classList.contains("is-valid")) {
                password.classList.add("is-invalid");
            }
        });

        password.addEventListener("input", () => {
            validatePassword();
        });

        password.addEventListener("blur", () => {
            passwordAlert.classList.add("d-none");
        });

        confirmPassword.addEventListener("input", () => {
            validateConfirmPassword();
        });

        function validatePassword() {
            const value = password.value;
            const isLengthValid = value.length >= 8;
            const hasUpperCase = /[A-Z]/.test(value);
            const hasNumber = /\d/.test(value);

            leng.classList.toggle("good", isLengthValid);
            leng.classList.toggle("wrong", !isLengthValid);
            bigLetter.classList.toggle("good", hasUpperCase);
            bigLetter.classList.toggle("wrong", !hasUpperCase);
            num.classList.toggle("good", hasNumber);
            num.classList.toggle("wrong", !hasNumber);

            const isPasswordValid = isLengthValid && hasUpperCase && hasNumber;

            if (isPasswordValid) {
                password.classList.remove("is-invalid");
                password.classList.add("is-valid");

                requirements.forEach((element) => {
                    element.classList.remove("wrong");
                    element.classList.add("good");
                });

                passwordAlert.classList.remove("alert-warning");
                passwordAlert.classList.add("alert-success");
            } else {
                password.classList.remove("is-valid");
                password.classList.add("is-invalid");

                passwordAlert.classList.add("alert-warning");
                passwordAlert.classList.remove("alert-success");
            }

            validateConfirmPassword();
        }

        function validateConfirmPassword() {
            const isPasswordValid = password.classList.contains("is-valid");
            const doPasswordsMatch = password.value === confirmPassword.value;

            if (isPasswordValid && doPasswordsMatch) {
                confirmPassword.classList.remove("is-invalid");
                confirmPassword.classList.add("is-valid");

                confirmPasswordAlert.classList.remove("alert-warning");
                confirmPasswordAlert.classList.add("alert-success");
                confirmPasswordAlert.textContent = "Passwords match!";
            } else {
                confirmPassword.classList.remove("is-valid");
                confirmPassword.classList.add("is-invalid");

                confirmPasswordAlert.classList.add("alert-warning");
                confirmPasswordAlert.classList.remove("alert-success");
                confirmPasswordAlert.textContent = "Passwords do not match.";
                }
            }
        });
    </script>

</body>

</html>