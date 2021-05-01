<?php

// echo $_SERVER['REQUEST_METHOD'];
// $email = "";
// if(isset($_POST['email']) && $_POST['email'] != "") {
//   $email = $_POST['email'];
// }

if(isset($_POST["submit"])) {
$product =  $_POST["product"];
$description =  $_POST["description"];
$category =  $_POST["category"];
$price =  $_POST["price"];
$image =  $_POST["image"];

//   if(isset($_POST['email']) && $_POST['email'] != "") {
//     $email = $_POST['email'];
//   }


require_once "dbh.inc.php";
require_once "functions.inc.php";


// if (emptyInputProduct($product, $description, $category, $price) !== false){
//   header("location: ../members.php?error=emptyInput");
//   exit();
// }
}
$sql = "INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `description`, `list_price`, `date_added`, `image`) VALUES (NULL, $category, $product, $description, $price, CURRENT_TIMESTAMP, $image);";


createProduct($conn, $product, $description, $category, $price);

// else {
// header("location: ../signup.php?error=bad");
// exit();
// }




?>