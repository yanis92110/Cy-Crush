<?php
session_start();
include "verif.php";

var_dump($_POST);

if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) && ($_POST['pass1'] == $_POST['pass2']) && isset($_POST['date_insc']) && isset($_POST['sexe']) && isset($_POST['classement']) && isset($_POST['ville']) && isset($_POST['birth']) && isset($_POST['dispo']) && isset($_POST['taille']) && isset($_POST['revers']) && isset($_POST['desc']) && isset($_POST['autre'])) {
    $pseudo = $_POST['pseudo'];
    $date_insc=$_POST['date_insc'];
    $email = $_POST['email'];
    $pass = $_POST['pass1'];
    $sexe=$_POST['sexe'];
    $sub=0;
    $classement = $_POST['classement'];
    $droitier = $_POST['droitier'];
    $ville=$_POST['ville'];
    $birth=$_POST['birth'];
    $dispo=$_POST['dispo'];
    $taille=$_POST['taille'];
    $revers=$_POST['revers'];
    $desc=$_POST['desc'];
    $autre=$_POST['autre'];
    $admin=0;


    
    $pseudo = htmlspecialchars($pseudo);
    $email = htmlspecialchars($email);
    
    $list_pseudos = list_data("../data/data1.csv",0);
    foreach ($list_pseudos as $pseudos){
        if($pseudos === $pseudo){
            $_SESSION['erreur'] = "Ce pseudo existe déjà !";
            header("Location: signup.php");
            exit();
        }
    }

    $list_email = list_data("../data/data2.csv",1);
    foreach ($list_email as $emails){
        if($emails === $email){
            $_SESSION['erreur'] = "Ce mail est déjà pris !";
            header("Location: signup.php");
            exit();
        }
    }

        $file1 = fopen("../data/data1.csv", "a");
        $file2 = fopen("../data/data2.csv", "a");

        $user1 = [$pseudo, $pass, $sub, $sexe, $classement, $date_insc, $admin];

        $user2 = [$pseudo, $email, $ville, $birth, $dispo, $taille, $droitier, $revers, $desc, $autre];

        fputcsv($file1, $user1);
        fputcsv($file2, $user2);

        fclose($file1);
        fclose($file2);
        session_destroy();
        header("Location: login.php");
}
if($_POST['pass1'] != $_POST['pass2']){
    $_SESSION['erreur_mdp_register'] = "Erreur les mots de passes sont différents";
    header("Location: signup.php");
    exit();
}



?>
