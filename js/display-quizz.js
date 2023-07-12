function getQuestion(idQuizz){
    let questions = [];
    fetch('traitement/question.php', {
                            method: "POST",
                            body: JSON.stringify(idQuizz)
                            }
    )
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Erreur lors de la requête AJAX');
                }
            })
            .then(function(data) {
                questions = data;
                let i = 0;
                displayAnswer(i, questions);
                })
            .catch(function(error) {
                console.log(error);
            });
}
let scoreTimer = 40;
let score = 0;
let arrayOfQuestion = [];
let arrayOfIdQuestion = [];
function displayAnswer(i, array) {
    scoreTimer = 40;
    for (let key in array) {
        let value = array[key];
        arrayOfQuestion.push(key);
        arrayOfIdQuestion.push(value);
    }
    
    if (i <= (arrayOfQuestion.length) - 1) {
    let idQuestion = arrayOfIdQuestion[i];
    fetch('traitement/answer.php', {
                            method: "POST",
                            body: JSON.stringify(idQuestion)
                            }
    )
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Erreur lors de la requête AJAX');
                }
            })
            .then(function(data) {
                timeLeft = 20;
                document.getElementById("seconds").innerHTML = "20";
                let timer = setInterval(countdown, 1000);
                let question = arrayOfQuestion[i];
                document.getElementById('question').innerHTML = "<h1 class='text-center m-4'>" + question + "</h1><br />";
                for (let key in data) {
                    let value = data[key];
                    document.getElementById('answer').innerHTML += "<button class='button button-5 col-3 offset-2 mt-3 mb-4' role='button' value='"+ value + "'>" + key + "</button>";
                }
                document.getElementById('answer').innerHTML += "<h3 class='text-center'>Votre score est " + score + "</h3><br />";
                let buttons = document.getElementsByClassName('button');
                let timeOver = setTimeout(function() {
                    document.getElementById('answer').innerHTML = "<div class='text-center text-danger'><h1>Temps écoulé</h1></div>";
                    clearInterval(timer);
                    document.getElementById("seconds").innerHTML = "0";
                    setTimeout(function() {
                        document.getElementById('answer').innerHTML = "";
                        document.getElementById('question').innerHTML = "";
                        displayAnswer(i + 1);
                    }, 3000);
                }, 20000);
                let buttonCorrect = "";

                for (let button of buttons) {
                    if (button.value == 1) {
                        buttonCorrect = button;
                    }
                    button.addEventListener('click', function(e) {
                    if (e.target.value === "0") {
                        buttonCorrect.setAttribute('style', 'background-color: green;');
                        button.setAttribute('style', 'background-color: red;');
                        scoreTimer = 0;
                        
                    }
                    else {
                        button.setAttribute('style', 'background-color: green;')
                        score += scoreTimer + 10;
                        scoreTimer = 0;
                    };
                    clearTimeout(timeOver);
                    clearInterval(timer);
                setTimeout(function (){
                    document.getElementById('answer').innerHTML = "";
                    document.getElementById('question').innerHTML = "";
                    displayAnswer(i + 1);
                }, 1000);
                });
            }
                })
            .catch(function(error) {
                console.log(error);
            });}
        else {
            document.getElementById("seconds").innerHTML = "";
            document.getElementById('clock').innerHTML = "";
            document.getElementById('answer').innerHTML = "<div style='color: white;' class='text-center'>Le quizz est terminé ! <br />Votre score est de" + score + "</div>" ;
            let objet = {
                'score': score,
                'name' : name,
                'idQuizz' : idQuizz
            }
            fetch('traitement/score.php', {
                method: "POST",
                body: JSON.stringify(objet)
                }); 
    }
        }

getQuestion(idQuizz);