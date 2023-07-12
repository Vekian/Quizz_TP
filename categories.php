<?php include 'traitement/connection.php'; ?>
<?php include 'header.php'; ?>
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
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?php echo $category['category']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>