<html>
<head>
</head>

<body>
<?php

include("connexion.php");
echo "<center>";
echo "<h1>caracteristiques de la livraison</h1><br>";

if ($_POST['refresh']) {
	header("Refersh:0; url='liste_commande.php' ");
}

switch ($_POST['form']) {



	case 'base':
	
		$vIdc=$_POST['idc'];
		$vDar=$_POST['dar'];
		$vHar=$_POST['har'];

		echo "<h2> Commande du client: $vIdc
			prevue pour le: $vDar
			a: $vHar h</h2>";


		$vQuery = "SELECT num_client AS idcli, nom, prenom AS pre, email, telephone AS tel 
		FROM Client 
		WHERE num_client=$vIdc;
		";

		$vResult = pg_query($vConn,$vQuery);

		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			
			echo "
			<h4>info client</h4>
			<b>identifiant client:</b> $vRow[idcli] <br>
			<b>nom:</b> $vRow[nom]	<br>
			<b>prenom:</b> $vRow[pre]	<br>
			<b>email:</b> $vRow[email]	<br>
			<b>tel:</b> $vRow[tel]	<br>
			";
		}
		
		$vpt=$_POST['PT'];
		echo "
		<h4>marchandises commandees: <br>
		TOTAL COMMANDE : $vpt	<br>
		</h4>
		";
		$vQuery = "SELECT M.identifiant AS idm, M.denomination AS den, M.prix AS pri, M.stock AS sto
		FROM Client C, Marchandise M, Livraison L
		WHERE C.num_client=M.num_client
		AND L.num_client=M.num_client
		AND C.num_client=$vIdc
		AND L.date_poss='$vDar'
		AND L.Heure_poss=$vHar
		GROUP BY M.identifiant
		"; 
		// si y'a plusieurs fois la meme marchandise pour un meme client a la meme date, il serait bien des les compter, comment faire ? 

		$vResult = pg_query($vConn,$vQuery);
		
		$vInc=0;
		echo "<table border='1' style='width:100%'>";
		echo "<tr><th> </th><th> ID Marchandise </th><th> Marchandise </th><th> Prix unite </th><th> En stock </th></tr><br>";
		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			$vInc= $vInc+1;
			echo "<tr><td>$vInc</td><td>$vRow[idm]</td><td>$vRow[den]</td><td>$vRow[pri]</td><td>$vRow[sto]</td></tr><br>";
		}
		echo "</table><br>";
		break;

// --------------------- TRI PAR JOUR --------------------------------------------------------------------------------------------------

		case 'jour':
	
		$vIdc=$_POST['idc'];
		$vDar=$_POST['dar'];

		echo "<h2> Commande du client: $vIdc 
			prevue pour le: $vDar </h2>";


		$vQuery = "SELECT num_client AS idcli, nom, prenom AS pre, email, telephone AS tel 
		FROM Client 
		WHERE num_client=$vIdc;
		";

		$vResult = pg_query($vConn,$vQuery);

		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			
			echo "
			<h4>info client</h4>
			<b>identifiant client:</b> $vRow[idcli] <br>
			<b>nom:</b> $vRow[nom]	<br>
			<b>prenom:</b> $vRow[pre]	<br>
			<b>email:</b> $vRow[email]	<br>
			<b>tel:</b> $vRow[tel]	<br>
			";
		}
		
		$vpt=$_POST['PT'];
		echo "
		<h4>marchandises commandees: <br>
		TOTAL COMMANDE : $vpt	<br>
		</h4>
		";
		//CAST ($vDar AS DATE);
		$vQuery = "SELECT M.identifiant AS idm, M.denomination AS den, M.prix AS pri, M.stock AS sto
		FROM Client C, Marchandise M, Livraison L
		WHERE C.num_client=M.num_client
		AND L.num_client=M.num_client
		AND C.num_client=$vIdc
		AND L.date_poss='$vDar'
		GROUP BY M.identifiant, L.heure_poss
		ORDER BY L.heure_poss;
		"; 
		// si y'a plusieurs fois la meme marchandise pour un meme client a la meme date, il serait bien des les compter, comment faire ? 

		$vResult = pg_query($vConn,$vQuery);
		
		$vInc=0;
		echo "<table border='1' style='width:100%'>";
		echo "<tr><th> </th><th> ID Marchandise </th><th> Marchandise </th><th> Prix unite </th><th> En stock </th></tr><br>";
		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			$vInc= $vInc+1;
			echo "<tr><td>$vInc</td><td>$vRow[idm]</td><td>$vRow[den]</td><td>$vRow[pri]</td><td>$vRow[sto]</td></tr><br>";
		}
		echo "</table><br>";
		break;

