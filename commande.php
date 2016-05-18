<html>
<head>
<title>Commande</title>
</head>
<body>
	Bienvenue sur la page de creation de commande !


	Tout d'abord, quel client souhaite réaliser une commande ?

	<table border="1">
	<tr>
		<td> Coe </td>
		<td> Nom </td>
		<td> Prenom</td>
	</tr>
<?php
	include 'connexion.php';

	$vSql = "SELECT num_client,nom,prenom FROM Client ORDER BY nom,prenom";
	$vQuery = pg_query($vConn,$vSql);
	while ($vResult = pg_fetch_array($vQuery)){
    echo "<tr>";
	echo "<td>$vResult[1]</td>";
    echo "<td>$vResult[2]</td>";
    echo "<td>$vResult[3]</td>";
    echo "</tr>";

	};
	?>


	</table>

	<form method="post" action="traitement_commande.php">
	<label for="code">Code</label> : <input type="text" name="code"></code>
</body>
</html>