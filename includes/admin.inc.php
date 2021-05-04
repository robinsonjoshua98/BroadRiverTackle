<?php

if(isset($_POST["submit"])) {
$product =  $_POST["product"];
$description =  $_POST["description"];
$category =  $_POST["category"];
$price =  $_POST["price"];
$userId =  $_POST["user"];

include_once "dbh.inc.php";
include_once "functions.inc.php";
  
if (emptyInputProduct($product, $description, $category, $price, $userId) !== false){
    header("location: ../members.php?error=emptyInput");
    exit();
  } else {
  
createProduct($conn, $product, $description, $category, $price, $userId);
}
}
?>