// --------------------- TRI PAR CLIENT --------------------------------------------------------------------------------------------------

		case 'cli':
	
		$vIdc=$_POST['idc'];

		echo "<h2> Commande du client: $vIdc
			prevue pour le: $vDar
			a: $vHar </h2>";


		$vQuery = "SELECT num_client AS idcli, nom AS nom, prenom AS pre, email, telephone AS tel 
		FROM Client 
		WHERE num_client=$vIdc;
		";

		$vResult = pg_query($vConn,$vQuery);

		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			echo "
			<h4>info client</h4>
			<b>identifiant client:</b> $vRow[idcli] <br>
			<b>nom:</b> $vRow[nom]	<br>
			<b>prenom:</b> $vRow[pre]	<br>
			<b>email:</b> $vRow[email]	<br>
			<b>tel:</b> $vRow[tel]	<br>
			";
		}
		
		$vpt=$_POST['PT'];
		echo "
		<h4>marchandises commandees: <br>
		TOTAL COMMANDE : $vpt	<br>
		</h4>
		";

		//CAST ($vDar AS DATE);
		$vQuery = "SELECT M.identifiant AS idm, M.denomination AS den, M.prix AS pri, M.stock AS sto
		FROM Marchandise M
		WHERE M.num_client=$vIdc
		GROUP BY M.identifiant;
		"; 
		// si y'a plusieurs fois la meme marchandise pour un meme client a la meme date, il serait bien des les compter, comment faire -> encore un bouton consulter

		$vResult = pg_query($vConn,$vQuery);
		
		$vInc=0;
		echo "<table border='1' style='width:100%'>";
		echo "<tr><th> </th><th> ID Marchandise </th><th> Marchandise </th><th> Prix unite </th><th> En stock </th></tr><br>";
		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			$vInc= $vInc+1;
			echo "<tr><td>$vInc</td><td>$vRow[idm]</td><td>$vRow[den]</td><td>$vRow[pri]</td><td>$vRow[sto]</td></tr><br>";
		}
		echo "</table><br>";
		break;

// --------------------- TRI PAR MARCHANDISE --------------------------------------------------------------------------------------------------

		case 'mar':
	
		$vIdm=$_POST['idm'];


		echo "<h2> Commande de la marchandise: $vIdm </h2>";


		$vQuery = "SELECT M.identifiant AS idm, M.denomination AS denom, M.prix AS pri, M.stock AS sto, L.date_poss AS dcom, L.heure_poss AS hcom , M.num_client AS idc
		FROM Marchandise M, Livraison L
		WHERE identifiant='$vIdm';
		";

		$vResult = pg_query($vConn,$vQuery);
		while ($vRow = pg_fetch_array($vResult, null, PGSQL_ASSOC))
		{
			
			echo "
			<h4>info marchandise</h4>
			<b>identifiant marchandise:</b> $vRow[idm] <br>
			<b>marchandise:</b> $vRow[denom]	<br>
			<b>prix unite:</b> $vRow[pri]	<br>
			<b>nombre en stock:</b> $vRow[sto]	<br>
			<b>date de la livraison:</b> $vRow[dcom]	<br>
			<b>heure de la livraison:</b> $vRow[hcom]	<br>
			";
		

			$vQuery = "SELECT num_client AS idcli, nom, prenom AS pre, email, telephone AS tel 
			FROM Client 
			WHERE num_client=$vRow[idc];";
			
			$vResult = pg_query($vConn,$vQuery);
			while ($vRow2 = pg_fetch_array($vResult, null, PGSQL_ASSOC))
			{
				echo "
				<h4>client eyant passe la commande:<br></h4>
				<b>identifiant client:</b> $vRow2[idcli] <br>
				<b>nom:</b> $vRow2[nom]	<br>
				<b>prenom:</b> $vRow2[pre]	<br>
				<b>email:</b> $vRow2[email]	<br>
				<b>tel:</b> $vRow2[tel]	<br>
				";
			}
		}

		break;
	
	default:
		echo "error ! ";
		break;
}







echo " <br><br><form action='liste_commande.php'  method='POST'>";
echo '<input type="submit" value="retour arriere" name="refresh"><br><br><br>';
echo "</form><br>";



pg_close($vConn);

echo "</center>";

?>
</body>
</html>