<html>
<head>
<title>Commande</title>
</head>
<body>
	<h2>Bienvenue sur la page de creation de commande !</h2>
<?php
	include 'connexion.php';
	$Code_M=$_POST['code'];
	$vdate = $_POST['date'];
	$heure=$_POST['heure'];
	$vQuantite=$_POST['qte'];

	//update date et heure arrivée 

	$vSql = "UPDATE marchandise
	SET date_arri='$vdate', heure_arri='$heure'
	WHERE identifiant = '$Code_M'";
	$vQuery = pg_query($vConn,$vSql);

	//update stock du produit livré
		// recuperation de la denomination du produit livré
	$vSql = "SELECT denomination FROM marchandise WHERE identifiant = '$Code_M'";
	$vQuery = pg_query($vConn, $vSql);
	$vDenom = pg_fetch_array($vQuery);

		//recuperation du stock initial
	$vSql = "SELECT stock FROM marchandise WHERE denomination='$vDenom[0]'";
	$vQuery = pg_query($vConn,$vSql);
	$vResult= pg_fetch_array($vQuery);

	$vNvStock = $vResult[0]-$vQuantite;
	$vSql = "UPDATE marchandise
	SET stock='$vNvStock'
	WHERE identifiant = '$Code_M'";
	$vQuery = pg_query($vConn,$vSql);
	echo "Stock restant de la marchandise ";
	echo "<b> ";
	echo $vDenom[0] ; 
	echo "</b> : ";
	echo $vNvStock ;
	echo "</br>";
	// verif
	if($vQuery)echo"</br>Enregistrement effectué!";
	else echo"Mauvaise saisie";
?>


</body>
</html>