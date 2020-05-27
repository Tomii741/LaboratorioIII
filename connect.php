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
    mysqli_query($conn,$string);

    mysqli_close($conn);
}

?>