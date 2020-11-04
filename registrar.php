<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/registrar.css">
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row relleno">
            <div class="col l4 m4 s12">
            </div>
            <div class="col l4 m4 s12 fondo">
                <h2 class="center">App Links</h2>
                <h5 class="center">Guarda tus páginas web</h5>

                <form action="controllers/ControlRegistrar.php" method="POST">
                    <div class="input-field">
                        <input id="email" type="email" name="email">
                        <label for="email">Ingrese un email</label>
                    </div>
                    <div class="input-field">
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Ingrese su nombre</label>
                    </div>
                    <div class="input-field">
                        <input id="clave" type="password" name="clave">
                        <label for="clave">Ingrese una clave</label>
                    </div>
                    <button class="btn boton">Registrar</button>
                    <p class="center">
                        <a href="index.php">Volver</a>
                    </p>
                </form>
                <p class="red-text">
                    <?php
                        session_start();
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                </p>
                <p class="green-text">
                    <?php
                        if(isset($_SESSION['resp'])){
                            echo $_SESSION['resp'];
                            unset($_SESSION['resp']);
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>