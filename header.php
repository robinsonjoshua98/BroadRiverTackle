<?php
session_start();
  $DB_SERVER = "localhost";
  $DB_USER = "test1";
  $DB_PASS = "tackletest";
  $DB_NAME = "broadRiverFinal";
 
 
 // $DB_SERVER = "localhost";
 // $DB_USER = "ugsxyahonfdqu";
 // $DB_PASS = "gjxt5uygaid7";
 // $DB_NAME = "dbz6rt2ohqxank";
 $conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
 if(isset($_SESSION["email"])) {
 $email = $_SESSION["email"];
 }
 if(isset($_SESSION["email"])) {
  // echo "<p>Hello there ".$_SESSION["email"]. "!</p>";

  $email = $_SESSION["email"];


$sql = "select userLevel FROM user where email = '$email'";


  $result = mysqli_query($conn, $sql);
  $level = mysqli_fetch_assoc($result);
  // print $level['userLevel'];
  // exit();

  $userResult = $level['userLevel'];
  // print $userResult;
  // $conn->close();
}

?>

<!DOCTYPE html>
 <html lang="en">

 <head>
   <title>Broad River Tackle Company</title>
   <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0";>
 </head>

       
 <body>
   <header>
     <h1>Welcome to Broad River Tackle!</h1>
     <nav>
       <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="contact-us.php">Contact Us</a></li>
         <li><a href="store.php">The Fishing Store</a></li>
         <?php 
            if(!isset($_SESSION["email"])) {
              echo "<li><a href='login.php'>Log In/Sign Up</a></li>";
            }else {
              if ($userResult == "u"){
            echo "<li><a href='members.php'>My Account</a></li>";
            echo "<li><a href='includes/logout.inc.php'>Log Out ". $email ."? </a></li>";
              } else {
            echo "<li><a href='admins.php'>Admins Section</a></li>";
            echo "<li><a href='includes/logout.inc.php'>Log Out ". $email ."? </a></li>";
              }
            }
            ?>


         
       </ul>
     </nav>

<?php

// print_r ($result);
  if($userResult == "u") {
           echo "<h4>Welcome User $email!</h4>";
         }else if ($userResult == "a"){
          echo "<h4>Welcome Admin $email!</h4>";
         } else {
            echo "<p>Welcome Guest </p>";

            }

?>
   </header>