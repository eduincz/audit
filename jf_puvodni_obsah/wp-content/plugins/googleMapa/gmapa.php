<?php

/*
Plugin Name: GoogleMapa rodice vitani
Description: Pridava google mapu na stranku, ktera ma v custom fields klic googleMapaRodiceVitani 
Author: Shad1w
Version: 0.1

*/
include "googleMapa.php";

function db_dotaz($sql,$pocet=0)//dotaz do databaze 
{
global $wpdb;
//$wpdb->select_db("rvp_portal");
$vysledek = $wpdb->get_results("$sql",ARRAY_N);
$err=mysql_error($wpdb->dbh);
if ($err)echo "<p>$sql</p><p>$err</p>";
if($pocet){
$found = $wpdb->get_row("SELECT FOUND_ROWS() as rows");
return array($vysledek,$found->rows);
}

return $vysledek;
}

function zobrazGoogleMapu($content)
{
  if(get_post_custom_values('googleMapaRodiceVitani', get_the_id()))
  { 
  $pocet=db_dotaz("SELECT count(*) FROM skoly WHERE certifikovana='1' AND zobrazeno='1'");
  $mapa=new googleMapa;
  $content.="<p>Počet certifikovaných škol: <strong style='color:green;'>".$pocet[0][0].'</strong><p>';
  
  $content.=$mapa->zobrazMapu();
  $content.="<div id='seznamSkolKraje'></div>";
  }
  return $content;
}

function generujSouradnice($adresa)
{
$mapa=new googleMapa;
return $mapa->zjistiSouradniceZAdresy($adresa);
}

function generujXML()
{
$mapa=new googleMapa;
$xml=$mapa->generujXMLzDatabaze();

// zapsat do souboru
$fp = fopen(WP_PLUGIN_DIR.'/googleMapa/mapa_data.xml', 'w');
fwrite($fp, $xml);
fclose($fp);

}

function googleMap_activate() {
   //vytvorit tabulku nemocnic pokud neexistuje
   global $wpdb;
   $sql="CREATE TABLE IF NOT EXISTS `wp_hospitals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `street` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `city` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `web` varchar(500) COLLATE utf8_czech_ci NOT NULL,
  `region` int(11) NOT NULL,
  `type` enum('nemocnice','seniori','','') COLLATE utf8_czech_ci NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=8 ;";
   $wpdb->query($sql);
}


add_filter('the_content','zobrazGoogleMapu');
register_activation_hook( __FILE__, 'myplugin_activate' );