<?php
include('connection.php');
$query = 'SELECT * FROM quizzs';
    $quizzStatement = $baseQuizz -> prepare($query);
    $quizzStatement -> execute();
    $quizzs = $quizzStatement -> fetchAll(PDO::FETCH_ASSOC);

$category = [];
foreach($quizzs as $quizz) {
    if (!in_array($quizz['category'], $category)) {
    array_push($category, $quizz['category']);
    }
}

?>
<div id="answer">
</div>
<form method="POST" action="admin-confirm.php">
<label for="numberOfQuestions">Nombre de questions</label>
<input type="number" name="numberOfQuestions" id="numberOfQuestions">
<label for="quizz">Nom du quizz</label>
<input type="text" name="quizz" id="quizz">
<label for="category">Nom de la categorie</label>
<input type="text" name="category" id="category">
<div id="question">
</div>
<input type="submit" value="envoyer">
</form>
<script>
    let number= "";
    let elm = document.getElementById('numberOfQuestions');
   elm.addEventListener('change', function (e) {
    document.getElementById('question')
                .innerHTML = "";
        number = e.target.value;
    for(let i = 1; i <= number ; i++) {
        document.getElementById('question')
                .innerHTML += '<label for="question' + i + '">Question' + i + '</label><input type="text" name="question' + i + '" id="question' + i + '">';     
    for(let j = 1; j <= 4; j++){
        if (j < 4) {
        document.getElementById('question')
                .innerHTML += '<label for="answer' + i + "£" + j + '">Answer' + i + "£" + j + '</label><input type="text" name="answer' + i + '[]" id="answer' + i + "£" + j + '">';
        }
        else {
        document.getElementById('question')
                .innerHTML += '<label for="answer' + i + "£" + j + '">correctanswer' + i + "£" + j + '</label><input type="text" name="answer' + i + '[]" id="answer' + i + "£" + j + '">';
    }}
    document.getElementById('question')
                .innerHTML += '<br />';
            }
    
    });
</script>




