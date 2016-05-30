<html>
<head>
<title>Creation client</title>
</head>
<body>



<?php
	include 'connexion.php';
	$type_r=$_POST['type_r'];
	$nom_r = $_POST['nom_r'];
	$num_rue=$_POST['num_rue'];
	$num_bat=$_POST['num_batiment'];
	$vNum=$_POST['num'];
	$vSql = "SELECT num_etage FROM Etage WHERE num_rue='$num_rue' AND nom_route='$nom_r' AND type_route='$type_r' AND num_bat='$num_bat' ORDER BY num_etage";

	$vQuery = pg_query($vConn,$vSql);

	echo 'A quel étage habitez-vous ?<br>';

	echo '<form method ="post" action = "new_client_app.php">';
		echo'Numéro de létage : <SELECT name="num_etage" size="1">';
		while ($vResult = pg_fetch_array($vQuery))
		{
			echo '<OPTION>',$vResult[0],'</OPTION>';
		}

		echo '</SELECT>';
		echo "<INPUT TYPE='hidden' NAME='num_bat' VALUE='$num_bat'>";		
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