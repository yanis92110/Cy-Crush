function redirect_Sub(){
    window.location.href = "/menu/paiement.php";
}


// fonction pour temporiser l'exécution du code
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

// fonction pour lancer la vidéo de fond de l'accueil et rediriger vers le suite du site
async function lancervideo(){
    const video = document.getElementById('background-video');
    const button = document.getElementById('start_button');
    const title = document.getElementById('title');
    const description = document.getElementById('description');
    const border = document.getElementById('title_border');
    document.opacity = '0';
    sleep(3500);
    video.play();
    document.location.href="http://localhost:8080/connexion/signup.php"; 
}
