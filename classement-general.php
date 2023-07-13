<!DOCTYPE html>
<html>

<head>
    <title>Résultats</title>
    <link rel="stylesheet" href="css/classement.css">
</head>

<body>
    <?php include 'connection.php'; ?>
    <?php include 'header.php'; ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Graphique des scores</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body style="background-color: #FEC671;">
        <div class="container">
            <h1>Classement des scores</h1>
            <?php

            // Récupérer les utilisateurs et les scores depuis la base de données
            $query = "SELECT users.pseudo, rankings.score FROM users INNER JOIN rankings ON users.id = rankings.id_user ORDER BY rankings.score DESC";
            $statement = $baseQuizz->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($statement->rowCount() > 0) {
                $scores = array();

                foreach ($result as $row) {
                    $pseudo = $row['pseudo'];
                    $score = $row['score'];

                    if (!isset($scores[$pseudo])) {
                        $scores[$pseudo] = 0;
                    }

                    $scores[$pseudo] += $score;
                }

                echo '<table>
                    <tr>
                        <th>Pseudo</th>
                        <th>Score total</th>
                    </tr>';

                foreach ($scores as $pseudo => $totalScore) {
                    echo '<tr>';
                    echo '<td>' . $pseudo . '</td>';
                    echo '<td>' . $totalScore . '</td>';
                    echo '</tr>';
                }

                echo '</table>';

                // Récupérer les données des scores à partir de PHP
                $pseudoData = json_encode(array_keys($scores));
                $scoreData = json_encode(array_values($scores));
            } else {
                echo '<p class="no-results">Aucun résultat trouvé.</p>';
            }
            ?>

            <canvas id="chartCanvas"></canvas>


            <script>
                // Créer un nouveau graphique en barres
                let ctx = document.getElementById('chartCanvas').getContext('2d');
                let scoreChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo $pseudoData; ?>,
                        datasets: [{
                            label: 'Score total',
                            data: <?php echo $scoreData; ?>,
                            backgroundColor: '  #9378e5 '
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: 1
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
        <div id="footer">
            <?php include 'footer.php'; ?>
        </div>

    </body>

    </html>