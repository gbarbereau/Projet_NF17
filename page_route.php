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
	$ID_jonction=$_POST['jonction'];
	$query="SELECT * FROM Habitation 
			INNER JOIN Client ON Habitation.num_client=Client.num_client
			INNER JOIN Marchandise ON Client.num_client=Marchandise.num_client --On choppe les commande
			INNER JOIN Livraison ON Client.num_client=Livraison.num_client
			WHERE Habitation.nom_route='".$route."' 
			AND Habitation.type_route='".$type."'
			AND Marchandise.date_arri IS NULL --commande en attente de livraison
			
			";
	$result=pg_query($vConn,$query);
	echo"<table><tr><th><center>ID</center></th><th><center>Client</a></center></th><th><center>Livraison prévu le:</center></th><th><center>Adresse de livraison</center></th><th><center>Marchandise</center></th></tr>";
	//boucle de lecture
	while ($array = pg_fetch_array($result)) {
	echo"<tr><td>$array[num_client]</td><td><a href='page_client.php?ID=".$array['num_client']."'>".$array['nom']." ".$array['prenom']."</a></td><td>".$array['date_poss']." à ".$array['heure_poss']."</td><td>$array[num_rue] $array[type_route] $array[nom_route], batiment $array[num_bat], appartement $array[num_appart] </td>";
	echo"<td><a href='page_marchandise.php?ID=".$array['identifiant']."'>".$array['denomination']."</a></td>";//lien de redirectin en get vers la page client.php
	echo"</tr>";
	}
echo"</table>";

	?>
	<br/>
	<br/>

</center>
</body>

</html>
