<?php 

// Alla on tämän tiedoston suojaus: Jos tätä tiedostoa ei 
// sisällytetä ./index.php-tiedoston kautta tulee die-käskyn 
// teksti
if (!defined($secretkey)) { die ("<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<hr>
<address>Apache/2.0.54 PHP/4.4.0 Server Port 80</address>
</body></html>"); }

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: header.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head xmlns="http://www.w3.org/1999/xhtml">
<title>PPOIG_PHP</title>
<meta http-equiv="expires" content="Wed, 26 Feb 1995 08:21:57 GMT" />
<meta name="robots" content="noindex,follow" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- HEADER -->
<center>
<div id="header" align="left"><a href="index.php?page=http_from">Etusivu</a> | <a href="index.php?page=help">Ohjeet</a> | <a href="index.php?page=downloads">Tiedostot</a> | <a href="index.php?page=lastestreports">Uusimmat raportit</a></div><!-- This is header DIV -->
<div id="content"> <!-- Start of content DIV -->