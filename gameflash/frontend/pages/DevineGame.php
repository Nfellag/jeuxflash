<?php
    // session_start();
    // include "../../backend/cookies.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlashGame</title>
    <link rel="stylesheet" href="../css/Options.css">
    <link rel="stylesheet" href="../css/Responsive.css">
    <link rel="stylesheet" href="../css/DevineGame.css">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="../assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1>
        <span>Bienvenue</span>
        <span>dans Flashgame</span>
        <span><!-- <?php  echo $_SESSION["username"];?>  --></span>
    </h1>
    <div id="timer">--</div>
    <div id="gameflash">
        <div id="game">
            <div id="menuOption">
                <div id="menu">
                    <ion-icon name="add-outline"></ion-icon>
                </div>

                <li style="--i:1">
                    <a href="#">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                </li>

                <li style="--i:2">
                    <a href="#">
                        <ion-icon name="game-controller-outline"></ion-icon>
                    </a>
                </li>
                
                <li style="--i:3">
                    <a href="#">
                        <ion-icon name="trophy-outline"></ion-icon>
                    </a>
                </li>

            </div>


            <label for="totalscore">Nombre de point : </label>
            <span id="totalscore">0</span><br>

            <label for="score">Score : </label>
            <span id="score" >0</span>
            
            <h4>Devinez la réponse :</h4>
            <p id="question"></p>
            <input type="text" id="answer" placeholder="Votre réponse">
            <button type="submit" onclick="submitAnswer()">Valider</button>
        </div>

    </div>
    <!-- <a href="logout.php">Déconnexion</a> Ajoutez un lien pour se déconnecter -->
    <script src="../js/GameFlash.js"></script>
    <script src="../js/Options.js"></script>

    <!-- Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

