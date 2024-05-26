function redirect_upload(){
    window.location.href="upload.php";
}

function redirect_profile(){
    window.location.href = "user_profile.php";
}

function redirect_pfp(){
    window.location.href = "pfp.php";
}

function redirect_modif_infos(){
    window.location.href = "modif_info_form.php";
}

function redirect_home(){
    window.location.href = "menu_user_sub.php";
}

function redirect_search(){
    window.location.href = "recherche_form.html";
}

function redirect_profil(){
    window.location.href = "user_profile.php";
}

function redirect_store(){
    document.location.href = "abonnements.php";
}

function redirect_accueil(){
    document.location.href = "../accueil/accueil.html";
}

document.addEventListener("load",function(){
    afficher10DerniersInscrits();
});

function redirect_Sub(){
    window.location.href="../menu/paiement.php";
}
