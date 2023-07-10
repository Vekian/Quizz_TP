<?php
include('connection.php');


$quizz = $_POST['quizz'];
$category = $_POST['category'];

$insertStatement = $baseQuizz -> prepare("INSERT INTO quizzs (name, category) VALUES (:name, :category)");
            $insertStatement -> execute([
                'name' => $quizz,
                'category' => $category
            ]);
$query = 'SELECT * FROM quizzs';
$quizzStatement = $baseQuizz -> prepare($query);
$quizzStatement -> execute();
$quizzs = $quizzStatement -> fetchAll(PDO::FETCH_ASSOC);

$idQuizz = $quizzs[count($quizzs) - 1]['id'];

$arrayQuestions = [];
$arrayResponses = [];
for ($i = 1; $i <= $_POST['numberOfQuestions']; $i++) {
    $question = $_POST['question' . $i];
    $insertStatement = $baseQuizz -> prepare("INSERT INTO questions (question, id_quizz) VALUES (:question, :id_quizz)");
    $insertStatement -> execute([
        'question' => $quizz,
        'id_quizz' => $idQuizz
    ]);

    $query = 'SELECT * FROM questions';
    $questionsStatement = $baseQuizz -> prepare($query);
    $questionsStatement -> execute();
    $questions = $questionsStatement -> fetchAll(PDO::FETCH_ASSOC);
    $idQuestion = $questions[count($questions) - 1]['id'];

    for ($j = 0; $j < count($_POST['answer' . $i]); $j++) {
        $answer = $_POST['answer' . $i][$j];
        if($j < count($_POST['answer' . $i]) - 1) {
        $insertStatement = $baseQuizz -> prepare("INSERT INTO answers (content, correct, id_question) VALUES (:content, :correct, :id_question)");
        $insertStatement -> execute([
        'content' => $answer,
        'correct' => 0,
        'id_question' => $idQuestion
    ]);
    }
        else {
        $insertStatement = $baseQuizz -> prepare("INSERT INTO answers (content, correct, id_question) VALUES (:content, :correct, :id_question)");
        $insertStatement -> execute([
        'content' => $answer,
        'correct' => 1,
        'id_question' => $idQuestion
    ]);
        }
    }
}
?>