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
    <div class="card bg-primary col-lg-9 col-md-11 col-sm-12 m-auto">
        <div class="card-header text-white">
            <h1>Noticias</h1>
        </div>
        <form class="form-carga-noticias">
            <br>
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" name="Titulo" class="form-control" placeholder="Titulo de la noticia">
            </div>

            <div class="form-group">
                <label>Cuerpo</label>
                <input type="text" name="Cuerpo" class="form-control" placeholder="Cuerpo de la noticia">
            </div>

            <div class="form-group">
                <label>Imagen miniatura</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                </div>
            </div>

            <div class="form-group">
                <label>Imagen principal</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                </div>
            </div>
            

            <button class="col-lg-2 col-md-4 col-sm-12 btn btn-success">Enviar Noticia</button>

        </form>
    </div>
</body>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>