<?php  
    include('traitement/connection.php');
    include("header.php");
?>
    <div id="question">
    </div>
    <div id="answer">
    </div>
<div class="d-flex justify-content-center mb-4" >
<div id="clock">
<span id="seconds">20</span>
</div>
</div>
<script>
    let idQuizz = <?php echo($_GET['id']); ?>;
    let name = "<?php echo($_SESSION['LOGGED_USER']) ?>";
    
    function countdown() {
        scoreTimer -= 2;
        timeLeft--;
        document.getElementById("seconds").innerHTML = String( timeLeft );
        }
    <?php require_once("js/display-quizz.js");?>
</script>
    <?php include_once('footer.php'); ?>