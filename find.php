<?php 

include_once "header.php";

if(isset($_POST["submit"])) {
  $product =  $_POST["product"];


$email = $_SESSION["email"];

$sql = "select userId FROM user where email = '$email'";
  
  
  $result = mysqli_query($conn, $sql);
  $level = mysqli_fetch_assoc($result);
  $userId = $level['userId'];

  $findSql = "SELECT product_id FROM products WHERE userId ='$userId' AND product_id = '$product';";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $findSql)){
    header("location: ../signup.php?error=emailtaken");
    exit();
  }
  
  // mysqli_stmt_bind_param($stmt, "s", $user);
  // mysqli_stmt_execute($stmt);
  
  // $resultData = mysqli_stmt_get_result($stmt);

  $resultData = mysqli_query($conn, $findSql);
  if (!$row = mysqli_fetch_assoc($resultData)) {
    // return $row;
    echo "You dont have a post with this Identification number";
  } else {
    // $result = false;
    // return $result;
    






// $sql = "select userId FROM user where email = '$email'";
$sql = "select * FROM products where product_id = '$product';";
//   $result = mysqli_query($conn, $sql);
$result = $conn->query($sql);

if ($result->num_rows > 0){

$row = $result->fetch_assoc();

$category_id = $row["category_id"];
$product_name = $row["product_name"];
$descriptions = $row["descriptions"];
$list_price = $row["list_price"];



}

$categorySQL = "select category_name FROM categories where category_id = '$category_id'";
$categoryResult = mysqli_query($conn, $categorySQL);
  $category = mysqli_fetch_assoc($categoryResult);
  $categoryName = $category['category_name'];
echo $categoryName;
echo $category_id
// $result = mysqli_query($conn, $sql);
// $level = mysqli_fetch_assoc($result);
// print $level['userLevel'];
// exit();

// $userId = $level['userId'];
// echo $product;
// echo "<br>";
// echo $email;

?>
<main>
<h4>Change My Product</h4>
<form action="includes/membersProductUpdate.inc.php" method="post">
<input type="text" name="product" value= "<?php echo $product_name?>">
<input type="hidden" name="productId" value= "<?php echo $product?>">
<input type="text" name="description" value= "<?php echo $descriptions?>"><br>
<label for="category">Choose a category:</label><br>
<select for="category" name="category">
  <optgroup label="Category">
    <option value = "<?php echo $category_id?>" selected><?php echo $categoryName?> </option>
    <option value="1">unknown</option>
    <option value="2">Freshwater</option>
    <option value="3">Saltwater</option>
    <option value="4">FreshWater/Saltwater</option>
    <option value="5">Brackish</option>
  </optgroup>
</select>
<input type="text" name="price" value= "<?php echo $list_price?>"><br>
<label for="myfile">Select an image:</label>
<input type="file" name="image" placeholder="Image.."><br>
<button type="submit" name="submit">Update</button>
</div>
<?php
// echo $userId;


//   $findSql = "SELECT product_id FROM products WHERE userId ='$userId' AND product_id = '$product_id';";
//   $stmt = mysqli_stmt_init($conn);
//   if (!mysqli_stmt_prepare($stmt, $findSql)){
//     header("location: ../signup.php?error=emailtaken");
//     exit();
//   }
  
//   // mysqli_stmt_bind_param($stmt, "s", $user);
//   // mysqli_stmt_execute($stmt);
  
//   // $resultData = mysqli_stmt_get_result($stmt);

//   $resultData = mysqli_query($conn, $findSql);
//   if (!$row = mysqli_fetch_assoc($resultData)) {
//     // return $row;
//     echo "You dont have a post with this Identification number";
//   } else {
//     // $result = false;
//     // return $result;
//     echo "woohoo";
//   }
}
}