<?php

session_start();

if (isset($_POST['convID']) && isset($_POST['message'])) {
    $convID = $_POST['convID'];

    $id = random_int(1000000000, 9999999999);
    $pseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : 'Invité';
    $message = $_POST['message'];
    $date = date("d-m-Y H:i:s"); 

    $data = [$id, $pseudo, $message, $date];

    $line = PHP_EOL . $data[0] . ";" . $data[1] . ";" . $data[2] . ";" . $data[3];

    $path_file = "../messages/messages_" . $convID . ".csv";
    
        file_put_contents($path_file, $line, FILE_APPEND);
} else {
    echo "Il manque des données...";
}
