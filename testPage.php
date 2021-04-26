<?php
    include_once "header.php";
?>
<main>
<section class="signup-form">
    <h2>Sign Up</h2>
    <?php

if(isset($_POST["submit"])) {
    $email =  $_POST["email"];
    $firstName =  $_POST["firstName"];
    $lastName =  $_POST["lastName"];
    $pwd =  $_POST["pwd"];
    $pwdrepeat =  $_POST["pwdrepeat"];
    
      $email = "";
      $pwd = "";
      $pwdRepeat = "";
      $firstName = "";
      $lastName = "";
  
      if (isset($_POST['email'])) {
          echo $_POST['email'];
        }
    }
    // $email = "";
    // $pwd = "";
    // $pwdRepeat = "";
    // $firstName = "";
    // $lastName = "";

    // if (isset($_POST['email'])) {
    //     echo $_POST['email'];
    //   }

    // if(isset($_POST['email']) && $_POST['email'] != "") {
    //     $email = $_POST['email'];
    // }
    // if(isset($_POST['pwd']) && $_POST['pwd'] != "") {
    //     $pwd = $_POST['pwd'];

    // }
    // if(isset($_POST['pwdRepeat']) && $_POST['pwdRepeat'] != "") {
    //     $pwdRepeat= $_POST['pwdRepeat'];
    // }
    // if(isset($_POST['firstName']) && $_POST['firstName'] != "") {
    //     $firstName= $_POST['firstName'];
    // }
    // if(isset($_POST['lastName']) && $_POST['lastName'] != "") {
    //     $lastName= $_POST['lastName'];
    // }

    // if (isset($_GET["error"])) {
    //     if($_GET["error"] == "emptyInput") {
    //         echo "<p>Fill in all fields.<p>";
    //     } else if ($_GET["error"] == "invalidemail") {
    //         echo "<p>Invalid Email.<p>";
    //     } else if ($_GET["error"] == "passwordsdontmatch") {
    //         echo "<p>Your two passwords did not match.<p>";
    //     } else if ($_GET["error"] == "emailTaken") {
    //         echo "<p>Your two passwords did not match.<p>";
    //     } else if ($_GET["error"] == "none") {
    //         echo "<p>You have succesfully signed up!<p>";
    //     }



// } 
?>
<form action="includes/signup.inc.php" method="post">
<input type="text" name="email" placeholder="Email..">
<input type="password" name="pwd" placeholder="Password..">
<input type="password" name="pwdrepeat" placeholder="Password Repeat..">
<input type="text" name="firstName" placeholder="First Name..">
<input type="text" name="lastName" placeholder="Last Name.."><br>
<button type="submit" name="submit">Sign up</button>

</form>
</section>
</main>
<?php
 include_once "footer.php";
?>

