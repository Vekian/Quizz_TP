<?php
    include_once('header.php');
    include_once('traitement/connection.php');
    include('traitement/login.php');
?>

<div class="bubble-animation">
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    
    <script>
        <?php require_once("js/bubble.js");?>
    </script>
</div>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 text-center">
                <h1 class="display-4">Bienvenue au Quiz</h1>
                <p class="lead">Testez vos connaissances avec notre quiz interactif !</p>
                <button id="startQuizButton" class="btn btn-primary btn-lg">Commencer le Quiz</button>
            </div>
        </div>
    </div>
    <div class="animation-container">
        <div class="animation"></div>
    </div>
    <script>
        document.getElementById("startQuizButton").addEventListener("click", function () {
            // Redirigez l'utilisateur vers la page du quiz lorsque le bouton est cliqué
            window.location.href = "tous-les-quizz.php";
        });
    </script>
<?php include_once('footer.php'); ?>