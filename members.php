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
// $memberSql = "select * FROM products where userId = $userId";
$memberResult = mysqli_query($conn, $memberSql);
// $conn->close();

// while($row = mysqli_fetch_assoc($memberResult)) {
//     $mysqlResult = "{$row['product_id']}<br>";

// //     echo "<div><p>". $row['product_id'] ."</p></div>";
// //     // echo "<div id='store'><p>" . $row['product_id']. "</p><p>" . $row['product_name']. "</p><p>" . $row['descriptions']. "</p><p>" . $row['category_id']. "</p><p>$". $row['list_price']. " </p></div><br>";
// }

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
//print $mysqlResult;
 



// // print $mysqlResult;



    
//   // print_r ($result);
//   //   if($userResult == "u") {
//   //            echo "<h4>Welcome User $email!</h4>";
//   //          }else if ($userResult == "a"){
//   //           echo "<h4>Welcome Admin $email!</h4>";
//   //          }
        
  
//   // } else {
//   // echo "<p>Welcome Guest </p>";
  
//   }






  // ?> 
<div id="productForm">
<h4>Add A New Product</h4>
<form action="includes/members.inc.php" method="post">
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