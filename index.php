<?php
  include_once 'header.php';
?>
<main>
  <?php
if (isset($_GET["error"])) {
    if($_GET["error"] == "none") {
        echo "<p id='red'>Successfully signed in!<p>";
    } 
} 
?>

  <h2>The industry's answer to used fishing tackle</h2>
  <p id="intro">Do you have old tackle laying around that you don't
    use or no longer have a use for? Well look no further,
    we at Broad River Tackle have come up with a solution
    to all your problems. Broad River Tackle Company is an
    online store for you to sell or buy tackle you no longer
    want or need. Bought a bait that you thought you would
    like but never even opened? Well this is the place for
    you. Simply create an account and you can start selling or buying. </p>

  <img src="assets/img/pole.jpeg" alt="Fishing Pole" class="responsive">


</main>


</body>

</html>

<?php
 include_once "footer.php";
?>
