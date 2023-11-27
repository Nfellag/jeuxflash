<?php
require_once('include.php');

$methode = filter_input(INPUT_SERVER, "REQUEST_METHOD");
$errorMessage = "";

if($methode == "POST")
{
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $birthdate = $_POST["birthdate"];

    $requete = $db->prepare("SELECT * FROM users WHERE email = :email");
    $requete->execute(array(":email" => $email));
    $resultat = $requete->fetch();
    if ($resultat) {
        $errorMessage = "L'adresse e-mail existe déjà. Veuillez choisir une autre adresse e-mail.";
    } else {
        // Vérification de la correspondance des mots de passe
        if ($password === $cpassword){

            $requete = $db->prepare("
                
                INSERT INTO users (nom, prenom, email, phone, password, birthdate) 
                SELECT :nom, :prenom, :email, :phone, :password, :birthdate
                
            "); 

            $requete->execute(array(
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":email" => $email,
                ":phone" => $phone,
                ":password" => password_hash($password, PASSWORD_DEFAULT),
                ":birthdate" => $birthdate
                )
            );
            header("Location: connexion.php");
            exit();

        }else {
            $errorMessage = "Les deux mots de passe ne sont pas identiques. Veuillez réessayer.";
            
        };
    }
}   

?>

<?php if(isset($errorMessage)): ?>
    <span style="color: red;"><?php echo $errorMessage; ?></span>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulaire d'inscription</title>
</head>
<body>
  <h1>Inscription</h1>

  <form id="inscriptionForm" action="register.php" method="POST">
    <label for="birthdate">Date de naissance :</label>
    <input type="date" id="birthdate" name="birthdate" required>
    <input type="text" name ="nom" id="champ_nom" placeholder="Nom" required>
    <input type="text" name="prenom" id="champ_prenom" placeholder="Prénom" required>
    <input type="email" name ="email" id="email" placeholder="Adresse Mail" required pattern=".*@.*" title="L'adresse e-mail doit contenir le caractère '@' ">
    <input type="text" name="phone" id="phone" placeholder="Numéro de téléphone" required minlenght="10" required maxlenght="10">
    <input type="password" name="password" id="champ_passeword" placeholder="Mot de passe" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" title="Le mot de passe doit contenir au minimum 8 caractères, dont au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.">
    <input type="password" name="cpassword" id="champ_passeword" placeholder="Confirmer votre mot de passe" required>
    <input id="button" type="submit" value="S'inscrire">
  </form>

  <script>
    document.getElementById("inscriptionForm").addEventListener("submit", function(event) {
      event.preventDefault();

      var birthdate = new Date(document.getElementById("birthdate").value);
      var now = new Date();

      var ageLimiteMillis = 18 * 365.25 * 24 * 60 * 60 * 1000; 
      var ageMillis = now.getTime() - birthdate.getTime();

      // Vérification de l'âge
      if (ageMillis < ageLimiteMillis) {
        alert("Désolé, vous devez avoir au moins 18 ans pour vous inscrire.");
      } else {
        document.getElementById("inscriptionForm").submit(); 
      }
    });
  </script>
</body>
</html>