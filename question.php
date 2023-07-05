<?php
    include('connection.php');
    $id = json_decode(file_get_contents('php://input'), true);
    $query = 'SELECT * FROM quizzs JOIN questions ON quizzs.id = questions.id_quizz WHERE quizzs.id = "'.$id.'"';
    $questionStatement = $baseQuizz -> prepare($query);
    $questionStatement -> execute();
    $questions = $questionStatement -> fetchAll((PDO::FETCH_ASSOC));

    $arrayAnswer = [];
    foreach($questions as $question) {
        $arrayAnswer[$question['question']] = $question['id'];
    }
    $jsonAnswer = json_encode($arrayAnswer);
    echo $jsonAnswer;
?>