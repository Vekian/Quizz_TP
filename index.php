<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="css/images-arriere-plan.css">
    <title>Quizz Tp</title>
</head>

<body style="background-color: #FEC671;">
    <?php
    include_once('connection.php');
    include_once('header.php');
    include('login.php');
    ?>
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
    <div id="footer">
        <?php include_once('footer.php'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>