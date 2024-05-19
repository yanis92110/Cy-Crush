function recherche(){
    var sexe=document.getElementsByClassName('sexe');
    var classement=document.getElementById('classement');
    var mano=document.getElementsByClassName('mano');
    var lrevers=document.getElementsByClassName('lrevers');
    var autre=document.getElementById('autre');
    
    var liste=[];
    liste.push(sexe, classement, mano, lrevers, autre);

    alert(liste);
}
recherche();
