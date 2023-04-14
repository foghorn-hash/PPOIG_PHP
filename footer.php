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
// Filename: footer.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

?>

  </div><!-- End of content DIV -->
<div id="footer"></div><!-- This is footer DIV -->
</center>
<!-- FOOTER --> 
</body>
</html>
<?php mysql_close(); // Sulkee MySQL-yhteyden ?>