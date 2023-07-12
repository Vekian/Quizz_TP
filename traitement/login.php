<?php
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
    <form action="../index.php" method="POST">
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