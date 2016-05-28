
<html>
<body>
<p>
<a href='marchandise.php'> &lsaquo; Retour à la page marchandise</a>
</p>
<?php
	include 'connexion.php';

		// traitement modification stock de certaines marchandises
	$vReference=$_POST['ref'];
	$vDelai=$_POST['delai'];
	$vStock=$_POST['restock'];
	$vIdentifiant=$_POST['identifiant'];

			//insertion données dans table réapprovisionnement
	$vSql="INSERT INTO reapprovisionnement VALUES ('$vReference','$vDelai','$vStock','$vIdentifiant')";
	$vQuery=pg_query($vConn, $vSql);
		if($vQuery)echo"<h2>Enregistrement du réapprovisionnement pour la marchandise $vIdentifiant bien réalisé.</h2>";
	else echo"Mauvaise saisie. <br\>Rappel : le délai et le stock doivent être des entiers. ";

			//modification stock dans marchandises
	$vSql="UPDATE Marchandise SET stock='$vStock' WHERE identifiant='$vIdentifiant'"; 
	$vQuery=pg_query($vConn, $vSql);
	if($vQuery)echo"<h2>Stock modifié!</h2>";
	else echo"Mauvaise saisie";


?>
</body>
</html>