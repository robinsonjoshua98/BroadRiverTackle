<?php 

include_once "header.php"
  
?>
<main>
<div class="login">
<h2>Register or Sign In!</h2>
<p>We appreciate your desire to be apart of the Broad River Tackle Team! We are trying to make this as flawless as possible for users to view all sorts 
of tackle! Let us know if you need anything or have new ideas for us!</p>
</div>

<section class="signup-form">
    <h2>Log in</h2>
<form action="includes/login.inc.php" method="post">
<input type="text" name="email" placeholder="Email..">
<input type="password" name="pwd" placeholder="Password.."><br>

<button type="submit" name="submit">Log in</button>
</form>
<?php
if (isset($_GET["error"])) {
    if($_GET["error"] == "emptyInput") {
        echo "<p>Fill in all fields.<p>";
    } else if ($_GET["error"] == "wronglogin") {
        echo "<p>Invalid Login Credentials<p>";
    }
} 

?>
</section>

<p>Don't have an account?</p>
<a href="signup.php"><p>Sign up here!</p></a>

</main>
<?php
 include_once "footer.php";
?>