<?php
  include_once 'header.php';

  if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
?>

<h4>Delete A New Product</h4>
<?php
if(isset($_POST["submit"])) {
  $product_id =  $_POST["product_id"];


$email = $_SESSION["email"];

$sql = "select userId FROM user where email = '$email'";
  
  
  $result = mysqli_query($conn, $sql);
  $level = mysqli_fetch_assoc($result);
  $userId = $level['userId'];

  $findSql = "SELECT product_id FROM products WHERE userId ='$userId' AND product_id = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $findSql)){
    echo "Sql error";
  } else {
    mysqli_stmt_bind_param($stmt, "i", $product_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
      //     // return $row;
          echo "You dont have a post with this Identification number";
        } else {
      //     // $result = false;
      //     // return $result;
          $deleteSql = "DELETE FROM `products` WHERE `products`.`product_id` = ?;";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $deleteSql)) {
            echo "SQL error";
          } else {
            mysqli_stmt_bind_param($stmt, "i", $product_id);
            mysqli_stmt_execute($stmt);
            echo "<p id='deleted'>Deleted Succesfully.</p>";
          }
  }
  
}
}
?>


<form action="delete.php" method="post">
  <label for="product_id">Enter the Product ID Number To Delete</label><br>
  <input type="text" name="product_id" id="product_id" placeholder="Product Id.."><br>
  <button type="submit" name="submit">Change Product</button>
  <?php
// if(isset($_POST["submit"])) {
//   $product_id =  $_POST["product_id"];


// $email = $_SESSION["email"];

// $sql = "select userId FROM user where email = '$email'";
  
  
//   $result = mysqli_query($conn, $sql);
//   $level = mysqli_fetch_assoc($result);
//   $userId = $level['userId'];

//   $findSql = "SELECT product_id FROM products WHERE userId ='$userId' AND product_id = ?;";
//   $stmt = mysqli_stmt_init($conn);
//   if (!mysqli_stmt_prepare($stmt, $findSql)){
//     echo "Sql error";
//   } else {
//     mysqli_stmt_bind_param($stmt, "i", $product_id);
//     mysqli_stmt_execute($stmt);
//     $result = mysqli_stmt_get_result($stmt);
//     if (!$row = mysqli_fetch_assoc($result)) {
//       //     // return $row;
//           echo "You dont have a post with this Identification number";
//         } else {
//       //     // $result = false;
//       //     // return $result;
//           $deleteSql = "DELETE FROM `products` WHERE `products`.`product_id` = ?;";
//           $stmt = mysqli_stmt_init($conn);
//           if(!mysqli_stmt_prepare($stmt, $deleteSql)) {
//             echo "SQL error";
//           } else {
//             mysqli_stmt_bind_param($stmt, "i", $product_id);
//             mysqli_stmt_execute($stmt);
//             echo "<p>Deleted Succesfully.</p>";
//           }
//   }
  
// }
// }
  
  
  
  
  
  // mysqli_stmt_bind_param($stmt, "s", $user);
  // mysqli_stmt_execute($stmt);
  
  // $resultData = mysqli_stmt_get_result($stmt);

//   $resultData = mysqli_query($conn, $findSql);
//   if (!$row = mysqli_fetch_assoc($resultData)) {
//     // return $row;
//     echo "You dont have a post with this Identification number";
//   } else {
//     // $result = false;
//     // return $result;
//     echo "somewehre else";






// // $sql = "select userId FROM user where email = '$email'";
// $sql = "DELETE FROM `products` WHERE `products`.`product_id` = ?";;
// //   $result = mysqli_query($conn, $sql);
// $result = $conn->query($sql);
//   }
// }

// if ($result->num_rows > 0){

// $row = $result->fetch_assoc();

// $category_id = $row["category_id"];
// $product_name = $row["product_name"];
// $descriptions = $row["descriptions"];
// $list_price = $row["list_price"];



// }

// $categorySQL = "select category_name FROM categories where category_id = '$category_id'";
// $categoryResult = mysqli_query($conn, $categorySQL);
//   $category = mysqli_fetch_assoc($categoryResult);
//   $categoryName = $category['category_name'];
// echo $categoryName;
// echo $category_id;
// $result = mysqli_query($conn, $sql);
// $level = mysqli_fetch_assoc($result);
// print $level['userLevel'];
// exit();

// $userId = $level['userId'];
// echo $product;
// echo "<br>";

// echo $email;

?>






  <?php
 include_once "footer.php";
?>
