<?php 

// Alla on tämän tiedoston suojaus: Jos tätä tiedostoa ei 
// sisällytetä ./index.php-tiedoston kautta tulee die-käskyn 
// teksti
if (!defined($secretkey)) { die ("<br /><bt /><center>Ei oikeuksia tähän tiedostoon! Mene ../index.php tiedostoon!</center>"); }

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: includes/http_from.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################


// Code array for visual confirmation and shuffle and while loop
$confirmcodex = array ('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','0');
shuffle($confirmcodex); // Sekoittaa taulukkomuuttujan $confirmcodex
$abc=0; // Silmukan alkuluku
$numberi=7; // Silmukan loppuluku
 while(list(, $codex[$abc]) = each($confirmcodex)) {
       if ($abc>=$numberi) { break; } // Lopettaa silmukan kun 7 lukua muodostettu
	   $confirmcode = $codex;
       $abc++;
 } // Silmukan (list(, $codex[$abc]) = each($confirmcodex)) loppu

?>
<h1>PPOIG_PHP - File upload and report</h1>
<!-- START OF FORM -->
<form enctype="multipart/form-data" action="index.php?page=http_submit" method="post">
  pisteet.txt 
  <input name="uploader[]" type="file">
  <br />
  <br />
  polygoni.txt 
  <input name="uploader[]" type="file">
  <br />
  <br />
  <?php
if ($visual == 1) { // Jos visuaalin varmistus on pällä tulostaa ohjelma tämän
?>
  <br>
  <br>
  Visuaalisen varmistuksen koodi:<br>
  <br>
  <img src="images/confirm.php?confirm=<?php echo $confirmcode[0].$confirmcode[1].$confirmcode[2].$confirmcode[3].$confirmcode[4].$confirmcode[5].$confirmcode[6]; ?>" alt="confirm"> 
  <br />
  <br />
  Visuaalisen varmistuksen koodi: 
  <input name="validate" type="text" size="20">
  <br />
  <br />
  <input name="hvalidate" type="hidden" value="<?php echo md5($confirmcode[0].$confirmcode[1].$confirmcode[2].$confirmcode[3].$confirmcode[4].$confirmcode[5].$confirmcode[6]); ?>">
  <br />
  <br />
  <?php
} else { // Jos visuaalin varmistus on poissa pältä tulostaa ohjelma tämän
?>
  <input name="validate" type="hidden" value="<?php echo ($confirmcode[0].$confirmcode[1].$confirmcode[2].$confirmcode[3].$confirmcode[4].$confirmcode[5].$confirmcode[6]); ?>">
  <input name="hvalidate" type="hidden" value="<?php echo md5($confirmcode[0].$confirmcode[1].$confirmcode[2].$confirmcode[3].$confirmcode[4].$confirmcode[5].$confirmcode[6]); ?>">
  <?php
}
?>
  <input type="submit" value="Upload" name="upload">
</form>
<!-- END OF FORM -->
  <br />