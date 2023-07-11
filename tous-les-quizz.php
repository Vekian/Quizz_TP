<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/quizz.css">
  <title>Document</title>

</head>

<body>
  <?php include 'header.php'; ?>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="mt-5">Liste des quizzs</h1>
          <p>Voici tous les quizzs que nous proposons</p>
          <?php
          include('connection.php');

          $query = 'SELECT * FROM quizzs JOIN questions ON quizzs.id = questions.id_quizz';
          $quizzStatement = $baseQuizz->prepare($query);
          $quizzStatement->execute();
          $quizzs = $quizzStatement->fetchAll(PDO::FETCH_ASSOC);

          $arrayUnique = uniqueValue($quizzs);
          $arrayCount = countValue($quizzs);
          $arrayOfId = getId($quizzs);
          function uniqueValue($quizzs)
          {
            $array = [];
            foreach ($quizzs as $quizz) {
              $array[$quizz['name']] = $quizz['category'];
            }
            return $array;
          }
          ;
          function getId($quizzs)
          {
            $array = [];
            foreach ($quizzs as $quizz) {
              $array[$quizz['name']] = $quizz['id_quizz'];
            }
            return $array;
          }

          function countValue($arrays)
          {
            $array1 = [];
            foreach ($arrays as $array) {
              foreach ($array as $key => $value) {
                if ($key == 'name') {
                  if (array_key_exists($value, $array1)) {
                    $array1[$value] += 1;
                  } else {
                    $array1[$value] = 1;
                  }
                }
              }
            }
            return $array1;
          }
          $id = "";
          foreach ($arrayUnique as $key => $value) {
            foreach($arrayOfId as $keyId => $valueId) {
                if ($key === $keyId) {
                  $id = $valueId;
                }
            }
            echo ('<button onclick="window.location.href = \'display-quizz.php?id=' . $id . '\';" ><div>Nom : ' . $key . '<br />');
            echo ('<div>Categorie :  ' . $value . '</div>');
            foreach ($arrayCount as $name => $count) {
              if ($name == $key) {
                echo ('<div>Ce quizz contient ' . $count . ' questions</div></div></button><br />');
              }
            }
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
          <!DOCTYPE html>

          <style>
            body {
              font-family: Arial, sans-serif;
              background-color: #f2f2f2;
              margin: 0;
              padding: 0;
            }

            .container {
              max-width: 600px;
              margin: 0 auto;
              padding: 20px;
            }

            table {
              width: 100%;
              border-collapse: collapse;
            }

            th,
            td {
              padding: 10px;
              text-align: left;
              color: white;
            }

            th {
              background-color:  #8068f7 ;
              color: white;
            }

          
          </style>
          </head>

          <body>

            <?php include 'connection.php'; ?>



            <div class="container">

              <?php
              $query = 'SELECT category FROM quizzs';
              $categoryStatement = $baseQuizz->prepare($query);
              $categoryStatement->execute();
              $categories = $categoryStatement->fetchAll(PDO::FETCH_ASSOC);
              ?>

              <table>
                <thead>
                  <tr>
                    <th>Category</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($categories as $category): ?>
                    <tr>
                      <td>
                        <?php echo $category['category']; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            < </div>
        </div>
      </div>
  </aside>

  <div id=footer>
    <?php include 'footer.php'; ?>
  </div>

</body>

</html>