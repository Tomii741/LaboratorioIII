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
                <input type="text" id='titulo' name="Titulo" class="form-control" placeholder="Titulo de la noticia">
            </div>

            <div class="form-group">
                <label>Cuerpo</label>
                <input type="text" name="Cuerpo" id="cuerpo" class="form-control" placeholder="Cuerpo de la noticia">
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


            <button class="col-lg-2 col-md-4 col-sm-12 btn btn-success" type="submit" name="submit" id="botonEnviar">Enviar Noticia</button>

        </form>
    </div>
    <div class="col-lg-9 col-md-11 col-sm-12 m-auto" >
        <table class="table table-hover table-dark table-borderless mt-3">
            <thead>
                <tr>
                    <th >ID</th>
                    <th >Titulo</th>
                    <th >Fecha</th>
                    <th >Categoria</th>
                    <th >Acciones</th>
                </tr>
            </thead>
            <tbody id="list_noticias">

            </tbody>
        </table>
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

        // Enlistado de noticias en la tabla #list_noticias
        $.ajax({
            type: "POST",
            url: "select_noticias.php",
            data: {query:'SELECT * FROM tb_noticias WHERE AUTOR="sin autor"'},//query personalizada sino trae todos los datos (es necesario
            // cambiar "sin autor" por el nombre de la $_SESSION cuando este implementado)
            success: function(resp){
                var noticias = JSON.parse(resp);

                for(var i=0;i < noticias.length ;i++){
                    $("#list_noticias").append("<tr>"+
                        "<th id='ID'>"+noticias[i].ID+"</th>"+
                        "<th>"+noticias[i].TITULO+"</th>"+
                        "<th>"+noticias[i].FECHA+"</th>"+
                        "<th>"+noticias[i].CATEGORIA+"</th>"+
                        "<th><button class='btn btn-danger' type='button' onclick='borrar("+noticias[i].ID+")'><i class='fas fa-trash'></i></button>"+
                        "<button class='btn btn-warning m-1' type='button' onclick='editar("+noticias[i].ID+")'><i class='fas fa-edit'></i></button</th>"+
                    "</tr>"
                     );
                     
                }
            }
        })


    });

    function borrar(ID_Noticia){
        //toma el ID de la noticia y lo elimina de la DB
        $.ajax({
            type: "POST",
            url: "delete_noticias.php",
            data: {id: ID_Noticia},
            success : function(response){
                alert(response);
                location.reload();
            }
        })
    }
    
    function editar(ID_Noticia){
        //
        $.ajax({
            type: "POST",
            url: "select_noticias.php",
            data: {query:'SELECT * FROM tb_noticias WHERE ID="'+ID_Noticia+'"'},
            dataType: "json",
            success : function(response){
                console.log(response);
                alert(response[0].TITULO);

                
            }
        })
    }

</script>
</html>