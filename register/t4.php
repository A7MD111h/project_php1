<?php
// require("config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
$data=json_decode(file_get_contents("php://input"),true);

$userName=$data['name'];
$userEmail=$data['email'];

$sql="INSERT INTO users (name,email) VALUES('$userName','$userEmail')";

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