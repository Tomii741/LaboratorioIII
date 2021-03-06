<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Login</title>
</head>
<body>
<div class="container middle">
    <div class="card bg-dark col-lg-9 col-md-11 col-sm-12 m-auto">
        <div class="card-header text-white">
            <h1>Iniciar Sesion</h1>
        </div>
        <form class="form-registro" action="user.php" METHOD="POST">
            <br>

            <div class="form-group text-white">
                <label>Email</label>
                <input type="Email" name="Email" class="form-control" placeholder="Email">
            </div>

            <div class="form-group text-white">
                <label>Contraseña</label>
                <input type="password" name="Contraseña" class="form-control" placeholder="Contraseña">
            </div>

            <button class="col-lg-3 col-md-4 col-sm-12 btn btn-success mb-1" type="submit" value="login" name="boton">Iniciar Sesion</button>
            <a class="col-lg-3 col-md-4 col-sm-12 btn btn-secondary mb-1" href="register.php">Registrarse</a>
        </form>
    </div> 

</div>
</body>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>