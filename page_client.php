<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<?php
	date_default_timezone_set('Europe/Paris');
		$date = date("Y/m/j");
		
	$ID_client=$_GET['ID'];
	include("connexion.php");
	$query="SELECT num_client,nom,prenom,email,telephone FROM Client WHERE num_client=$ID_client ";
	$result=pg_query($vConn,$query);
	$array = pg_fetch_array($result);
echo"<center><h1> Page de $array[nom] $array[prenom]</h1><br/>";
	
	
	echo"<table><tr><th>ID :</th><td> $array[num_client]</td></tr>
	<tr><th>Nom :</th><td>$array[nom] </td></tr>
	<tr><th>Prénom :</th><td> $array[prenom]</td></tr>
	<tr><th>Email :</th><td>$array[email] </td></tr>
	<tr><th>Telephone :</th><td>$array[telephone] </td></tr>";
	//recherche de l'adresse du client
	$query2="SELECT * FROM Client INNER JOIN Habitation ON Client.num_client=Habitation.num_client WHERE Client.num_client=$ID_client ";
	$result2=pg_query($vConn,$query2);
	$array2 = pg_fetch_array($result2);

	echo"<tr><th>Adresse :</th><td>$array2[num_rue] $array2[type_route] $array2[nom_route], batiment $array2[num_bat], etage $array2[num_etage] appartement $array2[num_appart] </td></tr>";// affichage adresse
	echo"</table>";
	//requete pour les livraisons

	$query3="SELECT * FROM Marchandise INNER JOIN Livraison ON Marchandise.num_client=Livraison.num_client WHERE Marchandise.num_client=$ID_client ORDER BY date_poss";
	$result3=pg_query($vConn,$query3);
	echo"Historiques des commandes du client:<br/>"."\n";
	$array3 = pg_fetch_array($result3);
	if (empty($array3)){
			echo "Le client n'a jamais rien commandé";
			exit;
		} else {
			echo"<table border='1px solid red' ><tr><th>ID commande</th><th>Marchandise</th><th>Prix</th><th>Date Arrivée</th></tr>";
			echo"<tr><td>$array3[identifiant]</td><td>$array3[denomination]</td><td>$array3[prix]</td><td>";
			while ($array3 = pg_fetch_array($result3)){
		
		
				echo"<tr><td>$array3[identifiant]</td><td>$array3[denomination]</td><td>$array3[prix]</td><td>";
				if ($array3['date_arri']=='') echo"Arrivé prévu le: ".$array3['date_poss'];
				else echo"$array3[date_arri]";

				echo"</td></tr>";


			} 
			echo"</table>";
		
		}
	


	?>


</center>
</body>

</html>

