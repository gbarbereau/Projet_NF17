<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<center><h1> Listes Clients</h1><br/>
	<?php
	$tri=$_GET['tri'];
	include("connexion.php");
	if ($tri=='ID') $query="SELECT num_client,nom,prenom FROM Client ORDER BY num_client";
	if ($tri=='nom') $query="SELECT num_client,nom,prenom FROM Client ORDER BY nom,prenom";
	$result=pg_query($vConn,$query);
	echo"<table border='1px' ><tr><th><center><a href='liste_client.php?tri=ID'>ID Client </a></center></th><th><center><a href='liste_client.php?tri=nom'> Nom </a></center></th><th><center>Prénom</center></th></tr>";
	//boucle de lecture
	while ($array = pg_fetch_array($result)) {
	echo"<tr><td>$array[num_client]</td><td>$array[nom]</td><td>$array[prenom]</td>";
	echo"<td><a href='page_client.php?ID=".$array['num_client']."'>Page de $array[prenom]</a></td>";//lien de redirectin en get vers la page client.php
	echo"</tr>";
	}
echo"</table>";


	?>


</center>
</body>

</html>
