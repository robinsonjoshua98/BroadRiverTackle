<?php
    include_once "header.php";
?>
<main>
<section class="signup-form">
    <h2>Sign Up</h2>
    <?php
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
        echo "<p class='white'>You have succesfully signed up! You can now login!<p>";
    }
} 
?>
<form action="includes/signup.inc.php" method="post">
<label for="email" class="white">Email:</label><br>
<input type="text" name="email" id="email" placeholder="Email.." ><br>
<label for="pass" class="white">Password:</label><br>
<input type="password" name="pwd" id="pass" placeholder="Password.."><br>
<label for="pass2" class="white">Password Repeat:</label><br>
<input type="password" name="pwdrepeat" id="pass2"placeholder="Password Repeat.."><br>
<label for="first" class="white">First Name:</label><br>
<input type="text" name="firstName" id="first" placeholder="First Name.."><br>
<label for="last" class="white">Last Name:</label><br>
<input type="text" name="lastName" id="last" placeholder="Last Name.."><br>
<label for="phone" class="white">Phone Number:</label><br>
<input type="text" name="phone" id="phone" placeholder="Phone.."><br>
<button type="submit" name="submit">Sign up</button>

</form>
</section>
</main>
<?php
 include_once "footer.php";
?>

