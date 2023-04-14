<?php

// Alla on tämän tiedoston suojaus: Jos tätä tiedostoa ei 
// sisällytetä ./index.php-tiedoston kautta tulee die-käskyn 
// teksti
if (!defined($secretkey)) { die ("<br /><bt /><center>Ei oikeuksia tähän tiedostoon! Mene ../index.php tiedostoon!</center>"); }

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: includes/downloads.php
// Date: 2.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

$dir = "downloads/";
echo "<h1>Tiedostot</h1>Tällä sivulla on ohjelmaan liittyvät tiedostot.<br />";

// Tämä scripti avaa annetun kansion ja lukee sen 
// sisällön ja tekee kaikki .txt-tiedostot linkeiksi.

$ia = 0;
$iia = 1;
$ib = 0;
$iib = 1;

if (is_dir($dir)) {
   if ($dh = opendir($dir)) {
       while (($file = readdir($dh)) !== false) {
		   if ( stristr( $file, ".txt") ) 
		   {
		   while ($ia < $iia) { echo "<br /><b>Tekstitiedostot:</b><br /><br />"; $ia++; }
           echo "<a href=\"".$dir.$file."\">$file</a><br />" . "\n";
		   }
       }
       closedir($dh);
   }
}

// Alaoleve on scripti, joka hake ppoig_php.php nimisen tiedoston, 
// joka on ohjelman dokumentaation pdf-tiedostoksi generoiva tiedosto.
// Jos haluat käyttöön niin poista sen komentointi /* ja */.
/* $dir = "fpdf/";
if (is_dir($dir)) {
   if ($dh = opendir($dir)) {
       while (($file = readdir($dh)) !== false) {
	       if ( stristr( $file, "ppoig_php.php") ) 
		   {
		   while ($ib < $iib) { echo "<br /><b>Dokumantaatio:</b><br /><br />"; $ib++; }
           echo "<a href=\"".$dir.$file."\" target=\"_blank\">PPOIG_PHP-dokumantaatio.pdf</a><br />" . "\n";
		   }
       }
       closedir($dh);
   }
} */

?>

<br />