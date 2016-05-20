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
	<p>Si marchandises nouvellement reçues, entrez le nouveau stock : <input type="text" name="restock"/></p>
	<label for="identifiant">Selectionnez l'identifiant de la marchandise:</label><br/>
	<select name="identifiant" id="identifiant">
	<?php
		//connexion
	$vHost = "tuxa.sme.utc";
	$vPort = "5432" ;
	$vData = "dbnf17p114";
	$vUser = "nf17p114";
	$vPass = "SVYhc0nK";
	$vConn=pg_connect("host=$vHost port=$vPort dbname=$vData user=$vUser password=$vPass");

	$vSql="SELECT identifiant FROM Marchandise";
	$vQuery=pg_query($vConn, $vSql);
	  while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
	  	echo "<option value='$vResult[identifiant]'>$vResult[identifiant]</option>";
}	
	?>
	</select>
	<p><input type="submit"/></p>

</form>
</p>
</body>
</html>
