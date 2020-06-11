<?php
    
    include("connect.php");
    session_start();
    $query = 'SELECT * FROM tb_noticias';
    if(isset($_POST['query'])){
        $query = "SELECT * FROM tb_noticias WHERE AUTOR = '". $_SESSION['usuario'] . "'";       
    }
    //si me pasa alguna query traigo los datos solicitados, sino traigo todos los datos
    if(isset($_POST['queryID'])){
        $query = "SELECT * FROM tb_noticias WHERE ID=" . $_POST['queryID'];       
    }
    if(isset($_GET['categoria'])){
        $query = "SELECT * FROM tb_noticias WHERE CATEGORIA='" . $_GET['categoria']."'";       
    }

    $result = conectar($query);
    // echo $result;
    $datos = array();
    if(isset($result)){
        while($row = $result->fetch_assoc())
        {
            switch($row['CATEGORIA']){
                case "1": $row['CATEGORIA'] = "NACIONALES";
                break;
                case "2": $row['CATEGORIA'] = "INTERNACIONALES";
                break;
                case "3": $row['CATEGORIA'] = "CORONAVIRUS";
                break;
                default: $row['CATEGORIA'] = "DEFECTO";
            }
            $datos[]=$row;
        }
    }
    
    echo json_encode($datos);
