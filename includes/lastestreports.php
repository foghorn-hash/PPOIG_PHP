<?php

// Alla on t‰m‰n tiedoston suojaus: Jos t‰t‰ tiedostoa ei 
// sis‰llytet‰ ./index.php-tiedoston kautta tulee die-k‰skyn 
// teksti
if (!defined($secretkey)) { die ("<br /><bt /><center>Ei oikeuksia t‰h‰n tiedostoon! Mene ../index.php tiedostoon!</center>"); }

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

$result = mysql_query ("SELECT * FROM `ppoig_php_reports` ORDER BY report_id DESC LIMIT 10");
    
    echo '<h1>Uusimmat raportit</h1><table width="100%" border="0" cellspacing="0" cellpadding="5" style="border: 1px #000000 solid;">'
	 .'<tr>'
	  .'<td bgcolor="#333366" style="color: white;" width=\"100\"><b>Raportin Numero</b></td>'
	   .'<td bgcolor="#333366" style="color: white;"><b>Raportin URL</b></td>'
	    .'<td bgcolor="#333366" style="color: white;"><b>IP-osoite</b></td>'
	     .'<td bgcolor="#333366" style="color: white;"><b>ISP</b></td>'
	      .'<td bgcolor="#333366" style="color: white;"><b>Selain</b></td>'
	       .'<td bgcolor="#333366" style="color: white;"><b>P‰iv‰m‰‰r‰ ja kellonaika</b></td>'
	     .'</tr>';
	$iix = 1;
	 while( $rivix = mysql_fetch_row($result) )
     {
       $rivix[0] = stripslashes($rivix[0]);
       $rivix[6] = stripslashes($rivix[6]);
	    if (is_int($iix / 2)) { $colori = "#cccccc"; } else { $colori = "#eeeeee"; }
	 echo "<tr>"
	 ."<td bgcolor=\"$colori\"><!-- LASTEST REPORTS $iix -->\n"
	  ."<span style=\"color: blue;\"><b>$rivix[0]</b></span></td>"
	  ."<td bgcolor=\"$colori\"><a href=\"index.php?page=report&amp;file0=$rivix[1]&amp;file1=$rivix[2]\">Katso raportti</a></td>\n"
	  ."<td bgcolor=\"$colori\">$rivix[3]</td>\n"
	  ."<td bgcolor=\"$colori\">...".stristr($rivix[4], '.')."</td>\n"
	  ."<td bgcolor=\"$colori\">";
	  if ( stristr( $rivix[5], "MSIE" )  && !stristr( $rivix[5], "Opera" ) ) { echo "MSIE"; } 

	   else if ( stristr( $rivix[5], "Opera" ) ){ echo "Opera"; }

	   else if ( stristr( $rivix[5], "Netscape" )  ) { echo "Netscape"; }

	   else if ( stristr( $rivix[5], "Firefox" ) ) { echo "Firefox"; }

	   else if ( !stristr( $rivix[5], "Firefox" ) && stristr( $rivix[5], "Gecko" ) ) { echo "Mozilla"; }

	   else { echo "Tuntematon"; }

	  echo "</td>\n"
	  ."<td bgcolor=\"$colori\">$rivix[6]</td>\n";
	$iix++;
	echo '</tr>';
   }; 
echo '</table><br /><br />';

?>