<?php 

include_once "header.php";

if(!isset($_SESSION["email"])) {
    header("location: signup.php");
  }
?>
<main>
  <h2>Welcome to the members area!</h2>
  <p>Bring a member allows you special access to different areas and tools on the website!</p>
  <img src="img/poles.jpeg" alt="Fishing Pole" class="responsive">
</main>

<?php
 include_once "footer.php";
?>
