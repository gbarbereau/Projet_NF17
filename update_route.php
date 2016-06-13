<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<center>
<?php
		include("connexion.php");
		$type_r=$_POST[route];
		$explode = explode(' ', $type_r, 2);
		$type_r = $explode[0];
		$nom_r = $explode[1];

		$etat=$_POST[etat];

		$query="UPDATE ROUTE SET Etat='$etat' WHERE Nom='$nom_r' AND Type='$type_r'";
	$result=pg_query($vConn,$query);
?>
	<a href='information_route.php'> Retour à l'accueil</a>
</center>
</body>

</html>
