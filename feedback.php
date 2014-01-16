<?php
        $mail_to_send_to = "info@affableitsolutions.com";
        $your_feedbackmail = "no-reply@affableitsolutions.com";

        $sendflag = $_REQUEST['sendflag'];
        if ( $sendflag == "send" )
        {
                $email = $_REQUEST['email'] ;
                $message = $_REQUEST['message'] ;
                $headers = "From: $your_feedbackmail" . "\r\n" . "Reply-To: $email" . "\r\n" ;
                $a = mail( $mail_to_send_to, "Feedback Form Results", $message);
                if ($a) 
                {
                     print("Message was sent, you can send another one");
                } else {
                     print("Message wasn't sent, please check that you have changed emails in the bottom");
                }
        }
?>


<form method="post" action="feedback.php">
  <input type="hidden" name='sendflag' value="send">
  Your Email: <input name="email" type="text" /><br />
  Message:<br />
  <textarea name="message" rows="15" cols="40">
  </textarea><br />
  <input type="submit" />
</form>