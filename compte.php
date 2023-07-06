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
    <h1>Mon compte</h1>
    <h2>Votre pseudo : <?php echo($user['pseudo']) ?></h2> 
    <img src="<?php echo($user['avatar']) ?>" width="200px"/>

    <form action="modif-compte.php" method="post">
        <label for="pseudo">
        <input type="text" name="pseudo" id="pseudo" value="<?php echo($user['pseudo']);?>">
        <br />
        <label for="avatar">
    <select id="avatar" name="avatar">
        <option value="images/fleur.png">Fleur</option>
        <option value="images/photo.png">Smiley</option>
        <option value="images/pierre.png">Pierre</option>
        <option value="images/pikachu.png">Pikachu</option>
    </select>
    <br />
    <img src="" alt="Choisissez votre image préférée" width="100px"/> 
    <br />
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
<?php } 

?>

<?php
include("footer.php");
?>
</body>
</html>