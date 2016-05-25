<html>
<head>
<title>Creation client</title>
</head>
<body>
	Bienvenue sur la page de creation de client !



<?php
	include 'connexion.php';
	$type_r=$_POST['type_r'];
	$nom_r = $_POST['nom_r'];
	$num_rue=$_POST['num_rue'];
	$num_bat=$_POST['num_bat'];
	$num_etage=$_POST['num_etage'];
	$num_appart=$_POST['num_appart'];
	$vNum=$_POST['num'];
	$vSql = "INSERT INTO Habitation VALUES ('$vNum','$num_appart','$num_etage','$num_bat','$num_rue','$nom_r','$type_r')";

	$vQuery = pg_query($vConn,$vSql);


	pg_close($vConn);

	?>


</body>
</html>