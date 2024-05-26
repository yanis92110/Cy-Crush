<?php
session_start();
include "../verif.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recherche de partenaires</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
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
                echo '<button class="button2" onclick='.$redirect.'>';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024" stroke-width="0" fill="currentColor" stroke="currentColor" class="icon">';
                    echo '<path d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 0 0-44.4 0L77.5 505a63.9 63.9 0 0 0-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0 0 18.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z"></path>';
                echo "</svg>";
                echo "</button>";
                ?>
        <button class="button2" onclick="redirect_search()">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round" stroke-linecap="round"></path>
        </svg>
        </button>

        <button class="button2" onclick="redirect_profil()">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="0" fill="currentColor" stroke="currentColor" class="icon">
            <path d="M12 2.5a5.5 5.5 0 0 1 3.096 10.047 9.005 9.005 0 0 1 5.9 8.181.75.75 0 1 1-1.499.044 7.5 7.5 0 0 0-14.993 0 .75.75 0 0 1-1.5-.045 9.005 9.005 0 0 1 5.9-8.18A5.5 5.5 0 0 1 12 2.5ZM8 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0Z"></path>
        </svg>
        </button>

        <button class="button2" onclick="redirect_store()">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon">
            <circle r="1" cy="21" cx="9"></circle>
            <circle r="1" cy="21" cx="20"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        </button>

        <button class="button2" id="logoutBtn">
        <svg viewBox="0 0 512 512" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="0" fill="currentColor" stroke="currentColor" class="icon">
            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
        </svg>
        </button>

    </div>
    <br>
    <h2>Recherche de partenaires</h2>
    <div class="form-container">
        <form id="creationForm" action="recherche_finie.php" method="POST">
            <p><strong>Sexe :</strong></p>
            <div class="rad">
                <div class="rad2"><label for="sexe">Homme</label> <input type="radio" class="check" name="sexe" value="homme" required></div>
                <div class="rad2"><label for="sexe">Femme</label> <input type="radio" class="check" name="sexe" value="femme"></div>
            </div><br>
            <div>
                <label for="classement"><strong>Classement</strong></label>
    
                <select name="classement" id="classement" required>
                  <option value="">--Aucune préférence--</option>
                  <option value="Non Classé">Non Classé</option>
                  <option value="40">40</option>
                  <option value="30/5">30/5</option>
                  <option value="30/4">30/4</option>
                  <option value="30/3">30/3</option>
                  <option value="30/2">30/2</option>
                  <option value="30/1">30/1</option>
                  <option value="30">30</option>
                  <option value="15/5">15/5</option>
                  <option value="15/4">15/4</option>
                  <option value="15/3">15/3</option>
                  <option value="15/2">15/2</option>
                  <option value="15/1">15/1</option>
                  <option value="15">15</option>
                  <option value="5/6">5/6</option>
                  <option value="4/6">4/6</option>
                  <option value="3/6">3/6</option>
                  <option value="2/6">2/6</option>
                  <option value="1/6">1/6</option>
                  <option value="0">0</option>
                  <option value="pro">Semi-pro ou pro</option>
                </select>
                
            </div><br><br>

                <button class = "envoi" type="submit">Rechercher</button>
        </form>
        
    </div>
    <script src="script_upload.js"></script>
</body>
