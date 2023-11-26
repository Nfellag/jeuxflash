<?php

require "bd.php";

if (isset($_POST['SingUp'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $requete = $bdd->prepare('INSERT INTO utilisateurs (email, username, password) VALUES ( :email, :username, :password)');
    if ($requete->execute([
        "email" => $email,
        "username" => $username,
        "password" => $hashedPassword,
    ])) {
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
    } else {
        echo "L'inscription a échoué. Veuillez réessayer.";
        // Ajoutez plus de détails sur l'erreur si nécessaire : var_dump($requete->errorInfo());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/LoginPages.css">
    <link rel="stylesheet" href="./assets/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="./assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="formSign">
        <!-- <div class="row w-50"> -->

            <div class="p-3 bg-white w-50 d-flex vh-100 justify-content-center align-items-center">
            <!-- <div class="col"> -->
                <div id="createPara" class="createPara" >
                    <h1>FlashGame</h1>
                    <h2>Bonjour, <br> et bienvenue sur FashGame</h2>
                    <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                    <button id="create" class="btn btn-danger border w-100">Create Account</button>
                </div>
                <form action="" method="POST" id="sign" class="sign">
                    <h1 style=>Sign Up</h1>
                    <hr />
                    <div class="mb-3">
                        <label htmlFor="username">Username</label>
                        <input type="text" placeholder="Username" name="username" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label htmlFor="email">Email</label>
                        <input type="email" placeholder="Email" name="email" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label htmlFor="password">Mot de passe</label>
                        <input type="password" placeholder="Password" name="password" class="form-control"/>
                    </div>
                    <button class="btn btn-success w-100" type="submit" name="SingUp">Sign Up</button>
                </form>
            </div>
            <div class="p-3 w-50 d-flex vh-100 justify-content-center align-items-center">
            <!-- <div class="col"> -->
                <div id="logPara" class="logPara no_activedPara">
                    <h1>FlashGame</h1>
                    <h2>Bonjour, <br> et bienvenue sur FashGame</h2>
                    <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                    <button id="login" class=" btn-default bg-light border w-100">Connexion</button>
                </div>
                <form action="./Password.php" method="POST" id="log" class="log active" >
                    <h1>Login</h1>
                    <hr />
                    <div class="mb-3">
                        <label htmlFor="username">Username</label>
                        <input type="text" placeholder="Username" name="username" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label htmlFor="">Mot de passe</label>
                        <input type="password" placeholder="Password" name="password" class="form-control"/>
                    </div>
                    <button class="btn btn-success w-100" type="submit" name="logIn">Log In</button>
                    <p> <a href="./reipassword.php"> Vous avez oublié votre mot de passe ?</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/LoginPages.js"></script>
</body>
</html>