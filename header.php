<?php
session_start();
?>

<!DOCTYPE html>
 <html lang="en">

 <head>
   <title>Broad River Tackle Company</title>
   <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0";>
 </head>
 <?php 
         if($_SESSION["userLevel"] == "u") {
           echo "User";
         }else if ($_SESSION["userLevel"] == "a"){
          echo "Admin";
         }
         ?>
 <body>
   <header>
     <h1>Welcome to Broad River Tackle!</h1>
     <nav>
       <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="products.php">Products</a></li>
         <li><a href="contact-us.php">Contact Us</a></li>
         <?php 
            if(!isset($_SESSION["email"])) {
              echo "<li><a href='login.php'>Log In/Sign Up</a></li>";
            }else {
            echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
            }
            ?>


         
       </ul>
     </nav>
    
<?php
if(isset($_SESSION["email"])) {
  echo "<p>Hello there ".$_SESSION["email"]. "!</p>";
} else {
echo "<p>Welcome Guest </p>";

}

?>
   </header>