<?php

session_start();
include "../verif.php";



//recupere le sexe et classement du formulaire
$pseudo=$_SESSION["pseudo"];
$sexe=$_POST["sexe"];
$classement=$_POST["classement"];

$profiles = [];
if (($handle = fopen("../data/data1.csv", "r")) !== FALSE) {
    //Verif que ca s'ouvre bien
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        //mets chaque ligne du csv dans le tableau profiles
        $profiles[] = $data;
    }
    fclose($handle);
}
//Encodage en javascript
$json_profiles = json_encode($profiles);
$sexe = json_encode($sexe); 
$classement = json_encode($classement);
$pseudo=json_encode($pseudo);

$data1=get_data1($_SESSION['id_user']);
        if($data1[8]==1){
            $sub = json_encode(1);
        }
        else if($data1[4]==0){
            $sub = json_encode(0);
        }
        else if($data1[4]== 1){
            $sub = json_encode(1);
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recherche</title>
        <link rel="stylesheet" type="text/css" href="menu.css">
        <link rel="stylesheet" type="text/css" href="/messagerie/base/style.css">
    </head>
    <body>
        

        <div class="global">
            <div class="button-container">
                <?php
                    $data1=get_data1($_SESSION['id_user']);
                    if($data1[8]==1){
                        $redirect="redirect_admin()";
                    }
                    else if($data1[4]==0){
                        $redirect="redirect_non_sub()";
                    }
                    else if($data1[4]== 1){
                        $redirect= "redirect_sub()";
                    }
                    echo '<button class="button" onclick='.$redirect.'>';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024" stroke-width="0" fill="currentColor" stroke="currentColor" class="icon">';
                        echo '<path d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 0 0-44.4 0L77.5 505a63.9 63.9 0 0 0-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0 0 18.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z"></path>';
                    echo "</svg>";
                    echo "</button>";
                ?>

                <button class="button" onclick="redirect_search()">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round" stroke-linecap="round"></path>
                </svg>
                </button>

                <button class="button" onclick="redirect_profil()">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="0" fill="currentColor" stroke="currentColor" class="icon">
                    <path d="M12 2.5a5.5 5.5 0 0 1 3.096 10.047 9.005 9.005 0 0 1 5.9 8.181.75.75 0 1 1-1.499.044 7.5 7.5 0 0 0-14.993 0 .75.75 0 0 1-1.5-.045 9.005 9.005 0 0 1 5.9-8.18A5.5 5.5 0 0 1 12 2.5ZM8 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0Z"></path>
                </svg>
                </button>

                <button class="button" onclick="redirect_store()">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon">
                    <circle r="1" cy="21" cx="9"></circle>
                    <circle r="1" cy="21" cx="20"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                </button>

                <button class="button" id="logoutBtn">
                <svg viewBox="0 0 512 512" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="0" fill="currentColor" stroke="currentColor" class="icon">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                </svg>
                </button>

            </div>
        </div>
        <fieldset id="profilContainer2">
            <legend style="text-align: center;"><h2> Recherchez les tennismen/women les plus adaptés à vos attentes ! </h2></legend>
        </fieldset>

        <h1>MESSAGERIE</h1>

        <h3 id="flou" style="visibility:hidden;">Veuillez vous abonner pour accéder à la messagerie</h3>

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
            <button class="btn" onclick="deleteMessage()">
                <svg viewBox="0 0 15 17.5" height="17.5" width="15" xmlns="http://www.w3.org/2000/svg" class="icon">
                    <path transform="translate(-2.5 -1.25)" d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z" id="Fill"></path>
                </svg>
            </button>

            <button class="btn2 icon">!</button>
        </div>
    
        <script type="text/javascript" src="/messagerie/base/script.js"></script>
        <script type="text/javascript" src="script_upload.js"></script>
        <script type="text/javascript">

        // Injecter les données JSON dans le script

        var sub = <?php echo $sub;?>;
        if(!sub){
            var doc = document.getElementById('conversation-container');
            var doc2 = document.getElementById('flou');
            doc.style.visibility = 'hidden';
            doc2.style.visibility = 'visible';
        }

        var profiles = <?php echo $json_profiles; ?>;
        var sexe = <?php echo $sexe;?>;
        var classement = <?php echo $classement;?>;
        var pseudo = <?php echo $pseudo;?>;
        var userPseudo = <?php echo $pseudo;?>;

        // Sélectionner la div parent
        var profilesDiv = document.getElementById('profilContainer2');
        var i=1; //i=1 parce que le 0 c'est les titres

        //profiles est donc un tableau de tableau
        // Boucle qui pour chaque tableau de profiles éxécute la fonction avecx comme parametre le tableau profil
        profiles.forEach(function(profile) {
            if(profile[0]!=pseudo && profile[5]==sexe && profile[6]==classement){
                //Si le sexe et classement du profil correspondent a la recherche on entre dans la condition qui créer et affiche une vignette de profil, n'affiche pas son propre profil
                var profileDiv = document.createElement("div");
                profileDiv.className="vignette";
                profileDiv.innerHTML = 'Pseudo: ' + profile[0] + '<br>' + "Sexe: " + profile[5] + "<br> Classement: " + profile[6];
                profileDiv.onclick=function(){
                    var url="other_user_profil.php?p=" + encodeURIComponent(profile[0]);
                    window.location.href=url;
                };
                    
                    
                profilesDiv.appendChild(profileDiv);
            }
            i=i+1;
        });
        if(profilesDiv.childElementCount == 0){
            //Si la div parent a aucun enfant alors la recherche n'a pas abouti et on affiche une vignette l'indiquant a l'utilisateur
            var profileDiv = document.createElement("div");
            profileDiv.className="vignette";
            profileDiv.innerHTML = 'Malaise ! <br> Aucune profil ne correspond à: <br><br> ' + sexe + ' classé(e) ' + classement;

            profilesDiv.appendChild(profileDiv);
            
        }
        </script>


    </body>
</html>