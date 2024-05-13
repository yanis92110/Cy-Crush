<?php
session_start();
include "../verif.php";

if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['sexe']) && isset($_POST['classement']) && isset($_POST['ville']) && isset($_POST['birth']) && isset($_POST['nom']) && isset($_POST['prenom'])) {
    $pseudo = $_POST['pseudo'];
    $date_insc=date("Y-m-d");
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pass = $_POST['pass1'];
    $sexe=$_POST['sexe'];

    $classement = $_POST['classement'];

    $droitier = $_POST['mano'];
    $ville=$_POST['ville'];
    $birth=$_POST['birth'];

    if($_POST['dispo'] != "")
        $dispo=$_POST['dispo'];
    else
        $dispo="pas d'infos";

    if($_POST['taille'] != "")
        $taille=$_POST['taille'];
    else
        $taille = "pas d'infos";
    

    $revers=$_POST['revers'];

    if($_POST['desc'] != "")
        $desc=$_POST['desc'];
    else
        $desc="pas d'infos";

    if($_POST['autre'] != "")
        $autre=$_POST['autre'];
    else
        $autre = "pas d'infos";
    

    $pseudo = htmlspecialchars($pseudo);
    $email = htmlspecialchars($email);
    $verif_mail_user = get_data2($_SESSION['id_user']);
    
    $list_pseudos = list_data("../data/data1.csv",0);
    foreach ($list_pseudos as $pseudos){
        if($pseudos === $pseudo && $pseudo != $_SESSION['pseudo']){
            $_SESSION['erreur'] = "Ce pseudo existe déjà !";
            header("Location: modif_info_form.php");
            exit();
        }
    }

    $list_email = list_data("../data/data2.csv",1);
    foreach ($list_email as $emails){
        if($emails === $email && $email != $verif_mail_user[1]){
            $_SESSION['erreur'] = "Ce mail est déjà pris !";
            header("Location: modif_info_form.php");
            exit();
        }
    }

    if($_POST['pass1'] != $_POST['pass2']){
    $_SESSION['erreur_mdp_modif'] = "Erreur les mots de passes sont différents";
    header("Location: modif_info_form.php");
    exit();
}

    $file1 = "../data/data1.csv";
    $file2 = "../data/data2.csv";

    $num = $_SESSION['id_user'];

    $role_status_user = get_data1($num);

    $user_new_data1 = [$pseudo, $pass, $nom, $prenom, $role_status_user[4], $sexe, $classement, $date_insc, $role_status_user[8]];

    $user_new_data2 = [$pseudo, $email, $ville, $birth, $dispo, $taille, $droitier, $revers, $desc, $autre];
    
    mettreAJourDonneesUtilisateur($file1, $_SESSION['pseudo'], $user_new_data1);
    mettreAJourDonneesUtilisateur($file2, $_SESSION['pseudo'], $user_new_data2);


    header("Location: user_profile.php");
}