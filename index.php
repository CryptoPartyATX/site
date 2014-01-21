<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <!-- ALL YOUR ENCRYPTION ARE BELONG TO US -->

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <title>CryptoParty ATX</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Load local copy of Google Web Fonts -->
        <link href='/css/lato.css' rel='stylesheet' type='text/css'>

		<!-- Load main css -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/crypto.css">
        
        <!-- Image expansion -->
        <link href="css/lightbox.css" rel="stylesheet" />
		<script src="/js/jquery-1.10.2.min.js"></script>
		<script src="/js/lightbox-2.6.min.js"></script>

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>

<?php

/* Page selection - default 0 (main page) */
$pageid = $_GET['page'];
if (!$pageid || $pageid>5 || $pageid<0){
	$pageid=0;
}
/* Compatibility for old links */
if($pageid==1.6){$pageid=2.1;}
if($pageid==1.7){$pageid=2.2;}
if($pageid==1.8){$pageid=2.3;}

/* OS Selection - default to Windows */
$os = $_GET['os'];
if(!$os){$os="win";}
if($os != "osx" && $os !="lnx"){$os="win";}

?> 

    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

    <div class="container">

      <div class="row">
        <div class="col-lg-4">

        <a href="?page=0&os=<?php echo $os; ?>"><div class="logo">&nbsp;</div></a>
      
        <div class="list-group">
            <a href="?page=0&os=<?php echo $os; ?>" class="list-group-item<?php if($pageid==0)echo ' active'; ?>">
              About CryptoParty ATX
            </a>
            <a href="?page=1&os=<?php echo $os; ?>" class="list-group-item<?php $inactive=false; if($pageid >= 1 && $pageid < 2)echo ' active'; else $inactive=true; ?>">Encryption How-To Guides</a>
                <a href="?page=1.1&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==1.1)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Email Encryption</a>
                <a href="?page=1.2&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==1.2)echo ' subactive'; if($inactive) echo ' hideme'; ?>">File and Folder Encryption</a>
                <a href="?page=1.3&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==1.3)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Instant Message Encryption</a>
                <a href="?page=1.4&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==1.4)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Text Message (SMS) Encryption</a>
                <a href="?page=1.5&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==1.5)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Encrypted Web Browsing</a>
            <a href="?page=2&os=<?php echo $os; ?>" class="list-group-item<?php $inactive=false; if($pageid >= 2 && $pageid < 3)echo ' active'; else $inactive=true; ?>">Privacy Guides</a>
                <a href="?page=2.6&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==2.6)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Privacy Plug-ins</a>
                <a href="?page=2.1&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==2.1)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Choosing Secure Passwords</a>
                <a href="?page=2.4&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==2.4)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Obscuring Metadata</a>
               	<a href="?page=2.2&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==2.2)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Keysigning and Keyservers</a>
                <a href="?page=2.3&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==2.3)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Securely Erasing Data</a>
                <a href="?page=2.5&os=<?php echo $os; ?>" class="list-group-item sub-item<?php if($pageid==2.5)echo ' subactive'; if($inactive) echo ' hideme'; ?>">Throw a CryptoParty</a>
            <a href="?page=3&os=<?php echo $os; ?>" class="list-group-item<?php if($pageid==3)echo ' active'; ?>">Upcoming Events</a>
            <a href="?page=4&os=<?php echo $os; ?>" class="list-group-item<?php if($pageid==4)echo ' active'; ?>">Contribute</a>
            <a href="?page=5&os=<?php echo $os; ?>" class="list-group-item<?php if($pageid==5)echo ' active'; ?>">Links</a>
        </div>
        <div>Follow <a href="https://twitter.com/atxcrypto">ATXCrypto on Twitter</a></div>
    </div>
    
    
    <div class="col-lg-8">

<!-- BEGIN page-specific content -->
<?php

if ($pageid==0){
	include "content/ATX.html";
}
else if ($pageid==1){
	include "content/how-to.html";
}
	else if ($pageid==1.1){
		include "content/HT-EMAIL.html";
	}
	else if ($pageid==1.2){
		include "content/HT-FILE.html";
	}
	else if ($pageid==1.3){
		include "content/HT-OTR.html";
	}
	else if ($pageid==1.4){
		include "content/HT-SMS.html";
	}
	else if ($pageid==1.5){
		include "content/HT-WEB.html";
	}
else if ($pageid==2){
	include "content/privacy.html";
}		
	else if ($pageid==2.1){
		include "content/HT-PASSWD.html";
	}
	else if ($pageid==2.2){
		include "content/HT-KEYS.html";
	}
	else if ($pageid==2.3){
		include "content/HT-DELETE.html";
	}
	else if ($pageid==2.4){
		include "content/HT-META.html";
	}
	else if ($pageid==2.5){
		include "content/HT-PARTY.html";
	}
	else if ($pageid==2.6){
		include "content/HT-PLUGINS.html";
	}
else if ($pageid==3){
	include "content/events.html";
}
else if ($pageid==4){
	include "content/contrib.html";
}
else if ($pageid==5){
	include "content/links.html";
}

?>
<!-- END page-specific content -->
        
        <hr>
        
<!-- BEGIN copyright notice -->
<p class="copyleft" xmlns:dct="http://purl.org/dc/terms/" xmlns:vcard="http://www.w3.org/2001/vcard-rdf/3.0#">
	<a rel="license" href="http://creativecommons.org/publicdomain/zero/1.0/"><img src="/images/cc0.png" style="border-style: none;" alt="CC0" /></a>
	&nbsp;To the extent possible under law,  <a rel="dct:publisher" href="https://cryptopartyatx.org">CryptoPartyATX.org</a> has waived all copyright and related or neighboring rights to <span property="dct:title">CryptoPartyATX.org</span>.
 	The applications referenced on this site are open-source unless otherwise noted and can be obtained at the creators' websites, listed when used. We have no affiliation with any linked site unless otherwise noted.</p>
<!-- END copyright notice -->


<!-- Contact info -->
<p><strong>Contact Us!</strong> If you need any help, find problems with the site, or have improvements or suggestions, please contribute to the <a href="https://github.com/CryptoPartyATX/site">git repo</a> or email me at <a href="mailto:plexiglass@riseup.net">plexiglass@riseup.net</a>.</p>



        </div> <!-- /col-lg-8 -->
      </div> <!-- /row -->

    </div> <!-- /container -->        
    
      
    </body>
</html>
