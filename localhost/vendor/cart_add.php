<?php
require_once("session.php");
$_SESSION['user'] = [
    "id" => $user["id"]
];
$id = $user["id"];

$product_id = $_POST['product_id'];
if($cart =mysqli_query($connect, "INSERT INTO `cart` (user_id, product_id) VALUES ('$id', '$product_id')")) {

} else {
   
};

header('Location: posts.php');