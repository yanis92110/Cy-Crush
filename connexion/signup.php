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

    <form id="creationForm" action="register.php" method="POST">

        <h2>Créer son compte</h2><br>

        <label for="pseudo"><strong>Pseudo :</strong></label> <input type="text" id="pseudo" name="pseudo" required><br>

        <label for="email"><strong>Email :</strong></label> <input type="email" id="email" name="email" required><br>

        <label for="pass1"><strong>Mot de passe :</strong></label> <input type="password" id="pass1" name="pass1" required><br>

        <label for="signConfirmeMdp"><strong>Confirmer le mot de passe :</strong></label> <input type="password" id="signConfirmeMdp" name="pass2" required>

        <p>------------------------------------------------------------------------------------------</p>
        
        <p><strong>Sexe :</strong></p>
        <div class="rad">
            <div class="rad2"><label for="sexe">Homme</label> <input type="radio" class="check" name="sexe" value="homme" checked></div>
            <div class="rad2"><label for="sexe">Femme</label> <input type="radio" class="check" name="sexe" value="femme"></div>
        </div><br><br>

        <div>
            <label for="birth"><strong>Date de naissance :</strong></label> <input type="date" name="birth" required>
        </div><br>

        <div>
            <label for="ville"><strong>Ville :</strong></label> <input type="text" name="ville" required>
        </div><br>

        <div>
            <label for="classement"><strong>Classement actuel : </strong></label>

            <select name="classement" id="classement">
              <option value="">--Choisissez une option--</option>
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
            
        </div><br><br>

        <div>
            <label for="dispo"><strong>Disponibilités :</strong></label> <input type="text" name="dispo"> 
        </div><br>

        <div>
            <fieldset>
                <legend>Caractéristiques tennistiques</legend><br>
                
                <div>
                    <label for="taille"><strong>Taille :</strong></label> <input type="text" id="taille">
                </div>

                <p><strong>Main forte :</strong></p>
                <div class="rad">
                    <div class="rad2"><label for="d">Droite</label><input type="radio" class="check" name="mano" value="d"></div>
                    <div class="rad2"><label for="g">Gauche</label><input type="radio" class="check" name="mano" value="g"></div>
                </div><br>

                <p><strong>Type de revers :</strong></p>
                <div class="rev">
                    <div class="rad2"><label for="1" class="lrevers">Revers à une main</label><input type="radio" class="check" name="revers" value="1"></div>
                    <div class="rad2"><label for="2" class="lrevers">Revers à deux mains</label><input type="radio" class="check" name="revers" value="2"></div>
                </div><br>

                <div>
                    <label for="autre"><strong>Autre (Style de jeu, service...) :</strong></label><br> <textarea name="autre"></textarea>
                </div><br>

                <p><strong>Informations complémentaires :</strong></p>
                <div>
                    <label for="desc"></label> <textarea name="desc" placeholder="Parlez un peu de vous..."></textarea>
                </div><br>

            </fieldset>
        </div><br><br>
        <button type="submit">S'inscrire</button>
      </form>
      <img id="court" src="tennis_court.jpg">
    
  </div>
  
  <script src="scriptcreation.js"></script>
</body>
</html>
