<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<center><h1> Informations pour le livreur</h1><br/>
	<?php
	
	include("connexion.php");
	$ID_jonction=$_POST['jonction'];
	$query="SELECT Route.Nom,Route.Type,Route.Etat, COUNT(Client.num_client) AS nb_client FROM Jonction 
			INNER JOIN Liaison ON Jonction.ID_J=Liaison.ID_J 
			INNER JOIN Route ON Route.Nom=Liaison.nom_r AND Route.Type=Liaison.type_route --Pour recup l'etat
			INNER JOIN Habitation ON Habitation.nom_route=Liaison.nom_r AND Habitation.type_route=Liaison.type_route --On chope le client
			INNER JOIN Client ON Habitation.num_client=Client.num_client
			INNER JOIN Marchandise ON Client.num_client=Marchandise.num_client --On choppe les commande
			WHERE Jonction.ID_J='".$ID_jonction."' 
			AND Marchandise.date_arri IS NULL --commande en attente de livraison
			GROUP BY Route.nom, Route.type -- pour afficher le nombre de livraison par route
			";
	$result=pg_query($vConn,$query);
	echo"<table border=1px ><tr><th><center>Route</a></center></th><th><center>Etat de la route</center></th><th><center>Nombre de clients à livrer</center></th></tr>";
	//boucle de lecture
	while ($array = pg_fetch_array($result)) {
	echo"<tr><td>".$array[type]." ".$array['nom']."</td><td>".$array['etat']."</td>";
	echo"<td><a href='page_route.php?nom=".$array['nom']."&type=".$array['type']."'>$array[nb_client]</a></td>";//lien de redirectin en get vers la page client.php
	echo"</tr>";
	}
echo"</table>";

	?>


</center>
</body>

</html>
