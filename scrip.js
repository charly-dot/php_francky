
document.getElementById('toggleFacultatif').addEventListener('click', function(event) {
  event.preventDefault(); // Empêche le comportement par défaut du lien
  var facultatifField = document.getElementById('facultatifField');
  // Vérifie si le champ est actuellement affiché
  if (facultatifField.style.display === 'none') {
    facultatifField.style.display = 'block'; // Affiche le champ
  } else {
    facultatifField.style.display = 'none'; // Masque le champ
  }
});

document.getElementById('fournisseur').addEventListener('change', function () {
  var additionalField = document.getElementById('additionalField');

  if (this.value !== ' ') {
    additionalField.style.display = 'block';
  } else {
    additionalField.style.display = 'none';
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const produit = document.getElementById("produit");
  const finit = document.getElementById("finit");
  const dateSection = document.getElementById("date");

  // Vérifie les deux champs quand on sort du champ "produit"
  produit.addEventListener("blur", function () {
      if (produit.value.trim() !== "" || finit.value.trim() !== "") {
          dateSection.style.display = "block"; // Affiche le champ date
      } else {
          dateSection.style.display = "none";  // Cache si un champ est vide
      }
  });

  // On peut aussi ajouter un blur sur "finit" au cas où l’utilisateur le complète en second
  finit.addEventListener("blur", function () {
      if (produit.value.trim() !== "" || finit.value.trim() !== "") {
          dateSection.style.display = "block";
      } else {
          dateSection.style.display = "none";
      }
  });
});




