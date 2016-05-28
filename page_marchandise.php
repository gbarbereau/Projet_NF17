<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<center><h1> Informations pour le livreur</h1><br/>
	<?php
	$ID=$_GET['ID'];
	include("connexion.php");
	$ID_jonction=$_POST['jonction']
	$query="SELECT * FROM Marchanise 
			
			WHERE Marchandise.identifiant=$ID 
	
			";
	$result=pg_query($vConn,$query);
	echo"<table><tr><th><center>Produit</a></center></th><th><center>Prix</center></th>><th><center>Stock Restant</center></th></tr>";
	//boucle de lecture
	while ($array = pg_fetch_array($result)) {
	echo"<tr><td>$array[Marchandise.denomination]</td><td>$array[Marchandise.prix]</td>";
	echo"<td>$array[Marchandise.stock]</td>";
	echo"</tr>";
	}
echo"</table>";

	?>


</center>
</body>

</html>