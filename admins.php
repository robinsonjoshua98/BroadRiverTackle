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
  <li><a href="adminUpdate.php" id="update">Edit one of my post</a></li>
  <li><a href="adminDelete.php" id="update">Delete One of my Post</a><br></li>
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



?>


<div id="productForm">
<h4>Add A New Product</h4>
<?php  

$cow;

?>
<form action="includes/admin.inc.php" method="post">
<input type="hidden" name="user" value="<?php echo $name?>">
<input type="text" name="product" placeholder="Product Name.." ><br>
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
<button type="submit" name="submit">Add Product</button>
</div>


</div>
  <img src="assets/img/poles.jpeg" alt="Fishing Pole" class="responsive">
</main>


<?php
 include_once "footer.php";
?>