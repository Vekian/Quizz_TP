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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <?php  
    include("header.php");
    ?>
    <div id="answer">
    </div>
<div class="d-flex justify-content-center mb-4" >
<div id="clock">
<span id="seconds">10</span>
</div>
</div>
<script>
    let idQuizz = <?php echo($_GET['id']); ?>;
    let name = "<?php echo($_SESSION['LOGGED_USER']) ?>";
    
    function countdown() {
        score -= 2;
        timeLeft--;
        document.getElementById("seconds").innerHTML = String( timeLeft );
        }
    <?php require_once("js/display-quizz.js");?>
</script>


<div id = "footer">
    <?php include_once('footer.php'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
