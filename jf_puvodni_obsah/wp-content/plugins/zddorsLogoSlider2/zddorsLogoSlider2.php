<?php
/**
 * @package ZddorsLogoSlider
 * @author Zdenek Soukup
 * @version 2.0
 */
/*
Plugin Name: ZddorsLogoSlider2
Plugin URI:
Description: do sablony umisti neco jako echo getSlideshow2('partneri_');
Author: Zdenek Soukup
Version: 2.0
Author URI:
*/

     

function getSlideshow2()        {
  global $wpdb;
    
  $sp = getIdClankuSNazvem('partneri_');
  
  $pocet = count($sp);
  if ($pocet) {        
    shuffle($sp);//zamixovani prvku v poli, aby to nezacinalo vzdy stejne
    $interval = 4000;
    $pauza = 200;
    $ret = "\n\n<script type='text/javascript'>;
              var current2 = 0;
              var next2 = 1;
              var posledni2 = $pocet-1;
    
              function zddorsSlide2() { \n
                setTimeout(\"shownext2()\",$interval);//prvni volani
              }
            
              function shownext2() {
                  if (current2 == posledni2) next2 = 0; else next2 = current2 + 1;
                  $('#slideZd2_'+current2).hide('100');
                  setTimeout(\"$('#slideZd2_'+next2).show('200')\",$pauza);
                  current2 = current2 + 1; 
                  if (current2 > posledni2) current2 = 0;
                  setTimeout(\"shownext2()\",$interval+$interval);
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
    $ret .=  "<div id='slideZd2_$n' style='text-align:center; margin-top: 5px;border: 0px solid red; $display'>";
    $ret .=  $result->post_content; 
    $ret .=  "</div>\n";
  }
  
  $ret .=  "</div>\n\n";
  return($ret);
}

function zddorsLogoSliderHead2() {
  echo "<script type='text/javascript'>
  jQuery(document).ready(function($) {
    zddorsSlide2();
  });
  
  </script>\n";
}

add_action('wp_head', 'zddorsLogoSliderHead2');