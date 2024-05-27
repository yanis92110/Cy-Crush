<?php

$profiles = [];
if (($handle = fopen("../data/data1.csv", "r")) !== FALSE) {
    //Verif que ca s'ouvre bien
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //mets chaque ligne du csv dans le tableau profiles
        $profiles[] = $data;
    }
    fclose($handle);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accueil sub</title>
        <link rel="stylesheet" type="text/css" href="menu.css">
        <link rel="stylesheet" type="text/css" href="/messagerie/base/style.css">
        <style>
        .profile-photo {
            display: inline-block;
            margin: 10px;
        }
        .profile-photo img {
            max-width: 100px; /* Ajustez la taille selon vos besoins */
            max-height: 100px;
        }
    </style>
    </head>
    <body>
        
        <h2 id="logo"> CY Roland </h2>
        <h2 id="logobis"> Garros </h2>

    <h3 id="list_profils"> Liste des utilisateurs </h3>
    <div class="profil_container">
<?php
session_start();


$dossier = '../img';


if (is_dir($dossier)) {

    if ($handle = opendir($dossier)) {

        while (false !== ($entry = readdir($handle))) { 

            if ($entry != "." && $entry != ".." && is_dir($dossier . '/' . $entry)) {
                $pseudo = $entry;
                $dossier_pfp = $dossier . '/' . $pseudo;
                
                if ($user_handle = opendir($dossier_pfp)) {
                    while (false !== ($pfp_entry = readdir($user_handle))) {
                        $extension = pathinfo($pfp_entry, PATHINFO_EXTENSION);
                        if (in_array(strtolower($extension), ['jpg','gif'])) {
                            $chemin_image = $dossier_pfp . '/' . $pfp_entry;
                            echo "<div class='profile-photo'><a href='other_user_profil_admin.php?pseudo=$pseudo&pfp=" . urlencode($chemin_image) . "'><img src='$chemin_image' alt='Photo de profil de $pseudo&pfp=" . urlencode($chemin_image) . "'></a><br><a href='other_user_profil_admin.php?pseudo=$pseudo'>$pseudo</a></div>";
                            break;
                        }
                    }
                    closedir($user_handle);
                }
            }
        }
        closedir($handle);
    }
}
?>

<script src="../accueil/script.js"></script>
</body>
</html>