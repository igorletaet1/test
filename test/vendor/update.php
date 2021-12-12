<?php

require_once '../config/connect.php';


$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES["myimage"]["name"];
$quantity = $_POST['quantity'];

$sth = $connect->prepare("UPDATE `product` SET `name` = '$name', `price` = '$price', `description` = '$description', `image` = '$image', `quantity` = '$quantity' WHERE `product`.`id` = '$id'");
$sth->execute();

 header('Location: /');
