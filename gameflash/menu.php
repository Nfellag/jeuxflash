<head>
<base href ="/jeuflash/index.php">
</head>
<nav class="navbar navbar-expend-lg navbar-light bg light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Accueil</a>
    <div class="collapse navbar-collapse" id="navbarnavAtlMarkup">
            <?php
            if(!isset($_SESSION['id'])){
    
            ?>
            <a class="nav-link" href="register.php">Inscription</a><br>
            <a class="nav-link" href="connexion.php">Connexion</a><br>
            <?php
            }else{
            ?>
            <a class="nav-link" href="profil/profil.php">Mon Profil</a>
            <a class="nav-link" href="deconnexion.php">Déconnexion</a>
            <?php
            }
            ?>
            </div>
    </div>        
    </div>
</nav>