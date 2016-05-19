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
	$vSql=("SELECT identifiant, denomination FROM Marchandise WHERE stock=NULL");
?>
</p>

</body>
</html>
