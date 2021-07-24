<?php

	$localhost = "localhost";
	$id_db = "root";
	$pwd_db = "";
	$database_name = "cossy";
	$db = mysqli_connect($localhost , $id_db , $pwd_db , $database_name);

	if(isset($_POST['submit_review'])){
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($query);
		$id_user = $row['id'];

		$ok1 = 0; $ok2 = 0; $ok3 = 0;

		$titlu = $_POST['titlu'];
		$imagine1 = $_POST['image1'];
		$imagine2 = $_POST['image2'];
		$imagine3 = $_POST['image3'];
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
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine1, descriere, categorie, pret, producator) VALUES ($id_user, $titlu, $imagine1, $descriere, $categorie, $pret, $producator)";
				}	
			}
			else{
				if(!$ok1){
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine2, descriere, categorie, pret, producator) VALUES ($id_user, $titlu, $imagine2, $descriere, $categorie, $pret, $producator)";
				}
				else{
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine1, imagine2, descriere, categorie, pret, producator) VALUES ($id_user, $titlu, $imagine1, $imagine2, $descriere, $categorie, $pret, $producator)";
				}
			}
		}
		else{
			if(!$ok2){
				if(!$ok1){
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine3, descriere, categorie, pret, producator) VALUES ($id_user, $titlu, $imagine3, $descriere, $categorie, $pret, $producator)";
				}
				else{
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine1, imagine3, descriere, categorie, pret, producator) VALUES ($id_user, $titlu, $imagine1, $imagine3, $descriere, $categorie, $pret, $producator)";
				}
			}
			else{
				if(!$ok1){
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine2, imagine3, descriere, categorie, pret, producator) VALUES ($id_user, $titlu, $imagine2, $imagine3, $descriere, $categorie, $pret, $producator)";
				}
				else{
					$sql2 = "INSERT INTO reviews (id_user, titlu, imagine1, imagine2, imagine3, descriere, categorie, pret, producator) VALUES ($id_user, $titlu, $imagine1, $imagine2, $imagine3, $descriere, $categorie, $pret, $producator)";
				}
			}
		}
		if(mysqli_query($db, $sql2)){
			echo 'Da';
		}
		else{
			echo mysqli_error($db);
			echo " ".$id_user.$titlu . $imagine1 . $imagine2 . $imagine3 . $descriere . $categorie . $pret . $producator;
			echo " ". $ok1. $ok2 . $ok3;
		}
	}
	
?>