<?php 

include_once "header.php";

if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
?>
<main>
  <h2>Welcome to the members area!</h2>
  <p id="center">Bring a member allows you special access to different areas and tools on the website!</p>

  <h3>My Post</h3>
  <?php
  if (isset($_GET["error"])) {
    if($_GET["error"] == "emptyInput") {
        echo "<p id='red'>Fill in all fields.<p>";
    } else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p id='red'>Your two passwords did not match.<p>";
    } else if ($_GET["error"] == "emailTaken") {
        echo "<p id='red'>Your email is already taken.<p>";
    } else if ($_GET["error"] == "none") {
        echo "<p id='blue'>You have succesfully signed up! You can now login!<p>";
    }
  }
  ?>
<div id="productForm">
<h4>Add A New Product</h4>
<form action="includes/members.inc.php" method="post">
<input type="text" name="product" placeholder="Product Name.." >
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
<button type="submit" name="submit">Sign up</button>
</div>


</div>
  <img src="img/poles.jpeg" alt="Fishing Pole" class="responsive">
</main>

<?php
 include_once "footer.php";
?>