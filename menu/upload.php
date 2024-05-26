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
    if(isset($_POST) && !empty($_POST)){
        
        if(!is_dir('../img/'.$_SESSION['pseudo'])){
            mkdir('../img/'.$_SESSION['pseudo'], 0777);
        }

        if($_FILES['myFile']['error'] == UPLOAD_ERR_OK){
            
            if($_FILES['myFile']['size'] > 2500000)
                $error = "Votre fichier est trop lourd";

            $extension = strrchr($_FILES['myFile']['name'],'.');
            if($extension != '.jpg' && $extension != '.gif')
                $error = "Votre fichier n'est pas conforme";
            
            if(!isset($error)){
                move_uploaded_file($_FILES['myFile']['tmp_name'],'../img/'.$_SESSION['pseudo'].'/'.$_FILES['myFile']['name']);
                echo "fichier chargé avec succès";
            }

        }
        else{
            $error = "problème formulaire";
        }
    }
    
    ?>


    <div style="color: red;">
    <p>
    <?php if(isset($error)) echo $error; ?>
    </p>
    </div>
    <form method="post" action="#" enctype="multipart/form-data">
        <input type="file" name="myFile" value="">
        <input type="submit" name="loading"  value="Charger le fichier">
    </form>



    <br><br>

    <button type="button" class="button_upload" onclick="redirect_profil()">Revenir sur votre profil</button>


<script src="script_upload.js"></script>
    </body>
</html>
