<?php 

include("connect.php"); //conexion base de datos

$fecha = date("Y-m-d");
$horaInternet = date("B");
$direccion = "img/";


if(isset($_POST['Categoria']) && $_POST['Categoria']!=""){
    $categoria = $_POST['Categoria'];
    
}else{
    echo "no category";
    die;
}

if(isset($_POST['Titulo']) && $_POST['Titulo']!=""){
    $titulo = $_POST['Titulo'];
    
}else{
    echo "no title";
    die;
}

if(isset($_POST['Cuerpo']) && $_POST['Cuerpo']!=""){
    $cuerpo = $_POST['Cuerpo'];
    
}else{
    echo "no body";
    die;
}

if(isset($_FILES['Img']['name']) && $_FILES['Img']['name']!=""){
    //agrego dia y hora de internet al nombre de archivo para que no se puedan pisar archivos ya subidos
    $img = $direccion . $fecha . $horaInternet . $_FILES['Img']['name']; 
    
}else{
    echo "no image";
    die;
}

if(isset($_FILES['Img_min']['name']) && $_FILES['Img_min']['name']!=""){
    //agrego dia y hora de internet (0-999) al nombre de archivo para que no se puedan pisar archivos ya subidos
    $img_min =  $direccion . $fecha . $horaInternet . $_FILES['Img_min']['name'];
    
}else{
    echo "no image min";
    die;
}

if(move_uploaded_file($_FILES['Img']['tmp_name'],$img)){
    if(move_uploaded_file($_FILES['Img_min']['tmp_name'],$img_min)){
        conectar(
        "INSERT INTO tb_noticias (TITULO,CUERPO,PATH_IMAGEN,PATH_IMAGEN_MIN,FECHA,AUTOR,CATEGORIA) 
        VALUES( '$titulo', '$cuerpo', '$img', '$img_min', '$fecha','sin autor', $categoria)"
        );
        // FALTA que las noticias lleven anexado el autor que sera quien haya hecho el login
        echo "Archivo Subido";
        //Aqui va a ir una redireccion a carga_noticias.php que sera implementada 
        // una vez que el sistema de carga este terminado
        
    }
    else{
        echo "Error en subida de imagen min";
    }
}
else{
    echo "Error en subida de imagen";
}

// "INSERT INTO tb_noticias (TITULO,CUERPO,PATH_IMAGEN,PATH_IMAGEN_MIN,FECHA,AUTOR,CATEGORIA) VALUES()"