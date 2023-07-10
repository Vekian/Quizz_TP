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
                timeLeft = 10;
                score += 20;
                document.getElementById("seconds").innerHTML = "10";
                let timer = setInterval(countdown, 1000);
                let question = array[i].slice(0, -1);
                document.getElementById('answer').innerHTML += "<h1 class='text-center m-4'>" + question + "</h1><br />";
                for (let i = data.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [data[i], data[j]] = [data[j], data[i]];
                }
                console.log(data);
                for (let key in data) {
                    let value = data[key];
                    document.getElementById('answer').innerHTML += "<button class='button button-5 col-3 offset-2 mt-3 mb-4' role='button' value='"+ value + "'>" + key + "</button>";
                }
                let buttons = document.getElementsByClassName('button');
                let timeOver = setTimeout(function() {
                    document.getElementById('answer').innerHTML = "<div class='text-center text-danger'><h1>Temps écoulé</h1></div>";
                    clearInterval(timer);
                    document.getElementById("seconds").innerHTML = "0";
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
                    clearTimeout(timeOver);
                    clearInterval(timer);
                setTimeout(function (){
                    document.getElementById('answer').innerHTML = "";
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
            document.getElementById('answer').innerHTML = "<div style='color: white;'>Le quizz est terminé ! <br />Votre score est de </div>" + score;
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

