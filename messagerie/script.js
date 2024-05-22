document.addEventListener("DOMContentLoaded", function() {
    loadConversations();
});

document.addEventListener('click', function(event) {
    
    let targetElement = event.target;
    if (!targetElement.classList.contains('message')) {
        document.getElementById('delete_report').style.visibility = 'hidden';
    }

});


var currentConv = 0;
console.log(currentConv);

function loadConversations() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "conversations.csv", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var conversationsData = xhr.responseText;
            loadUsersData(conversationsData);
        }
    };
    xhr.send();
}

function loadUsersData(conversationsData) {
    var usersData = ""; 
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/data/data1.csv", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            usersData = xhr.responseText;
            
            displayConversationsWithData(conversationsData, usersData);
        }
    };
    xhr.send();
}

function displayMessages(messagesData) {
    
    var messageContainer = document.getElementById('messages-container');
    var barreExit = document.getElementById('messageStyle');
    var barreMessage = document.getElementById('chat');

    messageContainer.style.visibility = "visible";
    barreExit.style.visibility = "visible";
    barreMessage.style.visibility = "visible";

    var messagesRows = messagesData.split("\n");

    
    var messagesContainer = document.getElementById("messages-container");
    messagesContainer.innerHTML = "";

    
    for (var i = 1; i < messagesRows.length; i++) {
        var messageData = messagesRows[i].split(";");
        var messageID = messageData[0]
        var user = messageData[1];
        var message = messageData[2];
        var messageDate = messageData[3];

        
        var messageDiv = document.createElement("div");
        messageDiv.classList.add("message");
        messageDiv.innerHTML = "<strong>" + user + "</strong>: " + message+"\n";

        messageDiv.onclick = function(event){
            
            const deleteDiv = document.getElementById('delete_report');
            const x = event.clientX;
            const y = event.clientY;

            deleteDiv.style.left = `${x}px`;
            deleteDiv.style.top = `${y}px`;

            deleteDiv.style.visibility = "visible";
        };

        messagesContainer.appendChild(messageDiv);
    }
}

function displayConversationsWithData(conversationsData, usersData) {
    
    var conversationsRows = conversationsData.split("\n");
    var usersRows = usersData.split("\n");


    /*for (var i = 1; i < usersRows.length; i++) {
        var userData = usersRows[i].split(",");
        var userPseudo = userData[0];
    }*/

    
    var conversationContainer = document.getElementById("conversation-container");

    
    for (var i = 1; i < conversationsRows.length; i++) {
        (function(){

            var rowData = conversationsRows[i].split(",");
            var conversationID = rowData[0];
            var user1Pseudo = rowData[1];
            var user2Pseudo = rowData[2];

            
            var conversationDiv = document.createElement("div");
            conversationDiv.classList.add("conversation");

            //var profilMessage = document.createElement("div");
            //profilMessage.classList.add("profilMessage");

            conversationDiv.innerHTML = "<strong>" + user1Pseudo + "</strong> et <strong>" + user2Pseudo + "</strong>";

            conversationDiv.onclick = function(){
                var xhr = new XMLHttpRequest();
                currentConv = conversationID;
                console.log(currentConv);
                xhr.open("GET", "/messages/messages_" + conversationID + ".csv", true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var messagesData = xhr.responseText;
                        displayMessages(messagesData);
                    }
                };
                xhr.send();

            };
    
            //conversationDiv.appendChild(profilMessage);
            conversationContainer.appendChild(conversationDiv);
        })();
    }
}

function envoyer_message(){
    
    // récupérer le message à envoyer
    var message = document.getElementById('response').value;

    // écrire le message dans le .csv
    var xhr2 = new XMLHttpRequest();
    xhr2.open("POST" , "chat.php" , true);
    xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr2.onreadystatechange = function() {
        if(xhr2.readyState == 4 && xhr2.status == 200){
            console.log('Al Hamdoulilah tout se passe bien');
        }
    };
    xhr2.send("message=" + encodeURIComponent(message) + "&convID=" + encodeURIComponent(currentConv));

    message ="";

    // re-display les messages de la conv
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/messages/messages_" + currentConv + ".csv", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var messagesData = xhr.responseText;
            displayMessages(messagesData);
    }
    };
    xhr.send();
}

function sortirConv(){
    currentConv = 0;
    console.log(currentConv);

    //fermer la fenetre de la conv
    var messageContainer = document.getElementById('messages-container');
    var barreExit = document.getElementById('messageStyle');
    var barreMessage = document.getElementById('chat');

    messageContainer.style.visibility = "hidden";
    barreExit.style.visibility = "hidden";
    barreMessage.style.visibility = "hidden";
}

function clearContent(x){
    x.value="";
}
