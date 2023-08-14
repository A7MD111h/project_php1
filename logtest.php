<?php 
require("./register/config.php");


$email=$_POST['email'];
$password=$_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' and password='$password'";
$result=mysqli_query($conn,$sql);


if ($result){
    if(mysqli_num_rows($result)>0){
        $rows= mysqli_fetch_assoc($result) ;
        session_start();
        $_SESSION['email']=$email;
        $_SESSION['islogged']=TRUE;
        $_SESSION['name'] = $rows['name']; 
        $_SESSION['middle_name'] = $rows['midname']; 
        $_SESSION['last_name'] = $rows['lastname']; 
        $_SESSION['email'] = $rows['email']; 
        $_SESSION['phone'] = $rows['phone']; 
        
        echo $_SESSION['islogged'];
        if ($email === 'osama@gmail.com') {
            $_SESSION['isAdmin'] = true;
            header('location: ad.php'); // Redirect admin to admin page
        } else {
             $_SESSION['isAdmin'] = false;
            $_SESSION["loggedin"] = true;
            header('location: home.php'); // Redirect normal user to index page
        }
        
    
    }else{
        header('location: login.html');
    }
}

?>