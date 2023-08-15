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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="home.css">
	<title>Welcome Page</title>

</head>
<body>
	
<header class="header">
      <nav class="navbar max-width">
        <a href="#" class="divlogo"><img src="./logo.png" alt="logo"></a>
        <ul class="links">
            <li><a href="#home">Home</a></li>
            <li><a href="home.php" id="btnout">logout</a></li>
            <li class="btn signin"><a href="index.html" id="btnin">login</a></li>
            <li class="btn join"><a href="./register/t1.html" id="btnsign">SignUp</a></li>
        </ul>
      </nav>
    </header>

    <!-- Hero section -->
    <section class="hero">
       <div class="content max-width">
        <h2 id="welc">Welcome Page</h2>
        <P id="userDatas"></P>
       </div>
    </section>

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