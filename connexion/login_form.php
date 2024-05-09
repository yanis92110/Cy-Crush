<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styleconnexion.css">
</head>
<body>

<?php
session_start();


if (isset($_SESSION['erreur_pseudo'])) {
    echo "<p style='color: red;'>".$_SESSION['erreur_pseudo']."</p>";
    unset($_SESSION['erreur_pseudo']); 
}
if (isset($_SESSION['erreur_mdp'])) {
    echo "<p style='color: red;'>".$_SESSION['erreur_mdp']."</p>";
    unset($_SESSION['erreur_mdp']); 
}

?>


  <h1>Formulaire de connexion</h1>

  <div class="form-container">
    <form id="loginForm" method="post" action="login.php">
      <h2>Connexion</h2>
      <div>
        <label for="loginPseudo" >Pseudo</label>
        <input type="text" id="loginPseudo" name="pseudo_login" required>
      </div>
      <div>
        <label for="loginMdp">Mot de Passe</label>
        <input type="password" id="loginMdp" name="mdp_login" required>
      </div>
      <button type="submit">Se Connecter</button>
    </form>
    <img id="court" src="tennis_court.jpg">
    </div>
</body>
</html>