<?php 

include_once "header.php"
?>

<main>
<h2>Welcome to the Tackle Shop!</h2>
<form action="search.inc.php" method="POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search">Submit</button>
</form>
<?php
    // $sql = "select * FROM products";
    $sql = "select products.product_name, products.descriptions, products.list_price, user.phone, user.email, user.firstName, user.lastName from products inner join user on products.userId = user.userId
";
    $result = mysqli_query($conn, $sql);
    // $conn->close();
    
    while($row = mysqli_fetch_assoc($result)) {
        // $mysqlResult = "{$row['userLevel']}<br>";
        echo "<div id='store'><p>" . $row['product_name']. "</p><p>" . $row['descriptions']. "</p><p>$". $row['list_price']. " </p><p>" . $row['firstName']." " . $row['lastName']. "</p><p>" . $row['phone']. "</p><p>" . $row['email']. "</p></div><br>";
    }
    // print $mysqlResult;
?>

</main>

<?php
 include_once "footer.php";
?>