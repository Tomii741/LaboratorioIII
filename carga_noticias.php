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
        <form class="form-carga-noticias" action="insert_noticias.php" method="POST" enctype="multipart/form-data">
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="Categoria">
                    <option value="" selected>Seleccione una categoria...</option>
                    <option value="1">Nacionales</option>
                    <option value="2">Internacionales</option>
                    <option value="3">Coronavirus</option>
                </select>
            </div>

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
                    <input type="file" class="custom-file-input" id="customFileMin" lang="es" name="Img_min">
                    <label class="custom-file-label" for="customFileLang">Seleccionar Archivo - 640x360</label>
                </div>
            </div>

            <div class="form-group">
                <label>Imagen principal</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" lang="es" name="Img">
                    <label class="custom-file-label" for="customFile">Seleccionar Archivo - 1280x720</label>
                </div>
            </div>


            <button class="col-lg-2 col-md-4 col-sm-12 btn btn-success" type="submit" name="submit">Enviar Noticia</button>

        </form>
    </div>
</body>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    
    $(document).ready(function(){
        //cambio el text del label del #customFile por el nombre del archivo a subir
        $("#customFile").change(function(){
            var filename = this.files[0].name;
            $(this).parent().find('label').text(filename);
        })
        //cambio el text del label del #customFileMin por el nombre del archivo a subir
        $("#customFileMin").change(function(){
            var filename = this.files[0].name;
            $(this).parent().find('label').text(filename);
        })

    });

</script>
</html>