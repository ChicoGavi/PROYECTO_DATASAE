<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>DATASAE 360 2.0</title>
</head>
<body class="bg-primary">
    <img class=" fondo w-100 " src="IMAGENES/bg_autenticacion.png" alt="" srcset="">
        <div class="h-auto ">
            <div class=" w-50 position-absolute top-50 start-50 translate-middle m-4 formulario" >
                <form action="login.php" method="POST" class=" m-5  w-75 form-control p-5 border border-3 border-primary " >
                    <h1 class=" text-center p-2 ">Sistema de Gestion Academica</h1>
                    <label for="usuario"></label>
                    <input class="form-control text-center  " type="text" name="usuario" id="usuario" placeholder="Introduce tu usuario">
                    <div class="d-grid  gap-3 p-1">
                        <label for="password" class="form-label "></label>
                        <input type="password" id="password" name="password" class="  text-center form-control " aria-describedby="passwordHelpBlock" placeholder="Introduce tu contraseña">

                        <button class="btn btn-primary rounded-4 " type="submit">INGRESAR</button>
                        <?php

                        // Verificar si el usuario ya está auteticado
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                            // Redirección con JavaScript
                            echo '<script>window.location.href = "index.php";</script>';
                            exit;
                        }

                        // Procesar el formulario de login solo si se envió
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Verificar si los campos existen en $_POST
                            if (isset($_POST['usuario']) && isset($_POST['password'])) {
                                $username = $_POST['usuario'];
                                $password = $_POST['password'];

                                // Credenciales
                                $valid_username = "admin";
                                $valid_password = "admin"; //

                                if ($username === $valid_username && $password === $valid_password) {
                                    $_SESSION['loggedin'] = true;
                                    $_SESSION['username'] = $username;
                                    // Redirección con JavaScript
                                    echo '<script>window.location.href = "index.php";</script>';
                                    exit;
                                } else {
                                    $error = "<h5 class='text-danger text-center'>Usuario o contraseña incorrectos.</h5>";
                                    echo $error;
                                }
                            } 
                        }
                        ?>



                        <p class="text-center" ><a  href="#">¿Has olvidado la contraseña?</a></p>

                        <img src="IMAGENES/datasae360.png" alt="">
                    </div>
                    <div class="text-center">
                        <img src="IMAGENES/logo_datasae_360.png" alt="" srcset="">
                    </div>


                </form>



            </div>
        </div>

</body>
</html>