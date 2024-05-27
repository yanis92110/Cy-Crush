function verif_registration(){
  const pseudo = document.getElementById('signPseudo').value;
  const email = document.getElementById('signEmail').value;
  const mdp = document.getElementById('signMdp').value;
  const confirmemdp = document.getElementById('signConfirmeMdp').value;

  // tout les champs sont remplis
  if (pseudo && email && mdp && confirmemdp) {
    // les mdp sont les memes
    if (mdp === confirmemdp) {
      // inscription
      alert('Création de compte effectuée');
      // reset le formulaire
      document.getElementById('creationForm').reset();
    } else {
      // les mdp sont pas les memes
      alert('Les mots de passes sont différents');
    }
  } else {
    // champs pas tous remplis
    alert('Veuillez remplir tout les champs');
  }
}

function to_login(){
    window.location.href = "login_form.php"
}
