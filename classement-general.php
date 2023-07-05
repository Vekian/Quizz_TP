<!DOCTYPE html>
<html>
<head>
  <title>Résultats</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      color: #ED7A27;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th {
      background-color: #ED7A27;
      color: white;
      font-weight: bold;
      padding: 10px;
      text-align: left;
    }

    td {
      background-color: white;
      padding: 10px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .no-results {
      text-align: center;
      color: #ED7A27;
      margin-top: 20px;
    }

    #scoreChart {
      margin-top: 20px;
      position: fixed;
        bottom: 0;
    }

</style>
</head>
<body>
  <?php include 'connection.php';?>
  <?php include 'header.php';?>

  <!DOCTYPE html>
<html>
<head>
    <title>Graphique des scores</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
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

        <canvas id="scoreChart"></canvas>

        <script>
            // Créer un nouveau graphique en barres
            let ctx = document.getElementById('scoreChart').getContext('2d');
            let scoreChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo $pseudoData; ?>,
                    datasets: [{
                        label: 'Score total',
                        data: <?php echo $scoreData; ?>,
                        backgroundColor: 'rgba(237, 122, 39, 0.8)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
    <?php include 'footer.php';?>
</body>
</html>