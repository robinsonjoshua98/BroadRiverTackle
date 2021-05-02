<?php 
// if(!isset($_SESSION["email"])) {
//     header("location: signup.php");
//   }
// echo $email;

$email = '123@mail.com';

echo $email;

?>


<div id="productForm">
<h4>Add A New Product</h4>
<form action="test.php" method="post">
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
