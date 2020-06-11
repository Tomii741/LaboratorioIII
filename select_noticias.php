<?php
    
    include("connect.php");

    //si me pasa alguna query traigo los datos solicitados, sino traigo todos los datos
    if(isset($_POST['query'])){
        $query = $_POST['query'];
    }else{
        $query = 'SELECT * FROM tb_noticias';
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
