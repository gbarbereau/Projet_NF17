<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<center><h1> Informations pour le livreur</h1><br/>
	<?php
	
	include("connexion.php");
	
	$query="SELECT Route.Nom,Route.Type,Route.Etat, COUNT(Client.num_client) AS nb_client FROM Route 
			INNER JOIN Habitation ON Habitation.nom_route=Route.nom AND Habitation.type_route=Route.type --On chope le client
			INNER JOIN Client ON Habitation.num_client=Client.num_client
			INNER JOIN Marchandise ON Client.num_client=Marchandise.num_client --On choppe les commande
			WHERE Marchandise.date_arri IS NULL --commande en attente de livraison
			GROUP BY Route.nom, Route.type -- pour afficher le nombre de livraison par route
			ORDER By nb_client DESC
			";
	$result=pg_query($vConn,$query);
	echo"<table><tr><th><center>Route</a></center></th><th><center>Etat de la route</center></th><th><center>Nombre de clients à livrer</center></th></tr>";
	//boucle de lecture
	while ($array = pg_fetch_array($result)) {
	
	echo"<tr><td>".$array['type']." ".$array['nom']."</td><td>".$array['etat']."</td>";
	echo"<td><center><a href='page_route.php?nom=".$array['nom']."&type=".$array['type']."'>$array[nb_client]</a></center></td>";//lien de redirectin en get vers la page client.php
	echo"</tr>";
	}
echo"</table>";

	?>
	<br/>
	<br/>
	Voulez-vous changer l'état d'une route ?
<?php
	include("connexion.php");
	$query='SELECT Nom,Type FROM Route ORDER BY TYPE';
	$result=pg_query($vConn,$query);
?>
<form action='update_route.php' method='POST'>

	<SELECT name="route">
<?php
	while($parcours = pg_fetch_array($result)){
		echo '<OPTION>',$parcours[1],' ',$parcours[0],'</OPTION>';
	}
?>
	Choisissez la route : 
	</SELECT>
<?php
	include("connexion.php");
	$query="SELECT ETAT FROM ETAT_R";
	$result=pg_query($vConn,$query);
?>
	Etat de la route :
	<SELECT name="etat">
<?php
	while($parcours = pg_fetch_array($result)){
		echo "<OPTION>";
		echo $parcours[0];
		echo "</OPTION>";
	}
?>
	</SELECT>
</option><input type='submit' value='Envoyer' name='send'>
</form>

</center>
</body>

</html>
