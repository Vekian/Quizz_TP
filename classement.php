<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mt-5">Classement</h1>
                    <p>Voici le classement des meilleurs joueurs</p>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg" style="background-color: #FFC164;">
            <div class="container-fluid">
                <form class="d-flex ml-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mt-5">Classement Catégories Général</h1>
                    <p>Voici le classement catégories des meilleurs joueurs</p>
                </div>
    </section>
<?php

include 'footer.php';
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>