<?php 

// Alla on t�m�n tiedoston suojaus: Jos t�t� tiedostoa ei 
// sis�llytet� ./index.php-tiedoston kautta tulee die-k�skyn 
// teksti
if (!defined($secretkey)) { die ("<br /><bt /><center>Ei oikeuksia t�h�n tiedostoon! Mene ../index.php tiedostoon!</center>"); } 

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: includes/error.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

?>
  <br />
404 - Sivu ei l�ydy
  <br />