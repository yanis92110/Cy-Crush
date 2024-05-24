<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modification du profil</title>
    <link rel="stylesheet" href="../connexion/styleconnexion.css">
</head>
<body>

    <?php
    session_start();
    include "../verif.php";

    if (isset($_SESSION['erreur'])) {
        echo "<p style='color: red;'>".$_SESSION['erreur']."</p>";
        unset($_SESSION['erreur']); 
    }

    if (isset($_SESSION['erreur_mdp_modif'])) {
        echo "<p style='color: red;'>".$_SESSION['erreur']."</p>";
        unset($_SESSION['erreur_mdp_modif']); 
    }

    $data1 = get_data1($_SESSION['id_user']);
    $data2 = get_data2($_SESSION['id_user']);
    ?>

  <h1>Modification du profil</h1>
  <div class="form-container">

    <form id="creationForm" action="modif_info.php" method="POST">

        <h2>Modifier ses infos</h2><br>

        <label for="pseudo"><strong>Pseudo :</strong></label> <input type="text" id="pseudo" name="pseudo" value="<?php echo "$data1[0]" ?>" required><br>

        <label for="nom"><strong>Nom :</strong></label> <input type="text" id="nom" name="nom" value="<?php echo "$data1[2]" ?>" required><br>

        <label for="prenom"><strong>Prenom :</strong></label> <input type="text" id="prenom" name="prenom" value="<?php echo "$data1[3]" ?>" required><br>

        <label for="email"><strong>Email :</strong></label> <input type="email" id="email" name="email" value="<?php echo "$data2[1]" ?>" required><br>

        <label for="pass1"><strong>Mot de passe :</strong></label> <input type="password" id="pass1" name="pass1" value="<?php echo "$data1[1]" ?>" required><br>

        <label for="signConfirmeMdp"><strong>Confirmer le mot de passe :</strong></label> <input type="password" id="signConfirmeMdp" name="pass2" value="<?php echo "$data1[1]" ?>" required>

        <p>------------------------------------------------------------------------------------------</p>
        <?php 

        if($data1[5] == "homme"){

            echo "<p><strong>Sexe :</strong></p>
            <div class='rad'>
                <div class='rad2'><label for='sexe'>Homme</label> <input type='radio' class='check' name='sexe' value='homme' checked></div>
                <div class='rad2'><label for='sexe'>Femme</label> <input type='radio' class='check' name='sexe' value='femme'></div>
            </div><br><br>";
        }
        else{
                        echo "<p><strong>Sexe :</strong></p>
            <div class='rad'>
                <div class='rad2'><label for='sexe'>Homme</label> <input type='radio' class='check' name='sexe' value='homme'></div>
                <div class='rad2'><label for='sexe'>Femme</label> <input type='radio' class='check' name='sexe' value='femme' checked></div>
            </div><br><br>";
        }

        ?>
        <div>
            <label for="birth"><strong>Date de naissance :</strong></label> <input type="date" name="birth" value="<?php echo "$data2[3]" ?>" required>
        </div><br>

        <div>
            <label for="ville"><strong>Ville :</strong></label> <input type="text" name="ville" value="<?php echo "$data2[2]" ?>" required>
        </div><br>

        <div>
            <label for="classement"><strong>Classement actuel : </strong></label>

            <select name="classement" id="classement" required>
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
            <label for="dispo"><strong>Disponibilités :</strong></label> <input type="text" name="dispo"
            value="<?php echo "$data2[4]" ?>"> 
        </div><br>

        <div>
            <fieldset>
                <legend>Caractéristiques tennistiques</legend><br>
                
                <div>
                    <label for="taille"><strong>Taille :</strong></label> <input type="text" id="taille" name="taille"value="<?php echo "$data2[5]" ?>">
                </div>
                <?php

                if($data2[6] == 'd'){
                    echo"<p><strong>Main forte :</strong></p>
                    <div class='rad'>
                        <div class='rad2'><label for='d'>Droite</label><input type='radio' class='check' name='mano' value='d' checked></div>
                        <div class='rad2'><label for='g'>Gauche</label><input type='radio' class='check' name='mano' value='g'></div>
                    </div><br>";
                }
                else{
                    echo"<p><strong>Main forte :</strong></p>
                    <div class='rad'>
                        <div class='rad2'><label for='d'>Droite</label><input type='radio' class='check' name='mano' value='d'></div>
                        <div class='rad2'><label for='g'>Gauche</label><input type='radio' class='check' name='mano' value='g' checked></div>
                    </div><br>";
                }
                ?>
                <?php

                    if($data2[7] == '1'){
                    echo"<p><strong>Type de revers :</strong></p>
                    <div class='rev'>
                    <div class='rad2'><label for='1' class='lrevers'>Revers à une main</label><input type='radio' class='check' name='revers' value='1' checked></div>
                    <div class='rad2'><label for='2' class='lrevers'>Revers à deux mains</label><input type='radio' class='check' name='revers' value='2'></div>
                    </div><br>";
                }
                else{
                    echo"<p><strong>Type de revers :</strong></p>
                    <div class='rev'>
                    <div class='rad2'><label for='1' class='lrevers'>Revers à une main</label><input type='radio' class='check' name='revers' value='1'></div>
                    <div class='rad2'><label for='2' class='lrevers'>Revers à deux mains</label><input type='radio' class='check' name='revers' value='2' checked></div>
                    </div><br>";
                }
                ?>

                <div>
                    <label for="autre"><strong>Autre (Style de jeu, service...) :</strong></label><br> <textarea name="autre"  ><?php echo "$data2[9]" ?></textarea>
                </div><br>

                <p><strong>Informations complémentaires :</strong></p>
                <div>
                    <label for="desc"></label> <textarea name="desc"><?php echo "$data2[8]" ?></textarea>
                </div><br>

            </fieldset>
        </div><br><br>
        <button type="submit">Valider</button>
      </form>
      <img id="court" src="tennis_court.jpg">
    
  </div>
  
  <script src="scriptupload.js"></script>
</body>
</html>