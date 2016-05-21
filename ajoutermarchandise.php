
<html>
<body>
<p>
<a href='marchandise.php'>  &lsaquo; Retour à la page marchandise</a>
</p>
<?php
		//connexion
	$vHost = "tuxa.sme.utc";
	$vPort = "5432" ;
	$vData = "dbnf17p114";
	$vUser = "nf17p114";
	$vPass = "SVYhc0nK";
	$vConn=pg_connect("host=$vHost port=$vPort dbname=$vData user=$vUser password=$vPass");

		// traitement ajout de nouvelles marchandises
	$vIdentifiant=$_POST['id'];
	$vDenomination=$_POST['den'];
	$vPrix=$_POST['prix'];
	$vStock=$_POST['stock'];
	$vNum=$_POST['numclient'];
	$vSql="INSERT INTO Marchandise (identifiant, denomination, prix, stock, num_client) VALUES ('$vIdentifiant', '$vDenomination','$vPrix', '$vStock','$vNum')";
	$vQuery=pg_query($vConn,$vSql);

	if($vQuery)echo"<h2>Enregistrement de la nouvelle marchandise $vDenomination bien effectué.</h2>";
	else echo"Mauvaise saisie";
?>
</body>
</html>