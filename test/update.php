<?php


    require_once 'config/connect.php';


    $product_id = $_GET['id'];

    $sth = $connect->prepare("SELECT * FROM `product` WHERE `id` = '$product_id'");
    $sth->execute();
    $products = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($products as $product){
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование товара</title>
    <style>
    .form_product {
        background-color: #dcdcdc;
        width: 20%;
    }
</style>
</head>
<body>
    <div class="form_product">
    <h3>Редактирование актива</h3>
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <p>Название</p>
        <input type="text" name="name" value="<?= $product['name'] ?>">
        <p>Цена</p>
        <textarea name="price"><?= $product['price'] ?></textarea>
        <p>Описание</p>
        <input type="text" name="description" value="<?= $product['description'] ?>"> 
        <p>Изображение</p>
        <input type="file" name="myimage" value="<?= $product['image'] ?>"> <br> <br>
        <p>Количество</p>
        <input type="text" name="quantity" value="<?= $product['quantity'] ?>"> <br> <br>
        <input type="submit" name="upl" value="редактировать">
    </form>
    <?}?>
</div>
</body>
</html>