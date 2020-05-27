<?php 
    include("connect.php");
    // conectar("UPDATE tb_noticias SET TITULO='TOMI', CUERPO='Adri',FECHA='2020-05-27' WHERE ID='4'");   
    
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
    <div class="col-12 text-center footer"><h1>HEADER ACA (importar de Index.html)</h1></div>
    <div class="row w-100 mt-3">
        <div class="col-md-4 ">
            <div class="card card-noticia">
                <label>CATEGORIA</label>
                <img src="img/640x360.jpg" alt="Noticia 1">
                <label>17/05/2020</label>
                <p>Titulo de la Noticia</p>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card card-noticia">
                <label>CATEGORIA</label>
                <img src="img/640x360.jpg" alt="Noticia 1">
                <label>17/05/2020</label>
                <p>Titulo de la Noticia</p>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card card-noticia">
                <label>CATEGORIA</label>
                <img src="img/640x360.jpg" alt="Noticia 1">
                <label>17/05/2020</label>
                <p>Titulo de la Noticia</p>
            </div>
        </div>
        
    </div>
    

    <div class="col-12 text-center footer"><h1>FOOTER ACA (importar de Index.html)</h1></div>
</body>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>