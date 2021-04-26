<?php
    include_once "header.php";
?>
<main>
<section class="signup-form">
    <h2>Sign Up</h2>
    <?php
if (isset($_GET["error"])) {
    if($_GET["error"] == "emptyInput") {
        echo "<p>Fill in all fields.<p>";
    } else if ($_GET["error"] == "invalidemail") {
        echo "<p>Invalid Email.<p>";
    } else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Your two passwords did not match.<p>";
    } else if ($_GET["error"] == "emailTaken") {
        echo "<p>Your two passwords did not match.<p>";
    } else if ($_GET["error"] == "none") {
        echo "<p>You have succesfully signed up!<p>";
    }
} 
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

