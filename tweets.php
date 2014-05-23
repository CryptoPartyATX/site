<style>

.atxcrypto {
	font-family: "Lato";
	font-size:8pt;
	font-weight:300;
	color: blue;
}
.tweetitem {
	display:block;
	background:#FFFFFF;
	border: 1px solid #DDD;
	padding:.4em .6em 1.4em .6em;
	/*width:250px;*/
	margin:auto;
	margin-bottom:-1px;
	text-align:justify;
}
.tweet {
	font-family: "Lato";
  	font-weight: 300;
	font-size:9pt;

}
.rticon {
	height:.6em;
	padding-right:.2em;
}
.tweetHTTP, .tweetHTTPS {
	text-decoration:none;
	color:#333388;
	font-family: "Lato";
	font-weight: 300;
	font-size: 9pt;
	float:right;
	margin-right:.1em;
}
.tweetHTTPS {
	color:#338833;
}
.tweetHTTP:hover, .tweetHTTPS:hover {
	text-decoration:underline;
}
.follow {
	display:block;
	background-image: linear-gradient(to bottom, #428BCA 0px, #3278B3 100%);
	border-radius:5px 5px 0px 0px;
	border: 1px solid #DDD;
	padding:.2em .4em .2em .4em;
	margin:auto;
	margin-bottom:-1px;
	margin-top:1em;
	font-weight:400;
	color:#333333;
}
.follow a {
	color:white;
}
.follow a:hover {
	text-decoration:underline;
}
</style>

<?php

/*

TODO List

link @'s and #'s

*/


// Why are we reading from a file? 
// Because we don't want our visitors to have to connect to Twitter directly!
$filename = "recent.txt";
$initTweets = file($filename);


$outTweets = array();
$numTweets = 3; // how many tweets to load, max about 15

// trim metadata from last 5 of input array, send to output array
for($i=count($initTweets); $i>=count($initTweets)-$numTweets; $i--){

	// init temp var
	$curTweet = $initTweets[$i];

	// clean up the data
	$curTweet = htmlspecialchars(trim(substr($curTweet,strpos($curTweet,">")+1)));

	// add to output array
	if(strlen($curTweet)>0){array_push($outTweets,$curTweet);}

}

// add follow div
echo "<div class=\"follow\"><a href=\"https://twitter.com/atxcrypto\">@ATXCrypto</a> Recent Tweets</div>";

// format tweet and display
foreach ($outTweets as $tweet) {
	echo "<div class=\"tweetitem\">";

	// retweet icon
	$RTicon = "<img class=\"rticon\" src=\"images/rticon.png\" />";
	$isRT = substr($tweet,0,2)=="RT";
	if($isRT){
		//$tweet = substr($tweet,3);
		echo $RTicon;
	}

	echo "<span class=\"atxcrypto\"><a href=\"https://twitter.com/atxcrypto\">@ATXCrypto</a>:</span> "; // account name

	$linklist = "<br>";
	
	// extract links
	while(strpos($tweet,"http:")||strpos($tweet,"https:")){
		$firstHTTP = strpos($tweet,"http");
		$extracted = "";
		$url="";
		$isHTTPS = false;
		if(strpos($tweet,"http:")===$firstHTTP || strpos($tweet,"https:")===$firstHTTP && $firstHTTP !== FALSE){
			$isHTTPS = strpos($tweet,"https:")===$firstHTTP;
			$url = substr($tweet,$firstHTTP,strpos("$tweet "," ",$firstHTTP));
			$tweet = substr($tweet,0,$firstHTTP) . substr($tweet,strpos($tweet." "," ",$firstHTTP));
			
			
	
			if($isHTTPS){
				$linklist .= "<a class=\"tweetHTTPS\" href=\"$url\">[ HTTPS Link ]</a> \n";
			}
			else {
				$linklist .= "<a class=\"tweetHTTP\" href=\"$url\">[ HTTP Link ]</a> \n";
			}
		}
	}
	


	echo "<span class=\"tweet\">$tweet</span>\n"; // actual text (minus links)

	// include links after tweet
	echo $linklist;
	
	echo "</div>";
}

?>