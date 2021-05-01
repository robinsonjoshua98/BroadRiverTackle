<?php 

include_once "header.php";

if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
?>
<main>
  <h2>Welcome to the members area!</h2>
  <p id="center">Bring a member allows you special access to different areas and tools on the website!</p>

  <h3>My Post</h3>
  <a href="post-update.php">Change my posting!</a><br>
<?php 
  // if (isset($_GET["error"])) {
  //   if($_GET["error"] == "emptyInput") {
  //       echo "<p id='red'>Fill in all fields.<p>";
  //   } else if ($_GET["error"] == "passwordsdontmatch") {
  //       echo "<p id='red'>Your two passwords did not match.<p>";
  //   } else if ($_GET["error"] == "emailTaken") {
  //       echo "<p id='red'>Your email is already taken.<p>";
  //   } else if ($_GET["error"] == "none") {
  //       echo "<p id='blue'>You have succesfully signed up! You can now login!<p>";
  //   }
  // }
  // if(isset($_POST["submit"])) {
  //   $product =  $_POST["product"];
  //   $description =  $_POST["description"];
  //   $category =  $_POST["category"];
  //   $price =  $_POST["price"];
  //   $image =  $_POST["image"];
  
 
  
  
  // }
  // echo $product ."<br>".$description."<br>".$category."<br>".$price."<br>".$image;


  if(isset($_SESSION["email"])) {
    // echo "<p>Hello there ".$_SESSION["email"]. "!</p>";
  
    $email = $_SESSION["email"];
  
  
  $sql = "select userId FROM user where email = '$email'";
  
  
    $result = mysqli_query($conn, $sql);
    $level = mysqli_fetch_assoc($result);
    // print $level['userLevel'];
    // exit();
  
    $userId = $level['userId'];
    // print $userResult;
    // $conn->close();
    echo $userId;
    echo "<br>";
    echo $email;



$memberSql = "select * FROM products where userId = $userId";
$memberResult = mysqli_query($conn, $memberSql);
// $conn->close();

while($row = mysqli_fetch_assoc($memberResult)) {
    // $mysqlResult = "{$row['userLevel']}<br>";
    echo "<div id='store'><p>" . $row['product_name']. "</p><p>" . $row['descriptions']. "</p><p>" . $row['category_id']. "</p><p>$". $row['list_price']. " </p></div><br>";
}
// print $mysqlResult;



    
  // print_r ($result);
  //   if($userResult == "u") {
  //            echo "<h4>Welcome User $email!</h4>";
  //          }else if ($userResult == "a"){
  //           echo "<h4>Welcome Admin $email!</h4>";
  //          }
        
  
  // } else {
  // echo "<p>Welcome Guest </p>";
  
  }






  // ?> 
<div id="productForm">
<h4>Add A New Product</h4>
<form action="includes/members.inc.php" method="post">
<input type="text" name="product" placeholder="Product Name.." >
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


</div>
  <img src="img/poles.jpeg" alt="Fishing Pole" class="responsive">
</main>

<?php
 include_once "footer.php";
?>