let correctAnswer; // Variable pour stocker la réponse correcte
let score = 0; // Variable pour stocker le score
// Fonction pour récupérer une devinette
async function getRiddle() {
    const url = 'https://riddles1.p.rapidapi.com/riddle/';
    const options = {
      method: 'GET',
      headers: {
    
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
}
  
// Fonction pour afficher la question
function displayQuestion(question) {
    document.getElementById('question').textContent = question;
}

// Fonction pour soumettre la réponse
async function submitAnswer() {
    const userAnswer = document.getElementById('answer').value.trim();//¨Trim pour ignorer les espaces;
    const totalscore = document.getElementById('totalscore')
    
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

getRiddle();
 
  