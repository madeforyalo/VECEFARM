<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <title>Document</title>
    </head>
    <body>
        
        <div class="wrapper">
            
            <img src="imagenes/vecefar.png" alt="" style="width: 527px;">
        </div>
        
        <div>
            <form action=/loggin.php >
                <div class="wrapper">
                    <div class="loggin">
                        <input type="text" name="usuario" placeholder="User" style="width: 100%;">
                        <?php
                        if(isset($_GET['usu'])){
                            echo"<h3 style=color:red;>No exite el usuario</h3>";
                        }?>
                        <input type="password" name="contra" placeholder="Password" style="width: 100%;">
                        <?php if(isset($_GET['pass'])){
                            echo"<h3 style=color:red;>Contraseña Incorrecta</h3>";
                        }
                        ?>
                        <button class="btn" type="submit" value="Loggin" name="aceptar">Ingresar</button>
                       
                    </div>
                </div>    
            </form>
     
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
          
        <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://getbootstrap.com/docs/5.3/examples/sidebars/sidebars.js"></script>

    </body>
</html>