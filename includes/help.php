<?php

// Alla on t�m�n tiedoston suojaus: Jos t�t� tiedostoa ei 
// sis�llytet� ./index.php-tiedoston kautta tulee die-k�skyn 
// teksti
if (!defined($secretkey)) { die ("<br /><bt /><center>Ei oikeuksia t�h�n tiedostoon! Mene ../index.php tiedostoon!</center>"); }

// ###############################################
// This file belongs to PPOIG_PHP
// Filename: includes/help.php
// Date: 28.5.2006
// Author's name: Matti Kiviharju
// Author's e-mail: matti.kiviharju@i3dftc.com
// Author's mobilephone: +358 40 8216 022
// Author's Skype ID: rule-of-three
// Author's homepage: http://www.i3dftc.com
// Author's address: Ilmarinkatu 34 A 5, 22500 TAMPERE, FINLAND
// ###############################################

?>
<div align="left"> 
  <h1>Ohjeet</h1>
  <!-- Start of list -->
  <ol>
    <li> Tee tekstitiedostot pisteet.txt ja polygoni.txt notebad ty�kalulla. Tiedosto 
      pisteet.txt on pisteiden koordinaatteja varten ja polygoni.txt polygonin 
      kulma pisteiden koordinaatteja varten. </li>
    <li> Sy�t� molempiin lukupareja v�lill� 0-400. Ensimm�inen luku on x- ja toinen 
      y-koordinaatti. N�m� kaikki sy�tet��n per�kk�in ilman rivinvaihtoa ja erotetaan 
      seuraavilla merkeill�: ( , . - ; : ' ). Voit my�s laittaa lukujen sijasta 
      kirjaimia, jotka ohjelma muuttaa nollaksi ja arpoo siit� satunnaisluvun 
      v�lill� 0-400. Jos luvut ei ole v�lill� 0-400 korjaa ohjelma virheen automaattisesti. 
    </li>
    <li> N�it� koordinaatteja, k�ytet��n polygonin ja pisteiden piirt�miseen n�yt�lle 
      tiedostojen sis�lt� raportissa. </li>
    <li> Lataa tiedostot palvelimelle etusivun lomakkeella (pisteet.txt pit�� 
      olla ensimm�isess� kent�ss� tai muuten lataus ei onnistu). </li>
    <li> Jos yll�pito on laittanut visuaalisen varmistuksen p��lle voi olla vaikeaa 
      tunnistaa mik� merkki on oikeasti kyseess�. Jos n�et visuaalisen varmistuksen 
      lataussivulla niin sy�t� kuvan koodi sen alla olevaan kentt��n tai muuten 
      lataus ei onnistu. </li>
    <li> T�m�n j�lkeen ohjelma ilmoittaa onko tiedostojen lataus palvelimelle 
      on onnistunut ja antaa linkin, josta saat raportin koordinaateista visuaalisessa 
      muodossa. </li>
    <li> Jos numeroparien lukum��r� ei ole parillinen ei ohjelma ei tulosta raporttia, 
      joten ole varma, ett� tiedostojen numeroparien lukum��r� on parillinen. 
      Ohjelma my�s tunnistaa jos, joku on poistanut tiedostot ennen kuin raportti 
      tulostetaan n�yt�lle. </li>
    <li> Voit katsoa my�s viimeisimpi� raportteja muiden k�ytt�jien l�hett�min�. 
    </li>
  </ol>
  <!-- End of list -->
</div>
  <br />