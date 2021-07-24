<?php include("server.php"); ?>
<html>
<head>
<title> Reviewer </title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" herf="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
<body>

    <div class="menu-bar">
		<ul>
		<li class="active"><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
		<li><a href="account.php"><i class="fa fa-users"></i>Account</a>
		    <div class="sub-menu-1">
		        <ul>
		            <li><a href="login.php">Login</a></li>
		            <li><a href="#">Register</a></li>
		        </ul>
		    </div>
		</li>
		<li><a href="freview.php"><i class="fa fa-clone"></i>Find review</a></li>
		<li><a href="aboutus.php"><i class="fas fa-users"></i>About Us</a></li>
		<li><a href="contact.php"><i class="fas fa-phone-square"></i>Contact</a></li>
		</ul>
    </div>


    <div class='bold-line'></div>
<div class='container'>
  <div class='window'>
    <div class='overlay'></div>
    <div class='content'>
      <div class='welcome'>Hello There!</div>
      <div class='subtitle'>We're almost done. Before using our services you need to create an account.</div>
      <div class='input-fields'>
       <form method="POST">
        <input type='text' placeholder='Username' name="username" class='input-line full-width'></input>
        <input type='text' placeholder='Email' name="email" class='input-line full-width'></input>
        <input type='password' placeholder='Password' name="password" class='input-line full-width'></input>
      <input type="submit" name="signup" class='ghost-round full-width' value="Create Account"></input>
       </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>