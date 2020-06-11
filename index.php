<?php

session_start();
$Email = $_SESSION['email'];

if(!isset($Email)){
    header("location: login.php");
}else{
    echo "<script>alert('Bienvenido ".$_SESSION['usuario']."');</script>";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias del Fondo</title>
    <link rel="stylesheet" href="css/bootstrap.css" >
    <link rel="stylesheet" href="css/main.css" >

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="#">Noticias del Fondo</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>

                  <li class="nav-item">
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

                  <?php
                        if(isset($_SESSION['tipo_usuario'])&&$_SESSION['tipo_usuario']=="Autor"){
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="carga_noticias.php" target="_blank">Cargar Noticia</a>
                                </li>';
                        }
                    ?>

                  <li class="nav-item">
                    <a class="nav-link btn btn-outline-secondary" href="logout.php">Cerrar Sesion</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-12 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia Principal</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                            <div class="blockquote">
                                <div class="blockquote-footer">Autor: <cite title="Source Title">(nombre del autor)</cite></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary btn-sm">More Info</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia uno</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                            <div class="blockquote">
                                <div class="blockquote-footer">Autor: <cite title="Source Title">(nombre del autor)</cite></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary btn-sm">More Info</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia dos</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                            <div class="blockquote">
                                <div class="blockquote-footer">Autor: <cite title="Source Title">(nombre del autor)</cite></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary btn-sm">More Info</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Noticia tres</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                            <div class="blockquote">
                                <div class="blockquote-footer">Autor: <cite title="Source Title">(nombre del autor)</cite></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary btn-sm">More Info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Esto es un footer de Noticias</p>
          </div>
    </footer>
</body>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>

