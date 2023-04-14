<?php 

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: images/confirm.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

// Visuallisen varmistuksen kuva GD2:na

header("Content-type: image/png");

if (file_exists("back00.gif") && file_exists("back01.gif") && file_exists("back02.gif") && file_exists("back03.gif") && file_exists("TYPENR__.TTF")) {
$confirmcodexii = array ('back00.gif','back01.gif','back02.gif','back03.gif');
shuffle($confirmcodexii);
$abcii=0;
$numberiii=1;
while(list(, $codexii[$abcii]) = each($confirmcodexii)) {
       if ($abcii>=$numberiii) { break; }
	   $filename = $codexii;
       $abcii++;
}

$img_src  = imagecreatefromgif ($filename[0]);
$size = getimagesize($filename[0]);
$image = imagecreatefromgif($filename[0]);

$white = imagecolorallocate($image, 255, 255, 255 );
$black = imagecolorallocate($image, 0, 0, 0 );

imagefilledrectangle ($image, 0, 0, $size[0], $size[1], $white);

$opacity = 90;

 imagecopymerge
    ($image, $img_src, 0, 0, 0, 0,
    $size[0], $size[1], $opacity); 
	
	
$font = "TYPENR__.TTF"; 
						
$st = 25;

if (!isset($_GET['confirm'])) { $confirmcode = array ('-','-','-','-','-','-','-'); } else { $confirmcode = $_GET['confirm']; }

$confirmcodexi = array ('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','-1','-2','-3','-4','-5','-6','-7','-8','-9','-10','-11','-12','-13','-14','-15','-16','-17','-18','-19','-20');
shuffle($confirmcodexi); 
$abci=0;
$numberii=7; 
while(list(, $codexi[$abci]) = each($confirmcodexi)) { 
       if ($abci>=$numberii) { break; } 
	   $angle = $codexi; 
       $abci++; 
} 

imageTTFtext ( $image, 40, $angle[0], 40-$st, 50, $white, $font, $confirmcode[0] );
imageTTFtext ( $image, 40, $angle[1], 80-$st, 50, $white, $font, $confirmcode[1] );
imageTTFtext ( $image, 40, $angle[2], 120-$st, 50, $white, $font, $confirmcode[2] );
imageTTFtext ( $image, 40, $angle[3], 160-$st, 50, $white, $font, $confirmcode[3] );
imageTTFtext ( $image, 40, $angle[4], 200-$st, 50, $white, $font, $confirmcode[4] );
imageTTFtext ( $image, 40, $angle[5], 240-$st, 50, $white, $font, $confirmcode[5] );
imageTTFtext ( $image, 40, $angle[6], 280-$st, 50, $white, $font, $confirmcode[6] );

} else { 

$image = imagecreate( 300, 60 ); 

$black = imagecolorallocate($image, 0, 0, 0 );
$white = imagecolorallocate($image, 255, 255, 255 ); 

$font = "Arial"; 
imageTTFtext ( $image, 10, 0, 10, 25, $white, $font, "VIRHE! TTF TAI GIF TIEDOSTOT EI LÖY-" ); 
imageTTFtext ( $image, 10, 0, 10, 45, $white, $font, "DY! VISUAALINEN VARMISTUS EI TOIMI!" ); 

}

imagepng($image);
imagedestroy($image);

?>