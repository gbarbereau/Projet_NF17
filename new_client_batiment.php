<html>
<head>
	<title>Création client</title>
</head>
<body>



	<?php
	include 'connexion.php';
	$type_r=$_POST['type_r'];
	$nom_r = $_POST['nom_r'];
	$num_rue=$_POST['num_rue'];
	$vNum=$_POST['num'];
	$vSql = "SELECT num_bat FROM Batiment WHERE num_rue='$num_rue' AND nom_route='$nom_r' AND type_route = '$type_r' ORDER BY num_bat";

	$vQuery = pg_query($vConn,$vSql);

	echo 'Dans quel batiment habitez vous ?<br>';

	echo '<form method ="post" action = "new_client_etage.php">';
	echo'Numéro de batiment : <SELECT name="num_batiment" size="1">';
	while ($vResult = pg_fetch_array($vQuery))
	{
		echo '<OPTION>',$vResult[0],'</OPTION>';
	}

	echo '</SELECT>';
	echo "<INPUT TYPE='hidden' NAME='num_rue' VALUE='$num_rue'>";
	echo "<INPUT TYPE='hidden' NAME='type_r' VALUE='$type_r'>";
	echo "<INPUT TYPE='hidden' NAME='nom_r' VALUE='$nom_r'>";
	echo "<INPUT TYPE='hidden' NAME='num' VALUE='$vNum'>";
	echo'<input type="submit" value="ajouter" name="validation"><br><br><br>';
	echo'</form>';
	pg_close($vConn);

	?>


</body>
</html>