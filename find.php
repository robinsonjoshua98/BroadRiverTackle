<?php 

include_once "header.php";

if(!isset($_SESSION["email"])) {
  header("location: signup.php");
}

if(isset($_POST["submit"])) {
  $product =  htmlspecialchars($_POST["product"]);


$email = $_SESSION["email"];

$sql = "select userId FROM user where email = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "SQL Statement Failed";
} else {
  mysqli_stmt_bind_param($stmt, "s", $email);

  mysqli_stmt_execute($stmt);
 $resultData = mysqli_stmt_get_result($stmt);
 while($row = mysqli_fetch_assoc($resultData)){
  $userId = $row['userId'];
 

 }
 $findSql = "SELECT product_id FROM products WHERE userId = ? AND product_id = ?;";
 $stmt = mysqli_stmt_init($conn);
 if (!mysqli_stmt_prepare($stmt, $findSql)) {
   echo "SQL Statement Failed";
 } else {
   mysqli_stmt_bind_param($stmt, "si", $userId, $product);
 mysqli_stmt_execute($stmt);
 $resultData = mysqli_stmt_get_result($stmt);
if(!$row = mysqli_fetch_assoc($resultData)) {
  echo "<p id='nullId'>You dont have a post with this Identification number</p>";
  echo "<a id='sign-up' href='members.php'>Back to My Account</a>";
}else {

  $productSql = "select * FROM products where product_id = ?;";
  
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $productSql)) {
    echo "SQL Statement Failed 2";
  } else {
    mysqli_stmt_bind_param($stmt, "s", $product);

  mysqli_stmt_execute($stmt);
  $resultSet = mysqli_stmt_get_result($stmt);
  
while($row = mysqli_fetch_assoc($resultSet)) {
    
$category_id = $row["category_id"];
$product_name = $row["product_name"];
$descriptions = $row["descriptions"];
$list_price = $row["list_price"];
   
}
  }

$findSql = "SELECT product_id FROM products WHERE userId = ? AND product_id = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $findSql)) {
    echo "SQL Statement Failed";
  } else {
    mysqli_stmt_bind_param($stmt, "si", $userId, $product);
  mysqli_stmt_execute($stmt);
  }
 

  $categorySQL = "select category_name FROM categories where category_id = ?";




$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $categorySQL)) {
  echo "SQL Statement Failed";
} else {
  mysqli_stmt_bind_param($stmt, "i", $category_id);

  mysqli_stmt_execute($stmt);
  $categoryResult = mysqli_stmt_get_result($stmt);
  
if($row = mysqli_fetch_assoc($categoryResult)) {
  
  $category_name = $row['category_name'];



?>
<main>
  <h4 class="updateForm">Change My Product</h4>
  <form class="updateForm" action="includes/membersProductUpdate.inc.php" method="post">
    <label for="product">Product Name:</label><br>
    <input type="text" name="product" id="product" value="<?php echo $product_name?>">
    <input type="hidden" name="productId" value="<?php echo $product?>"><br>
    <label for="product_desc">Product Description:</label><br>
    <input type="text" name="description" id="product_desc" value="<?php echo $descriptions?>"><br>
    <label for="category">Choose a category:</label><br>
    <select for="category" name="category">
      <optgroup label="Category">
        <option value="<?php echo $category_id?>" selected><?php echo $category_name?> </option>
        <option value="1">unknown</option>
        <option value="2">Freshwater</option>
        <option value="3">Saltwater</option>
        <option value="4">FreshWater/Saltwater</option>
        <option value="5">Brackish</option>
      </optgroup>
    </select><br>
    <label for="price">Product Price:</label><br>
    <input type="text" name="price" id="price" value="<?php echo $list_price?>"><br>
    <button type="submit" name="submit">Update</button>
    </div>

    <?php
}
}
}
 }
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

include_once "footer.php";
?>
