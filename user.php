<?php

require 'connect.php';
session_start();

$Email = $_POST['Email'];
$Contraseña = $_POST['Contraseña'];

$query = conectar ("SELECT COUNT(*) as contar, EMAIL, TIPO_USUARIO, NOMBRE, APELLIDO, ID FROM tb_registrar WHERE EMAIL = '$Email' and CONTRASEÑA = '$Contraseña'");
$array = mysqli_fetch_array($query);

if($array['contar']>0){
    $_SESSION['email'] = $array['EMAIL'];
    $_SESSION['usuario'] = $array['NOMBRE'].' '.$array['APELLIDO'];
    $_SESSION['id'] = $array['ID'];
    $_SESSION['tipo_usuario'] = $array['TIPO_USUARIO'];
    header("location: index.php");
}else{
    echo "Datos invalidos";
}

?>