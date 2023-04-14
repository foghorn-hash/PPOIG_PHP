<?php

// Alla on tämän tiedoston suojaus: Jos tätä tiedostoa ei 
// sisällytetä ./index.php-tiedoston kautta tulee die-käskyn 
// teksti
if (!defined($secretkey)) { die ("<br /><bt /><center>Ei oikeuksia tähän tiedostoon! Mene ../index.php tiedostoon!</center>"); }

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: includes/report.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

if (isset($_GET["file0"]) && isset($_GET["file1"] ))
{

 echo "<h1>Raportti</h1>";
 
  $timex = date("d.m.y G:i:s", $ts);
  $filename0 = "uploads/".$_GET['file0'];
  $filename1 = "uploads/".$_GET['file1'];
  
   if (file_exists("uploads/".$_GET['file1']) && file_exists("uploads/".$_GET['file0'])) { 
    $fd0 = fopen ($filename0 , "r");
	
      if (filesize ($filename0) > 0) {
        $fstring0 = fread ($fd0 , filesize ($filename0));
       print "<b>Ote tiedoston pisteet.txt sisällöstä: ".substr($fstring0, 0, 60)."...</b>";
        $orig0 = array (".", "-", ";", ":", "'");
        $vars0 = str_replace($orig0, ',', $fstring0);
        $pisteet = explode(",", $vars0);
		
         foreach ($pisteet as $i0 => $error0) { 
		 // Foreach-silmukkaa voidaan käyttää taulukkomuuttujien 
		 // sisällön ajamiseen suodattimen läpi. Sudatukset ehto-
		 // lauseilla: Esim: Jos $error on suurempi kuin 1000
		 // silloin $array[$i] on jotain.
		   if (!is_numeric($error0)) { // Suodattimet alku
               settype($pisteet[$i0], integer );
               $pisteet[$i0] = $pisteet[$i0] + rand(0, 400);
            }
			
               else if ($error0 > 400) {
                 $pisteet[$i0] = 400; 
               }
			   
                  else if ($error0 < 0) {
                    $pisteet[$i0] = 0;
                  } // Suodattimet loppu
				  
         } // Lauseen foreach ($pisteet as $i0 => $error0) loppu
		 
if (!is_integer(count ($pisteet)/2)) {echo "<br /><br /><b style=\"color: red;\">Varoitus! Tiedoston pisteet.txt sisältämien muuttujien lukumäärä ei ole parillinen!</b>";} 


$urli0 = implode(",", $pisteet);

if ($debug == "1") { print "<br /><br />"; print_r($pisteet); }

} else { echo "Tiedosto ".$_GET['file0']." on tyhjä!"; }

fclose($fd0) ;

$fd1 = fopen ($filename1 , "r");
 if (filesize ($filename1) > 0) {
    $fstring1 = fread ($fd1 , filesize ($filename1));
   print "<br /><br /><b>Ote tiedoston polygoni.txt sisällöstä: ".substr($fstring1, 0, 60)."...</b>";
    $orig1 = array (".", "-", ";", ":", "'");
    $vars1 = str_replace($orig1, ',', $fstring1);
    $polygoni = explode(",", $vars1);
  foreach ($polygoni as $i1 => $error1) {
  // Foreach-silmukkaa voidaan käyttää taulukkomuuttujien 
  // sisällön ajamiseen suodattimen läpi. Sudatukset ehto-
  // lauseilla: Esim: Jos $error on suurempi kuin 1000
  // silloin $array[$i] on jotain.
    if (!is_numeric($error1)) { // Suodattimet alku
      settype($polygoni[$i1], integer );
       $polygoni[$i1] = $polygoni[$i1] + rand(0, 400);
     }
      else if ($error1 > 400) {
       $polygoni[$i1] = 400;
      }
       else if ($error1 < 0) {
        $polygoni[$i1] = 0;
       } // Suodattimet loppu
} // Lauseen foreach ($polygoni as $i1 => $error1) loppu

 if (!is_integer(count ($polygoni)/2)) {echo "<br /><br /><b style=\"color: red;\">Varoitus! Tiedoston polygoni.txt sisältämien muuttujien lukumäärä ei ole parillinen!</b>";}
  
  $urli1 = implode(",", $polygoni);
   if ($debug == "1") { echo "<br /><br />"; print_r($polygoni); }
    } else { echo "<br /><br />Tiedosto ".$_GET['file1']." on tyhjä!"; }

fclose($fd1) ;

if (is_integer(count ($polygoni)/2) && is_integer(count ($pisteet)/2)) { 

$result = mysql_query ("SELECT * FROM `ppoig_php_reports` WHERE file0 = '".$_GET["file0"]."' AND file1 = '".$_GET["file1"]."' ");
$id = mysql_fetch_row($result);
echo "<br /><br /><b>Raportin ulostulo</b><br /><br /><img src=\"images/polygoni.php?pisteet=".$urli0."&amp;polygoni=".$urli1."\" alt=\"raportti\" class=\"report\" height=\"800\" width=\"680\">"
."<br /><br /><a href=\"fpdf/report.php?pisteet=".$urli0."&amp;polygoni=".$urli1."&amp;date=".str_replace(array (':',' ','.'),'-',$id[6])."&amp;id=".$id[0]."\" target=\"_blank\">Raportin PDF-dokumentti</a>";

  } else { echo "<br /><br /><b style=\"color: red;\">Yksi tiedosto sisälsi virheen! Raporttia ei voi tulostaa!</b>";}

} else { echo  "<br /><br /><b style=\"color: red;\">Jompikumpi tiedostoista ei löytynyt! Raporttia ei voi tulostaa!</b>"; };


$fcounted = "<br /><br /><b>Sinun tiedot</b><br />IP-osoite: ".getenv("REMOTE_ADDR")."<br />ISP: ".gethostbyaddr(getip())."<br />Selain: ".getenv("HTTP_USER_AGENT"); 

echo $fcounted;

}
else
{
echo "Tiedostot ei ole asetettu URL-osoitteen muuttujiin!"; // Prints Files is not set in URL string
} // Else-osan loppu

// MySQL Query: SELCET 10 viimeisintä raporttia
$result = mysql_query ("SELECT * FROM `ppoig_php_reports` ORDER BY report_id DESC LIMIT 10");
    
    echo '<br /><br /><h1>Uusimmat raportit</h1><table width="100%" border="0" cellspacing="0" cellpadding="5" style="border: 1px #000000 solid;">'
	 .'<tr>'
	  .'<td bgcolor="#333366" style="color: white;" width=\"100\"><b>Raportin Numero</b></td>'
	   .'<td bgcolor="#333366" style="color: white;"><b>Raportin URL</b></td>'
	    .'<td bgcolor="#333366" style="color: white;"><b>IP-osoite</b></td>'
	     .'<td bgcolor="#333366" style="color: white;"><b>ISP</b></td>'
	      .'<td bgcolor="#333366" style="color: white;"><b>Selain</b></td>'
	       .'<td bgcolor="#333366" style="color: white;"><b>Päivämäärä ja kellonaika</b></td>'
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
echo '</table>';

?>
  <br />