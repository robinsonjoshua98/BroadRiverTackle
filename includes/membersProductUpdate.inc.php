
<?php
include_once "../header.php";

if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
  

if(isset($_POST["submit"])) {
  $product_name =  $_POST["product"];
  $product_id =  $_POST["productId"];
  $descriptions =  $_POST["description"];
  $category_id =  $_POST["category"];
  $list_price  =  $_POST["price"];


// $category_id = $_POST["category_id"];
// $product_name = $_POST["product_name"];
// $descriptions = $_POST["descriptions"];
// $list_price = $_POST["list_price"];



$sql = "update products set category_id = '$category_id', product_name='$product_name', descriptions='$descriptions', list_price='$list_price'where product_id=$product_id";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$category_id."-".$product_name."-".$descriptions."-".$list_price;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}
}