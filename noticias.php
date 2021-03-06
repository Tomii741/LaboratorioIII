<?php

session_start();


if(!isset($_SESSION['usuario'])){
    header("location: login.php");
}

//Variables de paginacion
include("connect.php");

                    if(isset($_GET["categoria"]))
                    {
                        switch($_GET["categoria"]){   
                            case "'nacionales'":
                                $query = "SELECT COUNT(*) as contar FROM tb_noticias WHERE CATEGORIA='1'";  
                            break;
                            case "'internacionales'":
                                $query = "SELECT COUNT(*) as contar FROM tb_noticias WHERE CATEGORIA='2'";  
                            break;
                            case "'coronavirus'":
                                $query = "SELECT COUNT(*) as contar FROM tb_noticias WHERE CATEGORIA='3'";  
                            break;
                            default:
                                $query = "SELECT COUNT(*) as contar FROM tb_noticias";                            
                            break;
                        }                        
                    }
                   
                    $cantidadNoticias = conectar($query);
                    $cantidadNoticias = mysqli_fetch_array($cantidadNoticias);
                    $cantidadNoticias["contar"];
                    $noticiasPorPagina = 6;
                    $paginas = $cantidadNoticias["contar"] / $noticiasPorPagina;
                    $paginas = ceil($paginas);
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
    <link rel="icon" href="fondo.ico" type="image/gif" sizes="16x16">
</head>

<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="index.php"><img class="ml-5 logo" src="white_landscape.svg" height="70px"> </a>
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

                  <li class="nav-item <?php echo $_GET["categoria"]=="'todos'" ? "active" : "" ?>">
                    <a class="nav-link" href="noticias.php?categoria='todos'&pagina=1">Noticias</a>
                  </li>

                  <li class="nav-item <?php echo $_GET["categoria"]=="'nacionales'" ? "active" : "" ?>">
                    <a class="nav-link" href="noticias.php?categoria='nacionales'&pagina=1">Nacionales</a>
                  </li>

                  <li class="nav-item <?php echo $_GET["categoria"]=="'internacionales'" ? "active" : "" ?>">
                    <a class="nav-link" href="noticias.php?categoria='internacionales'&pagina=1">Internacionales</a>
                  </li>

                  <li class="nav-item <?php echo $_GET["categoria"]=="'coronavirus'" ? "active" : "" ?>">
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
            <div class="col-12">
                <br>
                <h1><b>Noticias</b></h1>
            </div>
            <div class="row w-100 m-auto" id="noticias">
                <!-- Aca se hace el Append de noticias via Ajax -->
            </div>    
        </div>

    </div>

    <div >
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center" id="paginador">
                <li class="page-item <?php echo $_GET["pagina"]==1 ? "disabled" : "" ?>">
                                <a class="page-link" href="noticias.php?categoria='todos'&pagina=<?php echo$_GET["pagina"]-1 ?>" tabindex="-1">Anterior</a>
                            </li>
                <?php for($i=0;$i<$paginas;$i++): ?>
                    <li class="page-item
                    <?php echo $_GET["pagina"]==$i+1 ? "active" : "" ?>">
                        <a class="page-link" href="noticias.php?categoria='todos'&pagina=<?php echo $i+1 ?>">
                        <?php echo $i+1; ?>
                        </a>
                    </li>
                <?php endfor ?>
                <li class="page-item <?php echo $_GET["pagina"]==$paginas ? "disabled" : "" ?>">
                    <a class="page-link" href="noticias.php?categoria='todos'&pagina=<?php echo$_GET["pagina"]+1 ?>">Siguiente</a>
                </li>
            </ul>
        </nav>      
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            
        </ul>
    </nav>
    


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

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    var paginaActual = <?php echo $_GET["pagina"]; ?>;
    var categoria = <?php echo $_GET["categoria"]; ?>;
    $(document).ready(function() {


        $.ajax({
            type: "post",
            url: "select_noticias.php",
            data: {pagina : paginaActual,category:categoria},
            success: function(result) {
                // console.log(result);
                dat = JSON.parse(result); //parseo el JSON recibido


                for (var i = 0; i < dat.length; i++) { //recorro el array de datos y hago un append en de cada card de noticia
                    $("#noticias").append('<div class="col-lg-4 col-md-6 col-sm-12 ">' +
                        '<a href="detalle_noticia.php?id='+dat[i].ID+'" class="card card-noticia no-link">' +
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