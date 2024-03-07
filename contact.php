<?php

mb_language("English");
mb_internal_encoding("UTF-8");

if($_POST){
    $to = 'charashima@my.bcit.ca';
    $subject = 'We got a message from the contact';

    $message = "Thank you for contacting me. \n";
    $message .= "\n";
    $message .= "The texts entered is as follows \n";
    $message .= "---\n";
    $message .= "\n";
    $message .= "Name : \n";
    $message .= $_POST["name"];
    $message .= "\n";
    $message .= "email address:\n";
    $message .= $_POST["email"];
    $message .= "\n";
    $message .= "contact information:\n";
    $message .= $_POST["message"];

    if(mb_send_mail($to, $subject, $message)) {
        echo "Sent a mail";
      } else {
        echo "Failed for sending a email" . mb_last_error();
      }
    } else {
      echo "Failed to receive POST transmission from HTML";
}
?>
