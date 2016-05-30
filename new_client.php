<html>
<head>
</head>

<body>
<?php
include("connexion.php");

if(!empty($_POST['validation'])){
$vNom = $_POST['nom']; 
$vPrenom = $_POST['prenom']; 
$vMail = $_POST['mail'];
$vTel = $_POST['tel'];

$vRue = $_POST['num_rue'];

$vNom = strtolower($vNom);
$vPrenom = strtolower($vPrenom);
$vNom = ucfirst($vNom);
$vPrenom = ucfirst($vPrenom);
$vQuery = "SELECT MAX(num_client) FROM Client";
$vResult = pg_query($vConn, $vQuery);

$vResult = pg_fetch_array($vResult);

$vNum = $vResult[0]+1;

$vQuery = "INSERT INTO Client VALUES ($vNum, '$vNom', '$vPrenom', '$vMail', '$vTel' )";
$vResult = pg_query($vConn, $vQuery);

$type_r=$_POST[type_r];
$explode = explode(' ', $type_r, 2);
$type_r=$explode[0];
$nom_r=$explode[1];

$vQuery3="SELECT num_rue FROM Numero_Rue WHERE type_route='$type_r' AND nom_route='$nom_r'";
$vSQL = pg_query($vConn,$vQuery3);


echo 'Quel est votre numéro de rue ?';
echo '<form method ="post" action = "new_client_batiment.php">';
echo'Numéro de rue : <SELECT name="num_rue" size="1">';
while ($vResult3 = pg_fetch_array($vSQL))
{
	echo '<OPTION>',$vResult3[0],'</OPTION>';
}

echo '</SELECT>';

echo "<INPUT TYPE='hidden' NAME='type_r' VALUE='$type_r'>";
echo "<INPUT TYPE='hidden' NAME='nom_r' VALUE='$nom_r'>";
echo "<INPUT TYPE='hidden' NAME='num' VALUE='$vNum'>";
echo'<input type="submit" value="ajouter" name="validation"><br><br><br>';
echo'</form>';


pg_close($vConn);


} else{
echo"<center><h1>Ajout d'un client</h1></center>";
echo'<form method ="post" action = "new_client.php">';
echo "<table>";
echo'<tr><td>Nom:</td><td> <input type="text" name="nom" size="30" maxlength="50"></td></tr>';
echo'<tr><td>Prénom:</td><td> <input type="text" name="prenom" size="30" maxlength="50"></td></tr>';
echo'<tr><td>Mail:</td><td> <input type="text" name="mail"></td></tr>';
echo'<tr><td>Téléphone:</td><td> <input type="text" name="tel"></td></tr>';
$vSQL = 'SELECT * FROM route';
$vQuery2 = pg_query($vConn,$vSQL);
echo'<tr><td>Type de rue :</td><td> <SELECT name="type_r" size="1">';
while ($vResult2 = pg_fetch_array($vQuery2))
{
	echo '<OPTION>',$vResult2[1],' ',$vResult2[0],'</OPTION>';
}

echo '</SELECT></td></tr>';

}
echo'<tr><td><input type="submit" value="ajouter" name="validation"></td></tr>';
echo "</table>";
echo'</form>';

?>
</body>
</html>