const h1 = document.querySelector("h1");
// Cible le h1 par son balisage et ajoute un événement de clic
h1.addEventListener('click', function() {
    alert('Le h1 a été cliqué !'); // Tu peux remplacer cette alerte par le code que tu veux exécuter
    h1.innerHTML="Comment vas-tu?";
});

document.addEventListener("DOMContentLoaded", function() {
    // Attend que le document soit complètement chargé
    h1
});