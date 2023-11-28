<?php
// Inclure le fichier de configuration de la base de données
require_once(__DIR__ . '/include.php');

// Variables pour stocker les messages d'erreur
$errorMessage = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête pour vérifier les informations de connexion
    $query = $db->prepare("SELECT * FROM users WHERE email = :email");
    $query->execute(array(':email' => $email));
    $user = $query->fetch();

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // L'utilisateur est connecté avec succès, stocker l'ID de l'utilisateur dans la session
        $_SESSION['id'] = $user['id']; // Utilisez l'ID de l'utilisateur récupéré de la base de données
        header("Location: /../jeuxflash/gameflash/profil/profil.php");
        exit();
    } else {
        // Les informations de connexion sont incorrectes
        $errorMessage = "Adresse e-mail ou mot de passe incorrect";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>

    <form id="loginForm" method="POST">
        <input type="email" name="email" placeholder="Adresse E-mail" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="submit" value="Se connecter">
    </form>

    <?php if (!empty($errorMessage)): ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <p>Pas encore de compte? <a href="../gameflash/register.php">Inscrivez-vous ici</a></p>
</body>
</html>