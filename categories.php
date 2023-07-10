<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color:  #f3c2ec ;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

        <?php include 'connection.php'; ?>
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




