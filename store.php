<?php 

include_once "header.php"
?>

<main>
  <h2>Welcome to the Tackle Shop!</h2>
  <p id="intro">Welome to our store! Do you see anything you like or are interested in? Now its very simple to contact the user! The phone numbers and emails of each member are listed out here!
    Just shoot them a call or an email and you are that much closer to having your new fishing gear! </p>

  <form action="search.inc.php" method="POST">
    <label for="search" id="search" class="white">Search:</label><br>
    <input type="text" name="search" placeholder="Search" id="search">
    <button type="submit" name="submit-search" id="search">Submit</button>
  </form>
  <?php
    $sql = "select products.product_name, products.descriptions, products.list_price, user.phone, user.email, user.firstName, user.lastName from products inner join user on products.userId = user.userId";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div id='store'><p>" . $row['product_name']. "</p><p>" . $row['descriptions']. "</p><p>$". $row['list_price']. " </p><p>" . $row['firstName']." " . $row['lastName']. "</p><p>" . $row['phone']. "</p><p>" . $row['email']. "</p></div><br>";
    }
    ?>
</main>

<?php   
 include_once "footer.php";
?>
