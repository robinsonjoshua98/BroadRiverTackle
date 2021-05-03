<?php 
include_once 'header.php';
if(!($userResult == "a")) {
  header("location: members.php");
}
  ?>


<h4>Update a Product</h4>
<form action="adminUpdate.php" method="post">
<input type="text" name="product" placeholder="Product Id.." >
<button type="submit" name="submit">Change Product</button>



<?php
if(isset($_POST["submit"])) {
  $product =  $_POST["product"];


$sql = "select * FROM products where product_id = '$product';";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL error";
    } else {
    mysqli_stmt_bind_param($stmt, "s", $product);
    mysqli_stmt_execute($stmt);
    
    }
}
// $result = $conn->query($sql);

// if ($result->num_rows > 0){

// $row = $result->fetch_assoc();

// $category_id = $row["category_id"];
// $product_name = $row["product_name"];
// $descriptions = $row["descriptions"];
// $list_price = $row["list_price"];



// }

// $categorySQL = "select category_name FROM categories where category_id = '$category_id'";
// $categoryResult = mysqli_query($conn, $categorySQL);
//   $category = mysqli_fetch_assoc($categoryResult);
//   $categoryName = $category['category_name'];
// echo $categoryName;
// echo $category_id;

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
// }
?>