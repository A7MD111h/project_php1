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
                
        
        if (isset($_SESSION['islogged']) && $_SESSION['islogged'] === true) {
            $response = [
                'islogged' => true,
                'email' => $_SESSION['email']
            ];
        } else {
            $response = [
                'islogged' => false
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
  
        header('location: home.html');
    
    }else{
        header('location: index.html');
    }
}

?>