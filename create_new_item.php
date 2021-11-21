<?php
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud","root","");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo $_SERVER['REQUEST_METHOD'].'<br>';
    // exit;
    $title = '';
    $description = '';
    $price = '';
    $errors = [];
    // echo $_SERVER['REQUEST_METHOD'].'<br>';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        if(!$title){
            $errors[] = 'Product title missing';
        }
        if(!$price){
            $errors[] = 'Product price missing';
        }
        if(empty($errors)){
            // $pdo->exec("INSERT INTO products (title, description, price) VALUES ( '$title', '$description', $price )");
            $statement = $pdo->prepare("INSERT INTO products (title, description, price) 
            VALUES ( :title, :description, :price )");
            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->execute();
            header('Location: index.php');
        }
    }
    // echo '<pre>';
    // echo var_dump($_POST);
    // echo '</pre>';
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
    <div class="alert-box">
        <?php foreach ($errors as $error){
            echo $error.'<br>';
        } ?>
    </div>
    <form action="" method="POST">
        Title:
        <input type="text" name="title" value="<?php echo $title ?>"> <br>
        Description:
        <input type="text" name="description" value="<?php echo $description ?>"> <br>
        Price:
        <input type="number" name="price" value=" <?php echo $price ?> "> <br>
        <input type="submit" name="submit" class="btn">
    </form>
</body>
</html>