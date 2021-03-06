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
    <div class="container middle">

        <div class="card bg-dark col-lg-9 col-md-11 col-sm-12 m-auto ">
            <div class="card-header text-white">
                <h1>Registrate</h1>
            </div>
            <form class="form-registro" action="" METHOD="POST" onsubmit="return validacion()">
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
                
                <div class="form-row text-white">
                    <div class="form-group col-md-6">
                        <label>Fecha de nacimiento</label>
                        <input type="date" name="Fecha" class="form-control" placeholder="Fecha de nacimiento">
                    </div>
    
                    <div class="form-check col-md-6">
                        <label>Tipo de Usuario</label>
                        <div class="form-check col-sm-3">
                            <input type="radio" name="Tipo_usuario" id="Aut" class="form-check-input" value="true">
                            <label for="Aut" class="form-check-label">Autor</label> 
                        </div>
                        <div class="form-check col-sm-3">
                            <input type="radio" name="Tipo_usuario" id="Lec" class="form-check-input" value="false">
                            <label for="Lec" class="form-check-label">Lector</label> 
                        </div>
                    </div>
                </div>
                <br>
                
                <button class="col-lg-2 col-md-4 col-sm-12 btn btn-success mb-1" type="submit" value="añadir" name="boton">Registrar</button>
    
            </form>
        </div>
    </div>
</body>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function validacion(){
        var resultado = true;

        $(":input").each(function() {

            if($(this).val() == ""){
                alert($(this).attr("name"));
                resultado = false;
            }
             
        });
        if($("#Aut").is(':checked') || $("#Lec").is(':checked')){
            
        }else{
            resultado = false;
            alert("Debe seleccionar tipo de usuario");
        }
        return resultado;
    }

</script>
</html>

<?php
    include("connect.php");

    if(isset($_POST["boton"]) && $_POST["boton"]!=""){

        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Email = $_POST['Email'];
        $Contraseña = $_POST['Contraseña'];
        $Fecha = $_POST['Fecha'];

        if($_POST['Tipo_usuario'] == 'true'){

            $Tipo_usuario = 'Autor';

        }else {
            
            $Tipo_usuario = 'Lector';
        }

        if(conectar("INSERT INTO tb_registrar (NOMBRE, APELLIDO, EMAIL, CONTRASEÑA, FECHA_NAC, TIPO_USUARIO)
        VALUES ('$Nombre', '$Apellido', '$Email', '$Contraseña', '$Fecha', '$Tipo_usuario')")){

            echo "CARGADO!!";
            
            header("Location: login.php");

        }else{

            echo "ERROR: ";

        }

    }

?>
