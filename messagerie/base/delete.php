<?php

session_start();

if (isset($_POST['messageID']) && isset($_POST['convID'])) {
    $messageID = $_POST['messageID'];
    $convID = $_POST['convID'];
    $date = date("d-m-Y H:i:s"); 
    $currentPseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : 'Invité';

    $path_file = "../messages/messages_" . $convID . ".csv";
    
    if (file_exists($path_file)) {
        $file = fopen($path_file, "r");
        
        // Ouvre le fichier temporaire pour écriture
        $tmp_path = "../messages/messages_tmp.csv";
        $tmpFile = fopen($tmp_path, "w");

        $firstLine = true; // Pour vérifier si c'est la première ligne du fichier

        while (($ligne = fgets($file)) !== false) {
            $ligne = trim($ligne);
            
            // Vérifie si l'ID du message correspond et si le pseudo est le même
            if (strpos($ligne, $messageID) !== false) {
                $ligneTmp = explode(";", $ligne);
                $pseudo = $ligneTmp[1];
                if ($pseudo == $currentPseudo) {
                    // Si c'est le bon pseudo, modifie la ligne
                    $remplacement = $messageID . ";" . $pseudo . ";Ce message a été supprimé par l'utilisateur/trice :/;" . $date;
                    $ligne = $remplacement;
                }
            }

            // Écrit la ligne dans le fichier temporaire seulement si ce n'est pas une ligne vide
            if (!empty($ligne)) {
                // Écrit une ligne vide seulement si ce n'est pas la première ligne du fichier
                if (!$firstLine) {
                    fwrite($tmpFile, "\n");
                } else {
                    $firstLine = false;
                }
                fwrite($tmpFile, $ligne);
            }
        }

        // Ferme les fichiers
        fclose($file);
        fclose($tmpFile);

        // Renomme le fichier temporaire en tant que fichier principal
        rename($tmp_path, $path_file);
    } else {
        echo "Le fichier spécifié n'existe pas.";
    }
} else {
    echo "Les paramètres messageID et convID sont manquants.";
}

?>
