<?php
session_start();
if($_POST){
	if($_POST["username"] == "admin" AND $_POST["password"] == "password"){
		$_SESSION["login"] = "1";
		$_SESSION["name"] = $_POST["username"];
		echo '
<html>
<head>
	<title>Labos1</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
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
				<center><a href="#">Stranica</a></center>

			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
		</ul>
	</div>
	<div id="main">
		<center><h2>Životopis</h2></center>
		<h3>Osobni podaci:</h3>
		<p>Mihael Babojeliæ</p>
		<p>Zagreb 18.8.1992.</p>
		<h3>Podaci o školovanju:</h3>
		<p>OŠ Milana Langa</p>
		<p>Tehnièar za raèunalstvo</p>
		<p>TVZ Raèunarstvo</p>
		<h3>Radno iskustvo:</h3>
		<p>Nema</p>
		<h3>Znanja i vještine</h3>
		<p>Položen teèaj za vatrogasca</p>
	</div>
	<div id="footer">
		<center><p>Copyright ZKD, 2014</p></center>
	</div>
</body>
</html>
		';
	}else{
		echo '<script>alert(\'Pogresno korisnicko ime ili lozinka!\');</script>';
	die('<script type="text/javascript">window.location=\'login.html\';</script>');
	}
}else if($_GET){
	$_SESSION["login"] = "0";
	$_SESSION["name"] = "";
	die('<script type="text/javascript">window.location=\'login.html\';</script>');
}else if($_SESSION["login"] == "1"){
	echo '
<html>
<head>
	<title>Labos1</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>	
	<div id="header">
		<img alt="ZKD" src="slike/logo.png"/>
		<p id="name">Korisnicko ime: <b>'.$_SESSION["name"].'</b></p>
		<form action="login.php" method="POST" name="odjava">
			<input type="submit" name="submit" value="Odjava" id="odjava" />
		</form>
	</div>
	<div id="navigacija">
		<ul id="lista">
			<li>
				<center><a href="#">Stranica</a></center>

			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
			<li>
				<center><a href="#">Stranica</a></center>
			</li>
		</ul>
	</div>
	<div id="main">
		<center><h2>Životopis</h2></center>
		<h3>Osobni podaci:</h3>
		<p>Mihael Babojeliæ</p>
		<p>Zagreb 18.8.1992.</p>
		<h3>Podaci o školovanju:</h3>
		<p>OŠ Milana Langa</p>
		<p>Tehnièar za raèunalstvo</p>
		<p>TVZ Raèunarstvo</p>
		<h3>Radno iskustvo:</h3>
		<p>Nema</p>
		<h3>Znanja i vještine</h3>
		<p>Položen teèaj za vatrogasca</p>
	</div>
	<div id="footer">
		<center><p>Copyright ZKD, 2014</p></center>
	</div>
</body>
</html>
		';
}else{
	echo '<script>alert(\'Zabranjen pristup!\');</script>';
	die('<script type="text/javascript">window.location=\'login.html\';</script>');
}
?>