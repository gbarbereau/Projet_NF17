<?php
	$vHost= "tuxa.sme.utc";
	$vPort= "5432";
	$vData = "dbnf17p115";
	$vUser = "nf17p115";
	$vPass = "hXtVa0yM";
	$vConn = pg_connect("host=$vHost port=$vPort dbname=$vData user=$vUser password=$vPass");

	//psql -h tuxa.sme.utc -d dbnf17p115 -U nf17p115 -W
?>