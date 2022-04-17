<?php
/*
Plugin Name: zddorsNominaceSkol
Plugin URI:
Description: Do clanku vlozte [nominace skol]
Author: Zdenek Soukup
Version: 1.0
Author URI:
*/

/** Pokud chcec aby clanek na sobe mel fotky z RVP, uloz do DB do tabulky postmeta meta_key=zddorsFortkyZRvp a  meta_value=1 **/




function zddorsNominaceSkol($content) {
    $want = strpos($content, '[nominace skol]');
    if ($want !== false) {
      $id = get_the_ID();
      $permalink = get_permalink( $id ); 
      $obsah = '';
      
      
      $url = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . "data.php";
      $obsah .= "
          <!--## Begin ZDDorS nominace skol ## -->
          <script>
          
          $(document).ready(function() {
            var url;
            $(\"input#autocomplete\").autocomplete({
              source: \"$url\"
            });
            $(\"input#autocomplete\").autocomplete( \"option\", \"minLength\", 4 );
          });
          </script>
          <!--## End ZDDorS nominace skol ## -->
      ";
      
      
      
      if (!isset($_REQUEST['nominace']) && !isset($_REQUEST['odeslatNominaci'])) {
         $obsah .= "<br /><br /><div style='width:100%; background-color: #C2EAFB; padding:10px; margin-top:20px;'>
          <form action=\"$permalink\" method=\"get\" id=\"nominujForm\">
         ";
         
         $obsah .= "
          <strong style='width:100%'>Vyhledejte školu podle názvu, ulice nebo obce a klikněte na nominovat.</strong>
          <br /><br />
          <label for='autocomplete'>Hledání školy: </label><input type='text' name='nominace' id='autocomplete' style=\"width:420px\">
         ";
         
         $obsah .= "
           <input name=\"submit\" type=\"submit\" value=\"Nominovat\" />
           </form>
         ";
          
          $obsah .= "</div>
           <br /><br /><br /><br /><br /><br /><br /><br />
         ";
      
      }  elseif(!isset($_REQUEST['odeslatNominaci'])) {   //2. krok
          $content = '[nominace skol]';   //aby v clanku nic nebylo
          $url = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . "data.php" . "?getMail=".$_REQUEST['nominace'];
          require "wp-content/plugins/zddorsNominaceSkol/data.php";
          
          $pocet = count($items);
          $poradi = false;
          for ($n=0;$n<$pocet; $n++) {
             if ($items[$n] == $_REQUEST['nominace']) {
              $poradi = $n;
              break;
             }
          }
          
          if ($poradi === false) {
            $obsah .="<strong>K vaší nominaci s hodnotou \"" . $_REQUEST['nominace'] . "\" nebyla nalezena škola.</strong> Zkuste najít školu znovu - vložte do políčka údaje a potom vyberte z napovězených škol. <a href='$permalink'>Začněte znovu zde.</a>";
          } else {
          
            $mail = $mails[$poradi];
            $obsah .="<h2 style='margin-bottom: 0px;'>" . $_REQUEST['nominace'] . "</h2><br /><br /><br />";
            $obsah .= "
              <form action=\"$permalink\" method=\"post\" id=\"nominujForm\" onsubmit=\"if ($('#jmeno').val().length === 0) {alert('Jméno musí být vyplněno!'); return(false);} else if ($('#mailOdesilatele').val().length === 0) {alert('E-mail musí být vyplněn!'); return(false);} else if ($('#duvod').val().length === 0) {alert('Důvod musí být vyplněn!'); return(false);} else if ($('#vztah').val().length === 0) {alert('Pozice vůči škole musí být vybrána!'); return(false);}\">
             ";
            
            $obsah .= "
            <strong>Pro dokončení nominace, vyplňte následující údaje:</strong></br><small><i>Všechna pole jsou povinná.</i></small></br></br>
            <table style='border-width:0px;' id='tabulkaNominace'>
            <tr><th><label for='jmeno'>Vaše jméno a příjmení:</label></th><td><input style='margin: 0px;width:350px' type='text' name='jmeno' id='jmeno' ></td></tr>
            <tr><th><label for='email'>Váš e-mail:</label></th><td><input style='margin: 0px;width:350px' type='text' name='mailOdesilatele' id='mailOdesilatele' ></td></tr>
            <tr><th><label for='duvod'>Důvod nominace:</label></th><td><textarea style='margin: 0px;width:350px' name='duvod' id='duvod'></textarea></tr>
            <tr><th><label for='vztah'>Pozice vůči škole:</label></th><td><select style='margin: 0px;width:350px' name='vztah' id='vztah'>
              <option value=''>- - </option>
              <option value='rodič'>rodič</option>
              <option value='učitel'>učitel</option>
              <option value='žák'>žák</option>
              <option value='bývalý žák'>bývalý žák</option>
              <option value='žádná z nabízených'>žádná z nabízených</option>
              </select>
              
              <input type='hidden' name='mailSkoly' value='$mail' />
              <input type='hidden' name='nazevSkoly' value='{$_REQUEST['nominace']}' />
              <input type='hidden' name='odeslatNominaci' value='1' />
            </tr>
            <tr><th></th><td><input style='margin: 0px;width:170px' type='submit' value='Dokončit nominaci' ></td></tr>
            </table>
           ";
          
          }
        $obsah .= "
           <br /><br /><br /><br /><br /><br /><br /><br />
         ";
      } else {
          $mailDoSkoly = "
          <p>Dobrý den,<br /> <br /> vaše škola {$_REQUEST['nazevSkoly']} byla právě nominována na značku Rodiče vítáni. Zajímá vás, kdo a proč vás nominoval a k čemu značka slouží?</p>
          <p>Jméno a příjmení: {$_REQUEST['jmeno']}<br />
          E-mail: {$_REQUEST['mailOdesilatele']}<br />
          Důvod nominace: {$_REQUEST['duvod']}<br />
          Pozice vůči škole: {$_REQUEST['vztah']}
          </p>
          <p>Věříme, že spolupráce a partnerská komunikace škol a rodičů se vyplácí, a to oběma stranám. Proto vznikla značka <strong>Rodiče vítáni, značka pro školy otevřené rodičům</strong>.
          Na webových stránkách <a href=\"http://www.rodicevitani.cz/\">www.rodicevitani.cz</a> najdete mapu aktivních škol, které splňují jasná <a href=\"http://rodicevitani.cz/dotaznik/\">kritéria</a> partnerské komunikace a přátelské spolupráce.</p>
          <p>Chcete se k nim připojit? <strong>Ověřte si v <a href=\"http://rodicevitani.cz/dotaznik/\">dotazníku</a>, že splňujete kritéria školy otevřené rodičům. </strong>Základní kritéria může při troše snahy splnit opravdu každá škola, pro náročnější školy máme řadu zajímavých volitelných kritérií. Podívejte se na <a href=\"http://rodicevitani.cz/mapa-skol/pro-skoly/\">mapu</a>, které školy už kritéria splňují.</p>
          <p>Na webu pravidelně uveřejňujeme <a href=\"http://rodicevitani.cz/rubrika/pro-skoly/clanky-pro-skoly/\">články</a> s informacemi z praxe, výzkumy a pohledy odborníků. Nabízíme poradnu pro rodiče a další <a href=\"http://rodicevitani.cz/rubrika/pro-skoly/sluzby-pro-skoly/\">služby pro školy</a>. A nově jsme vydali <strong><a href=\"http://rodicevitani.cz/rubrika/pro-skoly/kniha-pro-skoly/\">knížku</a> Tomáše Feřtka Rodiče vítáni: praktický návod, jak usmířit rodiče a učitele našich dětí</strong>, o tom, jak vypadá spolupráce s rodiči na jiných školách.</p>
          <p>Věříme, že vás značka Rodiče vítáni zaujme a připojíte se do sítě otevřených škol.</p>
          <p>Tým Rodiče vítáni<a href=\"http://www.rodicevitani.cz/\"><br />www.rodicevitani.cz</a></p>
          ";
          
          $mailProNominujiciho = "
          <p>Dobrý den,</p>
          <p>děkujeme vám, že jste právě nominoval/a školu {$_REQUEST['nazevSkoly']} na značku Rodiče vítáni. Na email školy odešly tyto informace:</p>
          <p>Jméno a příjmení: {$_REQUEST['jmeno']}<br />
          E-mail: {$_REQUEST['mailOdesilatele']}<br />
          Důvod nominace: {$_REQUEST['duvod']}<br />
          Pozice vůči škole: {$_REQUEST['vztah']}</p>
          <p>A nabídka připojit se k aktivním školám, kde jsou Rodiče vítáni.</p>
          <p> Děkujeme za tip. :)</p>
          <p>Tým Rodiče vítáni<a href=\"http://www.rodicevitani.cz/\"><br />www.rodicevitani.cz</a></p>
          ";
          
          $mailProEduIn = "
          <p>Dobrý den,</p>
          <p>{$_REQUEST['jmeno']} právě nominoval/a školu {$_REQUEST['nazevSkoly']}.</p>
          
          <p>Název školy: {$_REQUEST['nazevSkoly']}<br />
          E-mail školy: {$_REQUEST['mailSkoly']}<br /><br />
          Jméno a příjmení: {$_REQUEST['jmeno']}<br />
          E-mail: {$_REQUEST['mailOdesilatele']}<br />
          Důvod nominace: {$_REQUEST['duvod']}<br />
          Pozice vůči škole: {$_REQUEST['vztah']}</p>

          <p>Váš web ;-)<br /><a href=\"http://www.rodicevitani.cz/\"><br />www.rodicevitani.cz</a></p>
          ";
          
          //odesilani mailů
          $headers = 'From: www.rodicevitani.cz <nominace@eduin.cz>' . "\r\n";
          add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));//aby to posilalo html
          
          wp_mail($_REQUEST['mailSkoly'], "nominace školy {$_POST['nazevSkoly']}", $mailDoSkoly, $headers);
          wp_mail($_REQUEST['mailOdesilatele'], "nominace školy {$_POST['nazevSkoly']}", $mailProNominujiciho, $headers);
          
          wp_mail('nominace@eduin.cz', "nominace školy {$_POST['nazevSkoly']}", $mailProEduIn, $headers);
          wp_mail('zdenek.soukup@seznam.cz', "nominace školy {$_POST['nazevSkoly']}", $mailProEduIn, $headers);
      
      
          $content = '[nominace skol]';   //aby v clanku nic nebylo
          $obsah .="<strong>Děkujeme, škola byla úspěšně nominována.</strong><br /><br />Chcete nominovat další školu? <a href='$permalink'>Jen do toho</a>.<br/><br/>";
          $obsah .= "
           <br /><br /><br /><br /><br /><br /><br /><br />
         ";
      }
    
    
      $content = str_replace('[nominace skol]', $obsah, $content);
    
    }
    
    
    return($content); 
}



add_filter('the_content', 'zddorsNominaceSkol', 0); 