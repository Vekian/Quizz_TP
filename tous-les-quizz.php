<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="css/style.css" rel="stylesheet">
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
          <h1 class="mt-5">Liste des quizzs</h1>
          <p>Voici tous les quizzs que nous proposons</p>
          <?php
            include('connection.php');

            $query = 'SELECT * FROM quizzs JOIN questions ON quizzs.id = questions.id_quizz';
            $quizzStatement = $baseQuizz -> prepare($query);
            $quizzStatement -> execute();
            $quizzs = $quizzStatement -> fetchAll(PDO::FETCH_ASSOC);
            

            $arrayUnique = uniqueValue($quizzs);
            $arrayCount = countValue($quizzs);
            function uniqueValue($quizzs){
              $array = [];
              foreach ($quizzs as $quizz) {
              $array[$quizz['name']] = $quizz['category'];
              }
              return $array;
            };

            function countValue($arrays) {
              $array1 = [];
              foreach($arrays as $array) {
                foreach($array as $key => $value) {
                  if ($key == 'name') {
                if(array_key_exists($value, $array1)) {
                  $array1[$value] += 1;
                }
                else {
                  $array1[$value] =1;
                }}}}
                return $array1;
            }
            
            $id = 1;
            foreach($arrayUnique as $key => $value) {
              echo('<button onclick="window.location.href = \'display-quizz.php?id='. $id . '\';" ><div>Nom : ' . $key . '<br />');
              echo('<div>Categorie :  ' . $value . '</div>');
              foreach($arrayCount as $name => $count){
                if ($name == $key){
                  echo('<div>Ce quizz contient ' . $count . ' questions</div></div></button><br />');
              }}
              $id++;
            }
            
          ?>
        </div>
      </div>
    </div>
  </section>
  
  <aside>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="mt-5">Catégories</h2>
          <p>Voici toutes les catégories de quizz</p>
        </div>
      </div>
    </div>
  </aside>
  
  <?php
include 'footer.php';
?>
</body>
</html>