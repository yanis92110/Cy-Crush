<?php

if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2'])) {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $pass1 = $POST['pass1'];
    $pass2 = $POST['pass2'];

    $pseudo = htmlspecialchars($pseudo);
    $email = htmlspecialchars($email);
    if($pass1 == $pass2)
        $pass=$pass1;

    $file = fopen("data.csv", "a");

    $data = [$pseudo, $email, $pass];

    fputcsv($file, $data);

    fclose($file);

    echo "Données enregistrées vous etes inscrits !!";




}
?>
