<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login et création</title>
    <link rel="stylesheet" href="styleconnexion.css">
</head>
<body>

<?php
session_start();


if (isset($_SESSION['erreur'])) {
    echo "<p style='color: red;'>".$_SESSION['erreur']."</p>";
    unset($_SESSION['erreur']); 
}

if (isset($_SESSION['erreur_mdp_register'])) {
    echo "<p style='color: red;'>".$_SESSION['erreur']."</p>";
    unset($_SESSION['erreur_mdp_register']); 
}

?>

  <h1>Formulaire de connexion et de création de compte</h1>
  <div class="form-container">
 <!--   <form id="creationForm" action="null.php" method="post">
        <h2>Compléter son compte</h2>
         <div id="sexe">
            <style>
                #sexe{
                    text-align: left;
                }
                #input{
                    text-align: left;
                }
                #label{
                    left: 0%;
                }
            </style>
            <p>Sexe:</p>
            <input type="radio" id="homme" name="drone" value="h"  />
            <label for="h">Homme</label>
            <input type="radio" id="femme" name="drone" value="f" />
            <label for="f">Femme</label>
        </div>
        <div>
          <label for="signEmail">Date de naissance</label>
          <input type="date" id="signDate" name="birth" required>
        </div>
        <div>
            <label for="ville">Ville</label>
            <input type="text">
        </div>
        <div>
            <label for="classement">Classement actuel: </label>

            <select name="classement" id="classement">
              <option value="">--Please choose an option--</option>
              <option value="Non Classé">Non Classé</option>
              <option value="40">40</option>
              <option value="30/5">30/5</option>
              <option value="30/4">30/4</option>
              <option value="30/3">30/3</option>
              <option value="30/2">30/2</option>
              <option value="30/1">30/1</option>
              <option value="30">30</option>
              <option value="15/5">15/5</option>
              <option value="15/4">15/4</option>
              <option value="15/3">15/3</option>
              <option value="15/2">15/2</option>
              <option value="15/1">15/1</option>
              <option value="15">15</option>
              <option value="5/6">5/6</option>
              <option value="4/6">4/6</option>
              <option value="3/6">3/6</option>
              <option value="2/6">2/6</option>
              <option value="1/6">1/6</option>
              <option value="0">0</option>
              <option value="pro">Semi-pro ou pro</option>
            </select>
            
        </div>
        <div>
          <label for="dispos">Disponibilités</label>
          <input type="text" name="dispo">
        </div>
        <div>
            <fieldset>
                <legend>Caractéristiques tennistiques:</legend>
                <div>
                    <label for="taille">Taille</label>
                    <input type="text" name="taille">
                </div>
                <div>
                    <label for="d">
                    <input type="radio" id="d" value="d" name="droitier" checked>Droitier
                    </label>
                    <label for="g">
                    <input type="radio" id="g" value="g" name="droitier">Gaucher
                    </label>
                </div>
                <br>
                <div>
                    <label for="unemain">
                    <input type="radio" id="unemain" value="1" name="revers" checked>Revers à une main
                    </label>
                    <label for="deuxmains">
                    <input type="radio" id="deuxmains" value="2" name="revers">Revers à deux mains
                    </label>
                </div>
                <div>
                    <label for="autre">Autre (Style de jeu, service...)</label>
                    <textarea name="autre"></textarea>
                </div>
                <div>
                    <label for="description"></label>
                    <textarea name="desc">Parlez un peu de vous...</textarea>
                </div>
            </fieldset>
        </div>

        
        <button type="submit">S'inscrire</button>
      </form>-->


<form method="POST" action="register.php">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required><br>

    <label for="date_insc">Date d'inscription :</label>
    <input type="date" id="date_insc" name="date_insc" required><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br>

    <label for="pass1">Mot de passe :</label>
    <input type="password" id="pass1" name="pass1" required><br>

            <label for="signConfirmeMdp">Confirmer le mot de passe</label>
        <input type="password" name="pass2" id="signConfirmeMdp" required>

    <label for="sexe">Sexe :</label>
    <select id="sexe" name="sexe" required>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select><br>

               <label for="classement">Classement actuel: </label>

            <select name="classement" id="classement">
              <option value="">--Please choose an option--</option>
              <option value="Non Classé">Non Classé</option>
              <option value="40">40</option>
              <option value="30/5">30/5</option>
              <option value="30/4">30/4</option>
              <option value="30/3">30/3</option>
              <option value="30/2">30/2</option>
              <option value="30/1">30/1</option>
              <option value="30">30</option>
              <option value="15/5">15/5</option>
              <option value="15/4">15/4</option>
              <option value="15/3">15/3</option>
              <option value="15/2">15/2</option>
              <option value="15/1">15/1</option>
              <option value="15">15</option>
              <option value="5/6">5/6</option>
              <option value="4/6">4/6</option>
              <option value="3/6">3/6</option>
              <option value="2/6">2/6</option>
              <option value="1/6">1/6</option>
              <option value="0">0</option>
              <option value="pro">Semi-pro ou pro</option>
            </select><br>

                <div>
                    <label for="d">
                    <input type="radio" id="d" value="d" name="droitier" checked>Droitier
                    </label>
                    <label for="g">
                    <input type="radio" id="g" value="g" name="droitier">Gaucher
                    </label>
                </div>
                <br>
                <div>
                    <label for="unemain">
                    <input type="radio" id="unemain" value="1" name="revers" checked>Revers à une main
                    </label>
                    <label for="deuxmains">
                    <input type="radio" id="deuxmains" value="2" name="revers">Revers à deux mains
                    </label>
                </div>

    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville"><br>

    <label for="birth">Date de naissance :</label>
    <input type="date" id="birth" name="birth"><br>

    <label for="dispo">Disponibilité :</label>
    <input type="text" id="dispo" name="dispo"><br>

    <label for="taille">Taille :</label>
    <input type="text" id="taille" name="taille"><br>


    <label for="desc">Description :</label><br>
    <textarea id="desc" name="desc"></textarea><br>

    <label for="autre">Autre :</label><br>
    <textarea id="autre" name="autre"></textarea><br>


    <button type="submit">S'inscrire</button>
    <br><br>
    <button type="button" onclick="to_login()">Déjà inscrit ? Connectez-vous ici</button>
    <br>
</form>



</body>
</html>

    

      <img id="court" src="tennis_court.jpg">
    


    
  </div>
  
  <script src="scriptcreation.js"></script>
</body>
</html>
