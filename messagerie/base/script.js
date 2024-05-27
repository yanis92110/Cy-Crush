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
console.log("currentConv = "+currentConv);
var currentMessage = 0;
console.log("currentMessage = "+currentMessage);

var currentInterlocuteur;

function loadConversations() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/messagerie/conversations/conv" + encodeURIComponent(userPseudo) + ".csv", true);
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

function loadMessages(convID) {
    var xhrMessages = new XMLHttpRequest();
    xhrMessages.open("GET", "/messagerie/messages/messages_" + convID + ".csv", true);
    xhrMessages.onreadystatechange = function() {
        if (xhrMessages.readyState == 4 && xhrMessages.status == 200) {
            var messagesData = xhrMessages.responseText;
            displayMessages(messagesData);
        }
    };
    xhrMessages.send();
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

    
    for (var i = 0; i < messagesRows.length; i++) {
        (function(){
            var messageData = messagesRows[i].split(";");
            var messageID = messageData[0];
            var user = messageData[1];
            var message = messageData[2];
            var messageDate = messageData[3];

            
            var messageDiv = document.createElement("div");
            messageDiv.classList.add("message");
            messageDiv.innerHTML = "<strong>" + user + "</strong>: " + message+"\n";

            messageDiv.onclick = function(event){

                currentMessage = messageID;
                console.log(currentMessage);
                
                const deleteDiv = document.getElementById('delete_report');
                const x = event.clientX;
                const y = event.clientY;

                deleteDiv.style.left = `${x}px`;
                deleteDiv.style.top = `${y}px`;

                deleteDiv.style.visibility = "visible";
            };

            messagesContainer.appendChild(messageDiv);
        })();
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
            

            
            var conversationDiv = document.createElement("div");
            conversationDiv.classList.add("conversation");

            //var profilMessage = document.createElement("div");
            //profilMessage.classList.add("profilMessage");

            conversationDiv.innerHTML = "<strong>" + user1Pseudo;

            conversationDiv.onclick = function(){
                currentInterlocuteur = user1Pseudo;
                console.log(currentInterlocuteur);
                currentConv = conversationID;
                console.log(currentConv);

                var path_file = "/messagerie/messages/messages_" + currentConv + ".csv";

                var xhr = new XMLHttpRequest();
                currentConv = conversationID;
                xhr.open("GET", path_file, true);
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
    xhr2.open("POST" , "/messagerie/base/chat.php" , true);
    xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr2.onreadystatechange = function() {
        if(xhr2.readyState == 4 && xhr2.status == 200){
            console.log('Al Hamdoulilah tout se passe bien');
        }
    };
    xhr2.send("message=" + encodeURIComponent(message) + "&convID=" + encodeURIComponent(currentConv));


    // re-display les messages de la conv
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/messagerie/messages/messages_" + currentConv + ".csv", true);
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

function isConv(currentConv) {
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(this.response);
                var res = xhr.responseText;
                var response = JSON.parse(res);
                if (response.exists === true) {
                    console.log("La conversation existe déjà. convID: " + response.convID);
                    loadMessages(response.convID);
                    var conversationContainer = document.getElementById("conversation-container");
                    conversationContainer.innerHTML = '';
                    loadConversations();
                } else {
                    console.log("La conversation peut être créée. convID: " + response.convID);
                    loadMessages(response.convID);
                    var conversationContainer = document.getElementById("conversation-container");
                    conversationContainer.innerHTML = '';
                    loadConversations();
                }
        } else if (xhr.readyState == 4) {
            console.error("Erreur lors de la requête:", xhr.statusText);
        }
    };

    xhr.open("POST", "/messagerie/base/verifFile.php?p=" + encodeURIComponent(userPseudo2), true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("pseudo=" + encodeURIComponent(userPseudo));
}


function deleteMessage(){
    // supprime un message
    var xhr = new XMLHttpRequest();
    xhr.open("POST" , "/messagerie/base/delete.php" , true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) { 
            // re-display les messages de la conv
            var xhr2 = new XMLHttpRequest();
            xhr2.open("GET", "/messagerie/messages/messages_"+currentConv+".csv", true);
            xhr2.onreadystatechange = function() {
                if (xhr2.readyState == 4 && xhr2.status == 200) {
                    console.log('fichier lancé avec succes');
                    loadMessages(currentConv);                
                }
            };
            xhr2.send();
        }
    };
    xhr.send("messageID=" + encodeURIComponent(currentMessage) + "&convID=" + encodeURIComponent(currentConv));

    
}


function reportMessage(){ //prototype
    // report un message
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log("fichier pour report correctement lancé");
        }
    }
    xhr.open("POST","/messagerie/base/report.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("reportedMessage=" + encodeURIComponent(currentMessage) + "&convID=" + encodeURIComponent(currentConv));

    deleteMessage();

}
