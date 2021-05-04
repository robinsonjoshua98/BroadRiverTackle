<?php



    $name = $_POST['name'];
    $mailFrom = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mailTo = "joshuarobinson@broadrivertackle.com";
    $header = "From: ". $mailFrom;
    $txt = "You have recieved an email from". $mailFrom.".\n\n".$message;
    
    
    mail($mailTo, $subject, $txt, $header);
    

    header("Location: contact-us.php?mailsent=yes");
