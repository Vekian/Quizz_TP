
let numberOfQuestions = 3;
let idQuestion = 1;


function displayAnswer(id) {
    fetch('answer.php', {
                            method: "POST",
                            body: JSON.stringify(id)
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
                    };
                setTimeout(function (){
                    if (id <= numberOfQuestions) {
                    document.getElementById('answer').innerHTML = "";
                    displayAnswer(id +1);
                }
                }, 1000);
                });
            }
                })
            .catch(function(error) {
                console.log(error);
            });}
            displayAnswer(idQuestion);
    