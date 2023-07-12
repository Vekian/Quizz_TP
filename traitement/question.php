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

    function shuffle_assoc($list) {
        if (!is_array($list)) return $list;
       
        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key)
          $random[$key] = $list[$key];
        return $random;
      }
    
    $randomArray = shuffle_assoc($arrayAnswer);
    $jsonAnswer = json_encode($randomArray);
    echo $jsonAnswer;
?>