<html>
<head>
<title>Creation client</title>
</head>
<body>
	Bienvenue sur la page de creation de client !



<?php
	include 'connexion.php';
	$type_r=$_GET['type_r'];
	$nom_r = $_GET['nom_r'];
	$num_rue=$_GET['num_rue'];
	$num_bat=$_GET['num_batiment'];
	$num_etage=$_POST['num_etage'];

	$vSql = 'SELECT num_appart FROM Appartement WHERE num_rue='$num_rue' AND nom_route='$nom_route' AND type_route = '$type_r' AND num_bat='$num_bat' AND num_etage='$num_etage' ORDER BY num_appart';

	$vQuery = pg_query($vConn,$vSql);

	echo 'Dans quel batiment habitez vous ?';

	echo '<form method ="post" action = "new_client_app.php?type_r=$type_r&amp;nom_r=$nom_r&amp;num_rue=$num_rue&amp;num_bat=$num_bat&amp;num_etage=$num_etage&amp;num=$vNum">';
		echo'Numéro de lappart : <SELECT name="num_appart" size="1">';
		while ($vResult = pg_fetch_array($vQuery))
		{
			echo '<OPTION>',$vResult[0],'</OPTION>';
		}

		echo '</SELECT>';
		echo'<input type="submit" value="ajouter" name="validation"><br><br><br>';
	echo'</form>';
	pg_close($vConn);

	?>


</body>
</html>