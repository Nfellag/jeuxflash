<?php
require_once('../include.php');

if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

// Récupérez le chemin complet de l'ancienne photo de profil depuis la base de données
$q = $db->prepare("SELECT image FROM users WHERE id = ?");
$q->execute([$_SESSION['id']]);
$old_image_path = $q->fetchColumn();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    $file = $_FILES['profile_picture'];

    // Chemin où enregistrer le fichier (par exemple, dans un dossier "uploads")
    $upload_dir = 'uploads/';

    // Vérifier si le répertoire "uploads" existe, sinon, créez-le
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $file_name = uniqid('profile_') . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $upload_path = $upload_dir . $file_name;

    // Déplacez le fichier téléchargé vers l'emplacement de destination
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        // Mettez à jour le chemin complet du fichier de la photo de profil dans la base de données
        $full_path = realpath($upload_path);
        $q = $db->prepare("UPDATE users SET image = ? WHERE id = ?");
        $q->execute([$file_name, $_SESSION['id']]);
        
        // Supprimer l'ancienne photo de profil si elle existe
        if (!empty($old_image_path) && file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        header('Location: modifiersonprofil.php');
        exit;
    } else {
        echo "Une erreur s'est produite lors du téléchargement de la photo.";
    }
} else {
    echo "Aucune image n'a été téléchargée.";
}
?>
<!-- Modifier sa photo de profil -->
<form method="post" action="upload_profile_picture.php" enctype="multipart/form-data">
    <label for="profile_picture">Choisir une nouvelle photo de profil :</label>
    <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
    <input type="submit" value="Modifier la photo de profil">
</form>
