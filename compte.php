<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
</head>
<body>
    <?php
    include_once('connection.php');
    if (!isset($_SESSION['LOGGED_USER'])){
        include_once('login.php');
    }
    else {
    $query = 'SELECT * FROM users where pseudo = "' . $_SESSION['LOGGED_USER'] . '"';
    $userStatement = $baseQuizz -> prepare($query);
    $userStatement -> execute();
    $user = $userStatement -> fetch(PDO::FETCH_ASSOC);
    ?>
    <h1>Mon compte</h1>
    <h2>Votre pseudo : <?php echo($user['pseudo']) ?></h2> 
    <img src="<?php echo($user['avatar']) ?>" width="200px"/>

    <form action="compte.php" method="post">
        <label for="pseudo">
        <input type="text" name="pseudo" id="pseudo" value="<?php echo($user['pseudo']);?>">
        <input type="submit" value="modifier">
    </form>
    
    <form action="compte.php" method="post">
        <label for="avatar">
    <select id="photo" name="photo">
        <option value="images/fleur.png">Fleur</option>
        <option value="images/photo.png">Smiley</option>
        <option value="images/pierre.png">Pierre</option>
        <option value="images/pikachu.png">Pikachu</option>
    </select>
    <br />
    <img src="" alt="Choisissez votre image préférée" width="100px"/>
    </form>
    <input type="submit" value="modifier">
    <script>
    let image = document.querySelector('img');
    document.querySelector("select").addEventListener("change", function (e) {
        let src = e.target.value;
        image.setAttribute("src", src);
    });
</script>
<br />
<a href="logout.php">Se déconnecter</a>
<?php } ?>
</body>
</html>