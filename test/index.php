<?php

require_once 'config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>products</title>
</head>
<style>
    th, td {
        padding: 5px;
        border-color: #fff;
    }

    th {
        background: #3a3a3a;
        color: #fff;
    }

    td {
        background: #f7f7f7;
    }
    .form_product {
        background-color: #dcdcdc;
        width: 20%;
    }
</style>
<body>
    <table>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Изображение</th>
            <th>Количество</th>
        </tr>

        <?php
            
            $products = $connect->prepare("SELECT * FROM `product`");
            $products->execute();
            $array = $products->fetchAll(PDO::FETCH_ASSOC);
         
            foreach ($array as $product) {
                $rendIMG = base64_encode($product['image'])
                ?>
                    <tr>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><img src="data: image/jpeg;base64, '<? echo  $rendIMG?>'" alt=""></td>
                        <td><?= $product['quantity'] ?></td>
                        <td><a href="update.php?id=<?= $product['id'] ?>">Редактировать</a></td>
                        <td><a style="color: red;" href="vendor/delete.php?id=<?= $product['id'] ?>">Удалить</a></td>
                    </tr>
                   
                <?php
            }
        ?>
    </table>
    <div class="form_product">
    <h3>Добавить новый товар</h3>
    <form action="vendor/create.php" method="post" enctype="multipart/form-data">
        <p>Название</p>
        <input type="text" name="name">
        <p>Цена</p>
        <input type="text" name="price">
        <p>Описание</p>
        <input type="text" name="description">
        <p>Изображение</p>
        <input type="file" name="myimage">
        <p>Количество</p>
        <input type="text" name="quantity"> <br> 
        <input type="submit" name="upl" value="добавить">

    </form>
</div>
</div>
</body>
</html>
