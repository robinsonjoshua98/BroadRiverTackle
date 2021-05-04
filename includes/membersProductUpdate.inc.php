<?php

include_once "functions.inc.php";
include_once "dbh.inc.php";
session_start();

 if(!isset($_SESSION["email"])) {
  $email = '';
  $userResult = '';
 } else {
  $email = $_SESSION["email"];
  $sql = "select userLevel FROM user where email = '$email'";
  $nameSql = "select firstName FROM user where email = '$email'";
  $result = mysqli_query($conn, $sql);
  $level = mysqli_fetch_assoc($result);
  $userResult = $level['userLevel'];
  $result = mysqli_query($conn, $nameSql);
  $name = mysqli_fetch_assoc($result);
  $fName = $name['firstName'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Broad River Tackle Company</title>
  <link rel="stylesheet" href="../css/styles.css?v=<?php echo time(); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" ;>
</head>

<body>
  <header>
    <img src="../assets/img/logoFinal.png" alt="BRT-Logo" height="342" width="1000">
    <nav>
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../contact-us.php">Contact Us</a></li>
        <li><a href="../store.php">The Fishing Store</a></li>
        <?php 
            if(!isset($_SESSION["email"])) {
              echo "<li><a href='../login.php'>Log In/Sign Up</a></li>";
            }else {
              if ($userResult == "u"){
            echo "<li><a href='../members.php'>My Account</a></li>";
            echo "<li><a href='logout.inc.php'>Log Out ". $email ."? </a></li>";
              } else {
            echo "<li><a href='../admins.php'>Admins Section</a></li>";
            echo "<li><a href='logout.inc.php'>Log Out ". $email ."? </a></li>";
              }
            }
            ?>
      </ul>
    </nav>
    <?php

// print_r ($result);
  if($userResult == "u") {
           echo "<h4>Welcome User $fName!</h4>";
         } else if ($userResult == "a"){
          echo "<h4>Welcome Admin $fName!</h4>";
         } else {
            echo "<h4>Welcome Guest </h4>";
      }
    ?>
  </header>
  <?php

if(isset($_POST["submit"])) {
  $product_name =  htmlspecialchars($_POST["product"]);
  $product_id =  htmlspecialchars($_POST["productId"]);
  $descriptions =  htmlspecialchars($_POST["description"]);
  $category_id =  htmlspecialchars($_POST["category"]);
  $list_price  =  htmlspecialchars($_POST["price"]);

$sql = "update products set category_id = '$category_id', product_name='$product_name', descriptions='$descriptions', list_price='$list_price'where product_id=$product_id";
?>

  <main>
    <?php
if ($conn->query($sql) === TRUE) {
  
  echo "<p>Records updated: ".$category_id."-".$product_name."-".$descriptions."-".$list_price."</p>";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}
}
?>
  </main>
  <?php

include_once "../footer.php";
?>
