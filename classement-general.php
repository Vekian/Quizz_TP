<!DOCTYPE html>
<html>
<head>
  <title>Résultats</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      color: #ED7A27;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
    }
    th {
      background-color: #ED7A27;
      color: white;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
  </style>
</head>
<body>
<?php include 'connection.php';?>
<?php include 'header.php';?>

<?php
function calculateTotalScore($scores) {
  $totalScore = array();
  
  foreach ($scores as $score) {
    $pseudo = $score['pseudo'];
    $scoreValue = $score['score'];
    
    if (isset($totalScore[$pseudo])) {
      $totalScore[$pseudo] += $scoreValue;
    } else {
      $totalScore[$pseudo] = $scoreValue;
    }
  }
  
  return $totalScore;
}

$sql = $baseQuizz->query('SELECT * FROM users INNER JOIN rankings ON id_user = rankings.id_user ORDER BY score DESC');
      
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
  echo 'Aucun résultat trouvé.';
}
?>

<?php include 'footer.php';?>
</body>
</html>