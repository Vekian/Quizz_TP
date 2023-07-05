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
  </style>
</head>
<body>
  <?php include 'connection.php';?>
  <?php include 'header.php';?>

  <div class="container">
    <h1>Classement des scores</h1>

    <?php
    function calculateTotalScore($scores) {
      $totalScore = array();

      foreach ($scores as $score) {
        $pseudo = $score['pseudo'];
        $scoreValue = $score['score'];

        if (!isset($totalScore[$pseudo])) {
          $totalScore[$pseudo] = 0;
        }

        $totalScore[$pseudo] += $scoreValue;
      }

      return $totalScore;
    }

    $sql = $baseQuizz->query('SELECT * FROM users INNER JOIN rankings ON users.id = rankings.id_user ORDER BY score DESC');

    if ($sql->rowCount() > 0) {
      $scores = $sql->fetchAll(PDO::FETCH_ASSOC);
      $totalScores = calculateTotalScore($scores);

      echo '<table>
              <tr>
                <th>Pseudo</th>
                <th>Score total</th>
              </tr>';

      foreach ($totalScores as $pseudo => $totalScore) {
        echo '<tr>';
        echo '<td>' . $pseudo . '</td>';
        echo '<td>' . $totalScore . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    } else {
      echo '<p class="no-results">Aucun résultat trouvé.</p>';
    }
    ?>
  </div>

  <?php include 'footer.php';?>
</body>
</html>
