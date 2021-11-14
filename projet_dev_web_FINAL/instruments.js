somme = 0;
function init_img() {
  var images = [
    'images/instruments/basse.jpg',
    'images/instruments/clavier1.jpg',
    'images/instruments/clavier2.jpg',
    'images/instruments/guitare_acou.jpg',
    'images/instruments/guitare_elec1.jpg',
    'images/instruments/guitare_elec2.jpg',
    'images/instruments/percussion.jpg'
  ]
  for (i = 0; i < images.length; i++) {
    var img = new Image();
    img.src = images[i];
    //nom du fichier
    var nomsource = img.src.replace(/^.*[\\\/]/, '');
    nomsource = nomsource.replace('.jpg', '');
    img.className = "instrument_dispo";
    img.id = "dispo_" + nomsource;
    document.getElementById('source').appendChild(img);
  }
}



function ajouterOnClick() {
  var images = document.getElementsByClassName('instrument_dispo');
  for (i = 0; i < images.length; i++) {
    images[i].setAttribute('onclick', 'deplacer(this.id)');
  }
}

function deplacer(elementDsn) {
  // On rep�re l'image depuis laquelle la fonction clic s'est deplace
  var elementImg = document.getElementById(elementDsn);
  var noeudTexte;
  // On r�cup�re les deux parties � traiter
  var elementSrc = document.getElementById("source");
  var elementDest = document.getElementById("destination");
  //nom du fichier
  var nomsource = elementImg.src.replace(/^.*[\\\/]/, '');
  nomsource = nomsource.replace('.jpg', '');
  //selon la position de l'image dans la page : 
  if (elementImg.className == "instrument_dispo") { // si elle est dans source alors : 
    try {
      var img = new Image();
      img.src = elementImg.src;
      img.className = "instrument_emprunte";
      var disque_achete = document.getElementsByClassName('instrument_emprute');
      var iddisque = 'emprunt_' + nomsource;
      img.id = iddisque;
      img.setAttribute('onclick', 'deplacer(this.id)');
      elementDest.appendChild(img);
      elementImg.remove();

      //manip avec bdd 
      
    }
    catch (excep) {
      alert('Erreur !');
      //afficher un message d'erreur
    }
  }
  else {
    var img = new Image();
    img.src = elementImg.src;
    img.className = "instrument_dispo";
    var disque = document.getElementsByClassName('instrument_dispo');
    var iddisque = 'dispo_' + nomsource;
    img.id = iddisque;
    img.setAttribute('onclick', 'deplacer(this.id)');
    elementSrc.appendChild(img);
    elementImg.remove();
 }
}