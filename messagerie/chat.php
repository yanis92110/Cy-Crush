<?php
    session_start();

    if (isset($_POST['conversationID']) && isset($_POST['message'])) {
        $convID = $_POST['conversationID'];
        $message = $_POST['message'];
        //$pseudo = $_SESSION['pseudo'];
        $date = date('d-m-Y H:i:s');
    

        
        $file = "messages/messages_" . $convID . ".csv";

            
        if (!file_exists($file)) {
            $file = fopen($file, 'w');
            fclose($file);
        }

        
        $file1 = fopen($file, "a");

        
        $data = ['Ivern', $message, $date];
        fputcsv($file1, $data);

        
        fclose($file1);
    }
    

    session_destroy();
