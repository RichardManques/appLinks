<?php

use models\LinkModel as LinkModel;

session_start();
require_once("../models/LinkModel.php");
if(isset($_SESSION['usuario'])){
    $model = new LinkModel;
    $links = $model->linskPorEmail($_SESSION['usuario']['email']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Link</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/mislinks.css">
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    if(isset($_SESSION['usuario'])){?>
    <nav class="barra">
    <div class="nav-wrapper nombre">
        <a href="#" class="brand-logo nombre">Bienvenido <?=$_SESSION['usuario']['nombre']?></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="nuevolink.php">Nuevo Link</a></li>
            <li class="active"><a href="mislinks.php">Mis Links</a></li>
            <li><a href="salir.php">Salir</a></li>
        </ul>
    </div>
    </nav>
    <?php } else { ?>
        <h3>Error de acceso</h3>
        <p>
            No estás autorizado para estar en este sitio<br>
            <a href="../index.php">Inicio</a>
        </p>
    <?php } ?>

    <!--TARJETAS DE LOS LINKS-->
    <div class="container">
        <div class="row">
            <?php foreach ($links as $link){?>
                <div class="col l3 m3 s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="../img/url.png">
                        </div>
                        <div class="card-content">
                            <p>
                                <span style="font-size:25px;color:orange"><?=$link['nombre']?></span>
                            </p>
                        </div>
                        <div class="card-action">
                            <a class="boton"target="__BLANK" href="<?=$link['link']?>">Ir al sitio</a>
                        </div>
                    </div>
                </div>
            <?php } ?>  
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>