$(document).ready(function(){
    $("#twitterShrink").click(function(){
        $(".tweetitem").slideToggle(300,"swing"); 
        if ($(this).text() == "+")
        	$(this).text("_")
        else
        	$(this).text("+");
    });
    
});




/* 
Password script written by plexiglass for CryptoPartyATX.org; 
Unlicensed/Public Domain 
Please submit improvements: plexiglass@riseup.net
*/

function genNewPasswd() {
	var newPass = "";
	var charset = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9','0','!','@','#','$','%','^','&','*','(',')','[',']','{','}','<','>','/','?',',','.',':',';','`','~')

	for(var i=0; i<20; i++){
		// Get some pseudo-random input numbers
		var randArray = new Uint32Array(1);
		window.crypto.getRandomValues(randArray);
		var curRand = randArray[0];
		
		// Scale random to charset length
		var decVal = curRand / 4294967295;
		var curCharNum = Math.floor(decVal * charset.length);
				
		// Get char from charset
		var curChar = charset[curCharNum];

		// Add char to password
		newPass += curChar;

	}
	
	// Output new password
	document.getElementById('passTxt').value = newPass;
}




/* Functions for encrypted contact form

	encrypt() function based on Encrypt.to's secure contact form, 
	modified to process multiple messages
		See: https://github.com/encrypt-to/secure.contactform.php
		
	checkparams() function by plexiglass for CryptoPartyATX.org
		Unlicensed/Public Domain
		Please submit improvements: plexiglass@riseup.net
	
*/
function encrypt() {
  if (window.crypto && window.crypto.getRandomValues) {
	var message = document.getElementById("message");
	var message1 = document.getElementById("message1");
	var message2 = document.getElementById("message2");
	var message3 = document.getElementById("message3");
	var message4 = document.getElementById("message4");
	
	if (message.value.indexOf("-----BEGIN PGP MESSAGE-----") !== -1 && message.value.indexOf("-----END PGP MESSAGE-----") !== -1) {
		// encryption done		
	} else {
		var pub_key = openpgp.key.readArmored(document.getElementById("pubkey").innerHTML).keys[0];
		var plaintext = message.value;
		var ciphertext = openpgp.encryptMessage([pub_key],plaintext);
		message.value = ciphertext;
		
			
		/* 
		technically should be checking whether these are already encrypted, but
		it probably doesn't hurt to just keep layering encryption on it for the junk
		messages 
		*/
		var plaintext1 = message1.value;
		var ciphertext1 = openpgp.encryptMessage([pub_key],plaintext1);
		message1.value = ciphertext1;
		
		var plaintext2 = message2.value;
		var ciphertext2 = openpgp.encryptMessage([pub_key],plaintext2);
		message2.value = ciphertext2;
		
		var plaintext3 = message3.value;
		var ciphertext3 = openpgp.encryptMessage([pub_key],plaintext3);
		message3.value = ciphertext3;
		
		var plaintext4 = message4.value;
		var ciphertext4 = openpgp.encryptMessage([pub_key],plaintext4);
		message4.value = ciphertext4;
		
		return true;
	}    
  } else {
    window.alert("Error: Browser not supported\nReason: We need a cryptographically secure PRNG to be implemented (i.e. the window.crypto method)\nSolution: Use Chrome >= 11, Safari >= 3.1, Firefox >= 21, Opera >= 15 or IE >= 11.");   
    return false;
  }
}

// check the length of the actual message and pad accordingly
function checkparams() {

	if(document.getElementById('thecheckbox').checked){
		return false;
	}
	else {
		// check length of message vs random number length, get stats, determine offset
		var msgSize = document.getElementById("message").value.length;
		var rand1Size = document.getElementById("message1").value.length;
		var rand2Size = document.getElementById("message2").value.length;
		var rand3Size = document.getElementById("message3").value.length;
		var rand4Size = document.getElementById("message4").value.length;		
		var minRand = Math.min(rand1Size, rand2Size, rand3Size, rand4Size);
		var maxRand = Math.max(rand1Size, rand2Size, rand3Size, rand4Size);
		var difRand = maxRand - minRand;
		
		// actual message length should be somewhere within range, but not necessarily the 
		// longest, shortest, or average of the messages sent
		var offset = Math.floor(Math.random() * difRand);
		
		// pad message if shorter than randoms
		if(msgSize < minRand){
			
			// kindly add a newline before the padding
			document.getElementById("message").value += "\n";
			msgSize++;
			
			// add the padding
			for(var i=0; i<(minRand - msgSize + offset); i++){
				var randArray = new Uint32Array(1);
				window.crypto.getRandomValues(randArray);
				document.getElementById("message").value += (randArray[0] % 10);
			}
			
		}
		// pad randoms if shorter than message
		else if (msgSize > maxRand) {
		
			for(var i=0; i<(msgSize - maxRand + offset); i++){
				var randArray = new Uint32Array(4);
				window.crypto.getRandomValues(randArray);
				
				document.getElementById("message1").value += (randArray[0] % 10);
				document.getElementById("message2").value += (randArray[1] % 10);
				document.getElementById("message3").value += (randArray[2] % 10);
				document.getElementById("message4").value += (randArray[3] % 10);
			}
		}	

		return true;
	}
}