<?php 

include_once "header.php";

if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
  $email = $_SESSION["email"];
?>
<main>
  <h2>Welcome to the members area!</h2>
  <p id="center">Bring a member allows you special access to different areas and tools on the website!</p>
  
<h3>My Listings</h3>

<?php 
    $sql = "select userId FROM user where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $level = mysqli_fetch_assoc($result);
    $name = $level['userId'];
    $userId = $level['userId'];
$memberSql = "select product_id from products where userId ='$userId'";
$memberResult = mysqli_query($conn, $memberSql);
$sql = "select * FROM products where userId ='$userId'";
$result = mysqli_query($conn, $sql);
// $conn->close();
$queryResult = mysqli_num_rows($result);

if ($queryResult > 0) {
  ?>
  <div id="updatePost">
    <ul>
  <li><a href="findNumber.php" id="update">Edit my listings</a></li>
  <li><a href="delete.php" id="update">Delete my listings</a><br></li>
</ul>
</div>
<?php
  while($row = mysqli_fetch_assoc($result)) {
    echo "<div id='store'><p>Product Id Number: ". $row['product_id']. "</p><p>" .$row['product_name']. "</p><p>" . $row['descriptions']. "</p><p>$". $row['list_price']. " </p></div><br>";
  }
} else {
  echo "<p>You have no post yet.</p>";
}


 ?> 
<div id="productForm">
<h4>Add A New Product</h4>
<?php
  if (isset($_GET["error"])) {
    if($_GET["error"] == "emptyInput") {
        echo "<p id='red'>Fill in all fields.<p>";
    } else if ($_GET["error"] == "none") {
        echo "<p id='red'>Post Successfully added!<p>";
    }
} 
?>
<form action="includes/members.inc.php" method="post">
<input type="hidden" name="user" value="<?php echo $name?>">
<label for="product">Product Name</label><br>
<input type="text" name="product" id="product" placeholder="Product Name.." ><br>
<label for="product">Product Description:</label><br>
<input type="text" name="description" id="description" placeholder="Description.."><br>
<label for="category">Choose a category:</label><br>
<select for="category" name="category">
  <optgroup label="Category">
    <option value="1">unknown</option>
    <option value="2">Freshwater</option>
    <option value="3">Saltwater</option>
    <option value="4">FreshWater/Saltwater</option>
    <option value="5">Brackish</option>
  </optgroup>
</select><br>
<label for="price">Product Price:</label><br>
<input type="text" name="price" id="price" placeholder="List Price.."><br>
<button type="submit" name="submit">Add Product</button>
</div>


</div>
  <img src="assets/img/poles.jpeg" alt="Fishing Pole" class="responsive">
</main>

<?php
 include_once "footer.php";
?>