<?php
/**
 * @package ZddorsWantDate
 * @author Zdenek Soukup
 * @version 1.0
 */
/*
Plugin Name: zddorsPopisekPodNadpisem
Plugin URI:
Description: 
Author: Zdenek Soukup
Version: 1.0
Author URI:
*/

 
function setWantZddorsWantDate($page_ID, $want, $wantPopisek='') {
    global $wpdb;
    $dotaz = "DELETE FROM `{$wpdb->prefix}postmeta` WHERE `meta_key` = 'wantZddorsWantDate' and `post_id` = '$page_ID'";
    $wpdb->query($dotaz);
    $dotaz = "DELETE FROM `{$wpdb->prefix}postmeta` WHERE `meta_key` = 'wantZddorsWantPopisekPodNadpis' and `post_id` = '$page_ID'";
    $wpdb->query($dotaz);
    if (!empty($want)) {
        $dotaz = "INSERT INTO `{$wpdb->prefix}postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES ('$page_ID', 'wantZddorsWantDate', '$want')";
        $wpdb->query($dotaz); 
    }
    if (!empty($wantPopisek)) {
        $dotaz = "INSERT INTO `{$wpdb->prefix}postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES ('$page_ID', 'wantZddorsWantPopisekPodNadpis', '$wantPopisek')";
        $wpdb->query($dotaz);
    }
}

function getwantZddorsWantDate($page_ID) {
    global $wpdb;
    $dotaz = "SELECT meta_value FROM  `{$wpdb->prefix}postmeta` WHERE `meta_key` = 'wantZddorsWantDate' and  `post_id` = '$page_ID'";
    $results = $wpdb->get_results($dotaz);
    if (count($results)) {
        foreach ( $results as $result ) {
            $want = $result->meta_value;
        }
    } else $want = "";
    return($want);
}

function getwantZddorsWantPopisekPodNadpis($page_ID) {
    global $wpdb;
    $dotaz = "SELECT meta_value FROM  `{$wpdb->prefix}postmeta` WHERE `meta_key` = 'wantZddorsWantPopisekPodNadpis' and  `post_id` = '$page_ID'";
    $results = $wpdb->get_results($dotaz);
    if (count($results)) {
        foreach ( $results as $result ) {
            $want = $result->meta_value;
        }
    } else $want = "";
    return($want);
}

function ZddorsWantDateSetPozadavkyStranky() {
    if (isset($_POST['popisPodNadpisem'])) {
      $pozadavek = $_POST['wantDate'];
      setwantZddorsWantDate($_POST['post_ID'], $pozadavek, $_POST['popisPodNadpisem']);
    }
}

function ZddorsWantDateSmazPozadavkyStranky() {
    global $page_ID;
    global $post_ID;
    if(isset($post_ID)) $idecko = $post_ID; else $idecko = $page_ID;
    setwantZddorsWantDate($idecko, "");
}

function ZddorsWantDateEditPage() {
    global $page_ID;
    global $post_ID;
    if(isset($post_ID)) $idecko = $post_ID; else $idecko = $page_ID;
    $want = getwantZddorsWantDate($idecko);
    $wantPopisek = getwantZddorsWantPopisekPodNadpis($idecko);
    if ($want) {
      $checkedAno = "checked='checked'" ;
      $checkedNe = "" ;
    } else {
      $checkedNe = "checked='checked'" ;
      $checkedAno = "" ;
    }

    echo "
    <div id='wantDate' class='postbox if-js-closed' >
    <h3 class='hndle'>Popisek pod nadpisem</h3>
        <div class='inside'>
          <ul>
              <li>Zadejte text, který se má zobrazit pod nadpisem článku</li>
              <li>
              <input type='text' value='$wantPopisek' name='popisPodNadpisem' maxlength='500' style='width: 100%;' />
              </li>
          </ul> 
        </div>
    </div>
    ";
    
    //echo "
    //<div id='wantDate' class='postbox if-js-closed' >
    //<h3 class='hndle'>ZOBRAZENÍ DATUMU</h3>
    //    <div class='inside'>
    //      <ul>
    //          <li>Chcete zobrazit u tohoto příspěvku datum? (Funguje pouze na titulní stránkce.)</li>
    //          <li><label for='wantDateAno'>Ano</label><input type='radio' name='wantDate' id='wantDateAno' value='1' $checkedAno />
    //          <label for='wantDateNe' >Ne </label><input type='radio' name='wantDate' id='wantDateNe'  value='0' $checkedNe /></li>
    //      </ul> 
    //    </div>
    //</div>
    //";
}



$thisPluginFile = substr(strrchr(dirname(__FILE__),DIRECTORY_SEPARATOR),1).DIRECTORY_SEPARATOR.basename(__FILE__);


add_action('edit_form_advanced', 'ZddorsWantDateEditPage');
add_action('delete_post', 'ZddorsWantDateSmazPozadavkyStranky');
add_action('publish_post', 'ZddorsWantDateSetPozadavkyStranky');
?>