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
$userId =  $_POST["user"];

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
// $testsql = "INSERT INTO `products` ( `category_id`, `product_name`, `descriptions`, `list_price`, `date_added`, `userId`) VALUES ( $category, $product, $description, $price, CURRENT_TIMESTAMP, $userId);";

// if (mysqli_query($conn, $testsql)) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $testsql . "<br>" . mysqli_error($conn);
//   }
  
//   mysqli_close($conn);

  
createProduct($conn, $product, $description, $category, $price, $userId);
echo "Error: " . $testsql . "<br>" . mysqli_error($conn)
// else {
// header("location: ../signup.php?error=bad");
// exit();
// }




?>