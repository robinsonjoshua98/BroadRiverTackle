<?php

if(isset($_POST["submit"])) {
$product =  htmlspecialchars($_POST["product"]);
$description =  htmlspecialchars($_POST["description"]);
$category =  htmlspecialchars($_POST["category"]);
$price =  htmlspecialchars($_POST["price"]);
$userId =  htmlspecialchars($_POST["user"]);

require_once "dbh.inc.php";
require_once "functions.inc.php";

}
if (emptyInputProduct($product, $description, $category, $price, $userId) !== false){
    header("location: ../members.php?error=emptyInput");
    exit();
  } else {
  

  
createProduct($conn, $product, $description, $category, $price, $userId);
  }

?>