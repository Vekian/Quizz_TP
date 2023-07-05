<?php
    include('connection.php');
    $id= 1;
    $query = 'SELECT * FROM questions JOIN quizzs ON questions.id_quizz = quizzs.id WHERE quizzs.id = "'.$id.'"';
    $questionStatement = $baseQuizz -> prepare($query);
    $questionStatement -> execute();
    $questions = $questionStatement -> fetchAll((PDO::FETCH_ASSOC));

    print_r($questions);
?>