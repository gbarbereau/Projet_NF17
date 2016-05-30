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
	$num_bat=$_POST['num_bat'];
	$num_etage=$_POST['num_etage'];
	$vNum=$_POST['num'];
	echo 'Le numero du batiment est';
	echo $num_bat;
	$vQuery = pg_query($vConn,"SELECT num_appart FROM Appartement WHERE num_rue='$num_rue' AND num_bat='$num_bat' AND nom_route='$nom_r' AND num_etage='$num_etage' AND type_route='$type_r' ORDER BY num_appart");

	echo 'Dans quel appartement habitez vous ?<br>';

	echo '<form method ="post" action = "new_habitation.php">';
	echo'Numéro de lappart : <SELECT name="num_appart" size="1">';

	while ($vResult = pg_fetch_array($vQuery))
	{
		echo '<OPTION>',$vResult[0],'</OPTION>';
	}
	echo '</SELECT>';
	echo "<INPUT TYPE='hidden' NAME='num_etage' VALUE='$num_etage'>";				
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