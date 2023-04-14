<?php 

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: config.inc.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

// Asetukset

$database = "ppoigphp"; // Tietokannan nimi
$dbuser = ""; // Tietokannan käyttäjänimi
$dbpasswd = ""; // Tietokannan salasana
$dbhost = ""; // Tietokannan hostnimi 'localhost' tai esim. 'mysql4.myhost.com'
$secretkey = "salakoodi"; // Salakoodi tiedostoille jotka tarvitsevat toimiakseen ./index.php tiedoton
$url_prefix = "http://www.foo.com/PPOIG_PHP/"; // URL ohjelman roottiin
$uploaddir = ""; // Upload-kansio, Windows: C:\kansio\uploads Linux var/usr/localhost/public_html/uploads
$debug = 0; // Debug mode päälle ja pois: päällä = 1 ja pois = 0
$visual = 0; // Visuaalinen varmistus: päällä = 1 ja pois = 0
$ts = mktime ( date("G")+10, date("i")+0, date("s")+0, date("m")+0, date("d")+0, date("y")+0); 
// $ts tarvitaan jos serverin kello on väärässä
// Käyttö: 
// date("G")+10 = +10 tunteihin
// date("i")+0 = +0 minuutteihin
// date("s")+0 = +0 sekunteihin 
// date("m")+0 = +0 kuukauksiin
// date("d")+0 = +0 päiviin
// date("y")+0 = + 0 vuosiin

// MySQL-yhteys | HUOM! Käsky die on virheilmoitusta varten, joka lopettaa ohjelman virheilmoitukseen
mysql_connect($dbhost,$dbuser,$dbpasswd) or die ('<br /><b>Virhe! Ei saada yhteyttä MySQL-tietokantaan!</b>');
mysql_select_db($database) or die ('<br /><b>Virhe! MySQL-tietokanta ei löydy!</b>');

?>