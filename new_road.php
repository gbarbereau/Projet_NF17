<html>
<head>
</head>

<body>
	<?php
	include("connexion.php");
//echo 'test';
	if(!empty($_POST['validation']))
	{
		$vtype_r = $_POST['type_r']; 
		$vnom_r = $_POST['nom_r'];

	//echo"test";
		$vnom_r = strtolower($vnom_r);

		$vQuery = "INSERT INTO Route VALUES ('$vnom_r','$vtype_r','Normal')";
		$vResult = pg_query($vConn, $vQuery);
		echo 'Success';
	}
	else
	{
		$vSQL = 'SELECT * FROM TYPE_R';
		$vQuery2 = pg_query($vConn,$vSQL);
		echo"<center><h1>Ajout d'une route</h1></center>";
		echo "<table>"
		echo'<form method ="post" action = "new_road.php">';
		echo'<tr><td>Type de rue :</td><td><SELECT name="type_r" size="1"></td></tr>';

		while ($vResult2 = pg_fetch_array($vQuery2))
		{
			echo '<OPTION>',$vResult2[0],'</OPTION>';
		}

		echo '</SELECT>';
		echo'<tr><td>Nom de la rue : </td><td><input type="text" name="nom_r"></td></tr>';
		echo'<tr><td><input type="submit" value="ajouter" name="validation"></td></tr>';
		echo "<table>"
		echo'</form>';

	}

	pg_close($vConn);


	?>
</body>
</html>