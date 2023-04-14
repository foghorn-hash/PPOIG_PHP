<?php 

// Alla on tämän tiedoston suojaus: Jos tätä tiedostoa ei 
// sisällytetä ./index.php-tiedoston kautta tulee die-käskyn 
// teksti
if (!defined($secretkey)) { die ("<br /><bt /><center>Ei oikeuksia tähän tiedostoon! Mene ../index.php tiedostoon!</center>"); }

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: functions/functions.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################


function redirect($url, $timeout) 
// Käyttö: redirect("index.php?page=http_from", "5"); 
{
echo "<meta http-equiv=\"Refresh\" content=\"$timeout; url=$url\">";
}

function getip () {
  if (isset($_SERVER)) { 
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {$rip = $_SERVER["HTTP_X_FORWARDED_FOR"];} 
    elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {$rip = $_SERVER["HTTP_CLIENT_IP"];} 
    else {$rip = $_SERVER["REMOTE_ADDR"];} 
  } else { 
    if (getenv("HTTP_X_FORWARDED_FOR")) {$rip = getenv("HTTP_X_FORWARDED_FOR");} 
    elseif (getenv("HTTP_CLIENT_IP")) {$rip = getenv("HTTP_CLIENT_IP");} 
    else {$rip = getenv("REMOTE_ADDR");} 
  } 
  return $rip; 
}
// Käyttö: getenv("REMOTE_ADDR") == IP-osoitet
// gethostbyaddr(getip()) == Hostnimi josta näkee käytäjän palveluntarjoajan eli ISP:n
// getenv("HTTP_USER_AGENT") == Selain
// getip() ottaa sen mikä on saatavilla.

?>