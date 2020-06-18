<?php

session_start();

//ingreso por sesiones
if(!isset($_SESSION['usuario'])){
    header("location: login.php");
}

include("connect.php");
if(isset($_GET["id"]))
{
    $IDNoticia = $_GET["id"];
}
$sql = conectar("SELECT * FROM tb_noticias WHERE ID='$IDNoticia'");
$noticia = $sql->fetch_assoc();
switch($noticia["CATEGORIA"])
{
    case 1:
        $noticia["CATEGORIA"] = 'NACIONALES';  
    break;
    case 2:
        $noticia["CATEGORIA"] = 'INTERNACIONALES';  
    break;
    case 3:
        $noticia["CATEGORIA"] = 'CORONAVIRUS';  
    break;
    default:
        $noticia["CATEGORIA"] = "DEFECTO";                            
    break;
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
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="#">Noticias del Fondo</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item ">
                    <a class="nav-link" href="index.php">Inicio
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>

                  <li class="nav-item <?php $_GET["categoria"]=="'todos'" ? "active" : "" ?>">
                    <a class="nav-link" href="noticias.php?categoria='todos'&pagina=1">Noticias</a>
                  </li>

                  <li class="nav-item <?php $_GET["categoria"]=="'nacionales'" ? "active" : "" ?>">
                    <a class="nav-link" href="noticias.php?categoria='nacionales'&pagina=1">Nacionales</a>
                  </li>

                  <li class="nav-item <?php $_GET["categoria"]=="'internacionales'" ? "active" : "" ?>">
                    <a class="nav-link" href="noticias.php?categoria='internacionales'&pagina=1">Internacionales</a>
                  </li>

                  <li class="nav-item <?php $_GET["categoria"]=="'coronavirus'" ? "active" : "" ?>">
                    <a class="nav-link" href="noticias.php?categoria='coronavirus'&pagina=1">Coronavirus</a>
                  </li>

                  <?php
                        if(isset($_SESSION['tipo_usuario'])&&$_SESSION['tipo_usuario']=="Autor"){
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="carga_noticias.php">Cargar Noticia</a>
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


<body>
    <div class="container">
        <div class="row">
            <div class="col-9 m-auto">
                <br>
                <h1><b></b></h1>
            </div>
            <div class="row">
                <div class="col-9 card-noticia m-auto detalles-noticia">
                    <h5><b>#<?php echo $noticia["CATEGORIA"] ?></b></h5>
                    <h3><b><?php echo $noticia["TITULO"] ?></b></h3>
                    <img src="<?php echo $noticia["PATH_IMAGEN"] ?>">
                    <h6><?php echo $noticia["FECHA"] ?></h6>
                    <p><?php echo $noticia["CUERPO"] ?></p>
                    <h6>Autor: <?php echo $noticia["AUTOR"] ?></h6>
                </div>
            </div>    
        </div>

    </div>
    


</body>


<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">© 1995 - 2020 Todos los derechos reservados. Número de edición: 9024 - Mes: 8 - Año: 24 
            Propietario: Noticias del Fondo S.A. - CUIT 30-99999477-6 Secretario de Redacción: Elon Musk Propiedad Intelectual: 5316959 
            San Martín 3000 - Mendoza<br><br>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-facebook-square"></i>
            <i class="fab fa-instagram-square"></i>
            <br>
            <i class="fas fa-share-alt-square"></i>
            <i class="fas fa-map-marker-alt"></i>
            <i class="fas fa-envelope"></i>
          
        </p>
    </div>
</footer>

