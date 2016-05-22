<html>
<head>
<title>Commande</title>
</head>
<body>
	Bienvenue sur la page de creation de commande !


	Quelle commande voulez-vous mettre à jour ?

	<table border="1">
	<tr>
		<td> Coe </td>
		<td> Nom </td>
		<td> Prenom</td>
	</tr>
<?php
	include 'connexion.php';

	$vSql = 'SELECT M.identifiant,C.nom,C.prenom, M.denomination FROM Marchandise M, Client C, Livraison L WHERE L.num_client=M.num_client AND M.date_arri IS NULL AND C.num_client=M.num_client  ORDER BY nom,prenom';
	$vQuery = pg_query($vConn,$vSql);
	while ($vResult = pg_fetch_array($vQuery)){
	echo '<tr>';
	echo '<td>$vResult[0]</td>';
	echo '<td>$vResult[1]</td>';
	echo '<td>$vResult[2]</td>';
	echo '<td>$vResult[3]</td>';
	echo '</tr>';

	};
	?>
	</table>
	<form method="post" action="traitement_commande.php">

	Quand est-elle arrivée ?
	<label for="date">Date</label> : <INPUT type="date" name="date"></code>	
	<label for="heure">Heure</label> : <INPUT type="time" name="heure"></code>
	<label for="code">Code</label> : <INPUT type="text" name="code" size="50"></code>
	<INPUT TYPE="submit" NAME="nom" VALUE=" Envoyer ">
	</form>
</body>
</html>