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


// require_once "dbh.inc.php";
require_once "functions.inc.php";


if (emptyInputProduct($product, $description, $category, $price, $image) !== false){
  header("location: ../members.php?error=emptyInput");
  exit();
}
}

// if (invalidEmail($email) !== false){
//   header("location: ../signup.php?error=invalidemail");
//   exit();
// }

// if (invalidEmail($email) !== false){
//  header("location: ../signup.php?error=emptyinput");
//  exit();
// }

// if (pwdMatch($pwd, $pwdrepeat) !== false){
//   header("location: ../signup.php?error=passwordsdontmatch");
//   exit();
// }

// if (emailExist($conn, $email ) !== false){
//   header("location: ../signup.php?error=emailTaken");
//   exit();
// }

// create($conn, $email, $pwd, $firstName, $lastName, $phone);

// echo $phone;

// }

// else {
// header("location: ../signup.php?error=bad");
// exit();
// }




?>