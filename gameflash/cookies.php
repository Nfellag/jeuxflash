<?php
// session_start();
// $user_id = $_SESSION['user_id'];
// $username = $_SESSION['username']; 

// Après une connexion réussie;
setcookie('username', session_id(), time() + 3600, '/');

if (isset($_COOKIE['username']) && !empty($_COOKIE['username'])) {
    // Récupère les informations de session;
    $username = $_SESSION['username'];
} else {
    //Si l'utilisateur n'est pas connecté
    //on le rédirige vers la page de connexion
    header("Location: ./LoginPages.php");
    unset($_COOKIE);
}
?>