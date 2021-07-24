<?php
	session_start();
	$username = '';
	$localhost = "localhost";
	$id_db = "root";
	$pwd_db = "";
	$database_name = "cossy";
	$db = mysqli_connect($localhost , $id_db , $pwd_db , $database_name);

	if(isset($_POST['login'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		if(mysqli_query($db, $sql)){
			$_SESSION['username'] = $username;
			header('location:myaccount.php');
		}
	}

	if(isset($_POST['signup'])){
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		mysqli_query($db, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
		$_SESSION['username'] = $username;
		header('location:myaccount.php');

	}

	if(isset($_POST['submit_review']) && (isset($_FILES['image1']) || isset($_FILES['image2']) || isset($_FILES['image3']))){
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($query);
		$id_user = $row['id'];

		$ok1 = 0; $ok2 = 0; $ok3 = 0;

		$titlu = $_POST['titlu'];

		$get1 = $_FILES['image1'];

		if($get1){
			$imagine1 = addslashes(file_get_contents($_FILES['image1']));
		}

		$get2 = $_FILES['image2'];
		if($get2){
			$imagine2 = addslashes(file_get_contents($_FILES['image2']));
		}

		$get3 = $_FILES['image3'];
		if($get3){
			$imagine3 = addslashes(file_get_contents($_FILES['image3']));
		}
		$descriere = $_POST['descriere'];
		$categorie = $_POST['categori'];
		$pret = $_POST['pret'];
		$producator = $_POST['producator'];

		if($imagine1) {
			$ok1 = 1;
		}
		if($imagine2) {
			$ok2 = 1;
		}
		if($imagine3) {
			$ok3 = 1;
		}

		if(!$ok3){
			if(!$ok2){
				if(!$ok1){
					echo "alert('Trebuie sa fie trimisa cel putin o imagine');";
				}
				else{
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine1, descriere, categorie, pret, producator) VALUES ('$id_user', '$titlu', '$imagine1', '$descriere', '$categorie', '$pret', '$producator')";
				}	
			}
			else{
				if(!$ok1){
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine2, descriere, categorie, pret, producator) VALUES ('$id_user', '$titlu', '$imagine2', '$descriere', '$categorie', '$pret', '$producator')";
				}
				else{
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine1, imagine2, descriere, categorie, pret, producator) VALUES ('$id_user', '$titlu', '$imagine1', '$imagine2', '$descriere', '$categorie', '$pret', '$producator')";
				}
			}
		}
		else{
			if(!$ok2){
				if(!$ok1){
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine3, descriere, categorie, pret, producator) VALUES ($id_user, $titlu, $imagine3, $descriere, $categorie, $pret, $producator)";
				}
				else{
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine1, imagine3, descriere, categorie, pret, producator) VALUES ('$id_user', '$titlu', '$imagine1', '$imagine3', '$descriere', '$categorie', '$pret', '$producator')";
				}
			}
			else{
				if(!$ok1){
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine2, imagine3, descriere, categorie, pret, producator) VALUES ('$id_user', '$titlu', '$imagine2', '$imagine3', '$descriere', '$categorie', '$pret', '$producator')";
				}
				else{
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine1, imagine2, imagine3, descriere, categorie, pret, producator) VALUES ('$id_user', '$titlu', '$imagine1', '$imagine2', '$imagine3', '$descriere', '$categorie', '$pret', '$producator')";
				}
			}
		}
		mysqli_query($db, $sql2);
	}

	if(isset($_POST['add_review'])){
		header('location:add_review.php');
	}

?>