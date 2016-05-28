<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<center><h1> Informations pour le livreur</h1><br/>
	<?php
	$route=$_GET['nom'];
	$type=$_GET['type'];
	echo"<h1>Vous etes sur $type $route</h1>";
	include("connexion.php");
	$ID_jonction=$_POST['jonction']
	$query="SELECT * FROM Habitation 
			INNER JOIN Client ON Habitation.num_client=Client.num_client
			INNER JOIN Marchandise ON Client.num_client=Marchandise.num_client --On choppe les commande
			INNER JOIN Livraison ON Client.num_client=Livraison.num_client
			WHERE Habitation.nom_toute=$route 
			AND Habitation.type_route=$type
			AND Marchandise.date_arriv IS NULL --commande en attente de livraison
			
			";
	$result=pg_query($vConn,$query);
	echo"<table><tr><th><center>Client</a></center></th><th><center>Livraison prévu le:</center></th><th><center>Adresse de livraison</center></th><th><center>Marchandise</center></th></tr>";
	//boucle de lecture
	while ($array = pg_fetch_array($result)) {
	echo"<tr><td><a href='page_client.php?ID=".$array['Client.num_client']."'>$array[Client.nom] $array[Client.prenom]</a></td><td>$array[Livraison.date_poss] à $array[Livraison.heure_poss]</td><td>ICI</td>";
	echo"<td><a href='page_marchandise.php?ID=".$array['Marchandise.identifiant']."'>$array[Marchandise.denomination]</a></td>";//lien de redirectin en get vers la page client.php
	echo"</tr>";
	}
echo"</table>";

	?>


</center>
</body>

</html>
