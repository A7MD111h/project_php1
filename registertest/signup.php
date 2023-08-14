<?php
require ("connect.php");
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST["password"];
    echo "herererere";
    $sql = "INSERT INTO signup (username, password, email)
    VALUES ('$username', '$password', '$email')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

     // if(empty($username) || empty($email)|| empty($password)){
    //     header("Location: ../signup.html");
    //     echo "Please fill in all fields";
    //     }else{
            // require_once 'dbh.inc.php';
            //checking for existing username and email in the database
            //connect to database
    //    } 
?>