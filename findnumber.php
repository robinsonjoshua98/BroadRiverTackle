<?php
  include_once 'header.php';
?>
  <h4>Add A New Product</h4>
  <p id="deleted">Please enter the product Id for the product you want to edit.</p>
<form action="find.php" method="post">
<input type="text" name="product" placeholder="Product Id.." >
<button type="submit" name="submit">Change Product</button>
<?php
 include_once "footer.php";
?>