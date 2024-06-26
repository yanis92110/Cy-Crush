<?php
// Lire le fichier CSV
$data2 = [];
//On parcours pour data2
if (($handle = fopen("../data/data2.csv", "r")) !== FALSE) {
    while (($csv = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data2[] = $csv;
    }
    fclose($handle);
}
$data1 = [];

//On parcours pour data1
if (($handle = fopen("../data/data1.csv", "r")) !== FALSE) {
    while (($csv = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data1[] = $csv;
    }
    fclose($handle);
}
// Extraire les dix derniers profils
$last_ten_profiles = array_slice($data2, -10);
// Convertir en JSON
$json_data2 = json_encode($last_ten_profiles);
//Pareil pour data1
$last_ten_profiles = array_slice($data1, -10);
$json_data1 = json_encode($last_ten_profiles);
ob_start();
session_start();
include "../verif.php";
$pseudo=$_SESSION["pseudo"];
$pseudo=json_encode($pseudo);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accueil sub</title>
        <link rel="stylesheet" type="text/css" href="menu.css">
        <link rel="stylesheet" type="text/css" href="/messagerie/base/style.css">
    </head>

    

    <body>

    <h2 id="logo"> CY Roland </h2>
    <h2 id="logobis"> Garros </h2>
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

                <button class="button" id="logoutBtn" onclick="redirect_accueil()">
                <svg viewBox="0 0 512 512" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="0" fill="currentColor" stroke="currentColor" class="icon">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                </svg>
                </button>

            </div>

            <fieldset id="profilContainer">
                <legend style="text-align:center;"><h2> Commencez à naviguer a travers le site en rencontrant nos derniers inscrits ! </h2></legend>
            </fieldset>

            <h1>MESSAGERIE</h1>

            <h3 id="flou">Veuillez vous abonner pour accéder à la messagerie</h3>

        <div id="conversation-container" class="conversation-container-css" style="filter: blur(4px);">
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

        
        <script src="script_upload.js"></script>

        <script type="text/javascript">
        // Injecter les données JSON dans le script
        var profilesdata2 = <?php echo $json_data2; ?>;
        var profilesdata1 = <?php echo $json_data1; ?>;
        var pseudo = <?php echo $pseudo;?>;
        // Sélectionner la div existante
        var profilesDiv = document.getElementById('profilContainer');
        
        var i=1;

        // Créer et ajouter les nouvelles div avec les informations des 10 derniers profil

        profilesdata2.forEach(function(profile,i) {
            if(profilesdata2[i][0]!=pseudo){
                //Ne pas afficher son profil
                var profileDiv = document.createElement("div");
                profileDiv.className="vignette";
                
                profileDiv.innerHTML += 'Pseudo: ' + profilesdata2[i][0] + '<br>' + "Sexe: " + profilesdata1[i][5] + "<br> Classement: " + profilesdata1[i][6] + '<div> Taille: ' + profilesdata2[i][5] + "<br>" + "Main forte: " + profilesdata2[i][6] + "<br>" + "Revers: " + profilesdata2[i][7] + "mains <br>";
                var path="../img/"+profile[0]+"/"+profile[0]+".jpg";
                profileDiv.innerHTML += '<img class = "pfp" src='+path+'>';
                profileDiv.onclick=function(){
                    var url="other_user_profil.php?p=" + encodeURIComponent(profile[0]);
                    window.location.href=url;
                };
                profilesDiv.appendChild(profileDiv);
                
                
                
            };
            //i=i+1;
        });
        </script>
    </body>
</html>
<?php
ob_end_flush();
?>