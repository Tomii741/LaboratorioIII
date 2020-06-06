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
            <h1>Registrate</h1>
        </div>
        <form class="form-registro">
            <br>
            <div class="form-row text-white">
                <div class="form-group col-md-6">
                    <label>Nombre</label>
                    <input type="text" name="Nombre" class="form-control" placeholder="Nombre completo">
                </div>

                <div class="form-group col-md-6">
                    <label>Apellido</label>
                    <input type="text" name="Apellido" class="form-control" placeholder="Apellido">
                </div>
            </div>

            <div class="form-group text-white">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" placeholder="Email">
            </div>

            <div class="form-group text-white">
                <label>Contraseña</label>
                <input type="password" name="Contraseña" class="form-control" placeholder="Contraseña">
            </div>
            
            <div class="row text-white">
                <div class="form-group col-md-6">
                    <label>Fecha de nacimiento</label>
                    <input type="text" name="fecha" class="form-control" placeholder="Fecha de nacimiento">
                </div>

                <div class="form-check col-md-6">
                    <label>Tipo de Usuario</label>
                    <div class="form-check col-sm-3">
                        <input type="radio" name="tipo_usuario" id="Aut" class="form-check-input" value="Autor">
                        <label for="Aut" class="form-check-label">Autor</label> 
                    </div>
                    <div class="form-check col-sm-3">
                        <input type="radio" name="tipo_usuario" id="Lec" class="form-check-input" value="Lector">
                        <label for="Lec" class="form-check-label">Lector</label> 
                    </div>
                </div>
            </div>
            <br>
            
            <button class="col-lg-2 col-md-4 col-sm-12 btn btn-success" type="submit" value="regristrarUsuario.php">Registrar</button>

        </form>
    </div>
</body>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>