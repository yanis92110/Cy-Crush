<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8">
        <link rel="icon" type="image/x-icon" href="../tests htmlcss/momo haddache.jpg">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title> Messagerie </title>
    </head>
    <body>

        <?php
            session_start();


            if (isset($_SESSION['erreur'])) {
                echo "<p style='color: red;'>".$_SESSION['erreur']."</p>";
                unset($_SESSION['erreur']); 
            }

            if (isset($_SESSION['erreur_mdp_register'])) {
                echo "<p style='color: red;'>".$_SESSION['erreur']."</p>";
                unset($_SESSION['erreur_mdp_register']); 
            }

        ?>

        <h1>MESSAGERIE</h1>

        <div id="conversation-container" class="conversation-container-css">
        </div>

        <div id="messageStyle">
            <button id="exit" onclick="sortirConv()">X</button>
        </div>
        <div id="messages-container" class="messages-container-css">
        </div>
        <div id="chat">
                <input type="text" name="chat" id="response" placeholder="Tapez..." onfocus="clearContent(this)">
                <button id="send" onclick="envoyer_message()"> Envoyer </button>
        </div>

        <div id="delete_report">
            <button class="btn">
                <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path transform="translate(-2.5 -1.25)" d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z" id="Fill"></path>
                </svg>
            </button>

            <button class="btn2 icon">
            !
            </button>
        </div>

        <script src="script.js"></script>
    </body>
</html>
