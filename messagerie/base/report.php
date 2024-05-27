<?php 

if(isset($_POST['reportedMessage']) && isset($_POST['convID'])){
    $reportedMessage = $_POST['reportedMessage'];
    $convID = $_POST['convID'];
    
    $file_path = "/messagerie/messages/messages_" . $convID . ".csv";
    $file = fopen($file_path, "a");

    while(!feof($file)){
        $line = fgets($file);
        $line = trim($line);

        if(strpos($line,$reportedMessage) !== false){
            $data = explode(";",$line);
            $pseudo = $data[1];
            $date = $data[2];
            $reportTicket = $pseudo . "a envoyé, " . $date . ", le message signalé suivant : " . $reportedMessage . ".";

            break;
        }
    }

    fwrite($file, $reportedMessage);
    fclose($file);

}

//prototype