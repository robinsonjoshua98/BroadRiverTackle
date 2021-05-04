
<?php 

include_once "header.php";

if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
  

?>
<main>
<?php
$sql = "select * FROM products where product_id = '2';";
//   $result = mysqli_query($conn, $sql);
$result = $conn->query($sql);

if ($result->num_rows > 0){

$row = $result->fetch_assoc();

$category_id = $row["category_id"];
$product_name = $row["product_name"];
$descriptions = $row["descriptions"];
$list_price = $row["list_price"];



}

$categorySQL = "select category_name FROM categories where category_id = '3'";
$categoryResult = mysqli_query($conn, $categorySQL);
  $category = mysqli_fetch_assoc($categoryResult);
  $categoryName = $category['category_name'];
echo $categoryName;
  // $conn->close();
  
//   while($row = mysqli_fetch_assoc($result)) {
//       // $mysqlResult = "{$row['userLevel']}<br>";
//       echo "<div id='store'><p>" . $row['product_name']. "</p><p>" . $row['descriptions']. "</p><p>$". $row['list_price']. " </p></div><br>";
//   }
?>
<h4>Change My Product</h4>
<form action="includes/membersProductUpdate.inc.php" method="post">
<input type="text" name="product" value= "<?php echo $product_name?>">
<input type="text" name="description" value= "<?php echo $descriptions?>"><br>
<label for="category">Choose a category:</label><br>
<select for="category" name="category">
  <optgroup label="Category">
    <option value = "<?php $category_id?>" selected><?php echo $categoryName?> </option>
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


</main>
<?php
 include_once "footer.php";
?>