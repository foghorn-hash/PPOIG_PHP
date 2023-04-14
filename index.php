<?php 

include("config.inc.php"); // Sisällyttää asetustiedoston

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: index.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

define("$secretkey", null); // Asettaa tiedostojen suojauksen. Salakoodi, josta puhuttiin config.inc.php tiedostossa.
include("functions/functions.php"); // Sisällyttää funktiot
include("header.php"); // Sisällyttää sivun yläosan eli hederin

   // Lista sisällyttettävistä sivuista, jotka sisällytetään URL:sä olevalla page-muuttujalla
    $pages = Array (
				"http_from" => "includes/http_from.php", // http_from.php
                "http_submit" => "includes/http_submit.php", // http_submit.php
				"help" => "includes/help.php", // help.php
				"downloads" => "includes/downloads.php", // downloads.php
				"lastestreports" => "includes/lastestreports.php", // help.php
				"report" => "includes/report.php" // report.php
             );
    
    // Alla oleva tarkistaa on page-muttuja URL:sä. Jos ei niin sivu on http_from.php
	
    $page = isset($_GET["page"]) ? $_GET["page"] : $_GET["page"] = "http_from";
	
	
    // Tarkistetaan onko page-muuttujalla hauttava tiedosto olemassa
    if (isset($pages[$page]) AND file_exists($pages[$page])){
        // Jos kaikki on OK
        include ($pages[$page]);
    } else {
        // Jos tiedosto puuttuuu, sisällytä 404 virhe sivu
        include ("includes/error.php");
    }
    
include("footer.php"); // Sisällyttää sivun alaosan, eli footerin

?>