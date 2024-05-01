document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault();
  const pseudo = document.getElementById('loginPseudo').value;
  const mdp = document.getElementById('loginPassword').value;

  // vérifie si le pseudo et le mdp existe
  if (pseudo === 'admin' && mdp === 'password') {
    // connexion
    alert('Connexion effectuée');
  } else {
    // erreur
    alert('Pseudo ou mot de passe incorrect');
  }
});

document.getElementById('creationForm').addEventListener('submit', function(event) {
  event.preventDefault();
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
});