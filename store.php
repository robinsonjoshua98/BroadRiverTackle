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
    $sql = "select * FROM products";
    $result = mysqli_query($conn, $sql);
    // $conn->close();
    
    while($row = mysqli_fetch_assoc($result)) {
        // $mysqlResult = "{$row['userLevel']}<br>";
        echo "<div id='store'><p>" . $row['product_name']. "</p><p>" . $row['descriptions']. "</p><p>$". $row['list_price']. " </p></div><br>";
    }
    // print $mysqlResult;
?>

</main>