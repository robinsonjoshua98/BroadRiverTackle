<?php 

include_once "header.php";
if(!($userResult == "a")) {
  header("location: members.php");
  // echo "yay";
}

if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
?>
<main>
  <h2>Welcome Admin</h2>
  <p id="center">Bring a member allows you special access to different areas and tools on the website!</p>
  <div id="updatePost">
    <ul>
      <li><a href="adminUpdate.php" id="update">Edit a post</a></li>
      <li><a href="adminDelete.php" id="update">Delete a Post</a><br></li>
    </ul>
  </div>
  <?php
  
  $userSql = "select userId FROM user where email = ?;";
  

  $stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $userSql)) {
  echo "SQL Statement Failed";
} else {
  mysqli_stmt_bind_param($stmt, "s", $email);

  mysqli_stmt_execute($stmt);
  $resultSet = mysqli_stmt_get_result($stmt);
  
while($row = mysqli_fetch_assoc($resultSet)) {
    // $mysqlResult = "{$row['userLevel']}<br>";
    $userId = $row['userId'];
    // echo $userId;

$productSql = "select * FROM products where userId = ?";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $productSql)) {
  echo "SQL Statement Failed";
} else {
  mysqli_stmt_bind_param($stmt, "s", $userId);

  mysqli_stmt_execute($stmt);
  $resultSet = mysqli_stmt_get_result($stmt);


while($row = mysqli_fetch_assoc($resultSet)) {
    // $mysqlResult = "{$row['userLevel']}<br>";
    echo "<div id='store'><p>Product Id Number: ". $row['product_id']. "</p><p>" . $row['product_name']. "</p><p>" . $row['descriptions']. "</p><p>$". $row['list_price']. " </p></div><br>";
}
}
}

}

$sql = "select userId FROM user where email = '$email'";
$result = mysqli_query($conn, $sql);
$level = mysqli_fetch_assoc($result);
$name = $level['userId'];


$userId = $level['userId'];


?>



  <div id="productForm">
<h4>Add A New Product</h4>
<?php

?>
<form action="includes/members.inc.php" method="post">
<input type="hidden" name="user" value="<?php echo $name?>">
<label for="product">Product Name</label><br>
<input type="text" name="product" id="product" placeholder="Product Name.." ><br>
<label for="description">Description of the Product</label><br>
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
