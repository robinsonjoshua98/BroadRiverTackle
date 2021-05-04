<?php 

include_once "header.php"
?>

<main>
  <h2>Search Products</h2>
  <a href="store.php" id="backStore">Back to products page</a>
  <?php

    if (isset($_POST['submit-search'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%' OR descriptions LIKE '%$search%';";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div id='store'><p>" . $row['product_name']. "</p><p>" . $row['descriptions']. "</p><p>$". $row['list_price']. " </p></div><br>";
            }
        } else {
            echo "<p id='search'>There are no results matching your search.</p>";
        }

    }
?>

</main>
