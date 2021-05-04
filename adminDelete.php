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

<h4>Delete A New Product</h4>
<?php
if(isset($_POST["submit"])) {
  $product_id =  $_POST["product_id"];





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
  ?>
<form action="adminDelete.php" method="post">
  <input type="text" name="product_id" placeholder="Product Id.."><br>
  <button type="submit" name="submit">Delete Product</button>
  <?php
 include_once "footer.php";
?>
