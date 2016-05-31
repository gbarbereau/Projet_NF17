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
	echo"<select name='jonction'>";
	$query="SELECT * FROM Jonction 
			INNER JOIN type_jonction ON Jonction.type=type_jonction.typeJ
			
			 ";
	$result=pg_query($vConn,$query);
	while ($array = pg_fetch_array($result)) {
	echo"<option value=$array[ID_J] >$array[ID_J] $array[type]</option>";
	}
	echo"</select> Dsl on a pas mis de nom au jonctions mais c'est pas ma faute tu comprend... #UML de merde";
	echo"<input type=submit />";
	echo"</form>";

	?>


</center>
</body>

</html>
