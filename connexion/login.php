<?php
session_start();
$_SESSION = array();
include "verif.php";

if(isset($_POST['pseudo_login']) && isset($_POST['mdp_login'])){
    $pseudo_login = $_POST['pseudo_login'];
    $mdp_login = $_POST['mdp_login'];
    
    echo"dada :".$pseudo_login;

    $list_pseudos = list_data("../data/data1.csv",0);
    $list_mdp = list_data("../data/data1.csv",1);
    $list_admin = list_data("../data/data1.csv",6);
    $list_sub = list_data("../data/data1.csv",2);

    foreach ($list_pseudos as $indice => $pseudos){
    if($pseudos === $pseudo_login){
        if ($list_mdp[$indice] === $mdp_login){
            $_SESSION['pseudo'] = $pseudo_login;
            $_SESSION['mdp'] = $mdp_login;
            if($list_admin[$indice] === 1){
                header("Location: accueil_admin.php");
                exit();
            }
            else{
                if($list_sub[$indice] === 1){
                    header("Location: accueil_user_sub.php");
                    exit();
                }
                else{
                    header("Location: accueil_user_nonsub.php");
                    exit();
                }
            }
        }   
        else{
            $_SESSION['erreur_mdp']="Le mot de passe est incorrect";
            header("Location: login_form.php");
            exit();
        }
    }
        
    }
    $_SESSION['erreur_pseudo']="Le pseudo n'existe pas";
    header("Location: login_form.php");
    exit();
    }
?>