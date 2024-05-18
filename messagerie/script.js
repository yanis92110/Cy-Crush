document.addEventListener("DOMContentLoaded", function() {
    loadConversations();
});

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
    xhr.open("GET", "../data/data1.csv", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            usersData = xhr.responseText;
            
            displayConversationsWithData(conversationsData, usersData);
        }
    };
    xhr.send();
}

function loadMessages(conversationID) {
    
    var xhr = new XMLHttpRequest();
    
    xhr.open("GET", "/messages/messages_" + conversationID + ".csv", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var messagesData = xhr.responseText;
            displayMessages(messagesData);
        }
    };
    xhr.send();
}

function displayMessages(messagesData) {
    
    var messagesRows = messagesData.split("\n");

    
    var messagesContainer = document.getElementById("messages-container");
    messagesContainer.innerHTML = "";

    
    for (var i = 1; i < messagesRows.length; i++) {
        var messageData = messagesRows[i].split(",");
        var user = messageData[0];
        var message = messageData[1];
        var messageDate = messageData[2];

        
        var messageDiv = document.createElement("div");
        messageDiv.classList.add("message");
        messageDiv.innerHTML = "<strong>" + user + "</strong>: " + message+"\n";

        
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
            var lastMessageDate = rowData[3];

            
            var conversationDiv = document.createElement("div");
            conversationDiv.classList.add("conversation");

            //var profilMessage = document.createElement("div");
            //profilMessage.classList.add("profilMessage");

            conversationDiv.innerHTML = "<strong>" + user1Pseudo + "</strong> et <strong>" + user2Pseudo + "</strong> - Dernier message le " + lastMessageDate;

            conversationDiv.onclick = function(){
                var xhr = new XMLHttpRequest();
               
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

document.getElementById('send').addEventListener('submit',function(event){
    event.preventDefault();

    var message = encodeURIComponent(document.getElementById('response'));
    var conversationID = encodeURIComponent(conversationID);

    var xhr = new XMLHttpRequest();
    var url = "chat.php";
    var params = "conversationID=" + conversationID + "&message=" + message;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log('tout va bien');
        }
    };
    
    xhr.send(params);
})
