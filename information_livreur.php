<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<center><h1> Informations pour le livreur</h1><br/>
	<?php
	
	include("connexion.php");
	echo"<form method=POST action='result_livreur.php'>";
	echo"A quelle intersection êtes vous positionné?";
	
	$query="SELECT * FROM Jonction 
			INNER JOIN type_jonction ON Jonction.type=type_jonction.typeJ
			
			 ";
	$result=pg_query($vConn,$query);
	echo"<select name='jonction'>";
	while ($array = pg_fetch_array($result)) {
		
	echo"<option value=$array[id_j] >ID:$array[id_j] $array[type]</option>";
	}
	echo"</select> ";
	echo"<input type=submit />";
	echo"</form>";

	?>


</center>
</body>

</html>
