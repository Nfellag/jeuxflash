<?php
require_once(__DIR__ . '/../include.php');

if (!isset($_SESSION['id'])) {
    header('Location: /../jeuxflash/gameflash/index.php');
    exit;
}

$q = $db->prepare("SELECT * FROM users WHERE id = ?");
$q->execute([$_SESSION['id']]);
$req_profil = $q->fetch();

if (!empty($_POST)) {
    extract($_POST);
    $validation = true;

    if (isset($_POST['formulaire1'])) {
        $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $errors = array();

        if (!empty($nom)) {
            $q = $db->prepare("UPDATE users SET nom = ? WHERE id = ?");
            $q->execute([$nom, $_SESSION['id']]);
        }

        if (!empty($prenom)) {
            $q = $db->prepare("UPDATE users SET prenom = ? WHERE id = ?");
            $q->execute([$prenom, $_SESSION['id']]);
        }

        if (!empty($email)) {
            $q = $db->prepare("UPDATE users SET email = ? WHERE id = ?");
            $q->execute([$email, $_SESSION['id']]);
        }

        if (empty($nom) && empty($prenom) && empty($email)) {
            $errors[] = "Aucune donnée valide n'a été soumise.";
        }

        if (count($errors) === 0) {
            header('Location: /../jeuxflash/gameflash/profil/modifiersonprofil.php');
            exit;
        }
    }

    if (isset($_POST['formulaire2'])) {
        $mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : null;
        $newpassword = isset($_POST['newpassword']) ? $_POST['newpassword'] : null;
        $errors = array();

        if (!empty($mot_de_passe) && !empty($newpassword)) {
            $q = $db->prepare("SELECT password FROM users WHERE id = ?");
            $q->execute([$_SESSION['id']]);
            $row = $q->fetch();

            if (!$row || !password_verify($mot_de_passe, $row['password'])) {
                $errors[] = "Le mot de passe actuel est incorrect.";
            }
        } else {
            $errors[] = "Veuillez remplir tous les champs du formulaire de mot de passe.";
        }

        if (count($errors) === 0) {
            $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $q = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
            $q->execute([$hashedPassword, $_SESSION['id']]);
        }
    }

    // Affichez les erreurs le cas échéant
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}

// Afficher les informations de l'utilisateur
$nom = $req_profil['nom'];
$prenom = $req_profil['prenom'];
$email = $req_profil['email'];
$mot_de_passe = $req_profil['password'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon compte <?= $req_profil['prenom'] ?></title>
</head>

<body>
    <?php
        require_once(__DIR__ . '/../menu.php');
    ?>
    <div class="row">
        <h1>Modifier mes informations</h1>
    </div>

    <form method="post">
        <input type="text" name="nom" placeholder="Nom" value="<?= $nom ?>"><br>
        <input type="text" name="prenom" placeholder="Prénom" value="<?= $prenom ?>"><br>
        <input type="email" name="email" placeholder="Email" value="<?= $email ?>"><br>
        <input type="submit" name="formulaire1" value="Modifier">
    </form>

    <form method="post">
        <input type="password" name="mot_de_passe" placeholder="Mot de passe actuel" value=""><br>
        <input type="password" name="newpassword" placeholder="Nouveau mot de passe" value=""><br>
        <input type="password" name="confnewpassword" placeholder="Confirmer votre nouveau mot de passe" value=""><br>
        <input type="submit" name="formulaire2" value="Modifier le mot de passe">
    </form>
</body>
</html>
