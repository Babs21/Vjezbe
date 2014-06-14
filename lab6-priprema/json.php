<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

session_start();

if($_SESSION["login"] == "1"){

	if($_POST){
		
		define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
		require('includes/classes/class.Database.php');
		
		$Database = new Database();
		
		$ime 			= $Database->sql_escape($_POST["ime"]);
		$prezime 		= $Database->sql_escape($_POST["prezime"]);
		$krv 			= $Database->sql_escape($_POST["krv"]);

		$result = $Database->fetchquery("SELECT * FROM bolesni WHERE ime LIKE '%".$ime."%' AND prezime LIKE '%".$prezime."%' AND krvnagrupa LIKE '%".$krv."%';");
		$data = json_encode($result);
		echo '
				<!DOCTYPE HTML>
				<html>
				<head>
					<title>Labos1</title>
					<link type="text/css" rel="stylesheet" href="css/style.css" /> 
					<meta http-equiv="content-type" content="text/html; charset=utf-8">
					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
					<script>
						$( document ).ready(function() {
							var data = \''.$data.'\';
							var obj = jQuery.parseJSON(data);
							var i = 0;
							$("#broj").html("Broj #"+(i+1));
							$("#ime").html("Ime: "+obj[i].ime);
							$("#prezime").html("Prezime: "+obj[i].prezime);
							$("#spol").html("Spol: "+obj[i].spol);
							$("#krv").html("Krvna grupa: "+obj[i].krvnagrupa);
							$("#iza").click(function(){
								if(i<=0){
									alert("Ovo je prvi rezultat!");
								}else{
									i--;
									$("#broj").html("Broj #"+(i+1));
									$("#ime").html("Ime: "+obj[i].ime);
									$("#prezime").html("Prezime: "+obj[i].prezime);
									$("#spol").html("Spol: "+obj[i].spol);
									$("#krv").html("Krvna grupa: "+obj[i].krvnagrupa);
								}
							});
							$("#dalje").click(function(){
								if(i>=(obj.length-1)){
									alert("Ovo je zadnji rezultat!");
								}else{
									i++;
									$("#broj").html("Broj #"+(i+1));
									$("#ime").html("Ime: "+obj[i].ime);
									$("#prezime").html("Prezime: "+obj[i].prezime);
									$("#spol").html("Spol: "+obj[i].spol);
									$("#krv").html("Krvna grupa: "+obj[i].krvnagrupa);
								}
							});
						});
					</script>
				</head>
				<body>	
					<div id="header">
						<img alt="ZKD" src="slike/logo.png"/>
						<p id="name">Korisnicko ime: <b>'.$_SESSION["name"].'</b></p>
						<form action="login.php" method="GET" name="odjava">
							<input type="submit" name="submit" value="Odjava" id="odjava" />
						</form>
					</div>
					<div id="navigacija">
						<ul id="lista">
							<li>
								<center><a href="login.php">Životopis</a></center>
							</li>
							<li>
								<center><a href="tablica.php">Pacijenti</a></center>
							</li>
							<li>
								<center><a href="unos.php">Upis pac</a></center>
							</li>
							<li>
								<center><a href="pdf.php">Pretraga</a></center>
							</li>
							<li>
								<center><a href="upit.php">Traži</a></center>
							</li>
							<li>
								<center><a href="json.php">JSON</a></center>
							</li>
						</ul>
					</div>
					<div id="unos">
						<p id="broj"></p>
						<p id="ime"></p>
						<p id="prezime"></p>
						<p id="spol"></p>
						<p id="krv"></p><br />
						<button id="iza" type="button">Prethodni</button>
						<button id="dalje" type="button">Slijedeci</button>
					</div>
					<div id="footer">
						<center><p>Copyright ZKD, 2014</p></center>
					</div>
				</body>
				</html>
		';
	}else{
		echo '
<!DOCTYPE HTML>
<html>
<head>
	<title>Labos1</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" /> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
</head>
<body>	
	<div id="header">
		<img alt="ZKD" src="slike/logo.png"/>
		<p id="name">Korisnicko ime: <b>'.$_SESSION["name"].'</b></p>
		<form action="login.php" method="GET" name="odjava">
			<input type="submit" name="submit" value="Odjava" id="odjava" />
		</form>
	</div>
	<div id="navigacija">
		<ul id="lista">
			<li>
				<center><a href="login.php">Životopis</a></center>
			</li>
			<li>
				<center><a href="tablica.php">Pacijenti</a></center>
			</li>
			<li>
				<center><a href="unos.php">Upis pac</a></center>
			</li>
			<li>
				<center><a href="pdf.php">Pretraga</a></center>
			</li>
			<li>
				<center><a href="upit.php">Traži</a></center>
			</li>
			<li>
				<center><a href="json.php">JSON</a></center>
			</li>
		</ul>
	</div>
	<div id="unos">
		<form action="json.php" method="POST">
			<label for="ime">Ime:</label><br />
			<input type="text" name="ime" id="ime" /><br />
			<label for="prezime">Prezime:</label><br />
			<input type="text" name="prezime" id="prezime" /><br />
			<label for="krv">Krvna grupa:</label><br />
			<input type="text" name="krv" id="krv" /><br />
			<input type="submit" id="submit" value="Pošalji" />
		</form>
	</div>
	<div id="footer">
		<center><p>Copyright ZKD, 2014</p></center>
	</div>
</body>
</html5>
		';
	}
}else{
	echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
	echo '<script>alert(\'Zabranjen pristup!\');</script>';
	die('<script type="text/javascript">window.location=\'login.html\';</script>');
}
?>