<?php

require_once '../config/connect.php';


$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$image = $_FILES["myimage"]["name"];
$quantity = $_POST['quantity'];

$sth = $connect->prepare("INSERT INTO `product` (`id`, `name`, `price`, `description`, `image`, `quantity`) VALUES (NULL, '$name', '$price', '$description', '$image', '$quantity')");
$sth->execute();
 header('Location: /');

