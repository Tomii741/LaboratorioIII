<?php

require 'connect.php';
session_start();

$Email = $_POST['Email'];
$Contraseña = $_POST['Contraseña'];

$query = conectar ("SELECT COUNT(*) as contar, EMAIL, TIPO_USUARIO, NOMBRE, APELLIDO, ID FROM tb_registrar WHERE EMAIL = '$Email' and CONTRASEÑA = '$Contraseña'");
$array = mysqli_fetch_array($query);

if($array['contar']>0){
    $_SESSION['usuario'] = $array['NOMBRE'];
    header("location: index.php");
}else{
    echo "Datos invalidos";
}

?>