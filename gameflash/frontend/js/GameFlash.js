let correctAnswer; // Variable pour stocker la réponse correcte
let score = 0; // Variable pour stocker le score
let time = 20;
let timerInterval;

//Fonction pour démarrer le minuteur
// function startTimer(){
//     timerInterval = setInterval(updateTimer,1000)
// }

// Fonction pour récupérer une devinette
async function getRiddle() {
    const url = 'https://riddles1.p.rapidapi.com/riddle/';
    const options = {
      method: 'GET',
      headers: {
        // 'X-RapidAPI-Key': '25a8461657msh3bbed42dcafaca3p1f72b5jsnde30eca3c631',
        'X-RapidAPI-Host': 'riddles1.p.rapidapi.com',
      },
    };
  
    try {
        const response = await fetch(url + "?lang=fr", options);
        const result = await response.json(); // Supposons que l'API renvoie un objet JSON
        console.log(result);

        // Afficher la question dans la page HTML
        displayQuestion(result.question);

        // Stocker la réponse correcte pour la vérification ultérieure
        correctAnswer = result.answer;
  
    } catch (error) {
        console.error(error);
    }

    startTimer();
}
  
// Fonction pour afficher la question
function displayQuestion(question) {
    document.getElementById('question').textContent = question;
}

// Fonction pour soumettre la réponse
async function submitAnswer() {
    const userAnswer = document.getElementById('answer').value.trim();//¨Trim pour ignorer les espaces;
    
    // Afficher un message en fonction de la réponse
    if (userAnswer.toLowerCase() === correctAnswer.toLowerCase()) {
        console.log('Réponse correcte !');
        alert('Réponse correcte !');
        score += 3;
    } else {
        console.log('Réponse incorrecte.');
        alert('Réponse incorrecte. Veuillez réessayer.');
        
        // Réinitialisez le score après l'enregistrement
        score = Math.max(0);
    }

    //ajouter le score sans réinitialiser le score
    updatetotalScore();

    //Afficher une nouvelle devinette
    getRiddle();
    
    //Mettre à jour le score après avoir soumis une réponse!
    updateScore();
    
    //Pour vider l'input
    document.getElementById("answer").value="";
};

// Fonction pour mettre à jour le score dans la page HTML
function updateScore() {
    document.getElementById('score').textContent = score;
}

// Fonction pour mettre à jour le score total après une mauvaise reponse!
function updatetotalScore() {
    const currentScore = parseInt(document.getElementById('totalscore').textContent);
    document.getElementById('totalscore').textContent = currentScore + score;
}

// Fonction pour mettre à jour le minuteur
function updateTimer() {

    document.getElementById('timer').textContent = time;

    if (time === 0) {
        // Si le temps est écoulé, arrêter le minuteur et effectuer des actions de fin de jeu
        clearInterval(timerInterval);
        alert("Temps écoulé")
        endGame();
    } else {
        // Décrémenter le temps restant
        time--;
    }
}

// Fonction pour gérer les actions à la fin du jeu
function endGame() {
    
    clearInterval(timerInterval);

    // Réinitialiser le score pour le prochain jeu
    score = 0;

    // Mettre à jour le score sur la page
    updateScore();

    // Obtenir une nouvelle devinette pour le prochain jeu après un délai (par exemple, 2 secondes)
    getRiddle();
}

getRiddle();