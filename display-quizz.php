<?php
session_start();
include_once('connection.php');

?>

    <div id="answer">
    </div>
<script>
    let idQuizz = <?php echo($_GET['id']); ?>;
    let name = "<?php echo($_SESSION['LOGGED_USER']) ?>";
    <?php require_once("js/display-quizz.js");?>
</script>



