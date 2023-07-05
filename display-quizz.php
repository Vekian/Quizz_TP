<?php
include_once('connection.php');

if(isset($_GET['id'])){
$id = 1;
$query = 'SELECT * FROM questions JOIN quizzs ON questions.id_quizz = quizzs.id WHERE quizzs.id = "'.$id.'"';
$quizzStatement = $baseQuizz -> prepare($query);
$quizzStatement -> execute();
$quizzs = $quizzStatement -> fetchAll((PDO::FETCH_ASSOC));
}

$question = 0;
foreach($quizzs as $quizz){
    print_r($quizz['question']);
}
?>

    <div id="answer">
    </div>
<script>
    <?php require_once("js/display-quizz.js");?>
</script>



