<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Accueil sub</title>
    <link rel="stylesheet" href="styleaccueil.css">
</head>
<body>

    <nav>
        <a class="barre" href="/accueil/accueil.html">Accueil</a>
        <a class="barre" href="connexion/profil.html">Mon Profil</a>
        <a class="barre" href="">Rechercher des partenaires</a>
        <a class="barre" href="https://leagueoflegends.com">Nous contacter</a>
    </nav>
    <?php
session_start();
if(isset($_SESSION['pseudo'])){
    echo " <p> Bonjour non abonné ".$_SESSION['pseudo']."</p>";
}

?>
    <div class="container">
    <div class="nadal">
        <img src="blackcloune.jpg" height="60%" width="60%">
    </div>
    <div class="nadal">
        caca
    </div>
    <div class="nadal">
        caca
    </div>
    </div>

</body>
</html>