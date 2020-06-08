<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias del Fondo</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="col-12 text-center footer">
        <h1>HEADER ACA (importar de Index.html)</h1>
    </div>
    <div class="row w-100 mt-3" id="noticias">
        <!-- <div class="col-md-4 ">
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
            </div> -->
        </div>

    </div>


    <div class="col-12 text-center footer">
        <h1>FOOTER ACA (importar de Index.html)</h1>
    </div>
</body>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>

    $(document).ready(function(){


        $.ajax({
            type: "post",
            url: "select_noticias.php",
            
            success: function(result){
                    // console.log(result);
                    dat = JSON.parse(result);//parseo el JSON recibido
                    

                    for(var i=0;i<dat.length ;i++){ //recorro el array de datos y hago un append en de cada card de noticia
                        $("#noticias").append('<div class="col-md-4 ">' +
                                                '<a href="" class="card card-noticia no-link">' +
                                                    '<label>'+dat[i].CATEGORIA+'</label>' +
                                                    '<img src="'+dat[i].PATH_IMAGEN_MIN+'" alt="Noticia '+ dat[i].ID +'">' +
                                                    '<label>'+dat[i].FECHA+'</label>' +
                                                    '<p>'+dat[i].TITULO+'</p>' +
                                                '</a>' +
                                            '</div>');
                    }
            }

        })
    })
</script>

</html>