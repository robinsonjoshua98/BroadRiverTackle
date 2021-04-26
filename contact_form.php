<?php

// if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $mailFrom = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailTo = "joshuarobinson@broadrivertackle.com";
    $header = "From: ". $mailFrom;
    $txt = "You have recieved an email from". $mailFrom.".\n\n".$message;
    

    mail($mailTo, $subject, $txt, $header);

    header("Location: contact-us.php?mailsent");



// }