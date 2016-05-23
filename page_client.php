<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<?php
	$ID_client=$_GET['ID'];
	include("connexion.php");
	$query="SELECT num_client,nom,prenom,email,telephone FROM Client WHERE num_client=$ID_client ";
	$result=pg_query($vConn,$query);
	$array = pg_fetch_array($result);
echo"<center><h1> Page de $array[nom] $array[prenom]</h1><br/>";
	
	
	echo"<table><tr><th>ID :</th><td> $array[num_client]</td></tr>
	<tr><th>Nom :</th><td>$array[nom] /td></tr>
	<tr><th>Prénom :</th><td> $array[prenom]</td></tr>
	<tr><th>Email :</th><td>$array[email] /td></tr>
	<tr><th>Telephone :</th><td>$array[telephone] /td></tr>";
	//recherche de l'adresse du client
	$query2="SELECT * FROM Client INNER JOIN Habitation ON Client.num_client=Habitation.num_client WHERE num_client=$ID_client ";
	$result2=pg_query($vConn,$query2);
	$array2 = pg_fetch_array($result2);

	echo"<tr><th>Adresse :</th><td>$array2[num_rue] $array2[type_route] $array2[nom_rue], batiment $array2[num_bat], appartement $array2[num_appart] /td></tr>";// affichage adresse
	echo"</table>";
	//requete pour les livraisons

	$query3="SELECT * FROM Client INNER JOIN Marchandise ON Client.num_client=Marchandise.num_client WHERE num_client=$ID_client ORDER BY date_poss";
	$result3=pg_query($vConn,$query3);
	echo"Historiques des commandes du client:<br/>"."\n";
	$array3 = pg_fetch_array($result3));
	if (empty($array3)){
			echo "Le client n'as jamais rien commandé";
			exit;
		} else {
			echo"<table><tr><th>ID commande</th><th>Marchandise</th><th>A voir pour les autre colonnes.....</th></tr>";
			while ($array3 = pg_fetch_array($result3)){
		
		
				echo"<table><tr><td>$array3[identifiant]</td><td>$array3[denomination]</td></tr>";


			} 
			echo"</table>";
			echo "faut faire un if date()>date poss ou date arriv je sais pas j'ai pas compris alors état = livré "
		}
	


	?>


</center>
</body>

</html>
