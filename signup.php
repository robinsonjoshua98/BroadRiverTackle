<?php
    include_once "header.php";
?>
<main>
<section class="signup-form">
    <h2>Sign Up</h2>
    <?php

    // $email = "";
    // $pwd = "";
    // $pwdRepeat = "";
    // $firstName = "";
    // $lastName = "";

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //     $name = $email = '';
    
    //     if (empty($_POST['name'])) {
    //         $nameError = 'Name should be filled';
    //     } else {
    //         $name = trim(htmlspecialchars($_POST['name']));
    //     }    
    
    // }
    
    
    // if (isset($_POST['email'])) {
    //     echo $_POST['email'];
    //   }
    // echo $_SERVER['REQUEST_METHOD'];
    // $email = '';
    // if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    //     echo "hello";
    // $email =  $_POST["email"];
    // } 
if (isset($_GET["error"])) {
    if($_GET["error"] == "emptyInput") {
        echo "<p id='red'>Fill in all fields.<p>";
    } else if ($_GET["error"] == "invalidemail") {
        echo "<p id='red'>Invalid Email.<p>";
    } else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p id='red'>Your two passwords did not match.<p>";
    } else if ($_GET["error"] == "emailTaken") {
        echo "<p id='red'>Your email is already taken.<p>";
    } else if ($_GET["error"] == "none") {
        echo "<p id='blue'>You have succesfully signed up! You can now login!<p>";
    }
} ?>
<form action="includes/signup.inc.php" method="post">
<input type="text" name="email" placeholder="Email.." >
<input type="password" name="pwd" placeholder="Password..">
<input type="password" name="pwdrepeat" placeholder="Password Repeat..">
<input type="text" name="firstName" placeholder="First Name..">
<input type="text" name="lastName" placeholder="Last Name.."><br>
<input type="text" name="phone" placeholder="Phone.."><br>
<button type="submit" name="submit">Sign up</button>

</form>
</section>
</main>
<?php
 include_once "footer.php";
?>

