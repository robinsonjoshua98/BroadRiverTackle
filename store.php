<?php 

include_once "header.php"
?>

<main>

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