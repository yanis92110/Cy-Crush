<?php
session_start();
include "../verif.php";

var_dump($_POST);

if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['sexe']) && isset($_POST['classement']) && isset($_POST['ville']) && isset($_POST['birth'])) {
    $pseudo = $_POST['pseudo'];
    $date_insc=date("Y-m-d");
    $email = $_POST['email'];
    $pass = $_POST['pass1'];
    $sexe=$_POST['sexe'];
    $sub=0;

    $classement = $_POST['classement'];

    $droitier = $_POST['droitier'];
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
        header("Location: login_form.php");
}
if($_POST['pass1'] != $_POST['pass2']){
    $_SESSION['erreur_mdp_register'] = "Erreur les mots de passes sont différents";
    header("Location: signup.php");
    exit();
}



?>
