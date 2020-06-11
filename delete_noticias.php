<?php
include "connect.php";

if(!isset($_POST['id'])||$_POST['id']==""){    
    die;
}
$id = $_POST['id'];
conectar("DELETE FROM tb_noticias WHERE ID='$id'");
echo "Noticia ".$_POST['id'].": Eliminada";
