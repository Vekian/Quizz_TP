<?php
session_start();
include_once('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/timer.css">
</head>
<body>
    <?php  
    include("header.php");
    ?>
    <div id="answer">
    </div>
<script>
    let idQuizz = <?php echo($_GET['id']); ?>;
    let name = "<?php echo($_SESSION['LOGGED_USER']) ?>";
    
    function countdown() {
	timeLeft--;
	document.getElementById("seconds").innerHTML = String( timeLeft );
	if (timeLeft > 0) {
		setTimeout(countdown, 1000);
	}
};
    <?php require_once("js/display-quizz.js");?>
</script>
<div id="clock">
	<span id="seconds">10</span>
</div>

<?php
    include('footer.php');
?>
</body>
</html>
