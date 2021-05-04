<?php 
include_once 'header.php';
if(!($userResult == "a")) {
  header("location: members.php");
}
 
if(!isset($_SESSION["email"])) {
  header("location: signup.php");
}
 ?>


<h4>Update a Product</h4>
<form action="adminUpdateCheck.php" method="post">
<input type="text" name="product" placeholder="Product Id.." >
<button type="submit" name="submit">Change Product</button><br>





<?php
 include_once "footer.php";
?>