let array = getQuestion(idQuizz);
console.log(array);
function getQuestion(idQuizz){
    let questions = [];
    fetch('question.php', {
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
                for (let key in data) {
                    let value = data[key]; 
                    questions.push(key + value);
                }
                for (let i = questions.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [questions[i], questions[j]] = [questions[j], questions[i]];
                }
                let i = 0;
                displayAnswer(i);
                })
            .catch(function(error) {
                console.log(error);
            });
    return questions
}

let score = 0;
function displayAnswer(i) {
    if (i <= (array.length) - 1) {
    let idQuestion = array[i].charAt(array[i].length - 1);
    fetch('answer.php', {
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
                let question = array[i].slice(0, -1);
                timeLeft = 10;
                document.getElementById("seconds").innerHTML = "10";
                let timeoutId;
                timeoutId = setTimeout(countdown, 1000);
                document.getElementById('answer').innerHTML += "<h1 class='text-center'>" + question + "</h1><br /><div class='d-flex text-align-center'>";
                for (let key in data) {
                    let value = data[key];
                    document.getElementById('answer').innerHTML += "<button class='button button-5' role='button' value='"+ value + "'>" + key + "</button>";
                }
                document.getElementById('answer').innerHTML += "</div>";
                let buttons = document.getElementsByClassName('button');
                setTimeout(function() {
                    document.getElementById('answer').innerHTML = "<div class='text-center text-danger'><h1>Temps écoulé</h1></div>";
                    setTimeout(function() {
                        document.getElementById('answer').innerHTML = "";
                        displayAnswer(i + 1);
                    }, 3000);
                }, 10000);
                for (let button of buttons) {
                    button.addEventListener('click', function(e) {
                    if (e.target.value === "0") {
                        button.setAttribute('style', 'background-color: red;');
                    }
                    else {
                        button.setAttribute('style', 'background-color: green;')
                        score += 10;
                    };
                setTimeout(function (){
                    document.getElementById('answer').innerHTML = "";
                    clearTimeout(timeoutId);
                    displayAnswer(i + 1);
                }, 1000);
                });
            }
                })
            .catch(function(error) {
                console.log(error);
            });}
        else {
            document.getElementById('answer').innerHTML = "Le quizz est terminé ! <br />Votre score est de " + score;
            let objet = {
                'score': score,
                'name' : name,
                'idQuizz' : idQuizz
            }
            fetch('score.php', {
                method: "POST",
                body: JSON.stringify(objet)
                }); 
    }
        }

              