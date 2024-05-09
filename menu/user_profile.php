<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Accueil admin</title>
    <link rel="stylesheet" href="stylemenu.css">
</head>
<body>

<?php
session_start();
include "../verif.php";

$indice = $_SESSION['id_user'];
$data1 = get_data1($indice);
$data2 = get_data2($indice);

foreach($data1 as $données1){
    echo "$données1\n";
}

$data2 = array_slice($data2,1,null,true);

foreach($data2 as $données2){
    echo "$données2\n";
}

?>
    <button type="button" class=button_upload onclick="redirect_upload()">Uploadez vos propres photos de profils !!</button>
    <br>
     <button type="button" class=button_upload onclick="redirect_pfp()">Changer de photo de profil</button>
    <div class="container">
        <?php
        if(isset($_SESSION['pfp']))
            echo "<img class='pfp' src='{$_SESSION['pfp']}' alt='Photo de profil'>";
        else{
            $_SESSION['pfp'] = $_COOKIE['pfp'];
             echo "<img class='pfp' src='{$_SESSION['pfp']}' alt='Photo de profil'>";
        }
        ?>
        <br>
        <h2><?php echo "$data1[0]" ?><h2>
    </div>



<script src="script_upload.js"></script>
</body>
</html>