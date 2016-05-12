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

echo"test";
$vNom = strtoupper ($vNom);
$vPrenom = strtoupper ($vPrenom);

// aucune sécurité pas vrai ? 
$vQuery = "SELECT MAX(num_client) FROM tClient";
$vResult = mysqli_query($connect, $query);
$vNum = $vResult+1;

$vQuery = "INSERT INTO tClients VALUES ($vNum, '$vNom', '$vPrenom', '$vMail', '$vTel' )";
$vResult = mysqli_query($connect, $query);

pg_close($vConn);


} else{
echo'
<center><h1>ajout d un client</h1></center>

<form method ="post" action = "new_client.php">
nom: <input type="text" name="nom" size="30" maxlength="50"><br>
prenom: <input type="text" name="prenom" size="30" maxlength="50"><br>
mail: <input type="text" name="mail"><br>
telephone: <input type="text" name="tel"><br>
<input type="submit" value="ajouter" name="validation"><br><br><br>
</form>';}

?>
</body>
</html>