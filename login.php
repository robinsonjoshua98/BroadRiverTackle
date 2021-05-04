<?php 

include_once "header.php"
  
?>
<main>
<div class="login">
<h2>Register or Log In!</h2>
<p>We appreciate your desire to be apart of the Broad River Tackle Team! We are trying to make this as flawless as possible for users to view all sorts 
of tackle! Let us know if you need anything or have new ideas for us!</p>
<p>Don't have an account?</p>
<a href="signup.php"><p id="sign-up">Sign up here!</p></a>

</div>

<section class="signup-form">
    <h2>Log in</h2>
    <?php
if (isset($_GET["error"])) {
    if($_GET["error"] == "emptyInput") {
        echo "<p id='red'>Fill in all fields.<p>";
    } else if ($_GET["error"] == "wronglogin") {
        echo "<p id='red'>Invalid Login Credentials<p>";
    }
} 

?>
<form action="includes/login.inc.php" method="post">
<label for="email" class="white">Email:</label><br>
<input type="text" name="email" id="email" placeholder="Email.."><br>
<label for="pwd" class="white">Password:</label><br>
<input type="password" name="pwd" id="pwd" placeholder="Password.."><br>

<button type="submit" name="submit">Log in</button>
</form>

</section>



</main>
<?php
 include_once "footer.php";
?>