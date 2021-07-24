<?php include("server.php") ?>
<html>
	<style>
		div.container{
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
			flex-direction: column;
		}
		div.title{
			margin: 0 auto;
			padding: 15px;
			text-align: center;
			background-color: #d3d3d3;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}
		div.formular{
			margin: 0 auto;
			width: 250px;
			padding: 15px;
			text-align: center;
			height: auto;
			background-color: #d3d3d3;
			border-radius: 10px;
		}
		input.reviewpage{
			width: 90%;
			padding: 5;
			padding-left: 10;
			margin-bottom: 10px;
			text-align: center;
			border-radius: 5px;
			color: black;
		}
		input.reviewpage:focus{
			outline: 0;
		}
		div.label_review{
			font-size: 15px;
			margin: 0;
			margin-bottom: 5;
			padding: 5px;
			text-align: center;
		}
		::-webkit-input-placeholder {
		  color: black;
		}

		::-webkit-input-placeholder .input-line:focus +::input-placeholder {
		  color: black;
		}
		div.labels_images{
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;

		}
		div.add_image{
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
			cursor: pointer;
			margin: 2.5;
			width: 70;
			height: 70;
			background-color: #d3d3d3;
			border: 1px solid white;
			border-radius: 5px;
			color: white;
			user-select: none;
		}
		img.image1{
			width: 70;
			height: 70;
			display: none;
		}
		textarea.textarea{
			width: 90%;
			height: auto;
			margin: 0;
			margin-top: 10;
			margin-bottom: 10;
			padding: 5px;
			text-align: center;
			border-radius: 5px;
		}
		textarea.textarea:focus{
			outline: none;
		}
		select.categori{
			width: 90%;
			height: 25px;
			cursor: pointer;
			text-align: center;
			border-radius: 5px;
		}
		select.categori:focus{
			outline: none;
		}
	</style>
	<head>
		<title> Add review </title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" herf="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
		</head>
	<body>
	    <div class="menu-bar">
			<ul>
			<li><a href="action_home.php"><i class="fas fa-home"></i>Home</a></li>
			<li><a><i class="fa fa-users"></i>Account</a>
			    <div class="sub-menu-1">
			        <ul>
			            <li><a href="myaccount.php">MyAccount</a></li>
			        </ul>
			    </div>
			</li>
			<li><a href="freview.php"><i class="fa fa-clone"></i>Find review</a></li>
			</ul>
	    </div>
	    <div class="container">
			<div class="title">
				<?php echo "Adauga propriul review: " . $_SESSION['username'] ; ?>
			</div>
			<div class="formular">
				<form method="POST">
					<input class="reviewpage" type="text" name="titlu" placeholder="Titlu" title="Titlu"></input>
					<label><div class="label_review">Imagini</div></label>
					<div class="labels_images">
						<label for="1page">
							<div class="add_image" id="label_image1" title="Add image">
								<div id="plus1" style="margin:0 auto; font-size:30px;">+</div>
								<img class="image1" id="image1"></img>
							</div>
						</label>
						<label for="2page">
							<div class="add_image" id="label_image2" title="Add image">
								<div id="plus2" style="margin:0 auto; font-size:30px;">+</div>
								<img class="image1" id="image2"></img>
							</div>
						</label>
						<label for="3page">
							<div class="add_image" id="label_image3" title="Add image">
								<div id="plus3" style="margin:0 auto; font-size:30px;">+</div>
								<img class="image1" id="image3"></img>
							</div>
						</label>

						<input type="file" id="1page" name="image1" hidden></input>
						<input type="file" id="2page" name="image2" hidden></input>
						<input type="file" id="3page" name="image3" hidden></input>
					</div>

					<textarea class="textarea" name="descriere" placeholder="Descriere"></textarea>

					<label><div class="label_review">Categorie</div></label>
					<select class="categori" name="categori" id="categori">
						<option value="Electronice">Electronice</option>
						<option value="Gradinarit">Gradinarit</option>
						<option value="Animale de companie">Animale de companie</option>
						<option value="Auto, moto si ambarcatiuni">Auto, moto si ambarcatiuni</option>
					</select>

					<input class="reviewpage" style="margin-top:10;width: 20%;" type="text" name="pret" placeholder="Pret"></input>
					<input class="reviewpage" style="width:65%; margin-left:10;" type="text" name="producator" placeholder="Producator"></input>
						
					<input style="padding: 10px;margin-top: 10px;width: auto;height: auto;cursor: pointer; border-radius:5px;" type="submit" name="submit_review" value="Submit review"></input>
					<div id="testMSG"></div>
				</form>	
			</div>
		</div>
	</body>
	<script>
		document.getElementById("1page").onchange = function(){
			document.getElementById("image1").style.display = "inline-block";
			document.getElementById("image1").src = URL.createObjectURL(document.getElementById("1page").files[0]);
			URL.revokeObjectURL(document.getElementById("1page").files[0]);
			document.getElementById("plus1").style.display = "none";
		}
		document.getElementById("2page").onchange = function(){
			document.getElementById("image2").style.display = "inline-block";
			document.getElementById("image2").src = URL.createObjectURL(document.getElementById("2page").files[0]);
			URL.revokeObjectURL(document.getElementById("2page").files[0]);
			document.getElementById("plus2").style.display = "none";
		}
		document.getElementById("3page").onchange = function(){
			document.getElementById("image3").style.display = "inline-block";
			document.getElementById("image3").src = URL.createObjectURL(document.getElementById("3page").files[0]);
			URL.revokeObjectURL(document.getElementById("3page").files[0]);
			document.getElementById("plus3").style.display = "none";
		}
	</script>
</html>