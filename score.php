<?php
include('connection.php');
$data = json_decode(file_get_contents('php://input'), true);

$score = $data["score"];
$name = $data["name"];
$idQuizz = $data["idQuizz"];


$userStatement = $baseQuizz -> prepare('SELECT * FROM users');
$userStatement -> execute();
$users = $userStatement -> fetchAll(PDO::FETCH_ASSOC);

foreach($users as $user) {
    if (in_array($name, $user)) {
         $iduser = $user['id'];
    }
}

$insertScore = $baseQuizz -> prepare ('INSERT INTO rankings(score, id_user, id_quizz) VALUES (:score, :id_user, :id_quizz)');
        $insertScore -> execute([
            'score' => $score,
            'id_user' => $iduser,
            'id_quizz' => $idQuizz
        ]);
?>