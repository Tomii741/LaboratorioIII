<?php

include 'connect.php';

$fecha = date("Y-m-d");
$horaInternet = date("B");
$direccion = "img/";

    if(!isset($_POST["Titulo"]) || $_POST["Titulo"] === ""){
        echo "<script>alert('se debe dar un titulo');</script>";
        
        die;
    }
    else
    {
        $titulo = $_POST['Titulo'];
        $cuerpo = $_POST['Cuerpo'];
        $categoria = $_POST['Categoria'];
        $id = $_POST['id'];
    }

    if(!isset($_FILES["Img_min"]["name"]) || $_FILES["Img_min"]["name"] === "" ){
        
    }
    else
    {
        $img_path_min = $_FILES["Img_min"]["name"];
        $path_min = $direccion . $fecha . $horaInternet . $img_path_min;
        move_uploaded_file($_FILES["Img_min"]["tmp_name"], $path_min);
        conectar("UPDATE tb_noticias SET PATH_IMAGEN_MIN='$path_min'
                WHERE ID=$id");
    }

    if(!isset($_FILES["Img"]["name"]) || $_FILES["Img"]["name"] === "" ){
        
    }
    else
    {
        $img_path = $_FILES["Img"]["name"];
        $path = $direccion . $fecha . $horaInternet. $img_path;
        move_uploaded_file($_FILES["Img"]["tmp_name"], $path);
        conectar("UPDATE tb_noticias SET PATH_IMAGEN='$path'
                WHERE ID=$id");
    }

    
    
    conectar("UPDATE tb_noticias SET TITULO='$titulo', CUERPO='$cuerpo', FECHA='$fecha' , CATEGORIA='$categoria'
                                    WHERE ID=$id");
    


    header("Location: carga_noticias.php");
?>