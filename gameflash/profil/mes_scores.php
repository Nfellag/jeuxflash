<?php
require_once('../include.php');

if(!isset($_SESSION['id'])){
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header('Location: index.php');
    exit;
}

// Utilisez des requêtes préparées pour éviter les attaques par injection SQL
$q = $db->prepare("SELECT * FROM users WHERE id = ?");
$q->execute([$_SESSION['id']]);

$req_profil = $q->fetch();
?>