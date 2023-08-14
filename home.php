<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    $isloged = FALSE;
  } else {
    $isloged = TRUE;
  }
  
  if (isset($_POST["logout"])) {
    $_SESSION["loggedin"] = FALSE;
    $isloged = FALSE;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome Page</title>
	<style>
		
.na_0{
  width: 100% ;
  margin:  0 auto;
  position:sticky; ;
  top: 0;
  z-index:4 ;
  overflow: hidden;

  background-color: #19152B;
  
}
.navbar {
    width: 85% ;
    margin:  0 auto;
    background-color: #19152B;
    /* overflow: hidden; */
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* padding: 1rem; */
    /* position: fixed;
    top: 0;
    z-index:4 ; */

}
.navbar img {
  height: 40px;
  width: 100%;
}

.navbar ul {
  list-style-type: none;
  display: flex;
}


      
.navbar ul li a {
  color: white;
  text-decoration: none;
}


ul{
    display: flex;
    gap: 2.5rem;
}
li{
    display: block;
    transition:.1s;
}

ul:hover li{
    filter: blur(1px);
}
ul li:hover{
    filter: blur(0px);
}


	</style>

</head>
<body>
	<nav class="na_0 ">
        <div class="navbar ">
            <div class="divlogo">
                <a href="#home"><img src="#" alt="Logo"></a>
            </div>
            <ul class="ul_nav">
                <li><a href="#home">Home</a></li>
                <li><a href="home.php" id="btnout">logout</a></li>
                <li><a href="login/login.html" id="btnin">login</a></li>
                <li><a href="./register/t1.html" id="btnsign">SignUp</a></li>
            </ul>
        </div>
    </nav>
	<h1 id="welc">Welcome, Successfully Login :)</h1>
	
</body>
<script>
    var welc = document.getElementById("welc");
    var isloged = <?php echo $isloged ? 'true' : 'false'; ?>;
    var btnout =  document.getElementById("btnout");
    var btnin =  document.getElementById("btnin");
    var btnsign =  document.getElementById("btnsign"); 
    if (isloged) {
        welc.innerHTML += "You are loged in";
        btnout.style.display = "inline-block";
        btnin.style.display = "none";
        btnsign.style.display = "none";
    } else {
        btnout.style.display = "none";
        btnin.style.display = "inline-block";
        btnsign.style.display = "inline-block";
    }
</script>
    <script src="logtest.js"></script>
</html>