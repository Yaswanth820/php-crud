<?php
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud","root","");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare('SELECT * FROM products');
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles2.css">
    <title>Form</title>
</head>
<body>
    <form action="" method="post">
        Title:
        <input type="text" name="title"> <br>
        Description:
        <input type="text" name="description"> <br>
        Price:
        <input type="number" name="price"> <br>
        <input type="submit" name="submit" class="btn">
    </form>
</body>
</html>