<?php


/*
 * ][ Maelstrom ][
 * This code has been modified by plexiglass for cryptopartyatx.org and cryptoglass.us
 * Based originally on secure.contactform.php, all modifications public domain.
 */
 
/*
 * secure.contactform.php v1.0
 * Copyright (c) 2013 Jan Wiegelmann, http://wiegelmann.net
 * open sourced under the MIT license.
 * based on OpenPGP.js a JavaScript implementation of the OpenPGP standard.
 */


// set email address
$email_to = "plexiglass@riseup.net"; 
 
// die function
function died($error) {
	echo "Sorry but there are error(s):<br /><br />";
	echo $error."<br /><br />";
	echo "Please go back and try again.<br /><br />";
	die();
}

// set from address
$email_from="plexiglass@riseup.net";

// get actual message
$message = $_POST['message']; 

// get decoy messages
$message1 = $_POST['message1'];
$message2 = $_POST['message2'];
$message3 = $_POST['message3'];
$message4 = $_POST['message4'];

// init $error_message
$error_message = "";

// make sure it was encrypted and is not blank for some reason
if (strpos($message,'-----BEGIN PGP MESSAGE-----') === false) {
	$error_message .= "For some reason the message was not encrypted, so it was not sent.";
}
if(strlen($message) < 1) { 
	$error_message .= 'The Message you entered do not appear to be valid.<br />'; 
} 

// die if $error_message got populated with an error
if(strlen($error_message) > 0) { 
	died($error_message); 
} 
 
$header = 'From: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
 
// mix around the messages so they are not sent in the same order every time
$messages = array($message, $message1, $message2, $message3, $message4);
shuffle($messages);
shuffle($messages);
shuffle($messages);

// send messages
foreach ($messages as $curmessage){
@mail($email_to, "[CryptoParty Contact Form]", $curmessage, $header);
}
 
?>
<center>
<a href="/"><img src="/crypto-icon-wide.png" /></a><br /><br />

Thank you for contacting us, your message has been sent. <br />

Please <a href="/">return to the main site</a>.
</center>