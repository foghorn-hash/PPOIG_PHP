<?php

// Alla on tämän tiedoston suojaus: Jos tätä tiedostoa ei 
// sisällytetä ./index.php-tiedoston kautta tulee die-käskyn 
// teksti
if (!defined($secretkey)) { die ("<br /><bt /><center>Ei oikeuksia tähän tiedostoon! Mene ../index.php tiedostoon!</center>"); }

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
    <li> Tee tekstitiedostot pisteet.txt ja polygoni.txt notebad työkalulla. Tiedosto 
      pisteet.txt on pisteiden koordinaatteja varten ja polygoni.txt polygonin 
      kulma pisteiden koordinaatteja varten. </li>
    <li> Syötä molempiin lukupareja välillä 0-400. Ensimmäinen luku on x- ja toinen 
      y-koordinaatti. Nämä kaikki syötetään peräkkäin ilman rivinvaihtoa ja erotetaan 
      seuraavilla merkeillä: ( , . - ; : ' ). Voit myös laittaa lukujen sijasta 
      kirjaimia, jotka ohjelma muuttaa nollaksi ja arpoo siitä satunnaisluvun 
      välillä 0-400. Jos luvut ei ole välillä 0-400 korjaa ohjelma virheen automaattisesti. 
    </li>
    <li> Näitä koordinaatteja, käytetään polygonin ja pisteiden piirtämiseen näytölle 
      tiedostojen sisältö raportissa. </li>
    <li> Lataa tiedostot palvelimelle etusivun lomakkeella (pisteet.txt pitää 
      olla ensimmäisessä kentässä tai muuten lataus ei onnistu). </li>
    <li> Jos ylläpito on laittanut visuaalisen varmistuksen päälle voi olla vaikeaa 
      tunnistaa mikä merkki on oikeasti kyseessä. Jos näet visuaalisen varmistuksen 
      lataussivulla niin syötä kuvan koodi sen alla olevaan kenttään tai muuten 
      lataus ei onnistu. </li>
    <li> Tämän jälkeen ohjelma ilmoittaa onko tiedostojen lataus palvelimelle 
      on onnistunut ja antaa linkin, josta saat raportin koordinaateista visuaalisessa 
      muodossa. </li>
    <li> Jos numeroparien lukumäärä ei ole parillinen ei ohjelma ei tulosta raporttia, 
      joten ole varma, että tiedostojen numeroparien lukumäärä on parillinen. 
      Ohjelma myös tunnistaa jos, joku on poistanut tiedostot ennen kuin raportti 
      tulostetaan näytölle. </li>
    <li> Voit katsoa myös viimeisimpiä raportteja muiden käyttäjien lähettäminä. 
    </li>
  </ol>
  <!-- End of list -->
</div>
  <br />