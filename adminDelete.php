<?php
  include_once 'header.php';
  if(!($userResult == "a")) {
    header("location: members.php");
  if(!isset($_SESSION["email"])) {
      header("location: signup.php");
    }
  }
  if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
?>
<h4>Delete A Product</h4>
<?php
if(isset($_POST["submit"])) {
  $product_id =  $_POST["product_id"];
  $sql = "select * FROM products where product_id = ?";
  
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL Statement Failed";
  } else {
    mysqli_stmt_bind_param($stmt, "i", $product_id);
  
    mysqli_stmt_execute($stmt);
    $resultSet = mysqli_stmt_get_result($stmt);
    
  if (!$row = mysqli_fetch_assoc($resultSet)) {
      // $mysqlResult = "{$row['userLevel']}<br>";
      echo "There are no products with that ID.";
      // echo $userId;
  } else {
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
<form action="adminDelete.php" method="post">
  <label for="delete">Enter the Product ID Number To Delete</label><br>
  <input type="text" name="product_id" id="delete" placeholder="Product Id.."><br>
  <button type="submit" name="submit">Delete Product</button>
  <?php
 include_once "footer.php";
?>
