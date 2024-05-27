<?php
session_start();
include "../verif.php";

$indice = $_SESSION['id_user'];
$data1 = get_data1($indice);

if ($data1[4] == 1) {
    echo "<script type='text/javascript'>
                    alert('Vous etes deja PREMIUM ! Petit malin');
                    setTimeout(function() {
                        window.location.href = '../menu/menu_user_sub.php';
                    }, 1000);
                  </script>";
    header("Location: ../menu/menu_user_sub.php");
    exit(); // Terminer le script après la redirection
}

if (isset($_POST["carte"]) && isset($_POST["nom"])) {
    echo "<script type='text/javascript'>
                    alert('Vous etes mtn PREMIUM !');
                    setTimeout(function() {
                        window.location.href = '../menu/menu_user_sub.php';
                    }, 1000);
                  </script>";
    
    $data1[4]=1;
    mettreAJourDonneesUtilisateur("../data/data1.csv",$_SESSION["pseudo"],$data1);
    header("Location: ../menu/menu_user_sub.php");
    
    exit(); // Terminer le script après la redirection
}
else{
    echo "prout";
}
?>
<!DOCTYPE html>
<html>
<head>
    <style src="derniersprofils.css"></style>
</head>
<body>
    <div>
        <!-- Votre contenu ici -->
    </div>
</body>
</html>
