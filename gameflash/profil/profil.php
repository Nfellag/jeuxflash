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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de <?= $req_profil['prenom'] ?></title>
</head>
<body>
    <?php
    require_once('../menu.php');
    ?>
    <div class="container">
        <div class="informations-bar">
            <h1>Bonjour <?= $req_profil['prenom'] ?></h1>

            <div>
                <a href="profil/modifiersonprofil.php">Modifier mes informations</a>
            </div>

            <div>
                <a href="profil/upload_profile_picture.php">Modifier ma photo de profil</a>
            </div>

            <div>
                <a href="profil/mes_scores.php">Mes scores</a>
            </div>

            <div class="profile">
                <?php if (isset($req_profil['image']) && !empty($req_profil['image'])): ?>
                <img src="<?= 'profil/uploads/' . $req_profil['image'] ?>" alt="Photo de profil">
                <?php else: ?>
                <!-- Afficher une image par défaut ou un message d'absence de photo de profil -->
                <img src="photodefault.jpg" alt="Photo de profil par défaut">
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</body>
</html>

