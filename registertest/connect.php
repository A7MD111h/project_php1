<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName= "register";
    $conn = new mysqli($servername, $username, $password, $dbName);
    if ($conn->connect_error){
        die("Conection Failed : " .$conn->connect_error);
    }else{
    
        echo"Connected Successfully<br>";
    }
    ?>