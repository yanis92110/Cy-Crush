<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <title></title>

    </head>
<body>
    
    <?php
    session_start();
    if(!is_dir('../img/'.$_SESSION['pseudo'])){
        mkdir('../img/'.$_SESSION['pseudo'], 0777);
    }

    $rep='../img/'.$_SESSION['pseudo'];
    if($handle = opendir($rep)){
        echo "<form action='' method='post'>";
        echo "<select name='pfp'>";

        while(($name_pfp = readdir($handle)) !== false){
            if($name_pfp != "." && $name_pfp != ".."){
                echo "<option value='$name_pfp'>$name_pfp</options>";
            }
        }

        echo "</select>";
        echo "<input type='submit' value='Mettre en pfp'>";
        echo "</form>";

        if(isset($_POST['pfp']))
            $_SESSION['pfp'] = '../img/'.$_SESSION['pseudo'].'/'.$_POST['pfp'];
            echo "Photo mise en photo de profil avec succès";
            setcookie('pfp', $_SESSION['pfp'], time() + (86400 * 30), "/");
    }
    
    ?>

    <br><br>

    <button type="button" class="button_upload" onclick="redirect_profile()">Revenir sur votre profil</button>


<script src="script_upload.js"></script>
</body>
</html>
