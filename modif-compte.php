<?php 
session_start();
include('connection.php');
if (isset($_POST['pseudo'])) {
$newPseudo = $_POST['pseudo'];
$avatar = $_POST['avatar'];
}
$oldPseudo = $_SESSION['LOGGED_USER'];
$query = 'SELECT * FROM users WHERE pseudo = "' . $oldPseudo . '"';
        $userStatement = $baseQuizz -> prepare($query);
        $userStatement -> execute();
        $user = $userStatement -> fetch(PDO::FETCH_ASSOC);
        if (isset($user['id'])) {
$id = $user['id'];
$inserUser = $baseQuizz -> prepare ("UPDATE users SET pseudo= :pseudo, avatar= :avatar WHERE id = :id");
$inserUser -> execute([
        'id' => $id,
        'pseudo' => $newPseudo,
        'avatar' => $avatar
        ]);
$_SESSION['LOGGED_USER'] = $newPseudo;};
header('Location:compte.php');