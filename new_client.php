<html>
<head>
</head>

<body>
<?php

if(!empty($_POST['validation'])){
include("connexion.php");
$vNom = $_POST['nom']; 
$vPrenom = $_POST['prenom']; 
$vMail = $_POST['mail'];
$vTel = $_POST['tel'];
$vBatiment = $_POST['bat'];
$vEtage = $_POST['eta'];
$vApp = $_POST['app'];
$vRue = $_POST['num_rue'];

$vNom = strtolower($vNom);
$vPrenom = strtolower($vPrenom);
$vNom = ucfirst($vNom);
$vPrenom = ucfirst($vPrenom);

// aucune sécurité pas vrai ? 
$vQuery = "SELECT MAX(num_client) FROM Client";
$vResult = pg_query($vConn, $vQuery);

$vResult = pg_fetch_array($vResult);

$vNum = $vResult[0]+1;


$vQuery = "INSERT INTO Client VALUES ($vNum, '$vNom', '$vPrenom', '$vMail', '$vTel' )";
$vResult = pg_query($vConn, $vQuery);

pg_close($vConn);


} else{
echo'<center><h1>ajout d un client</h1></center>';
echo'<form method ="post" action = "new_client.php">';
echo'nom: <input type="text" name="nom" size="30" maxlength="50"><br>';
echo'prenom: <input type="text" name="prenom" size="30" maxlength="50"><br>';
echo'mail: <input type="text" name="mail"><br>';
echo'telephone: <input type="text" name="tel"><br>';
echo'Numero de rue: <input type="text" name="num_rue"><br>';
$vSQL = 'SELECT * FROM route';
$vQuery2 = pg_query($vConn,$vSQL);
echo'Type de rue : <SELECT name="type_r" size="1">';
while ($vResult2 = pg_fetch_array($vQuery2))
{
	echo '<OPTION>',$vResult2[0],$vResult2[1],'</OPTION>';
}

echo '</SELECT>';

}

echo'Batiment: <input type="text" name="bat"><br>';
echo'Etage: <input type="text" name="eta"><br>';
echo'Numéro dappartement <input type="text" name="app"><br>';
echo'<input type="submit" value="ajouter" name="validation"><br><br><br>';
echo'</form>';



?>
</body>
</html>