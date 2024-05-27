function redirect_upload(){
    window.location.href="upload.php";
}

function redirect_profil(){
    window.location.href = "../menu/user_profil.php";
}

function redirect_pfp(){
    window.location.href = "pfp.php";
}

function redirect_modif_infos(){
    window.location.href = "modif_info_form.php";
}
function redirect_sub(){
    window.location.href="../menu/menu_user_sub.php";
}
function redirect_non_sub(){
    window.location.href="../menu/menu_user_nonsub.php";
}
function redirect_admin(){
    windpw.location.href="../menu/menu_admin.php";
}
function redirect_search(){
    window.location.href="../menu/recherche_form.php";
}
function redirect_store(){
    window.location.href="../accueil/abonnements.php";
}
function redirect_paiement(){
    //renvoie vers le paiement
    window.location.href="../menu/paiement.php";
}

function redirect_admin(){
    document.location.href = "admin.php";
}

document.getElementById('logoutBtn').addEventListener('click', function() {
    fetch("destroy_session.php", {
        method: "POST"
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            console.log(data.message); // "Session détruite avec succès."
            window.location.href ="../accueil/accueil.html";
        } else {
            console.error("Erreur lors de la destruction de la session.");
        }
    })
    .catch(error => console.error("Erreur:", error));
});
