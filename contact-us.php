<?php
  include_once "header.php"
?>
<main>
  <h2>Contact Us</h2>

  <?php
  if (isset($_GET["mailsent"])) {
    if($_GET["mailsent"] == "yes") {
        echo "<p>Mail Sent Successfully<p>";
    } 
}
?>
  <div class="container">
    <form action="contact_form.php" method="post">

      <label for="fname">Full Name:</label><br>
      <input type="text" id="fname" name="name" placeholder="Your full name.."><br>

      <label for="email">Your Email:</label><br>
      <input type="text" id="email" name="email" placeholder="Your email.."><br>

      <label for="subject">Subject:</label><br>
      <input type="text" id="subject" name="subject" placeholder="Subject.."><br>

      <label for="message">Your Message:</label><br>
      <textarea id="message" name="message" placeholder="Your message.." style="height:200px"></textarea><br>


      <input type="submit" value="submit">

    </form>
  </div>
</main>
</body>

</html>
<?php
 include_once "footer.php";
?>
