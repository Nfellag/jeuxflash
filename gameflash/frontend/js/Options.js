// Options.js
document.addEventListener("DOMContentLoaded", function() {
    optionGame();
});

function optionGame () {
    const optionGame = document.getElementById('menu');
    const options = document.getElementById('menuOption');
    
    optionGame.addEventListener('click', () => {
        options.classList.toggle("active");
    });
}