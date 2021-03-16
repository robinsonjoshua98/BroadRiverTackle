<?php
  include_once "header.php"
?>
<main>
  <h2>Contact Us</h2>

  <div class="container">
  <form action="action_page.php">

    <label for="fname">First Name</label><br>
    <input type="text" id="fname" name="firstname" placeholder="Your name.."><br>

    <label for="lname">Last Name</label><br>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>

    <label for="country">Country</label><br>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select><br>

    <label for="subject">Subject</label><br>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea><br>

    <input type="submit" value="Submit">

  </form>
</div>
</main>
</body>
</html>
<?php
 include_once "footer.php";
?>
