<?php
session_start();
include "../verif.php";
    if(isset($_GET['pseudo'])){
        $pseudo = $_GET['pseudo'];
        $indice = $_SESSION["id_'.$pseudo.'"];
        $data2= get_data2($indice);
        $email=array();
        $date=date("Y-m-d");
        $email = [$data2[1], $date];

        $file=fopen('../data/ban.csv', 'w');
        $add = fputcsv($file, $email);

        $confirm = "L'utilisateur a été banni";
        fclose($file);
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accueil sub</title>
        <link rel="stylesheet" type="text/css" href="menu.css">
        <link rel="stylesheet" type="text/css" href="/messagerie/base/style.css">
        <link rel="stylesheet" type="text/css" href="style_ban.css">

    </head>
    <body>
        <?php
        if(isset($confirm)){
            echo "L'utilisateur a bien été banni";
            sleep(2);
            echo "Retour au menu";
            sleep(1);
            header("Location : menu_admin.php");
        }

        
        ?>

        <h2 id="logo"> CY Roland </h2>
        <h2 id="logobis"> Garros </h2>

        <form method="post" action="#">
            <label for="ban_text"><strong>Raison du ban :</strong></label> <input type="text" id="ban_text" ><br>
            <br><br>
            <button type='submit'>
            BANNIR
            </button>
        </form>
  

    </body>
</html>