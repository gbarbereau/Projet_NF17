<html>
<head>
</head>

<body>
<?php

include("connexion.php");
echo "<center>";
echo "<h1>consultation des livraisons a effectuer</h1><br>";




if(!empty($_POST['validation']))
{


	if ($_POST['validation']=="consulter livraisons du jour") 
	{

		$vQuery = "SELECT C.num_client AS cli , C.nom AS nom , C.prenom AS pre, SUM(M.prix) AS prix_total, L.heure_poss AS har
		FROM Client C, Marchandise M, Livraison L
		WHERE C.num_client=M.num_client
		AND L.num_client=M.num_client
		AND L.date_poss='NOW()'
		GROUP BY C.num_client,L.heure_poss
		ORDER BY L.heure_poss, C.num_client;
		";

		$vResult = pg_query($vConn,$vQuery);
		
		$vInc=0;
		echo "<table border='1' class='table' style='width:100%'>";
		echo "<tr><th> </th><th>ID Client</th><th>nom Client</th><th>Prenom Client</th><th>Prix Total</th><th>cliquez pour consulter</th></tr><br>";
		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			$vInc= $vInc+1;
			echo "<tr><td>$vInc</td><td>$vRow[cli]</td><td>$vRow[nom]</td><td>$vRow[pre]</td><td>$vRow[prix_total]</td>
			<td>
				<form action='livraison.php' method='POST'>
					<input type='hidden'  name='idc' value=$vRow[cli]>
					<input type='hidden'  name='dar' value=$vRow[dar]>
					<input type='hidden'  name='har' value=$vRow[har]>
					<input type='hidden'  name='PT' value=$vRow[prix_total]>
					<input type='hidden'  name='form' value='base'>
					</option><input type='submit' value='consulter' name='sub'>
				</form>
			</td>
			</tr>";
		}
		echo "</table><br>";
	}


	if (!empty($_POST['refresh'])) {
		header("Refersh:0");
	}

	$vTri = $_POST['tri'];

	if ($vTri=="jour") {

		echo "<h3>livraisons triees par jour</h3>";


		$vQuery = "SELECT L.date_poss AS dar, C.num_client AS cli, C.nom AS nom, C.prenom AS pre, SUM(M.prix) AS prix_total
		FROM Client C, Marchandise M, Livraison L
		WHERE C.num_client=M.num_client
		AND L.num_client=M.num_client
		GROUP BY L.date_poss, C.num_client
		ORDER BY L.date_poss, C.num_client;
		";

		$vResult = pg_query($vConn,$vQuery);
		
		$vInc=0;
		echo "<table border='1' class='table' style='width:100%'>";
		echo "<tr><th> </th><th> Jour </th><th> ID Client </th><th> nom Client </th><th> Prenom Client </th><th> Prix Total </th><th> cliquez pour consulter </th></tr><br>";
		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			$vInc= $vInc+1;
			echo "<tr><td>$vInc</td><td>$vRow[dar]</td><td>$vRow[cli]</td><td>$vRow[nom]</td><td>$vRow[pre]</td><td>$vRow[prix_total]</td><td>
			<form action='livraison.php' method='POST'>
				<input type='hidden'  name='idc' value=$vRow[cli]>
				<input type='hidden'  name='dar' value=$vRow[dar]>
				<input type='hidden'  name='PT' value=$vRow[prix_total]>
				<input type='hidden'  name='form' value='jour'>
				</option><input type='submit' value='consulter' name='sub'>
			</form>
		</td>
		</tr>";
		}
		echo "</table><br>";


	}elseif ($vTri=="cli") {

		echo "<h3>livraisons triees par client</h3>";
		

		$vQuery = "SELECT C.num_client AS cli , C.nom AS nom , C.prenom AS pre, SUM(M.prix) AS prix_total
		FROM Client C, Marchandise M
		WHERE C.num_client=M.num_client
		GROUP BY C.num_client
		ORDER BY C.num_client;
		";

		$vResult = pg_query($vConn,$vQuery);
		
		$vInc=0;
		echo "<table border='1' class='table' style='width:100%'>";
		echo "<tr><th> </th><th>ID Client</th><th>nom Client</th><th>Prenom Client</th><th>Prix Total</th><th>cliquez pour consulter</th></tr><br>";
		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			$vInc= $vInc+1;
			echo "<tr><td>$vInc</td><td>$vRow[cli]</td><td>$vRow[nom]</td><td>$vRow[pre]</td><td>$vRow[prix_total]</td><td>
			<form action='livraison.php' method='POST'>
				<input type='hidden'  name='idc' value=$vRow[cli]>
				<input type='hidden'  name='PT' value=$vRow[prix_total]>
				<input type='hidden'  name='form' value='cli'>
				</option><input type='submit' value='consulter' name='sub'>
			</form>
		</td>
		</tr>";
		}
		echo "</table><br>";


	}elseif ($vTri=="mar") {

		echo "<h3>livraisons triees par marchandises</h3>";
		

		$vQuery = "SELECT M.identifiant AS idm, M.denomination AS denom, COUNT(C.num_client) AS nb_demandeurs
		FROM Client C, Marchandise M
		WHERE C.num_client=M.num_client
		GROUP BY M.identifiant
		ORDER BY M.identifiant;
		";

		$vResult = pg_query($vConn,$vQuery);
		
		$vInc=0;
		echo "<table border='1' class='table' style='width:100%'>";
		echo "<tr><th>	</th><th>ID Marchandise</th><th>Marchandise</th><th>nombre de demandeurs</th><th>cliquez pour consulter</th></tr><br>";
		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			$vInc= $vInc+1;
			echo "<tr><td>$vInc</td><td>$vRow[idm]</td><td>$vRow[denom]</td><td>$vRow[nb_demandeurs]</td><td>
			<form action='livraison.php' method='POST'>
				<input type='hidden'  name='idm' value=$vRow[idm]>
				<input type='hidden'  name='form' value='mar'>
				</option><input type='submit' value='consulter' name='sub'>
			</form>
		</td>
		</tr>";
		}
		echo "</table><br>";
	}
	echo " <br><br><form action='liste_commande.php'  method='POST'>";
	echo '<input type="submit" value="retour arriere" name="refresh"><br><br><br>';
	echo "</form><br>";



}
else
{

	echo "<h3>Livraisons a effectuer ajourd'hui</h3><br>";

	$vQuery = "SELECT M.identifiant AS idm, COUNT(M.identifiant) AS NbLiv
	FROM Marchandise M, Livraison L
	WHERE L.num_client=M.num_client
	AND L.date_poss='NOW()'
	GROUP BY M.identifiant;
	";

	$vNbLiv=0;
	$vResult = pg_query($vConn,$vQuery);
	while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
	{
		echo " alors ? $vRow[NbLiv] ? <br>";
		$vNbLiv=$vRow[NbLiv];
	}
	if ($vNbLiv==0)
	{
		echo "<br>pas de commandes a livrer aujourd'hui =) <br><br><br>";
	}
	else 
	{
		echo "<br>nombre de livraisons a effectuer aujourd'hui: $vNbLiv <br><br>";
		echo '<form action="liste_commande.php"  method="POST">
		consultez les ! <br>
		<input type="submit" value="consulter livraisons du jour" name="validation"><br><br><br>
		</form>';
	}

	echo "<h3>Triez les livraisons</h3><br>";


	echo '<form action="liste_commande.php"  method="POST">
		choisissez le type de tri que vous souhaitez appliquer: 
		<select name="tri" > <br>
			<option value ="jour">tri par jour</option>
			<option value ="cli">par clients</option>
			<option value ="mar">par marchandises</option>
		</select><br>
		<input type="submit" value="consulter" name="validation"><br><br><br>
		</form>';
	

	echo "<h3>affichage de base:</h3><br>";

	$vQuery = "SELECT C.num_client AS cli , C.nom AS nom , C.prenom AS pre, SUM(M.prix) AS prix_total, L.date_poss AS dar, L.heure_poss AS har
	FROM Client C, Marchandise M, Livraison L
	WHERE C.num_client=M.num_client
	AND L.num_client=M.num_client
	GROUP BY C.num_client, L.date_poss, L.heure_poss
	ORDER BY L.date_poss, L.heure_poss, C.num_client;
	";

	$vResult = pg_query($vConn,$vQuery);
	
	$vInc=0;
	echo "<table border='1' class='table' style='width:100%'>";
	echo "<tr><th> </th><th>ID Client</th><th>nom Client</th><th>Prenom Client</th><th>Prix Total</th><th>cliquez pour consulter</th></tr><br>";
	while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
	{
		$vInc= $vInc+1;
		echo "<tr><td>$vInc</td><td>$vRow[cli]</td><td>$vRow[nom]</td><td>$vRow[pre]</td><td>$vRow[prix_total]</td>
		<td>
			<form action='livraison.php' method='POST'>
				<input type='hidden'  name='idc' value=$vRow[cli]>
				<input type='hidden'  name='dar' value=$vRow[dar]>
				<input type='hidden'  name='har' value=$vRow[har]>
				<input type='hidden'  name='PT' value=$vRow[prix_total]>
				<input type='hidden'  name='form' value='base'>
				</option><input type='submit' value='consulter' name='sub'>
			</form>
		</td>
		</tr>";
	}
	echo "</table><br>";

}
pg_close($vConn);

echo "</center>";
?>
</body>
</html>