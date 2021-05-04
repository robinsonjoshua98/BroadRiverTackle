<?php
include_once "header.php";

if(isset($_POST["submit"])) {

 $product = htmlspecialchars($_POST["product"]);

$findSql = "SELECT product_id FROM products where product_id = ?;";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $findSql)) {
  echo "SQL Statement Failed";
} else {
  mysqli_stmt_bind_param($stmt, "s", $product);

  mysqli_stmt_execute($stmt);
  $productExist = mysqli_stmt_get_result($stmt);
  
if(!$row = mysqli_fetch_assoc($productExist)) {
  echo "<p>You dont have a post with this Identification number</p>";
  include_once "footer.php";
  exit();
}
  else {
  
    $productSql = "select * FROM products where product_id = ?;";

    $stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $productSql)) {
  echo "SQL Statement Failed 2";
} else {
  mysqli_stmt_bind_param($stmt, "s", $product);

  mysqli_stmt_execute($stmt);
  $productResult = mysqli_stmt_get_result($stmt);
  
  while($row = mysqli_fetch_assoc($productResult)){

$category_id = $row["category_id"];
$product_name = $row["product_name"];
$descriptions = $row["descriptions"];
$list_price = $row["list_price"];

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
}

  }

}
  
}
}} 
?> 
<main>
<h4 id="success">Change My Product</h4>
<form action="includes/membersProductUpdate.inc.php" method="post" id="adminUpdate">
<label for="product" class="white">Product Name:</label><br>
<input type="text" name="product" id="product" value= "<?php if(isset($_POST["submit"])) {echo $product_name;} ?>">

<input type="hidden" name="productId"  id="productId" value= "<?php if(isset($_POST["submit"])) {echo $product;} ?>"><br>
<label for="description" class="white">Product Description:</label><br>
<input type="text" name="description" id="description" value= "<?php if(isset($_POST["submit"])) {echo $descriptions;} ?>"><br>
<label for="category" class="updateForm">Choose a category:</label><br>
<select for="category" name="category">
  <optgroup label="Category">
    <option value =  "<?php if(isset($_POST["submit"])) {echo $category_id;}?>" selected> <?php if(isset($_POST["submit"])) {echo $category_name;}?></option>
    <option value="1">unknown</option>
    <option value="2">Freshwater</option>
    <option value="3">Saltwater</option>
    <option value="4">FreshWater/Saltwater</option>
    <option value="5">Brackish</option>
  </optgroup>
</select><br>
<label for="price" class="white">Product Description:</label><br>
<input type="text" name="price" id="price" value= "<?php echo $list_price?>"><br>
<button type="submit" name="submit">Update</button><br>
</div>
<?php



?>

<?php
 include_once "footer.php";
?>















