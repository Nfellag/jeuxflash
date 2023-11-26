<?php
session_start();
    include "cookies.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue <?php echo $username;?> </h1>
    <div>
        <span id="score" >0</span>
        <h2>Devinez la réponse :</h2>
        <p id="question"></p>
        <input type="text" id="answer" placeholder="Votre réponse">
        <button onclick="submitAnswer()">Soumettre</button>
    </div>
    <!-- <a href="logout.php">Déconnexion</a> Ajoutez un lien pour se déconnecter -->
    <script src="./js/GameFlash.js"></script>
</body>
</html>

