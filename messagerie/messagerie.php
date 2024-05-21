<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8">
        <link rel="icon" type="image/x-icon" href="../tests htmlcss/momo haddache.jpg">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title> Messagerie </title>
    </head>
    <body>

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

        <script src="script.js"></script>
    </body>
</html>
