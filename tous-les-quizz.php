<?php include 'header.php'; ?>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="mt-5 text-center">Liste des quizzs</h1>
          <p>Voici tous les quizzs que nous proposons</p>
          <?php
          include('traitement/connection.php');

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
          echo ('<div class="d-flex justify-content-center row" >');
          foreach ($arrayUnique as $key => $value) {
            foreach($arrayOfId as $keyId => $valueId) {
                if ($key === $keyId) {
                  $id = $valueId;
                }
            }
            echo ('<button class="col-3 m-4" onclick="window.location.href = \'display-quizz.php?id=' . $id . '\';" ><div>Nom : ' . $key . '<br />');
            echo ('<div>Categorie :  ' . $value . '</div>');
            foreach ($arrayCount as $name => $count) {
              if ($name == $key) {
                echo ('<div>Ce quizz contient ' . $count . ' questions</div></div></button><br />');
              }
            }
          }
          echo ('</div>');
          ?>
        </div>
      </div>
    </div>
  </section>

  <aside>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="mt-5 text-center">Catégories</h2>
          <p>Voici toutes les catégories de quizz</p>
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
          </div>
        </div>
      </div>
  </aside>
    <?php include 'footer.php'; ?>