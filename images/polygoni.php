<?php 

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: images/polygoni.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

// Botteri-scripti

header("Content-type: image/png");
if (file_exists("Bell Gothic Bold BT.ttf") && file_exists("Typo Negative.ttf")) {
$image = imagecreate( 680, 800 );
$black = imagecolorallocate( $image, 0,0,0 ); 
$blue = imagecolorallocate( $image, 0,0,255 );
$red = imagecolorallocate( $image, 255,0,0 );
$green = imagecolorallocate( $image, 0,255,0 );
$brightgreen = imagecolorallocate( $image, 0,180,0 );
$darkgreen = imagecolorallocate( $image, 0,100,0 );
$white = imagecolorallocate( $image, 255,255,255 );
$inside = imagecolorallocate( $image, 255,255,0 );
$outside = imagecolorallocate( $image, 255,0,255 );
$boundary = imagecolorallocate( $image, 150,100,255 );
$dark = imagecolorallocate( $image, 80,80,80 );
$points = @explode(",", $_GET['polygoni']);
$point = @explode(",", $_GET['pisteet']);
imagefilledrectangle ($image, 0, 400, 680, 800, $dark);
imagefilledrectangle ($image, 400, 0, 680, 800, $dark);


$iia=220;
$aai=1;
$uua=0;
$uuaa=0;
while ($aai < $iia) {
imagearc($image, 0, 0, 0+$uua+$uuaa, 0+$uua+$uuaa, 40, 100, $black);
$uua+=5;
if (is_int($aai /2)) { $uuaa+=1; }
$aai++;
}

$iia=220;
$aai=1;
$uua=0;
$uuaa=0;
while ($aai < $iia) {
imagearc($image, 680, 0, 0+$uua+$uuaa, 0+$uua+$uuaa, 0, 160, $black);
$uua+=5;
if (is_int($aai /2)) { $uuaa+=1; }
$aai++;
}

$iia=220;
$aai=1;
$uua=0;
$uuaa=0;
while ($aai < $iia) {
imagearc($image, 680, 800, 0-$uua-$uuaa, 0-$uua-$uuaa, 0, 160, $black);
$uua+=5;
if (is_int($aai /2)) { $uuaa+=2; }
$aai++;
}

$iia=100;
$aai=1;
$uua=0;
$uuaa=0;
while ($aai < $iia) {
imagearc($image, 0, 800, 0-$uua-$uuaa, 0-$uua-$uuaa, 50, 0, $black);
$uua+=5;
if (is_int($aai /2)) { $uuaa+=4; }
$aai++;
}

$font = "Bell Gothic Bold BT.ttf";
$fontix = "Typo Negative.ttf";

imagefilledpolygon( $image, $points, count ( $points )/2, $blue ); 
imagepolygon( $image, $points, count ( $points )/2, $boundary );

$key1 = 0;
$key2 = 1;
$keyx = 1;
$text = 20;
$textb = 20;
$palsta = 10;

$numberi = count ($point);

while ($key1 < $numberi) {

 if ( $keyx > 60 ) { imageTTFtext ( $image, 18, 0, 440, 25+$text, $green, $fontix, "Raportista" ); imageTTFtext ( $image, 18, 0, 440, 45+$text, $green, $fontix, "loppui tila" ); break; }

  imagearc ( $image, $point[$key1], $point[$key2], 10, 10, 0, 360, $red );
   $curpixel[$key1] = imagecolorat($image, $point[$key1], $point[$key2]);
   imagesetpixel ( $image, $point[$key1], $point[$key2], $curpixel[$key1] );
 
	if ($curpixel[$key1] == $black || $curpixel[$key1] == $green || $curpixel[$key1] == $darkgreen 
	|| $curpixel[$key1] == $brightgreen || $curpixel[$key1] == $dark || $curpixel[$key1] == $white ) 
	{imageTTFtext ( $image, 9, 0, 440, 10+$text, $outside, $font, "Piste ".$keyx." on polygonin ulkopuolella!" );}
	  
     else if ($curpixel[$key1] == $blue) 
	  {imageTTFtext ( $image, 9, 0, 440, 10+$text, $inside, $font, "Piste ".$keyx." on polygonin sisällä!" );}
		
	  else if ($curpixel[$key1] == $boundary) 
	   {imageTTFtext ( $image, 9, 0, 440, 10+$text, $boundary, $font, "Piste ".$keyx." on polygonin reunaviivalla!" );}
      
	   else {imageTTFtext ( $image, 9, 0, 440, 10+$text, $white, $font, "Pisteen ".$keyx." sijaintia ei voitu määrittää!" );}
		
        while ($keyx > 30) 
        { 
          if ( $keyx > 31 ) { break; }
          $palsta = 210;
          $textb = 20;
          break;
        } 

imageTTFtext ( $image, 9, 0, 10+$palsta, 420+$textb, $white, $font, "Pisteen ".$keyx." koordinaatit: x= ".$point[$key1].", y= ".$point[$key2] );
 
imageTTFtext ( $image, 15, -5, $point[$key1]-15, $point[$key2]-5, $green, $font, $keyx );

$key1 +=2;
$key2 +=2;
$keyx++;
$text +=12;
$textb +=12;
}

// Vertikaaliset
$ii=21;
$aa=1;
$uu=20;
while ($aa < $ii) {
if ($uu == 400 || $uu == 300 || $uu == 200 || $uu == 100) {$clr = $brightgreen;} else {$clr = $darkgreen;} 
imagedashedline($image, 0+$uu, 0, 0+$uu, 400, $clr); 
imageTTFtext ( $image, 7, -5, -5+$uu, 415, $white, $font, $uu );
$uu+=20;
$aa++;
}

// Horisontaaliset
$iii=21;
$aaa=1;
$uuu=20;
while ($aaa < $iii) {
if ($uuu == 300 || $uuu == 200 || $uuu == 100) {$clrr = $brightgreen;} else {$clrr = $darkgreen;} 
imageline($image, 0, 0+$uuu, 400, 0+$uuu, $clrr);  
imageTTFtext ( $image, 7, -5, 405, 5+$uuu, $white, $font, $uuu );
$uuu+=20; 
$aaa++;
}

} else {

$image = imagecreate( 680, 800 );

$black = imagecolorallocate($image, 0, 0, 0 );
$white = imagecolorallocate($image, 255, 255, 255 );

$font = "Arial";

imageTTFtext ( $image, 10, 0, 10, 25, $white, $font, "VIRHE! TTF TIEDOSTOT EI LÖYDY! RAPORT-" );
imageTTFtext ( $image, 10, 0, 10, 45, $white, $font, "TI EI TOIMI! OTA YHTEYS YLLÄPITOON!" );

}

imagepng($image);
imagedestroy($image);

?>