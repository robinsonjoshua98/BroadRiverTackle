
<?php
include_once "../header.php";

if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
  // $email = $_SESSION["email"];
  // $sql = "select userId FROM user where email = '$email'";
  
  
  // $result = mysqli_query($conn, $sql);
  // $level = mysqli_fetch_assoc($result);
  // // print $level['userLevel'];
  // // exit();

  // $userId = $level['userId'];


  
  //   $findSql = "SELECT product_id FROM products WHERE userId ='$userId' AND product_id = '7';";
  //   $stmt = mysqli_stmt_init($conn);
  //   if (!mysqli_stmt_prepare($stmt, $findSql)){
  //     header("location: ../signup.php?error=emailtaken");
  //     exit();
  //   }
    
  //   // mysqli_stmt_bind_param($stmt, "s", $user);
  //   // mysqli_stmt_execute($stmt);
    
  //   // $resultData = mysqli_stmt_get_result($stmt);
  
  //   $resultData = mysqli_query($conn, $findSql);
  //   if (!$row = mysqli_fetch_assoc($resultData)) {
  //     // return $row;
  //     echo "You dont have a post with this Identification number";
  //   } else {
  //     // $result = false;
  //     // return $result;
  //     echo "it is wprlong nopw";
  //   }
    // mysqli_stmt_close($stmts);
  

if(isset($_POST["submit"])) {
  $product_name =  $_POST["product"];
  $product_id =  $_POST["productId"];
  $descriptions =  $_POST["description"];
  $category_id =  $_POST["category"];
  $list_price  =  $_POST["price"];


// $category_id = $_POST["category_id"];
// $product_name = $_POST["product_name"];
// $descriptions = $_POST["descriptions"];
// $list_price = $_POST["list_price"];

$sql = "update products set category_id = '$category_id', product_name='$product_name', descriptions='$descriptions', list_price='$list_price'where product_id=$product_id";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$category_id."-".$product_name."-".$descriptions."-".$list_price;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}
}