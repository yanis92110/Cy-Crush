<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Accueil admin</title>
    <link rel="stylesheet" href="stylemenu.css">
</head>
<body>

<?php
session_start();
include "../verif.php";

$indice = $_SESSION['id_user'];
$data1 = get_data1($indice);
$data2 = get_data2($indice);

$data2 = array_slice($data2,1,null,true);

?>

    <div class="container">
        <?php
        if(isset($_SESSION['pfp'.$_SESSION['pseudo']]))
            echo "<img class='pfp' src='{$_SESSION['pfp'.$_SESSION['pseudo']]}' alt='Photo de profil'>";
        else{
            $_SESSION['pfp'.$_SESSION['pseudo']] = $_COOKIE['pfp'.$_SESSION['pseudo']];
             echo "<img class='pfp' src='{$_SESSION['pfp'.$_SESSION['pseudo']]}' alt='Photo de profil'>";
        }
        ?>
        <br>
        <h2 class="infos_pseudo"><?php echo "$data1[0]" ?><h2>
        <hr>
        <h3 class="infos">Nom : <?php echo "$data1[2] $data1[3]"?></h4>
        <hr>
        <h4 class="infos">Genre : <?php echo "$data1[5]"?></h5>
        <hr>
        <h4 class="infos">Classement : <?php echo "$data1[6]"?></h4>
        <hr>
        <h4 class="infos">E-mail : <?php echo "$data2[1]"?></h4>
        <hr>
        <h4 class="infos">Ville : <?php echo "$data2[2]"?></h4>
        <hr>
        <h4 class="infos">Date de naissance : <?php echo "$data2[3]"?></h4>
        <hr>
        <h4 class="infos">Disponibilité : <?php echo "$data2[4]"?></h4>
        <hr>
        <h4 class="infos">Taille : <?php echo "$data2[5]"?></h4>
        <hr>
        <h4 class="infos">Main forte : 
        <?php

        if($data2[6] == 'd')
            echo "droite";

        else
            echo "gauche";

        ?></h4>
        <hr>
        <h4 class="infos">Revers à  
        <?php

        if($data2[7] == '1')
            echo "une main";

        else
            echo "deux mains";

        ?></h4>
        <hr>
        <h4 class="infos">Description : <?php echo "$data2[8]"?></h4>
        <hr>
        <h4 class="infos">Autre : <?php echo "$data2[9]"?></h4>

    </div>

    <br><br>

    <button type="button" class=button_upload onclick="redirect_upload()">Uploadez vos propres photos de profils !!</button>
    <br>
     <button type="button" class=button_change onclick="redirect_pfp()">Changer de photo de profil</button>

<script src="script_upload.js"></script>
</body>
</html>
