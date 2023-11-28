<?php
    // session_start();
    // include "../../backend/cookies.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue <?php  $username;?> </h1>
    <div>
        <a href="./DevineGame.php">Devine Game</a>
    </div>
    <!-- <a href="logout.php">Déconnexion</a> Ajoutez un lien pour se déconnecter -->
    <script src="../js/GameFlash.js"></script>
</body>
</html>

