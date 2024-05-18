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
            <button id="exit">X</button>
        </div>
        <div id="messages-container" class="messages-container-css">
        </div>
        <form id="chat" action="chat.php" method="post">
                <input type="text" name="chat" id="response" placeholder="Tapez...">
                <input type="submit" id="send" value="Envoyer"> 
        </form>

        <script src="script.js"></script>
    </body>
</html>
