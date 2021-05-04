<?php

// echo $_SERVER['REQUEST_METHOD'];
// $email = "";
// if(isset($_POST['email']) && $_POST['email'] != "") {
//   $email = $_POST['email'];
// }

if(isset($_POST["submit"])) {
$product =  htmlspecialchars($_POST["product"]);
$description =  htmlspecialchars($_POST["description"]);
$category =  htmlspecialchars($_POST["category"]);
$price =  htmlspecialchars($_POST["price"]);
$userId =  htmlspecialchars($_POST["user"]);



require_once "dbh.inc.php";
require_once "functions.inc.php";

}
  
createProduct($conn, $product, $description, $category, $price, $userId);

// else {
// header("location: ../signup.php?error=bad");
// exit();
// }




?>