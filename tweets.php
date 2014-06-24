<?php

/*

TODO List

link @'s and #'s

*/


// Why are we reading from a file? 
// Because we don't want our visitors to have to connect to Twitter directly!
$filename = "recent.txt";
$initTweets = @file($filename);

// add follow div
echo "<div class=\"follow\"><a target=\"_blank\" href=\"https://twitter.com/atxcrypto\">@ATXCrypto</a> Recent Tweets <span id=\"twitterShrink\">_</span></div>\n";


if($initTweets !== FALSE){

	$outTweets = array();
	$numTweets = 16; // how many tweets to load, max about 16

	// from last 5 of input array, trim metadata and send to output array
	for($i=count($initTweets)-1; $i>=count($initTweets)-$numTweets; $i--){

		// init temp var
		$curTweet = $initTweets[$i];

		// clean up the data
		$curTweet = htmlspecialchars(trim(substr($curTweet,strpos($curTweet,">")+1)));

		// add to output array
		if(strlen($curTweet)>0){array_push($outTweets,$curTweet);}

	}

	// box in for scroll
	echo "<div class=\"tweetbox\">\n";

	// format and print tweets
	foreach ($outTweets as $tweet) {
		echo "<div class=\"tweetitem\">";

		// retweet icon
		$RTicon = "<img class=\"rticon\" src=\"images/rticon.png\" />";
		$isRT = substr($tweet,0,2)=="RT";
		if($isRT){
			//$tweet = substr($tweet,3);
			echo $RTicon;
		}

		echo "<span class=\"atxcrypto\"><a target=\"_blank\" href=\"https://twitter.com/atxcrypto\">@ATXCrypto</a>:</span> "; // account name

		$linklist = "<br>";
	
		// extract links
		while(strpos($tweet,"http:")!==FALSE||strpos($tweet,"https:")!==FALSE){
			$firstHTTP = strpos($tweet,"http");
			$extracted = "";
			$url="";
			$isHTTPS = false;
			if(strpos($tweet,"http:")===$firstHTTP || strpos($tweet,"https:")===$firstHTTP && $firstHTTP !== FALSE){
				$isHTTPS = strpos($tweet,"https:")===$firstHTTP;
				$url = substr($tweet,$firstHTTP,strpos("$tweet "," ",$firstHTTP));
				$tweet = substr($tweet,0,$firstHTTP) . substr($tweet,strpos($tweet." "," ",$firstHTTP));
			
			
	
				if($isHTTPS){
					$linklist .= "<a target=\"_blank\" class=\"tweetHTTPS\" href=\"$url\">[ HTTPS Link ]</a> \n";
				}
				else {
					$linklist .= "<a target=\"_blank\" class=\"tweetHTTP\" href=\"$url\">[ HTTP Link ]</a> \n";
				}
			}
		}
	
		if(trim($tweet) === ""){ $tweet = " [Link only] "; }

		echo "<span class=\"tweet\">$tweet</span>\n"; // actual text (minus links)

		// include links after tweet
		echo $linklist;
	
		echo "</div>\n";
	}
	echo "</div>\n";
}
else{
	// box in for scroll
	echo "<div class=\"tweetbox\">\n";
	echo "<div class=\"tweetitem\">An error occured. Tweets were not loaded.</div>\n";
	echo "</div>\n";
	
}
?>