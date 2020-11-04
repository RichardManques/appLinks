<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Link</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/nuevolink.css">
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    session_start(); 
    if(isset($_SESSION['usuario'])){?>
    <nav class="barra">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo nombre">Bienvenido <?= $_SESSION['usuario']['nombre']?></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="active"><a href="nuevolink.php">Nuevo Link</a></li>
            <li><a href="mislinks.php">Mis Links</a></li>
            <li><a href="salir.php">Salir</a></li>
        </ul>
    </div>
    </nav>
    <?php } else { ?>
        <h3>Error de acceso</h3>
        <p>
            Usted no tiene permisos para estar aquí <br>
            <a href="../index.php">Inicio</a>
        </p>
    <?php } ?>
    
    <div class="container">
        <div class="row relleno">
            <div class="col l4 m4 s12">

            </div>
            <div class="col l4 m4 s12 form">
                <h2 class="center">Nuevo Link</h2>
                <form action="../controllers/ControlNuevoLink.php" method="POST">
                    <div class="input-field">
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Ingrese un nombre representativo</label>
                    </div>
                    <div class="input-field">
                        <input id="link" type="text" name="link">
                        <label for="link">Ingrese su link</label>
                    </div>
                    <button class="btn black boton">Agregar Link</button>
                </form>
                <p class="red-text">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset ($_SESSION['error']);
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