<html>
<head>
<title>Commande</title>
</head>
<body>
<center>
	<h1>Bienvenue sur la page de mise à jour de commande !</h1></br></br>


	Quelle commande voulez-vous mettre à jour ?</br>

	<table border="1">
	<tr>
		<td> Code marchandise</td>
		<td> Designation</td>
		<td> Nom</td>
		<td> Prenom</td>
	</tr>
<?php
	include 'connexion.php';

	$vSql = 'SELECT M.identifiant,M.denomination,C.prenom,C.nom FROM Marchandise M, Client C, Livraison L WHERE L.num_client=M.num_client AND M.date_arri IS NULL AND C.num_client=M.num_client AND M.stock IS NOT NULL ORDER BY nom,prenom';
	$vQuery = pg_query($vConn,$vSql);
	while ($vResult = pg_fetch_array($vQuery)){
	echo '<tr>';
	echo '<td>'.$vResult[0].'</td>';
	echo '<td>'.$vResult[1].'</td>';
	echo '<td>'.$vResult[2].'</td>';
	echo '<td>'.$vResult[3].'</td>';
	echo '</tr>';

	};
	?>
	</table>
	<form method="post" action="update_liv_action.php">

	Quand est-elle arrivée ?</br>
	<label for="date">Date</label> : <INPUT type="date" name="date"></code>	</br>
	<label for="heure">Heure</label> : <INPUT type="time" name="heure"></code></br>
	<label for="code">Code</label> : <INPUT type="text" name="code" size="50"></br>
	<label for="heure">Quantité livrée</label> : <INPUT type="text" name="qte"></br></code></br>
	<INPUT TYPE="submit" NAME="nom" VALUE=" Envoyer ">
	</form>
</center>
</body>
</html>