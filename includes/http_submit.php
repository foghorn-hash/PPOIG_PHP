<br />
<?php

// Alla on t‰m‰n tiedoston suojaus: Jos t‰t‰ tiedostoa ei 
// sis‰llytet‰ ./index.php-tiedoston kautta tulee die-k‰skyn 
// teksti
if (!defined($secretkey)) { die ("<br /><bt /><center>Ei oikeuksia t‰h‰n tiedostoon! Mene ../index.php tiedostoon!</center>"); }

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: includes/http_submit.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

// T‰m‰n scriptin on tarkoitus siirt‰‰ tiedostot palvelimelle

if (md5($_POST['validate']) == $_POST['hvalidate']) 
{ // Lauseen if (md5($_POST['validate']) == $_POST['hvalidate']) alku

$upload = $uploaddir . '/';

$fileprefix = md5($_POST['validate']);

echo '<pre>';

  foreach ($_FILES["uploader"]["error"] as $key => $error) { // Siirt‰‰ kaikki tiedostot palvelimelle
                                                           // Tiedostonimet on satunnaista mallia:
														   // 0_b052680166dbd275bdae99474f1a1b4d-pisteet.txt
														   // ja
														   // 1_b052680166dbd275bdae99474f1a1b4d-polygoni.txt
														   // HUOM: Samalla nimell‰ siirretyt tiedostot menev‰t
														   // vanhojen p‰‰lle ja vanhat menetet‰‰n
   if ($error == UPLOAD_ERR_OK) { // Virheiden tarkistus
      if ($_FILES["uploader"]["name"][0] == "") { echo "Tiedosto pisteet.txt puuttuu!"
	  ."<br /><br />Ohjataan takaisin lomakesivulle 5 sekunnin kuluttua!<br /><br />"
      ."Jos et halua odottaa klikkaa linkki‰ <a href=\"index.php?page=http_from\">index.php?page=http_from</a>.<br /><br />";
	  redirect("index.php?page=http_from", "5"); 
	  // Uudelleenohjaa etusivulle
	  break; // Lopettaa silmukan jos tiedosto 0 puuttuu
	  }
       if ($_FILES["uploader"]["name"][1] == "") {echo "Tiedosto polygoni.txt puuttuu!"
	   ."<br /><br />Ohjataan takaisin lomakesivulle 5 sekunnin kuluttua!<br /><br />"
       ."Jos et halua odottaa klikkaa linkki‰ <a href=\"index.php?page=http_from\">index.php?page=http_from</a>.<br /><br />";
	    redirect("index.php?page=http_from", "5"); 
		// Uudelleenohjaa etusivulle
		break; // Lopettaa silmukan jos tiedosto 1 puuttuu
		} 
        if(!preg_match("/polygoni.txt$|pisteet.txt$/i", $_FILES['uploader']['name'][$key])) {echo "Jommankumman tiedoston tyyppi tai nimi on v‰‰r‰!"
		."<br /><br />Ohjataan takaisin lomakesivulle 5 sekunnin kuluttua!<br /><br />"
        ."Jos et halua odottaa klikkaa linkki‰ <a href=\"index.php?page=http_from\">index.php?page=http_from</a>.<br /><br />";
		 redirect("index.php?page=http_from", "5"); 
		 // Uudelleenohjaa etusivulle
		 break; // Lopettaa silmukan jos tiedostonimet ovat v‰‰r‰t
		 }
	     if (stristr( $_FILES["uploader"]["name"][1], "pisteet.txt" ) && stristr( $_FILES["uploader"]["name"][0], "polygoni.txt" )) {echo "Tiedostojen j‰rjestys on v‰‰r‰!"
		 ."<br /><br />Ohjataan takaisin lomakesivulle 5 sekunnin kuluttua!<br /><br />"
         ."Jos et halua odottaa klikkaa linkki‰ <a href=\"index.php?page=http_from\">index.php?page=http_from</a>.<br /><br />";
		  redirect("index.php?page=http_from", "5");
		  // Uudelleenohjaa etusivulle
		  break; // Lopettaa silmukan jos tiedostot oli v‰‰r‰ss‰ j‰rjestyksess‰
		  }
		  if ($_FILES["uploader"]["name"][0] == $_FILES["uploader"]["name"][1]) {echo "Tiedostojen nimet oli samat!"
		  ."<br /><br />Ohjataan takaisin lomakesivulle 5 sekunnin kuluttua!<br /><br />"
          ."Jos et halua odottaa klikkaa linkki‰ <a href=\"index.php?page=http_from\">index.php?page=http_from</a>.<br /><br />";
		   redirect("index.php?page=http_from", "5"); 
		   // Uudelleenohjaa etusivulle
		   break; // Lopettaa silmukan jos tiedostonimet on samat
		   }
	   $tmp_name = $_FILES["uploader"]["tmp_name"][$key]; 
       $name = $_FILES["uploader"]["name"][$key];
	   
	   move_uploaded_file($tmp_name, $upload.$key.'_'.$fileprefix.'-'.$name); // Siirt‰‰ tiedostot temp kansiosta uploads-kansioon
	   echo "Tiedosto ".$name." on siirretty palvelimelle\n";
	   $key1[$key] = $key;
	   $name1[$key] = $name;
	   $fileprefix1[$key] = $fileprefix;
   } // Lauseen if ($error == UPLOAD_ERR_OK) loppu
   else // Else-osan alku
   {
   if ($key == 1) { echo "Mahdollinen file-upload-hyˆkk‰ys tapahtunut!\n"
   ."<br />Ohjataan takaisin lomakesivulle 5 sekunnin kuluttua!<br /><br />"
   ."Jos et halua odottaa klikkaa linkki‰ <a href=\"index.php?page=http_from\">index.php?page=http_from</a>.<br /><br />";
   redirect("index.php?page=http_from", "5"); // Uudelleenohjaa etusivulle
    } // T‰m‰ jos tapahtui mahdollinen file-upload hyˆkk‰ys 
   } // Else-osan loppu
} // Lauseen foreach ($_FILES["uploader"]["error"] as $key => $error) loppu

       if ($error == UPLOAD_ERR_OK && !stristr( $_FILES["uploader"]["name"][0], "polygoni.txt" ) && !stristr( $_FILES["uploader"]["name"][1], "pisteet.txt" ) && $_FILES["uploader"]["name"][0] != "" && $_FILES["uploader"]["name"][1] != "" && preg_match("/polygoni.txt$|pisteet.txt$/i", $_FILES['uploader']['name'][0]) && preg_match("/polygoni.txt$|pisteet.txt$/i", $_FILES['uploader']['name'][1])) { echo "<br /><br />"
          ."Jos haluat raportin tiedostojen sis‰llˆst‰ klikkaa linkki‰ <a href=\"index.php?page=report&amp;file0=".$key1[0]."_".$fileprefix1[0]."-".$name1[0]."&amp;file1=".$key1[1]."_".$fileprefix1[1]."-".$name1[1]."\">index.php?page=report...</a>.<br /><br />";
	       $timex = date("d.m.y G:i:s", $ts);
	         mysql_query ("INSERT DELAYED IGNORE INTO `ppoig_php_reports` (`report_id`, `file0`, `file1`, `user_ip`, `user_isp`, `usr_agent`, `date_and_time`) VALUES ('', '".$key1[0]."_".$fileprefix1[0]."-".$name1[0]."', '".$key1[1]."_".$fileprefix1[1]."-".$name1[1]."', '".getenv("REMOTE_ADDR")."', '".gethostbyaddr(getip())."', '".getenv("HTTP_USER_AGENT")."', '".$timex."')"); }
	     
		 if ($debug == "1") { echo '<br />T‰ss‰ debug: ';
          print_r($_FILES);
	      echo '<br />'; } // Lauseen if ($debug == "1") loppu
	   
print "</pre>"; // PRE tag end
} // Lauseen if (md5($_POST['validate']) == $_POST['hvalidate']) loppu
else 
{ // Lauseen if (md5($_POST['validate']) == $_POST['hvalidate']) else-osan alku
 
 // Tulostetaan t‰m‰ jos visuaalinen varmistus ei onnistunut
 echo "Visuaalinen varmistus koodi on v‰‰rin!\n"
 ."<br /><br />Ohjataan takaisin lomakesivulle 5 sekunnin kuluttua!<br /><br />"
 ."Jos et halua odottaa klikkaa linkki‰ <a href=\"index.php?page=http_from\">index.php?page=http_from</a>.";


 redirect("index.php?page=http_from", "5"); // Uudelleenohjaa etusivulle

} // Lauseen if (md5($_POST['validate']) == $_POST['hvalidate']) else-osan loppu

?>
<br />