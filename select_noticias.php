<?php

    include("connect.php");

    $query = 'SELECT * FROM tb_noticias';

    $result = conectar('SELECT * FROM tb_noticias');
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
