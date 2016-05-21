<html>
<body>
<p>
<?php
	//repond aux requetes rupture et ajouter du stock
	
	//connexion
	$vHost = "tuxa.sme.utc";
	$vPort = "5432" ;
	$vData = "dbnf17p114";
	$vUser = "nf17p114";
	$vPass = "SVYhc0nK";
	$vConn=pg_connect("host=$vHost port=$vPort dbname=$vData user=$vUser password=$vPass");

	//REQUETE 1 : 
	//permet de donner les marchandises qui sont en rupture de stock
	$vSql=("SELECT identifiant, denomination FROM Marchandise WHERE stock is null");
	$vQuery=pg_query($vConn, $vSql);
	echo "<center><h1>Marchandises en rupture de stock</h1>";
	echo "<table border='1' cellspacing='0' >";
	echo "<tr><th>Identifiant</th><th>Denomination</th></tr>";
	  while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
    echo "<tr>";
    echo "<td>$vResult[identifiant]</td>";
    echo "<td> $vResult[denomination]</td><br/>";
    echo "</tr>";
  }
  	echo "</table></center>";

  //REQUETE 2
  //gestion du réapprovisionnement
   	echo "<h4> Vous souhaitez mettre à jour le stock de marchandises en rupture de stock? </h4>";
  	echo"<form method='post' action='reapprovisionnement.php'>";
  	echo "<input type='submit' value='Oui'/>";
 	echo "</form>";
   	echo "<h4> Vous souhaitez ajouter de nouvelles marchandises à votre base de données? </h4>";
  	echo"<form method='post' action='nvlmarchandise.php'>";
  	echo "<input type='submit' value='Oui'/>";
  	echo "</form>";
?>
</p>

</body>
</html>
