<html>
<head>
<title>Creation client</title>
</head>
<body>
	Bienvenue sur la page de creation de client !



<?php
	include 'connexion.php';
	$type_r=$_POST['type_r'];
	$nom_r = $_POST['nom_r'];
	$num_rue=$_POST['num_rue'];

	echo $type_r;
	echo $nom_r;
	echo $num_rue;

	$vSql = "SELECT num_bat FROM Batiment WHERE num_rue='$num_rue' AND nom_route='$nom_r' AND type_route = '$type_r' ORDER BY num_bat";

	$vQuery = pg_query($vConn,$vSql);

	echo 'Dans quel batiment habitez vous ?';

	echo '<form method ="post" action = "new_client_etage.php?type_r=$type_r&amp;nom_r=$nom_r&amp;num_rue=$num_rue&amp;num=$vNum">';
		echo'Numéro de batiment : <SELECT name="num_batiment" size="1">';
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