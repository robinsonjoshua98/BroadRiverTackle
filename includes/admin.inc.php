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
$userId =  $_POST["user"];



require_once "dbh.inc.php";
require_once "functions.inc.php";

}
  
createAdminProduct($conn, $product, $description, $category, $price, $userId);

// else {
// header("location: ../signup.php?error=bad");
// exit();
// }




?>
