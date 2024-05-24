<?php

if (isset($_POST['convID']) && isset($_POST['message'])) {
    $convID = $_POST['convID'];

    $id = uniqid();
    $pseudo = 'Ivern';
    $message = $_POST['message'];
    $date = date("d-m-Y H:i:s"); 

    $data = [$id, $pseudo, $message, $date];

    $line = PHP_EOL . $data[0] . ";" . $data[1] . ";" . $data[2] . ";" . $data[3];
    
    file_put_contents("../messages/messages_" . $convID . ".csv", $line, FILE_APPEND);
} else {
    echo "Il manque des données...";
}
