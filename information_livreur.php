<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>

</head>

<body>
<center><h1> Informations pour le livreur</h1><br/>
	<?php
	include("connexion.php");
	?>
	<form method=POST action='result_livreur.php'>
	À quelle intersection êtes vous positionné ?
	<select name='jonction'>
	<?php
	$query="SELECT * FROM Jonction 
				INNER JOIN type_jonction ON Jonction.type=type_jonction.typeJ";
				
	$result=pg_query($vConn,$query);
	while ($array = pg_fetch_array($result)) {
		echo"<option value=$array[ID_J] >$array[ID_J] $array[type]</option>";
	}
	?>
	</select>
	<input type=submit />
	</form>

	
</center>
</body>

</html>
