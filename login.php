<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.cs">
    <title>Document</title>


    <style>
 form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: transparent; /* Modification : Fond transparent */
  border-radius: 5px;
}

h2 {
  text-align: center;
}

div {
  margin-bottom: 10px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"] {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff; /* Modification : Boutons en bleu */
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.error-message {
  color: #ff0000;
  margin-bottom: 10px;
}

    </style>
</head>
<body>
    
</body>
</html>



<?php
    include_once('connection.php');

    $query = 'SELECT * FROM users';
    $userStatement = $baseQuizz -> prepare($query);
    $userStatement -> execute();
    $users = $userStatement -> fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    if (isset($_POST['pseudo'])) {
        foreach ($users as $user) {
        if ($user['pseudo'] === $_POST['pseudo']) {
            $loggedUser = [
                'pseudo' => $user['pseudo']
            ];

                $_SESSION['LOGGED_USER'] = $loggedUser['pseudo'];
        }
    }
    if (!isset($loggedUser)) {
        $name = htmlspecialchars($_POST['pseudo']);
            $avatar = 'images/pikachu.png';
            $insertStatement = $baseQuizz -> prepare("INSERT INTO users (pseudo, avatar) VALUES (:pseudo, :avatar)");
            $insertStatement -> execute([
                'pseudo' => $name,
                'avatar' => $avatar
            ]);
    }
}
?>

<?php
if (isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = [
        'pseudo' => $_SESSION['LOGGED_USER'],
    ];
}
?>

<?php if (!isset($loggedUser)): ?>
    <form action="index.php" method="POST">
        <h2>Connectez-vous </h2>
    <?php if(isset($errorMessage)) : ?>
        <div>
            <?php echo($errorMessage); ?>
        </div>
    <?php endif; ?>
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
    </div>
    <input type="submit" value="Envoyer">
    </form>
<?php endif; ?>