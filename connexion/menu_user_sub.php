<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Accueil sub</title>
    <link rel="stylesheet" href="styleaccueil.css">
</head>
<body>

    <!--<nav>
        <a class="barre" href="/accueil/accueil.html">Accueil</a>
        <a class="barre" href="connexion/profil.html">Mon Profil</a>
        <a class="barre" href="">Rechercher des partenaires</a>
        <a class="barre" href="https://leagueoflegends.com">Nous contacter</a>
    </nav>
    -->
    <?php
session_start();
if(isset($_SESSION['pseudo'])){
    echo " <p> Bonjour non abonné ".$_SESSION['pseudo']."</p>";
}

?>
    <div class="container">
        <a class="lien" href="../accueil/accueil.html">
            <div class="vignette">
                Accueil
            </div>
        </a>
        <a class="lien" href="/profil.html">
            <div class="vignette">
                Mon Profil
            </div>
        </a>
        <a class="lien" href="">
            <div class="vignette">
                 Rechercher des partenaires
            </div>
        </a>
        <a class="lien" href="https://leagueoflegends.com">
            <div class="vignette">
                Nous contacter
            </div>
        </a>
    </div>
</body>
</html>
