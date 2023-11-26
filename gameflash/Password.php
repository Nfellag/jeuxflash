<?php

// include_once "cookies.php";
// Assurez-vous que vous avez la connexion à la base de données établie ici
require "bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logIn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour récupérer le mot de passe stocké associé à l'utilisateur
    $requete = $bdd->prepare('SELECT username, password FROM utilisateurs WHERE username = :username');
    $requete->execute(['username' => $username]);

    $user = $requete->fetch();

    if ($user && password_verify($password, $user['password'])) {
        header("Location: Accueil.php");
        exit();
    } else {
        // Les identifiants sont incorrects, affichez un message d'erreur
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>