<html>
<body>
<p>
<a href='marchandise.php'>  &lsaquo; Retour à la page précédente</a>
</p>
<p>
<form method="post" action="ajoutermarchandise.php">
	<center><h2>Ajout d'une nouvelle marchandise</h2></center>
	<p>Entrez l'identifiant de la marchandise : <input type="text" name="id"/></p>
	<p>Entrez sa dénomination : <input type="text" name="den"/></p>
	<p>Entrez son prix : <input type="text" name="prix"/></p>
	<p>Rappel : le prix est un entier</p>
	<p>Entrez son stock : <input type="text" name="stock"/></p>
	<p>Entrez le numéro du client associé : </p>
	<select name="num_client" id="num_client">
	<?php
	include 'connexion.php';

	$vSql="SELECT num_client,nom, prenom FROM Client";
	$vQuery=pg_query($vConn, $vSql);
	  while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
	  	echo "<option value='$vResult[num_client]'>$vResult[num_client] - $vResult[prenom] $vResult[nom]</option>";
}	
	?>
	</select>

	<p><input type="submit"/></p>
</form>

</p>
</body>
</html>
