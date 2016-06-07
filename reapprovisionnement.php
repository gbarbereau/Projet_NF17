<html>
<body>
<p>
<a href='marchandise.php'>  &lsaquo; Retour à la page précédente</a>
</p>
<p>
<form method="post" action="reapprovisionner.php">
	<center><h2>Réapprovisionnement d'une marchandise</h2></center>
	<p>Entrez la référence du réapprovisionnement : <input type="text" name="ref"/></p>
	<p>Entrez les délais de réapprovisionnement si plus de stock : <input type="text" name="delai"/></p>
	<p>Rappel : le delai est le nombre de jours avant réapprovisionnement. </p>
	<p>Si marchandises nouvellement reçues, entrez le nouveau stock : <input type="text" name="restock"/></p>
	<label for="identifiant">Selectionnez l'identifiant de la marchandise:</label><br/>
	<select name="identifiant" id="identifiant">
	<?php
	include 'connexion.php';

	$vSql="SELECT identifiant, denomination FROM Marchandise";
	$vQuery=pg_query($vConn, $vSql);
	  while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
	  	echo "<option value='$vResult[identifiant]'>$vResult[identifiant] - $vResult[denomination]</option>";
}	
	?>
	</select>
	<p><input type="submit"/></p>

</form>
</p>
</body>
</html>
