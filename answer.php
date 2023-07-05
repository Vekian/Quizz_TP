<?php
    include_once('connection.php');
    $id = json_decode(file_get_contents('php://input'), true);
   
    $query = 'SELECT content, correct FROM answers JOIN questions ON answers.id_question = questions.id WHERE id_question = "'.$id.'"';
    $questionStatement = $baseQuizz -> prepare($query);
    $questionStatement -> execute();
    $questions = $questionStatement -> fetchAll((PDO::FETCH_ASSOC));

$arrayAnswer= [];
    foreach($questions as $question) {
        $arrayAnswer[$question['content']] = $question['correct'];
    };

    $jsonAnswer = json_encode($arrayAnswer);
    echo $jsonAnswer;
?>