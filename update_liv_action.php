<html>
<head>
<title>Commande</title>
</head>
<body>
	Bienvenue sur la page de creation de commande !




<?php
	include 'connexion.php';
	$Code_M=$_POST['code'];
	$date = $_POST['date'];
	$heure=$_POST['heure'];

	$vSql = 'UPDATE marchandise
	SET date_arri=$date, heure_arri=$heure
	WHERE identifiant = $Code_M;'
	$vQuery = pg_query($vConn,$vSql);

?>


</body>
</html>