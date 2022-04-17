<?php
/**
 * @package ZddorsLogoSlider
 * @author Zdenek Soukup
 * @version 1.0
 */
/*
Plugin Name: ZddorsLogoSlider
Plugin URI:
Description: do sablony umisti neco jako echo getSlideshow('sponzori_');
Author: Zdenek Soukup
Version: 2.0
Author URI:
*/

 
//vrati jmena clanku, ktere zacinaji jak je zadano
function getIdClankuSNazvem($zacatekNazvu) {
    global $wpdb;
    $dotaz = "SELECT ID FROM `{$wpdb->prefix}posts` WHERE `post_title` like '$zacatekNazvu%' AND post_type!='revision' AND post_status!='trash' AND post_status!='draft'";
    $results = $wpdb->get_results($dotaz);
    $idecka = array();
    if (count($results)) {
        foreach ( $results as $result ) {
            $idecka[] = $result->ID ;
        }
    } 
    return($idecka);
}


function getSlideshow()        {
  global $wpdb;
    
  $sp = getIdClankuSNazvem('sponzori_');
  
  $pocet = count($sp);
  if ($pocet) {        
    shuffle($sp);//zamixovani prvku v poli, aby to nezacinalo vzdy stejne
    $interval = 4000;
    $pauza = 200;
    $ret = "\n\n<script type='text/javascript'>;
              var current = 0;
              var next = 1;
              var posledni = $pocet-1;
    
              function zddorsSlide() { \n
                setTimeout(\"shownext1()\",$interval);//prvni volani
              }
            
              function shownext1() {
                  if (current == posledni) next = 0; else next = current + 1;
                  $('#slideZd_'+current).hide('100');
                  setTimeout(\"$('#slideZd_'+next).show('200')\",$pauza);
                  current = current + 1; 
                  if (current > posledni) current = 0;
                  setTimeout(\"shownext1()\",$interval+$interval);
              }
            
            ";
            
    $ret .= "\n</script>\n";      
    } else {
      $ret .= "<script type='text/javascript'>function zddorsSlide2() {0;}</script>";
      return($ret);
    }
  
  $ret .= "<div style='height: 80px; margin: 0px 10px 0px 10px; border-top: 0px solid #fef8d4; border-bottom: 0px solid #e4e4e4;overflow: hidden'>\n";
  
  for ($n=0; $n<$pocet; $n++) {
    $dotaz = "SELECT post_content FROM `{$wpdb->prefix}posts` WHERE `ID` = '{$sp[$n]}'";
    $results = $wpdb->get_results($dotaz);
    $result = $results[0];
    $display = $n==0 ? "" : "display:none;";//prvni prvek bude videt rovnou
    $ret .=  "<div id='slideZd_$n' style='text-align:center; margin-top: 5px;border: 0px solid red; $display'>";
    $ret .=  $result->post_content; 
    $ret .=  "</div>\n";
  }
  
  $ret .=  "</div>\n\n";
  return($ret);
}
  
function zddorsLogoSliderHead() {
  echo "<script type='text/javascript'>
  jQuery(document).ready(function($) {
    zddorsSlide();
  });
  
  </script>\n";
}

add_action('wp_head', 'zddorsLogoSliderHead');