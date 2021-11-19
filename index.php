<?php
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud","root","");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare('SELECT * FROM products');
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    var_dump($products);
    echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Test</title>
</head>
<body>
    <div class="container">
        <div class="head">
            <h2>Item Table</h2>
        </div>
        <div class="item-table">
            <table>
                <thead>
                    <tr>
                        <th>SNo</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?php echo $product['id'] ?></td>
                        <td><?php echo $product['title'] ?></td>
                        <td><?php echo $product['description'] ?></td>
                        <td><?php echo $product['price'] ?></td>
                        <td><button class="btn edit">Edit</button>
                            <button class="btn delete">Delete</button>
                        </td>
                    </tr>   
                <?php } ?>
            </table>
        </div>
        <div class="create-btn">
            <p class="btn create">
               <a href="create_new_item.php">Create</a>
            </p>
        </div>
    </div>
</body>
</html>