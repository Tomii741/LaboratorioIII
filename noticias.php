<?php

session_start();


if(!isset($_SESSION['usuario'])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias del Fondo</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Noticias del Fondo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="noticias.php">Noticias</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Nacionales</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Internacionales</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>


<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <br>
                <h1><b>Noticias</b></h1>
            </div>
            <div class="row w-100 m-auto" id="noticias">
                <!-- Aca se hace el Append de noticias via Ajax -->
            </div>    
        </div>

    </div>

    


</body>


<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Esto es un footer de Noticias</p>
    </div>
</footer>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {


        $.ajax({
            type: "post",
            url: "select_noticias.php",

            success: function(result) {
                // console.log(result);
                dat = JSON.parse(result); //parseo el JSON recibido


                for (var i = 0; i < dat.length; i++) { //recorro el array de datos y hago un append en de cada card de noticia
                    $("#noticias").append('<div class="col-md-4 ">' +
                        '<a href="" class="card card-noticia no-link">' +
                        '<label>' + dat[i].CATEGORIA + '</label>' +
                        '<img src="' + dat[i].PATH_IMAGEN_MIN + '" alt="Noticia ' + dat[i].ID + '">' +
                        '<label>' + dat[i].FECHA +" | "+ dat[i].AUTOR + '</label>' +
                        '<p>' + dat[i].TITULO + '</p>' +
                        '</a>' +
                        '</div>');
                }
            }

        })
    })
</script>

</html>