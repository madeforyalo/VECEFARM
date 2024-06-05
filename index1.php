<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="/css/style.css"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        <main class="form-signin w-100 m-auto">
            <form action=loggin.php class="form-signin" >
            <div class="">              
                <img class="mb-4" src="imagenes/vecefarm.png" alt="" style="width: 527px;">
            </div>
            
            
                
                    
                        <div>
                            <input type="text" name="usuario" placeholder="User" class="form-floating" id="floatingInput" autofocus="">
                            <?php
                            if(isset($_GET['usu'])){
                                echo"<h3 style=color:red;>No exite el usuario</h3>";
                            }?>
                            <input type="password" name="contra" placeholder="Password" class="form-floating">
                            <?php if(isset($_GET['pass'])){
                                echo"<h3 style=color:red;>Contraseña Incorrecta</h3>";
                            }
                            ?>
                            <button class="btn btn-primary w-100 py-2" type="submit" value="Loggin" name="aceptar">Ingresar</button>
                        
                        </div>
                        
                </form>
        
            
        </main>         
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://getbootstrap.com/docs/5.3/examples/sidebars/sidebars.js"></script>

    </body>
</html>