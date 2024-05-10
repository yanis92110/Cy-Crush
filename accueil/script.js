function redirect(){
    window.location.href = "compte.html";
}
function redirectCreation(){
    window.location.href = "creation.html";
    
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function lancervideo(){
    const video = document.getElementById('background-video');
    const button = document.getElementById('start_button');
    const title = document.getElementById('title');
    const description = document.getElementById('description');
    const border = document.getElementById('title_border');
    document.opacity = '0';
    video.play();
    document.location.href="../connexion/signup.php"; 
}

function redirectAccueil(){
    document.location.href="accueil.html"
}
