<?php
  include_once 'header.php';
  if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
  
?>
<h4>Update a Product</h4>
<form action="find.php" method="post">
  <label for="product">Please enter the Product ID Number:</label><br>
  <input type="text" name="product" id="product" placeholder="Product Id..">
  <button type="submit" name="submit">Change Product</button>
  <?php
 include_once "footer.php";
?>
