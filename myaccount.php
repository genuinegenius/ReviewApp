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
<li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
<li class="active"><a href="account.php"><i class="fa fa-users"></i>Account</a>
    <div class="sub-menu-1">
        <ul>
            <li><a href="#">MyAccount</a></li>
        </ul>
    </div>
</li>
<li><a href="freview.php"><i class="fa fa-clone"></i>Find review</a></li>
</ul>
    </div>
<?php echo "Welcome to your profile " . $_SESSION['username'] ; ?>
<br>
<form method="POST">
<input style="padding: 10px;width: auto;height: auto;cursor: pointer;" type="submit" name="add_review" value="Add review"></input>
</form>	
</body>
</html>