<?php 

include_once "header.php"
?>

<main>

<?php
    $sql = "select * FROM user";
    $result = mysqli_query($conn, $sql);
    // $conn->close();
    
    while($row = mysqli_fetch_assoc($result)) {
        // $mysqlResult = "{$row['userLevel']}<br>";
        echo "<div id='store'><p>" . $row['email']. "</p><p>" . $row['passwords']. "</p><p>". $row['userLevel']. " </p></div><br>";
    }
    // print $mysqlResult;
?>

</main>