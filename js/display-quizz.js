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
                    questions.push(value);
                    questions.push(key);
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
    let idQuestion = array[i];
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
                if (i <= (array.length) / 2 +1) {
                document.getElementById('answer').innerHTML += array[i + 1] + "<br />";
                for (let key in data) {
                    let value = data[key];
                    document.getElementById('answer').innerHTML += '<button class="button" value="'+ value + '">' + key + '</button><br />';
                }
                let buttons = document.getElementsByClassName('button');
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
                    if (i <= (array.length)/ 2) {
                    document.getElementById('answer').innerHTML = "";
                    displayAnswer(i + 2);
                }
                }, 1000);
                });
            }}
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
                })
            .catch(function(error) {
                console.log(error);
            });}
    