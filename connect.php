<?php

function conectar($string){
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dataBase = "noticiasdelfondo";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dataBase);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    

    //envio la query
    // return $conn->query($string);
    // return $conn->error;
    if($resp = $conn->query($string))
    {
      //si funciono la query devuelvo el valor (para ser tomado cuando se use un select)
      return $resp;
    }
    else{
      //si no funciono la query se devuelve el log de error para ser debuggeado
      return $conn->error;
    }
    //cierra la conexion
    // mysqli_close($conn);
}

?>