<?php


require_once('include.php');

if(isset($_SESSION['id'])){
  $var = "Bonjour"  .  $_SESSION['prenom'];
}
else{
  $var = "Bienvenue sur notre jeu flash.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
<?php
  require_once('menu.php');
?>

<h1><?= $var ?></h1>

</body>
</html>