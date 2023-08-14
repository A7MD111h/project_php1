<?php
session_start();
if (!isset($_SESSION["islogged"]) || $_SESSION["islogged"] !== TRUE) {
    $isloged = FALSE;
  } else {
    $isloged = TRUE;
  }
  
  // if (isset($_POST["logout"])) {
  //   $_SESSION["loggedin"] = FALSE;
  //   $isloged = FALSE;
  // }
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
                <li><a href="login.html" id="btnin">login</a></li>
                <li><a href="./register/t1.html" id="btnsign">SignUp</a></li>
            </ul>
        </div>
    </nav>
	<h1 id="welc">Welcome</span></h1>
  <P id="userDatas"></P>
<!-- 
  <div class="">
        
    <button id="" onclick=""class="butn btn">ss</button>
    
    <br />
    <table border="2" id="usersData">
        <thead>
            <tr>
                <th>First name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>phone</th>
            </tr>

        </thead>
        <tbody id="Tbody"></tbody>
    </table>
    </div>
   -->
</body>
<script>
    var welc = document.getElementById("welc");
    var urname = document.getElementById("urname");
    var userDatas = document.getElementById("userDatas");
    var name =  "<?php echo isset($_SESSION["name"]) ? htmlspecialchars($_SESSION["name"]) : ''; ?>";
    var middle_name =  "<?php echo isset($_SESSION["middle_name"]) ? htmlspecialchars($_SESSION["middle_name"]) : ''; ?>";
    var last_name =  "<?php echo isset($_SESSION["last_name"]) ? htmlspecialchars($_SESSION["last_name"]) : ''; ?>";
    var email =  "<?php echo isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"]) : ''; ?>";
    var phone =  "<?php echo isset($_SESSION["phone"]) ? htmlspecialchars($_SESSION["phone"]) : ''; ?>";

    var isloged = <?php echo $isloged ? 'true' : 'false'; ?>;
    console.log(isloged);
    
    console.log(phone);
    var btnout =  document.getElementById("btnout");
    var btnin =  document.getElementById("btnin");
    var btnsign =  document.getElementById("btnsign"); 

    if (isloged) {
        welc.innerHTML = `Welcome  ${name}`;
        userDatas.innerHTML = `
        Full Name :  ${name} ${middle_name} ${last_name} , <br>
        Email : ${email},<br>
        Phone : ${phone}
        `;

        btnout.style.display = "inline-block";
        btnin.style.display = "none";
        btnsign.style.display = "none";
        // urname.textContent= `${name}`;
    } else {
        btnout.style.display = "none";
        btnin.style.display = "inline-block";
        btnsign.style.display = "inline-block";
    }
    btnout.addEventListener('click', (e) => {
            e.preventDefault();
            fetch('', {
                method: 'POST',
                body: 'logout=true'
            }).then(() => {
              btnout.style.display = "none";
              btnin.style.display = "inline-block";
              btnsign.style.display = "inline-block";
                isloged = false;
                window.location.href = 'logout.php'
            });
       
        });
</script>
   
</html>