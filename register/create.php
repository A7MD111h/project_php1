<?php
require("config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $data=json_decode(file_get_contents("php://input"),true);
    
    $userName=$data['name'];
    $middleName=$data['middle_name'];
    $lastName=$data['last_name'];
    $userEmail=$data['email'];
    $userPassword=$data['password'];     
    $userPhone=$data['phone'];     
    $userBirthday=$data['birthday'];     
    
    $sql="INSERT INTO users (name,midname,lastname,email,password,phone,birthday) VALUES('$userName','$middleName','$lastName','$userEmail','$userPassword','$userPhone','$userBirthday')";
    
    $response= array();
    if($conn->query($sql) === True){
        $response['message']="Data stored successfully";
    }else{
        $response['message']="Error: ".$sql."<br>.$conn->error";
    
    }
    echo json_encode($response);
    }
    $conn->close();
?>