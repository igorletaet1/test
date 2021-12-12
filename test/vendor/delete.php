<?php

require_once '../config/connect.php';


$id = $_GET['id'];

$connect->exec("DELETE FROM `product` WHERE `product`.`id` = '$id'");
header('Location: /');