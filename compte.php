<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/compte.css">
    <title>Mon compte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>


  
<body>

  
<body style="background-color: #FEC671;" >

  
    <?php
    include_once('connection.php');
    include("header.php");
    if (!isset($_SESSION['LOGGED_USER'])){
        include_once('login.php');
    }
    else {
    $query = 'SELECT * FROM users where pseudo = "' . $_SESSION['LOGGED_USER'] . '"';
    $userStatement = $baseQuizz -> prepare($query);
    $userStatement -> execute();
    $user = $userStatement -> fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="d-flex flex-column align-items-center">
    <h1>Mon compte</h1>
    <h2>Votre pseudo : <?php echo($user['pseudo']) ?></h2> 
    <img src="<?php echo($user['avatar']) ?>" width="200px"/>

    <form action="modif-compte.php" method="post" class="d-flex flex-column text-center">
        <label for="avatar">Changez votre avatar : </label>
    <select id="avatar" name="avatar">
        <option value="images/fleur.png">Fleur</option>
        <option value="images/photo.png">Smiley</option>
        <option value="images/pierre.png">Pierre</option>
        <option value="images/pikachu.png">Pikachu</option>
    </select>
    <img src="" width="100px"/> 
    <label for="pseudo">
    <input type="text" name="pseudo" id="pseudo" value="<?php echo($user['pseudo']);?>">
    <input type="submit" value="modifier">
    </form>
    
    <script>
    let image = document.querySelector('img');
    document.querySelector("select").addEventListener("change", function (e) {
        let src = e.target.value;
        image.setAttribute("src", src);
    });
</script>
<br />
<h4> Vous voulez vous déconnecter ? </h4>
<a href="logout.php">Se déconnecter</a>
</div>
<?php } ?>
<div id = "footer">
<?php include("footer.php"); ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>