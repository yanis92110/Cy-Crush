<?php
session_start();

header('Content-Type: application/json');

if (isset($_GET['p']) && isset($_POST['pseudo'])) {
    $recherche = $_GET['p'];
    $pseudo = $_POST['pseudo'];
    $convID = random_int(1000000000, 9999999999);
    $date = date("d-m-Y H:i:s");

    $path_file = "../conversations/conv" . $pseudo . ".csv";
    $ID = 0;

    if (file_exists($path_file)) {
        $file = fopen($path_file, 'r');
        $exists = false;

        while (!feof($file)) {
            $data = fgets($file);

            if (strpos($data, $recherche) !== false) {
                $line = explode(",", $data);
                $ID = $line[0];
                $exists = true;
                break;
            }
        }

        fclose($file);

        if ($exists) {
            echo json_encode(["exists" => true, "convID" => $ID]);
        } else {
            $file1 = fopen("../conversations/conv" . $pseudo . ".csv", "a");
            fwrite($file1, "\n" . $convID . "," . $recherche);
            fclose($file1);

            $file2 = fopen("../conversations/conv" . $recherche . ".csv", "a");
            fwrite($file2, "\n" . $convID . "," . $pseudo);
            fclose($file2);

            $messages_file = fopen("../messages/messages_" . $convID . ".csv", "w");
            fwrite($messages_file, $convID . ";" . $pseudo . ";A démarrer la conversation...;" . $date);
            fclose($messages_file);

            echo json_encode(["exists" => false, "convID" => $convID]);
        }
    } else {
        echo json_encode(["exists" => false, "error" => 'File not found']);
    }
} else {
    echo json_encode(["exists" => false, "error" => 'Parameter missing']);
}
