<?php

session_start();
$Email = $_SESSION['email'];

if(!isset($Email)){
    header("location: login.php");
}

include("connect.php");

    $query = "SELECT * FROM tb_noticias ORDER BY ID DESC LIMIT 5 ";

    $noticias = conectar($query);
    $datos = array();
    while($row = mysqli_fetch_assoc($noticias))
        {
            $datos[]=$row;
        }
    //var_dump($datos);
    //$noticias->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias del Fondo</title>
    <link rel="stylesheet" href="css/bootstrap.css" >
    <link rel="stylesheet" href="css/main.css" >
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">
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

    <section>
        <br>
        <br>
        <div class="container">
            <div class="row">

                <div class="col-12 mb-5">
                    <div class="card-noticia h-100">
                        <a class="no-link lineanigga" href="detalle_noticia.php?id=<?php echo $datos[0]['ID']; ?>">
                            <div class="card-body">
                                <h2 class="no-link"><?php echo $datos[0]['TITULO']; ?></h2>
                                <img src="<?php echo $datos[0]['PATH_IMAGEN'];?>">
                                <p class="card-text"><?php echo $datos[0]['CUERPO']; ?></p>
                                <div class="blockquote">
                                    <div class="blockquote-footer">Autor: <cite title="Source Title"><?php echo $datos[0]['AUTOR'] ?></cite></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php for($i=1; $i<=4; $i++): ?>
                <a class=" col-md-6 mb-5 card-noticia no-link lineanigga" href="detalle_noticia.php?id=<?php echo $datos[$i]['ID']; ?>">
                        <div class=" h-100">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $datos[$i]['TITULO']; ?></h2>
                                <img src="<?php echo $datos[$i]['PATH_IMAGEN'];?>">
                                <p class="card-text limite"><?php echo $datos[$i]['CUERPO']; ?></p>
                                <div class="blockquote">
                                    <div class="blockquote-footer">Autor: <cite title="Source Title"><?php echo $datos[$i]['AUTOR'] ?></cite></div>
                                </div>
                            </div>
                        </div>
                </a>
                <?php endfor ?>
            </div>
        </div>
    </section>

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
</body>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>

