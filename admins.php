<?php 

include_once "header.php";

if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
?>
<main>
  <h2>Welcome Admin</h2>
  <p id="center">Bring a member allows you special access to different areas and tools on the website!</p>



<div id="productForm">
<h4>Add A New Product</h4>
<form action="includes/admin.inc.php" method="post">
<input type="text" name="product" placeholder="Product Name.." >
<input type="hidden" name="user" value="<?php echo $email?>">
<input type="text" name="description" placeholder="Description.."><br>
<label for="category">Choose a category:</label><br>
<select for="category" name="category">
  <optgroup label="Category">
    <option value="1">unknown</option>
    <option value="2">Freshwater</option>
    <option value="3">Saltwater</option>
    <option value="4">FreshWater/Saltwater</option>
    <option value="5">Brackish</option>
  </optgroup>
</select>
<input type="text" name="price" placeholder="List Price.."><br>
<label for="myfile">Select an image:</label>
<input type="file" name="image" placeholder="Image.."><br>
<button type="submit" name="submit">Add Product</button>
</div>


</div>
  <img src="img/poles.jpeg" alt="Fishing Pole" class="responsive">
</main>

<?php
 include_once "footer.php";
?>