<?php
session_start();
include "../verif.php";

$infos=[$_POST['sexe'], $_POST['classement'], $_POST['mano'], $_POST['lrevers'], $_POST['']];

if($infos==[]){
    echo "<p>Veuillez choisir au moins une caractéristique</p>"; //Jsp si vaut mieux le mettre avec verif_registration du JS
}
else{
    $n=count($infos);
    for($i=0;$i<$n;$i=$i+1){
        if($infos[$i]!=""){
            $
            foreach($lines )
    }
}