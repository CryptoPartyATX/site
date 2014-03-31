<?php

/*
 * secure.contactform.php v1.0
 * Copyright (c) 2013 Jan Wiegelmann, http://wiegelmann.net
 * open sourced under the MIT license.
 * based on OpenPGP.js a JavaScript implementation of the OpenPGP standard.
 */
 
 
/*
 * ][ Maelstrom ][
 * This code has been modified by plexiglass for cryptopartyatx.org and cryptoglass.us
 * All modifications are public domain.
 *
 */


// set email address
$email_to = "plexiglass@riseup.net"; 
 
    function died($error) {
        echo "Sorry but there are error(s):<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and try again.<br /><br />";
        die();
    }
 
    $email_from="plexiglass@riseup.net";
    
    // get actual message
    $message = $_POST['message']; 
    
    // get decoy messages
    $message1 = $_POST['message1'];
    $message2 = $_POST['message2'];
    $message3 = $_POST['message3'];
    $message4 = $_POST['message4'];
    
    $error_message = "";
 
  $string_exp = "/^[A-Za-z .'-]+$/";
  
  if(strlen($message) < 1) { 
    $error_message .= 'The Message you entered do not appear to be valid.<br />'; 
  } 
  if(strlen($error_message) > 0) { 
    died($error_message); 
  } 
  $email_message = "Form details below.\n\n";
 
  function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
  }
 
 
$header = 'From: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
 
 
$messages = array($message, $message1, $message2, $message3, $message4);
shuffle($messages);
shuffle($messages);
shuffle($messages);

foreach ($messages as $curmessage){
@mail($email_to, "[CryptoParty Contact Form]", $curmessage, $header);
}
 
?>
<center>
<a href="/"><img src="/crypto-icon-wide.png" /></a><br /><br />

Thank you for contacting us, your message has been sent. <br />

Please <a href="/">return to the main site</a>.
</center>