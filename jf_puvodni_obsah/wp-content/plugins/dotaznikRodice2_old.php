<?php

/*

Plugin Name: Dotaznik rodice vitani3

Description: Pridava dotaznik do stranky, ktera ma v custom fields klic dotaznikRodiceVitani 

Author: Shad1w

Version: 0.3

*/
define('ALTERNATE_WP_CRON', true); 

//zmenit nazev atributu datumPlatby na datumZverejneni

define (FOTKY_DIR,"/wp-content/uploads/skolyFoto/");
define (AKTUALNI_VARIANTA,2);

define('POCET_DNI_UPOZORNENI_RECERTIFIKACE1',30);
define('POCET_DNI_UPOZORNENI_RECERTIFIKACE2',1);

function logData($data)
{
$fp = fopen($_SERVER['DOCUMENT_ROOT'].'/log.txt', 'a');
fwrite($fp, date('d.m.Y H:i:s').' - '.$data.PHP_EOL);
fclose($fp);
}


function isSpravaSkoly()
{
if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3'  or $_GET['page']=='spravaSkol4' or $_GET['page']=='spravaSkol5'  or $_GET['page']=='recertifikace')
return true;
else return false;
}

function dotaznikRodiceVitani($content,$data=array())
{
 
if((get_post_custom_values('dotaznikRodiceVitani', get_the_id()) and $_GET['page']!='recertifikace') or ($_GET['page']=='recertifikace' and !empty($data)) or $_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3' or $_GET['page']=='spravaSkol4' or $_GET['page']=='spravaSkol5')
{
/*
if( $_GET['page']=='recertifikace')
{
  $skola=$_GET['skola'];
  if(is_numeric($skola))
  {
  $sql="SELECT certifikovana FROM skoly WHERE id='$skola'";
  $s=db_dotaz($sql);
  //print_r($s);
  //echo hashSkoly($skola);
  if($s[0][0]!=-1 or hashSkoly($skola)!=$_GET['h'])
  return "Neplatná adresa stránky!";     
  }
}
*/

echo "

<script type='text/javascript' src='/wp-includes/js/jquery/jquery.min.js'></script>

<script type='text/javascript' src='/wp-includes/js/jquery/jquery-ui.custom.min.js'></script>

";


if($_POST['akce']=='kontrola')

 {
 if((($_POST['kontrola']=='modrá' or $_POST['kontrola']=='modra') and !isSpravaSkoly()) or isSpravaSkoly() )
 {
//ulozit skolu

//if($_GET['page']!='spravaSkol' and $_GET['page']!='spravaSkol2' and $_GET['page']!='spravaSkol3')
if(!isSpravaSkoly())
{

$sql="INSERT INTO skoly ( `nazev` , `adresa` , `kontaktni_osoba` , `ic_skoly` , `telefon` , `email` , `web`,`region`, `popis`,`email2`,`email_reditel` ,`telefon_reditel` ,`telefon_kontakt` ,`jmeno_reditele` ,`pocet_samolepek` ,`poznamka` ,`kde_se_dozvedel` ,`facebook`,`cedule_anglicka`,`kniha`,`nazev_ro`,`jmeno_zastupce_ro`,`email_zastupce_ro`,`telefon_zastupce_ro`) VALUES('{$_POST['nazev']}','{$_POST['adresa']}','{$_POST['kontaktniOsoba']}','{$_POST['icSkoly']}','{$_POST['telefon']}','{$_POST['email']}','{$_POST['web']}','{$_POST['kraj']}','{$_POST['popis']}','{$_POST['email2']}','{$_POST['email_reditel']}' ,'{$_POST['telefon_reditel']}' ,'{$_POST['telefon_kontakt']}' ,'{$_POST['jmeno_reditele']}' ,'{$_POST['pocet_samolepek']}' ,'{$_POST['poznamka']}' ,'{$_POST['kde_se_dozvedel']}' ,'{$_POST['facebook']}','{$_POST['cedule_anglicka']}','{$_POST['kniha']}','{$_POST['nazev_ro']}','{$_POST['jmeno_zastupce_ro']}','{$_POST['email_zastupce_ro']}','{$_POST['telefon_zastupce_ro']}')";
//echo $sql."<br />";

db_dotaz($sql);

//ulozit odpovedi

//cast A - ukladaji se serializovana pole s identifikatory vety odpovedi

$sql="SELECT LAST_INSERT_ID()";

$id=db_dotaz($sql);

 $id_skoly=$id[0][0];

 $sql="INSERT INTO skoly_meta (id_skoly) VALUES('$id_skoly')";
 db_dotaz($sql);
}

else $id_skoly=$_GET['skola'];

 

 if($_POST['a1'])$a1=serialize($_POST['a1']);else $a1='';

 if($_POST['a2'])$a2=serialize($_POST['a2']);else $a2='';

 if($_POST['a3'])$a3=serialize($_POST['a3']);else $a3='';

 if($_POST['a4'])$a4=serialize($_POST['a4']);else $a4='';

 if($_POST['a5'])$a5=serialize($_POST['a5']);else $a5='';

 if($_POST['a6'])$a6=serialize($_POST['a6']);else $a6='';

 if($_POST['a7'])$a7=serialize($_POST['a7']);else $a7='';

 

for($i=1;$i<=17;$i++){if($_POST["b$i"])$volitelne++;} 







//cast B - ukladaji se jednotliva pole s identifikatorem vety odpovedi

//if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3'){
if(isSpravaSkoly()){
//echo "{$_POST['nazev']} and {$_POST['adresa']} and  {$_POST['kontaktniOsoba']} and {$_POST['icSkoly']} and {$_POST['telefon']} and {$_POST['email']}";
if($_POST['nazev'] and $_POST['adresa'] and $_POST['icSkoly'] and $_POST['telefon'] and $_POST['email'])
{

$sql="

UPDATE odpovedi_dotaznik SET `a1`= '$a1', `a2`='$a2' , `a3`='$a3' , `a4`='$a4' , `a5`='$a5' , `a6`='$a6' , `a7`='$a7' , `b1`='{$_POST['b1']}' , `b2`='{$_POST['b2']}' , `b3`='{$_POST['b3']}' , `b4`='{$_POST['b4']}' , `b5`='{$_POST['b5']}' , `b6`='{$_POST['b6']}' , `b7`='{$_POST['b7']}' , `b8`='{$_POST['b8']}' , `b9`='{$_POST['b9']}' , `b10`='{$_POST['b10']}' , `b11`='{$_POST['b11']}' , `b12`='{$_POST['b12']}' , `b13`='{$_POST['b13']}' , `b14`='{$_POST['b14']}' , `b15`='{$_POST['b15']}' , `b16`='{$_POST['b16']}' , `b17`='{$_POST['b17']}'

WHERE id_skoly='{$_GET['skola']}'

";

db_dotaz($sql);

$sql="
UPDATE skoly SET `nazev`='{$_POST['nazev']}' , `adresa`='{$_POST['adresa']}' , `kontaktni_osoba`='{$_POST['kontaktniOsoba']}' , `ic_skoly`='{$_POST['icSkoly']}', `telefon`='{$_POST['telefon']}' , `email`='{$_POST['email']}' , `web`='{$_POST['web']}',`region`='{$_POST['kraj']}', `popis`='{$_POST['popis']}',email2='{$_POST['email2']}', email_reditel='{$_POST['email_reditel']}' ,telefon_reditel='{$_POST['telefon_reditel']}' ,telefon_kontakt='{$_POST['telefon_kontakt']}' ,jmeno_reditele='{$_POST['jmeno_reditele']}' ,pocet_samolepek='{$_POST['pocet_samolepek']}' ,poznamka='{$_POST['poznamka']}' ,kde_se_dozvedel='{$_POST['kde_se_dozvedel']}' ,facebook='{$_POST['facebook']}',cedule_anglicka='{$_POST['cedule_anglicka']}',kniha='{$_POST['kniha']}',nazev_ro='{$_POST['nazev_ro']}',jmeno_zastupce_ro='{$_POST['jmeno_zastupce_ro']}',email_zastupce_ro='{$_POST['email_zastupce_ro']}',telefon_zastupce_ro='{$_POST['telefon_zastupce_ro']}' 
WHERE id='{$_GET['skola']}'";
db_dotaz($sql);

$sql="UPDATE skoly_meta SET datum_certifikace='{$_POST['datum_certifikace']}',prvni_email='{$_POST['prvni_email']}',faktura_odeslana='{$_POST['faktura_odeslana']}',faktura_zaplacena='{$_POST['faktura_zaplacena']}',obalka_odeslana='{$_POST['obalka_odeslana']}',poznamka_meta='{$_POST['poznamka_meta']}',naplnovani_kriteria='{$_POST['naplnovani_kriteria']}',tipy_na_plneni='{$_POST['tipy_na_plneni']}',cislo='{$_POST['cislo_certifikatu']}' WHERE id_skoly='{$_GET['skola']}'";
db_dotaz($sql);
$data=spravaSkolAdminDetail($_GET['skola'],1);
}
else echo "<div style='background:red;color:white;'>Záznam nebyl uložen, jelikož mohlo dojít k chybě, nejsou vyplněny všechny povinné položky.</div>";
}



else

{

$sql="INSERT INTO `odpovedi_dotaznik` ( `id_skoly` , `a1` , `a2` , `a3` , `a4` , `a5` , `a6` , `a7` , `b1` , `b2` , `b3` , `b4` , `b5` , `b6` , `b7` , `b8` , `b9` , `b10` , `b11` , `b12` , `b13` , `b14` , `b15` , `b16` , `b17`,`varianta` )

VALUES ('$id_skoly', '$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '{$_POST['b1']}', '{$_POST['b2']}', '{$_POST['b3']}', '{$_POST['b4']}', '{$_POST['b5']}', '{$_POST['b6']}', '{$_POST['b7']}', '{$_POST['b8']}', '{$_POST['b9']}', '{$_POST['b10']}', '{$_POST['b11']}', '{$_POST['b12']}', '{$_POST['b13']}', '{$_POST['b14']}', '{$_POST['b15']}', '{$_POST['b16']}', '{$_POST['b17']}','".AKTUALNI_VARIANTA."');";

db_dotaz($sql);

}


//test splnenosti podminek

if($a1 && $a2 && $a3 && $a4 && $a5 && $a6 && $a7 && $volitelne>=2){ $splneno=true;}else $splneno=false;

if($splneno) {                                                   
 
$souradnice=generujSouradnice($_POST['adresa']);


$sql="UPDATE skoly SET certifikovana='1',geoLat='{$souradnice['geoLat']}',geoLng='{$souradnice['geoLng']}' WHERE id='$id_skoly'";
db_dotaz($sql);

//if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3')
if(isSpravaSkoly())
{  
if($_GET['page']=='recertifikace')
{
$sql="SELECT datumZverejneni FROM skoly WHERE id='$id_skoly'";
$datum=db_dotaz($sql);

$newDate = date("Y-m-d",strtotime(date("Y-m-d", strtotime($datum[0][0])) . " +1 year"));

$sql="UPDATE skoly SET datumZverejneni='$newDate',zobrazeno='0',faze='recertifikaceKeSchvaleni' WHERE id='$id_skoly'";
db_dotaz($sql);
echo "<div class='info'>
<p>Gratulujeme!
Právě jste splnili požadovaná kritéria pro obnovení certifikace vaší školy značkou Rodiče vítáni.
Během krátké doby vám přijde email o vyplnění dotazníku. 
</p><p>
Vaše údaje a naplňování kritérií zkontrolujeme a v nejbližší době emailem vaši certifikaci potvrdíme. 
<br />
Po zaplacení faktury vám zašleme nový certifikát a novou informační ceduli, kterou si prosím umístěte u vstupu ve škole (váš závazek v kritériu č. 7).
</p><p>
Pro další informace nás můžete kontaktovat na emailu certifikace@eduin.cz
</p></div>";
//odeslat mail o uspesne recertifikaci

$teloMailu ="
<p>Dobrý den,</p>
<p>právě jste splnili požadovaná kritéria pro obnovení certifikace vaší školy značkou Rodiče vítáni.</p>
<p>
Vaše údaje a naplňování kritérií v nejbližší době zkontrolujeme a vaši certifikaci emailem potvrdíme. 
Vaši školu pak opět/stále naleznete na <a href=\"http://www.rodicevitani.cz/mapa-skol/\">mapě aktivních škol</a>.
</p>
<p>Po zaplacení faktury vám zašleme nový certifikát a novou informační ceduli, kterou si prosím umístěte u vstupu ve škole (váš závazek v kritériu č. 7).</p>
<p>
Pro další informace nás můžete kontaktovat na emailu certifikace@eduin.cz
</p>
<p>Těšíme se na další spolupráci!</p>

<p>S pozdravem,</p>
<p>
Kateřina Kubešová<br />
manažerka značky Rodiče vítáni<br />
EDUin, o.p.s. - Vzdělávání je i naše věc<br />
+420 732 911 524<br />
katerina.kubesova@eduin.cz<br />
www.rodicevitani.cz<br />
</p>";

$headers = 'From: www.rodicevitani.cz <certifikace@eduin.cz>' . "\r\n";
add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));//aby to posilalo html
wp_mail($_POST['email'], "Obnovení certifikace školy {$_POST['nazev']}", $teloMailu, $headers);

$teloAminMailu = "
<p>Dobrý den,<br /><br />škola {$_POST['nazev']} si obnovila certfikací a splnila požadovaná kritéria pro získání značky Rodiče vítáni.<br /><br />Adresa školy: {$_POST['adresa']}<br />Kontaktní osoba: {$_POST['kontaktniOsoba']}<br />Telefon: {$_POST['telefon']}<br />E-mail: {$_POST['email']}<br />
<p>Profil školy můžete upravit <a href='http://www.rodicevitani.cz/wp-admin/admin.php?page=spravaSkol5&skola=$id_skoly'>zde</a></p>

<br />www.rodicevitani.cz</p>

";                                                                                                                                                                          
wp_mail('certifikace@eduin.cz', "úspěšná Recertifikace školy {$_POST['nazev']}", $teloAminMailu, $headers);
wp_mail('marek.drahovzal@seznam.cz', "úspěšná Recertifikace školy {$_POST['nazev']}", $teloAminMailu, $headers);


}
else
{
echo "<p>Údaje byly uloženy.</p>";

unset($_GET['skola']);
if($_GET['page']=='spravaSkol2')spravaSkolAdminSeznam('zpracovana');
elseif($_GET['page']=='spravaSkol3')spravaSkolAdminSeznam('necertifikujeSe');
elseif($_GET['page']=='spravaSkol4')spravaSkolAdminSeznam('proslaCertifikace');
elseif($_GET['page']=='spravaSkol5')spravaSkolAdminSeznam('recertifikaceKeSchvaleni');

else spravaSkolAdminSeznam(); 
}
}

else

{

echo"

<p>Gratulujeme!<br />Právě jste splnili požadovaná kritéria pro získání značky Rodiče vítáni.<br /><br />Po vyplnění dotazníku vám přijde potvrzovací email o vaší žádosti.<br />V nejbližší době vás budeme kontaktovat.<br /><br />Vaše škola bude umístěna na mapě <a href=\"http://rodicevitani.cz/mapa-skol/pro-skoly/\">aktivních škol</a> a poštou vám zašleme certifikát, samolepku na dveře a informační ceduli, kterou si umístíte u vstupu ve škole.<br /><br />Pro další informace nás můžete kontaktovat na emailu certifikace@eduin.cz<br /><br /></p>

";

//posli_mail - Potvrzovací email na uvedenou adresu, že vyplnili dotazník a vstoupili do procesu certifikace RV.

$teloMailu = "
<p>Dobrý den,</p>

<p>právě jste splnili požadovaná kritéria pro získání certifikace vaší školy značkou Rodiče vítáni.
Vaše údaje a naplňování kritérií v nejbližší době zkontrolujeme a vaši certifikaci emailem potvrdíme. 
Profil vaší školy bude umístěný na mapu aktivních škol.</p>

<p>Po zaplacení faktury vám zašleme certifikát, samolepku a informační ceduli, kterou si prosím umístěte u vstupu ve škole (váš závazek v kritériu č. 7).</p>

<p>Pro další informace nás můžete kontaktovat na emailu certifikace@eduin.cz</p>

<p>Těšíme se na další spolupráci!</p>

<p>S pozdravem,</p>

<p>Kateřina Kubešová<br />
manažerka značky Rodiče vítáni</p>

<p>EDUin, o.p.s. - Vzdělávání je i naše věc</p>

";

$teloAminMailu = "

<p>Dobrý den,<br /><br />škola {$_POST['nazev']} právě vyplnila certifikační dotazník a splnila požadovaná kritéria pro získání značky Rodiče vítáni.<br /><br />Adresa školy: {$_POST['adresa']}<br />Kontaktní osoba: {$_POST['kontaktniOsoba']}<br />Telefon: {$_POST['telefon']}<br />E-mail: {$_POST['email']}<br /><br />Váš web ;-)<br />www.rodicevitani.cz</p>

";                                                                                                                                                                          



$headers = 'From: www.rodicevitani.cz <certifikace@eduin.cz>' . "\r\n";

add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));//aby to posilalo html

wp_mail($_POST['email'], "certifikace školy {$_POST['nazev']}", $teloMailu, $headers);

wp_mail('certifikace@eduin.cz', "úspěšná certifikace školy {$_POST['nazev']}", $teloAminMailu, $headers);

}

generujXML();//vygeneruje nove xml s daty skol pro google mapu

return false;

}

else

{ 

  //if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3')
  if(isSpravaSkoly())

  {  
    if($_GET['page']=='recertifikace')
    {
    echo "<p class='error'>Údaje byly uloženy. Obnovení certifikace nebylo úspěšné, škola nesplňuje požadovaná kritéria!</p>";
    $sql="UPDATE skoly SET zobrazeno='0',certifikovana='0' WHERE id='{$_GET['skola']}'";
    db_dotaz($sql);

    echo "<p class='info'>Omlouváme se, ale nesplňujete potřebná kritéria pro certifikaci.</p>

    <p>Pro konzultaci nás můžete kontaktovat na emailu <a href='mailto:info@eduin.cz'>info@eduin.cz</a></p>";

    

    $teloAminMailu = "

    <p>Dobrý den,<br /><br />škola {$_POST['nazev']} právě provedla obnovu certifikace, ale nesplnila požadovaná kritéria pro získání značky Rodiče vítáni.<br /><br />Adresa školy: {$_POST['adresa']}<br />Kontaktní osoba: {$_POST['kontaktniOsoba']}<br />Telefon: {$_POST['telefon']}<br />E-mail: {$_POST['email']}<br /><br />Váš web ;-)<br />www.rodicevitani.cz</p>

    "; 

    

    $headers = 'From: www.rodicevitani.cz <certifikace@eduin.cz>' . "\r\n";

    add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));//aby to posilalo html

    wp_mail('certifikace@eduin.cz', "NEúspěšné obnovení certifikace školy {$_POST['nazev']}", $teloAminMailu, $headers);


    }
    else
    {
      echo "<p class='info'>Údaje byly uloženy.</p>";
      unset($_GET['skola']);
      spravaSkolAdminSeznam();
    }
  }

  else

  {

    echo "<p class='info'>Omlouváme se, ale nesplňujete potřebná kritéria pro certifikaci.</p>

    <p>Pro konzultaci nás můžete kontaktovat na emailu <a href='mailto:info@eduin.cz'>info@eduin.cz</a></p>";

    

    $teloAminMailu = "

    <p>Dobrý den,<br /><br />škola {$_POST['nazev']} právě vyplnila certifikační dotazník, ale nesplnila požadovaná kritéria pro získání značky Rodiče vítáni.<br /><br />Adresa školy: {$_POST['adresa']}<br />Kontaktní osoba: {$_POST['kontaktniOsoba']}<br />Telefon: {$_POST['telefon']}<br />E-mail: {$_POST['email']}<br /><br />Váš web ;-)<br />www.rodicevitani.cz</p><small>PS: Pokud bude návštěvník ještě něco zaškrtávat a zkoušet certifikaci znovu, přijde tento e-mail vícekrát.</small>

    "; 

    

    $headers = 'From: www.rodicevitani.cz <certifikace@eduin.cz>' . "\r\n";

    add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));//aby to posilalo html

    wp_mail('certifikace@eduin.cz', "NEúspěšná certifikace školy {$_POST['nazev']}", $teloAminMailu, $headers);

  }
return false;
}



}
else echo "<div>Chybně zodpovězená kontrolní otázka</div>";
}
//else

{



$kraj=$data['skola'][11];

$a1=unserialize($data['povinne'][0]);

$a2=unserialize($data['povinne'][1]);

$a3=unserialize($data['povinne'][2]);

$a4=unserialize($data['povinne'][3]);

$a5=unserialize($data['povinne'][4]);

$a6=unserialize($data['povinne'][5]);

$a7=unserialize($data['povinne'][6]);

$b=$data['volitelne'];

$res=

"

<script type='text/javascript'>

	$(function() {

		$( \"#dotaznik\" ).tabs();

    

	});

	</script>



<form action=\"\" method=\"post\">

<input type='hidden' name='akce' value='kontrola' />

<div id=\"dotaznik\">

	<ul>";
    //if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3')
    if(isSpravaSkoly() and $_GET['page']!='recertifikace')

    $res.="<li><a href=\"#krok-0\">Metadata</a></li>";

    $res.="
		<li><a href=\"#krok-1\">Základní požadavky</a></li>

		<li><a href=\"#krok-2\">Volitelné požadavky</a></li>

		<li><a href=\"#krok-3\">Identifikační údaje školy</a></li>";

    //if($_GET['page']!='spravaSkol' and $_GET['page']!='spravaSkol2' and $_GET['page']!='spravaSkol3')
      if(!isSpravaSkoly() or $_GET['page']=='recertifikace')
    $res.="<li><a href=\"#krok-4\">Odeslání dotazníku</a></li>";
    
    $res.="

	</ul>";

//if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3')

if(isSpravaSkoly() and $_GET['page']!='recertifikace')
{
$res.="<div id=\"krok-0\">";
//$res.="<form>";

//$sql="SELECT datum_certifikace,prvni_email,faktura_odeslana,faktura_zaplacena,obalka_odeslana,poznamka_meta,naplnovani_kriteria,tipy_na_plneni,cislo FROM skoly_meta WHERE id_skoly='{$_GET['skola']}'";
//$matadata=db_dotaz($sql);

$matadata=$data['metadata'];
$res.="
<script>
	$(function() {
		//$( \"#datum_certifikace\" ).datepicker({ altFormat: 'yy-mm-dd', dateFormat: 'yy/mm/dd' });
		$( \"#prvni_email\" ).datepicker({ altFormat: 'yy-mm-dd', dateFormat: 'yy/mm/dd' });
		//$( \"#obalka_odeslana\" ).datepicker({ altFormat: 'yy-mm-dd', dateFormat: 'yy/mm/dd' });
	
  }); 
	</script>";
$res.="<label for='cislo_certifikatu'>ČÍSLO CERTIFIKÁTU</label><br /><input type='text' name='cislo_certifikatu' id='cislo_certifikatu' value='{$matadata[0][8]}' /><br />";
//$res.="<label for='datum_certifikace'>DATUM CERTIFIKACE</label><br /><input type='text' name='datum_certifikace' id='datum_certifikace' value='{$matadata[0][0]}' /><br />";
$res.="<label for='prvni_email'>DATUM ODESLÁNÍ 1. EMAILU (certifikace)</label><br /><input type='text' name='prvni_email' id='prvni_email' value='{$matadata[0][1]}' /><br />";
$res.="<label for='faktura_odeslana'>FAKTURA ODESLANÁ (číslo faktury)</label><br /><input type='text' name='faktura_odeslana' id='faktura_odeslana' value='{$matadata[0][2]}' /><br />";
$res.="<label for='faktura_zaplacena'>FAKTURA ZAPLACENA</label><br /><input type='text' name='faktura_zaplacena' id='faktura_zaplacena' value='{$matadata[0][3]}' /><br />";
$res.="<label for='obalka_odeslana'>OBÁLKA ODESLANÁ(CEDULE, CERTIFIKÁT, SAMOLEPKA, DOPIS)</label><br /><input type='text' name='obalka_odeslana' id='obalka_odeslana' value='{$matadata[0][4]}' /><br />";

$res.="<label for='poznamka_meta'>POZNÁMKA K CERTIFIKACI</label><br /><textarea name='poznamka_meta' id='poznamka_meta'>{$matadata[0][5]}</textarea><br />";
//$res.="<label for='naplnovani_kriteria'>NAPLŇOVÁNÍ 13. KRITÉRIA </label><br /><span class='info'> Poskytujeme rodičům na webových stránkách prostor pro otevřenou diskusi o škole</span><br /><textarea name='naplnovani_kriteria' id='naplnovani_kriteria'>{$matadata[0][6]}</textarea><br />";
$res.="<label for='tipy_na_plneni'>POZNÁMKA</label><br /><textarea name='tipy_na_plneni' id='tipy_na_plneni'>{$matadata[0][7]}</textarea><br />";
$res.='<br /><input type="submit" value="Uložit" />';
//$res.="</form>";
$res.="</div>";

}

$sql="SELECT * FROM komentare_dotaznik";
$komentare=db_dotaz($sql);
foreach($komentare as $k) $komentare_kriterii[$k[0]]=$k[1];

if(isset($data['varianta']))$varianta=$data['varianta'];else $varianta=AKTUALNI_VARIANTA;// pro vyplneny formular nacita variantu dotazniku, jinak nastavuje kriteria aktualni varianty
  $sql="SELECT id,veta FROM vety_dotaznik WHERE varianta='$varianta'";
  //echo $sql;
  $vety_dotazniku=db_dotaz($sql);

  if($vety_dotazniku)foreach($vety_dotazniku as $v)
  {
    $vety[$v[0]]=$v[1];
  }
   



$res.="	<div id=\"krok-1\">
   <div style='margin-bottom: 10px;'>
     <em>Přečtěte si prosím komentáře ke každému kritériu. Vysvětlujeme v nich, co považujeme za kvalitní naplnění kritéria. Komentáře se zobrazí po najetí myší na otazník na konci řádku nebo je najdete <a href=\"http://www.rodicevitani.cz/wp-content/uploads/2012/06/RV_kriteria_certifikace_uprava_komentare_1306121.pdf\">zde</a>. Pro všechna kritéria by mělo platit, že je škola naplňuje již delší dobu a je zapojena většina lidí, kterých se to týká. Jako minimální zkušenost doporučujeme jeden školní rok.</em>
     </div>
  
<h3><span class='odrazka'>01</span>".komentar_kriteria($komentare_kriterii['a1'])." Rodiče se dostanou bez problémů do škol, včetně odpoledních hodin. *</h3>";

    if(!empty($a1) and in_array('v1',$a1))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a1[]' id='a11' value='v1' $sel/>

    <label for='a11'>{$vety['v1']}</label><br />";

    if(!empty($a1) and in_array('v2',$a1))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a1[]' id='a12' value='v2' $sel/>

    <label for='a12'>{$vety['v2']}</label><br />";

    if(!empty($a1) and @in_array('v3',$a1))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a1[]' id='a13' value='v3' $sel/>

    <label for='a13'>{$vety['v3']}</label><br />";

 

 $res.="

<h3><span class='odrazka'>02</span>".komentar_kriteria($komentare_kriterii['a2'])." Rodičům jsou dostupné kontakty na všechny učitele a vedení školy. *</h3>";

    if(!empty($a2) and @in_array('v4',$a2))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a2[]' id='a21' value='v4' $sel/> 
    <label for='a21'>{$vety['v4']}</label><br />";

    if(!empty($a2) and @in_array('v5',$a2))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a2[]' id='a22' value='v5' $sel/> 
    <label for='a22'>{$vety['v5']}</label><br />";

 

 $res.="

<h3><span class='odrazka'>03</span>".komentar_kriteria($komentare_kriterii['a3'])." Rodiče mají k dispozici informace o tom, co a kdy se ve škole děje. *</h3>";

    if(!empty($a3) and @in_array('v6',$a3))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a3[]' value='v6' id='a31' $sel/> 
    <label for='a31'>{$vety['v6']}</label><br />";

    if(!empty($a3) and @in_array('v7',$a3))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a3[]' value='v7' id='a32' $sel/> 
    <label for='a32'>{$vety['v7']}</label><br />";

 

$res.="<h3><span class='odrazka'>04</span>".komentar_kriteria($komentare_kriterii['a4'])." Rodičům zaručujeme, že při třídních schůzkách neprobíráme prospěch a chování jejich dítěte před ostatními rodiči. *</h3>";

    if(!empty($a4) and @in_array('v8',$a4))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a4[]' value='v8' id='a41' $sel/> 
    <label for='a41'>{$vety['v8']}</label><br />";

    if(!empty($a4) and @in_array('v9',$a4))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a4[]' value='v9' id='a42' $sel/> 
    <label for='a42'>{$vety['v9']}</label><br />";

 

$res.="<h3><span class='odrazka'>05</span>".komentar_kriteria($komentare_kriterii['a5'])." S rodiči komunikujeme partnerským způsobem. *</h3>";

     if(!empty($a5) and @in_array('v10',$a5))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a5[]' value='v10' id='a51' $sel/> <label for='a51'>{$vety['v10']}</label><br />";
 if(isset($data['varianta']) and $data['varianta']==1)
 {
     if(!empty($a5) and @in_array('v11',$a5))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a5[]' value='v11' id='a52' $sel/> <label for='a52'>{$vety['v11']}</label><br />";
 }
 

$res.="<h3><span class='odrazka'>06</span>".komentar_kriteria($komentare_kriterii['a6'])." Pořádáme školní akce pro rodiče v termínech a hodinách, které jim umožní se jich opravdu zúčastnit *</h3>";

    if(!empty($a6) and @in_array('v12',$a6))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a6[]' id='a6' value='v12' $sel/> 
    <label for='a6'>Splňujeme</label><br />";

 

$res.="<h3><span class='odrazka'>07</span>".komentar_kriteria($komentare_kriterii['a7'])." Informační tabule o značce Rodiče vítáni je viditelně umístěna u vstupu do školy. * Položka je zařazena mezi povinné, platnost je však po udělení značky. Zde se škola zavazuje, že tak učiní.</h3>";

     if(!empty($a7) and @in_array('v13',$a7))$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='a7[]' id='a7' value='v13' $sel/> <label for='a7'>Splňujeme</label><br />";

  //if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3')
  if(isSpravaSkoly() and $_GET['page']!='recertifikace')

  $res.='<br /><input type="submit" value="Uložit" />';

  else  $res.="<span onclick=\"$(window).scrollTop(parseInt($('#dotaznik').position().top-30));$('#dotaznik').tabs( 'select' , 1 )\" class='nextStep'>Přejít na další krok -> VOLITELNÉ POŽADAVKY</span>";

      
	$res.="

  </div>

	<div id=\"krok-2\">
     <div style='margin-bottom: 10px;'>
     <em>Přečtěte si prosím komentáře ke každému kritériu. Vysvětlujeme v nich, co považujeme za kvalitní naplnění kritéria. Komentáře se zobrazí po najetí myší na otazník na konci řádku nebo je najdete <a href=\"http://www.rodicevitani.cz/wp-content/uploads/2012/06/RV_kriteria_certifikace_uprava_komentare_1306121.pdf\">zde</a>. Pro všechna kritéria by mělo platit, že je škola naplňuje již delší dobu a je zapojena většina lidí, kterých se to týká. Jako minimální zkušenost doporučujeme jeden školní rok.</em>
     </div>
  
  	 <h3><span class='odrazka'>01</span>".komentar_kriteria($komentare_kriterii['b1'])." {$vety['v14']}</h3>";

     if($b[0])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b1' id='b1' value='v14' $sel/>

    <label for='b1'>Splňujeme</label>

 

    <h3><span class='odrazka'>02</span>".komentar_kriteria($komentare_kriterii['b2'])." {$vety['v15']}</h3>";

    if($b[1])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b2' id='b2' value='v15' $sel />     

    <label for='b2'>Splňujeme</label>

 

    <h3><span class='odrazka'>03</span>".komentar_kriteria($komentare_kriterii['b3'])." {$vety['v16']}</h3>";

    if($b[2])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b3' id='b3' value='v16' $sel />     

    <label for='b3'>Splňujeme</label>

 

    <h3><span class='odrazka'>04</span>".komentar_kriteria($komentare_kriterii['b4'])." {$vety['v17']}</h3>";

    if($b[3])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b4' id='b4' value='v17' $sel />     

    <label for='b4'>Splňujeme</label>

 

    <h3><span class='odrazka'>05</span>".komentar_kriteria($komentare_kriterii['b5'])." {$vety['v18']}</h3>";

    if($b[4])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b5' id='b5' value='v18' $sel />     

    <label for='b5'>Splňujeme</label>

 

    <h3><span class='odrazka'>06</span>".komentar_kriteria($komentare_kriterii['b6'])." {$vety['v19']}</h3>";

    if($b[5])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b6' id='b6' value='v19' $sel />     

    <label for='b6'>Splňujeme</label>

 

    <h3><span class='odrazka'>07</span>".komentar_kriteria($komentare_kriterii['b7'])." {$vety['v20']}</h3>";

    if($b[6])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b7' id='b7' value='v20' $sel />

    <label for='b7'>Splňujeme</label>

 

    <h3><span class='odrazka'>08</span>".komentar_kriteria($komentare_kriterii['b8'])." {$vety['v21']}</h3>";

    if($b[7])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b8' id='b8' value='v21' $sel />

    <label for='b8'>Splňujeme</label>

 

    <h3><span class='odrazka'>09</span>".komentar_kriteria($komentare_kriterii['b9'])." {$vety['v22']}</h3>";

    if($b[8])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b9' id='b9' value='v22' $sel />

    <label for='b9'>Splňujeme</label>

 

    <h3><span class='odrazka'>10</span>".komentar_kriteria($komentare_kriterii['b10'])." {$vety['v23']}</h3>";

    if($b[9])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b10' id='b10' value='v23' $sel />     

    <label for='b10'>Splňujeme</label>

 

    <h3><span class='odrazka'>11</span>".komentar_kriteria($komentare_kriterii['b11'])." {$vety['v24']}</h3>";

    if($b[10])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b11' id='b11' value='v24' $sel />

    <label for='b11'>Splňujeme</label>

 

    <h3><span class='odrazka'>12</span>".komentar_kriteria($komentare_kriterii['b12'])." {$vety['v25']}</h3>";

    if($b[11])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b12'  id='b12' value='v25' $sel />     

    <label for='b12'>Splňujeme</label>

 

    <h3><span class='odrazka'>13</span>".komentar_kriteria($komentare_kriterii['b13'])." {$vety['v26']}</h3>";

    if($b[12])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b13' id='b13' value='v26' $sel />     

    <label for='b13'>Splňujeme</label>

 

    <h3><span class='odrazka'>14</span>".komentar_kriteria($komentare_kriterii['b14'])." {$vety['v27']}</h3>";

    if($b[13])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b14' id='b14' value='v27' $sel />     

    <label for='b14'>Splňujeme</label>

 

    <h3><span class='odrazka'>15</span>".komentar_kriteria($komentare_kriterii['b15'])." {$vety['v28']}</h3>";

    if($b[14])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b15' id='b15' value='v28' $sel />     

    <label for='b15'>Splňujeme</label>

 

    <h3><span class='odrazka'>16</span>".komentar_kriteria($komentare_kriterii['b16'])." {$vety['v29']}</h3>";

    if($b[15])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b16' id='b16' value='v29' $sel />     

    <label for='b16'>Splňujeme</label>

 

    <h3><span class='odrazka'>17</span>".komentar_kriteria($komentare_kriterii['b17'])." {$vety['v30']}</h3>";

    if($b[16])$sel="checked=\"checked\""; else $sel="";$res.="<input type='checkbox' name='b17' id='b17' value='v30' $sel/>     

    <label for='b17'>Splňujeme</label>";

 

  //if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3')
  if(isSpravaSkoly() and $_GET['page']!='recertifikace')
  $res.='<br /><input type="submit" value="Uložit" />';

  else

  $res.="<span onclick=\"$(window).scrollTop(parseInt($('#dotaznik').position().top-30));$('#dotaznik').tabs('select' , 0 )\" class='previousStep'>Vrátit se o krok zpět</span><span onclick=\"$(window).scrollTop(parseInt($('#dotaznik').position().top-30));$('#dotaznik').tabs( 'select' , 2 )\" class='nextStep'>Přejít na další krok -> Identifikační údaje</span>";

  

	$res.="

	</div>";
  
$res.="<div id=\"krok-3\">";

  //if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3')
  if(isSpravaSkoly())
  $res.="<img src='".fotkaSkoly($_GET['skola'])."' style='float:right;' />";

  

  $res.="

		 <p>Prosíme vás o uvedení základních údajů, které budou využity pro potřeby projektu Rodiče vítáni.</p>

      <label for='nazev'>Oficiální název školy *</label><br />

      <input type='text' name='nazev' id='nazev' value='{$data['skola'][1]}' /><br />

     <label for='adresa'>Adresa školy *</label><br /><span class='info'>Vyplňte, prosím, oficiální adresu školy (ulice, město, PSČ)</span><br />

      <textarea name='adresa' rows='5' id='adresa' cols='80'>{$data['skola'][2]}</textarea><br />

      <label for='kraj'>Kraj</label><br />

       <select name=\"kraj\" id=\"kraj\">";

if($kraj=="1")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"1\" $sel>Jihočeský</option>";

if($kraj=="2")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"2\" $sel>Jihomoravský</option>";

if($kraj=="3")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"3\" $sel>Karlovarský</option>";

if($kraj=="4")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"4\" $sel>Královéhradecký</option>";

if($kraj=="5")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"5\" $sel>Liberecký</option>";

if($kraj=="6")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"6\" $sel>Moravskoslezský</option>";

if($kraj=="7")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"7\" $sel>Olomoucký</option>";

if($kraj=="8")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"8\" $sel>Pardubický</option>";

if($kraj=="9")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"9\" $sel>Plzeňský</option>";

if($kraj=="10")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"10\" $sel>Středočeský</option>";

if($kraj=="11")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"11\" $sel>Praha</option>";

if($kraj=="12")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"12\" $sel>Ústecký</option>";

if($kraj=="13")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"13\" $sel>Vysočina</option>";

if($kraj=="14")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"14\" $sel>Zlínský</option>";

if($_GET['page']=='recertifikace')$samolepky="(cedule s kritérii, certifikát)"; else $samolepky="(cedule s kritérii a samolepka na dveře)";

$res.="</select><br />



      <label for='icSkoly'>IČ školy *</label><br />

      <input type='text' name='icSkoly' id='icSkoly' value='{$data['skola'][4]}' /><br />

      <label for='jmeno_reditele' >Jméno a příjmení ředitele/ředitelky *</label><br /><span class='info'>(Bude se zobrazovat u profilu školy na webu)</span><br />
      <input type='text' name='jmeno_reditele' id='jmeno_reditele' value='{$data['skola'][19]}' /><br />

      <label for='email_reditel'>E-mail ředitele/ředitelky *</label><br /><span class='info'>(Slouží pro interní komunikaci Rodiče vítáni a školy)</span><br />
      <input type='text' name='email_reditel' id='email_reditel' value='{$data['skola'][16]}' /><br />

      <label for='telefon_reditel'>Telefon na ředitele/ředitelku *</label><br /><span class='info'>(Slouží pro interní komunikaci Rodiče vítáni a školy)</span><br />
      <input type='text' name='telefon_reditel' id='telefon_reditel' value='{$data['skola'][17]}' /><br />

      <label for='telefon'>Telefon - Profil školy *</label><br /><span class='info'>(Bude se zobrazovat u profilu školy na webu)</span><br />
      <input type='text' name='telefon' id='telefon' value='{$data['skola'][5]}' /><br />

      <label for='email'>E-mail - Profil školy *</label><br /><span class='info'>(E-mail do školy, bude se zobrazovat u profilu školy na webu - může a nemusí být shodný s e-mailem na ředitele/ředitelku)</span><br />
      <input type='text' name='email' id='email' value='{$data['skola'][6]}' /><br />
      
      <label for='kontaktniOsoba'>Jméno a příjmení kontaktní osoby a její role ve škole - může být shodné se jménem ředitele/ředitelky</label><br /><span class='info'>(Slouží jako hlavní kontakt pro komunikaci se školou ohledně značky Rodiče vítáni, faktury, PR apod.Role - např. zástupce ředitele, učitelka na 1. st.)</span><br />
      <input type='text' name='kontaktniOsoba' id='kontaktniOsoba' value='{$data['skola'][3]}' /><br />

      <label for='email2'>E-mail kontaktní osoba - může být shodné s kontaktem na ředitele/ředitelku *</label><br /><span class='info'>(Slouží jako hlavní kontakt pro komunikaci se školou ohledně značky Rodiče vítáni, faktury, PR apod.)</span><br />
      <input type='text' name='email2' id='email2' value='{$data['skola'][15]}' /><br />

      <label for='telefon_kontakt'>Telefon kontaktní osoba - může být shodné s kontaktem na ředitele/ředitelku *</label><br /><span class='info'>(Slouží jako hlavní kontakt pro komunikaci se školou ohledně značky Rodiče vítáni, faktury, PR apod.)</span><br />
      <input type='text' name='telefon_kontakt' id='telefon_kontakt' value='{$data['skola'][18]}' /><br />

      <label for='nazev_ro'>Název a IČO rodičovské organizace</label><br />
      <input type='text' name='nazev_ro' id='nazev_ro' value='{$data['skola'][27]}' /><br />
      <label for='jmeno_zastupce_ro'>Jméno a příjmení zástupce rodičovské organizace</label><br />
      <input type='text' name='jmeno_zastupce_ro' id='jmeno_zastupce_ro' value='{$data['skola'][28]}' /><br />
      <label for='email_zastupce_ro'>Email zástupce rodičovské organizace</label><br />
      <input type='text' name='email_zastupce_ro' id='email_zastupce_ro' value='{$data['skola'][29]}' /><br />
      <label for='telefon_zastupce_ro'>Telefon zástupce rodičovské organizace</label><br />
      <input type='text' name='telefon_zastupce_ro' id='telefon_zastupce_ro' value='{$data['skola'][30]}' /><br />
      

      <label for='web'>Odkaz na web školy</label><br />
      <input type='text' name='web' id='web' value='{$data['skola'][7]}' /><br />

      <label for='facebook'>Odkaz na Facebook školy</label><br />
      <input type='text' name='facebook' id='facebook' value='{$data['skola'][23]}' /><br />

      <label for='popis'>Popis školy (zaměření, programy)</label><br /><span class='info'>(Max. 800 znaků včetně mezer)</span><br />
      <textarea name='popis' id='popis' cols='80' rows='8'>{$data['skola'][12]}</textarea><br />

      
      <label for='samolepky'>Počet označení značkou Rodiče vítáni ".$samolepky.". *</label><br />
      <span class='info'>(1 sada je v ceně základního poplatku 500 Kč. V případě, že máte více budov, na které chcete umístit označení Rodiče vítáni, vám můžeme zaslat další sadu.  Druhá sada je za doplatek 80 Kč, tj. celkem  580 Kč. Třetí sada za 40 Kč, celkem 620 Kč.)  Samolepka může být umístěna pouze na budově základní školy či víceletého gymnázia (ne však např. na budově mateřské školy, která patří k základní škole).</span><br />
      <select name='pocet_samolepek'>";
       if($data['skola'][20]==0)$sel=" selected='selected'";else $sel="";//if(isSpravaSkoly())$res.="<option value='0'$sel>0 sad</option>";
      
       if($data['skola'][20]==1)$sel=" selected='selected'";else $sel="";$res.="<option value='1'$sel>1 sada</option>";
       if($data['skola'][20]==2)$sel=" selected='selected'";else $sel="";$res.="<option value='2'$sel>2 sady</option>";
       if($data['skola'][20]==3)$sel=" selected='selected'";else $sel="";$res.="<option value='3'$sel>3 sady</option>";
      $res.="</select><br />

      <label for='cedule_anglicka'>Máme zájem o certifikát a ceduli Rodiče vítáni také v anglické mutaci</label><br />
      <span class='info'> (certifikát a cedule ve stejném provedení) - 1 sada za poplatek 250 Kč</span><br />
      <select name='cedule_anglicka'>";
       if($data['skola'][24]=='ano')$sel=" selected='selected'";else $sel="";$res.="<option value='ano'$sel>Ano</option>";
       if($data['skola'][24]=='ne')$sel=" selected='selected'";else $sel="";$res.="<option value='ne'$sel>Ne</option>";
       
      $res.="</select><br />

      <label for='kniha'>Kniha Tomáše Feřtka: Rodiče vítáni: praktický návod, jak usmířit rodiče a učitele našich dětí. </label><br />
      <span class='info'>Za zvýhodněnou cenu - 149 Kč bez poštovného.</span><br />
      <select name='kniha'>";
       if($data['skola'][25]==0)$sel=" selected='selected'";else $sel="";$res.="<option value='0'$sel>Nemáme zájem</option>";
       if($data['skola'][25]==1)$sel=" selected='selected'";else $sel="";$res.="<option value='1'$sel>1 ks</option>";
       if($data['skola'][25]==2)$sel=" selected='selected'";else $sel="";$res.="<option value='2'$sel>2 ks</option>";
       if($data['skola'][25]==3)$sel=" selected='selected'";else $sel="";$res.="<option value='3'$sel>3 ks</option>";
      $res.="</select><br />


      <label for='poznamka'>Poznámka</label><br />
      <textarea name='poznamka' id='poznamka' cols='80' rows='8'>{$data['skola'][21]}</textarea><br />

      <label for='kde_se_dozvedel'>Kde jste se o značce Rodiče vítáni dozvěděl/a?</label><br />
      <textarea name='kde_se_dozvedel' id='kde_se_dozvedel' cols='80' rows='8'>{$data['skola'][22]}</textarea><br />";



  //if($_GET['page']=='spravaSkol' or $_GET['page']=='spravaSkol2' or $_GET['page']=='spravaSkol3')
  if(isSpravaSkoly() and $_GET['page']!='recertifikace')
  $res.='<br /><input type="submit" value="Uložit" />';

  else $res.="<span onclick=\"$(window).scrollTop(parseInt($('#dotaznik').position().top-30));$('#dotaznik').tabs( 'select' , 1 )\" class='previousStep'>Vrátit se o krok zpět</span><span onclick=\"$(window).scrollTop(parseInt($('#dotaznik').position().top-30));  $('#dotaznik').tabs( 'select' , 3 );\" class='nextStep'>Přejít na další krok -> Odeslání dotazníku</span>";

      

	$res.="</div>";


	//if($_GET['page']!='spravaSkol' and $_GET['page']!='spravaSkol2' and $_GET['page']!='spravaSkol3')
  if($_GET['page']!='recertifikace')$odeslat='Odeslat';else $odeslat="Obnovit certifikaci";
  if(!isSpravaSkoly() or $_GET['page']=='recertifikace')
  $res.="  

  <div id='krok-4'>

   <label for='souhlas'>Souhlasím s poskytnutím osobních údajů</label>

   <input type='checkbox' name='souhlas' id='souhlas' value='1' />
   <br />
   
   <label for='kontrola'>Zodpovězte kontrolní otázku: <strong>Jaká je barva nebe?</strong></label>

   <input type='text' name='kontrola' id='kontrola' value='' />

   <p><input type='submit' value='$odeslat' onclick=\"

   $('#nazev').css({'border':'1px solid #dcdcdc'});

   $('#adresa').css({'border':'1px solid #dcdcdc'});

   $('#icSkoly').css({'border':'1px solid #dcdcdc'});

   $('#telefon').css({'border':'1px solid #dcdcdc'});

   $('#email').css({'border':'1px solid #dcdcdc'});

   $('#jmeno_reditele').css({'border':'1px solid #dcdcdc'});
   $('#telefon_reditel').css({'border':'1px solid #dcdcdc'});
   $('#email_reditel').css({'border':'1px solid #dcdcdc'});
   
   

   if(!$('#nazev').attr('value')){alert('Je nutné vyplnit název školy');$('#nazev').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;} 

   if(!$('#adresa').attr('value')){alert('Je nutné vyplnit adresu školy');$('#adresa').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;}

   if(!$('#icSkoly').attr('value')){alert('Je nutné vyplnit identifikační číslo školy');$('#icSkoly').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;}

   //if(!$('#kontaktniOsoba').attr('value')){alert('Je nutné vyplnit kontaktní osobu');$('#kontaktniOsoba').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;}

   if(!$('#telefon').attr('value')){alert('Je nutné vyplnit telefon školy');$('#telefon').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;}

   if(!$('#email').attr('value')){alert('Je nutné vyplnit email školy, který bude uveden v profilu');$('#email').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;}

   //if(!$('#email2').attr('value')){alert('Je nutné vyplnit email školy sloužící ke komunikaci ohledně faktury, PR apod.');$('#email2').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;}

   if(!$('#jmeno_reditele').attr('value')){alert('Je nutné vyplnit jméno ředitele/ředitelky, které bude uvedeno v profilu');$('#jmeno_reditele').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;}
   if(!$('#email_reditel').attr('value')){alert('Je nutné vyplnit email ředitele/ředitelky');$('#email_reditel').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;}
   if(!$('#telefon_reditel').attr('value')){alert('Je nutné vyplnit telefon na ředitele/ředitelku');$('#telefon_reditel').css({'border':'1px solid red'});$('#dotaznik').tabs( 'select',2);return false;}
   
   if(!$('#souhlas').attr('checked')){alert('Je nutné udělit souhlas s poskytnutím osobních údajů');$('#dotaznik').tabs( 'select',3);return false;}
   if($('#kontrola').val()!='modrá' && $('#kontrola').val()!='modra'){alert('Kontrolní otázka je chybně zodpovězená ');$('#dotaznik').tabs( 'select',3);return false;}

   if($('#popis').val().length>800){alert('Popis je příliš dlouhý - '+$('#popis').val().length+' znaků. Je nutné dodržet maximální délku 800 znaků včetně mezer.');$('#dotaznik').tabs( 'select',0);return false;}

   

   \"/></p>

   <span onclick=\"$(window).scrollTop(parseInt($('#dotaznik').position().top-30));$('#dotaznik').tabs( 'select' , 2 )\" class='previousStep'>Vrátit se o krok zpět</span></div>";

$res.="  
</div>
</form>
";

}







$content.= $res;

}
return $content;

}

function spravaSkolAdminSeznamZpracovane()
{
  spravaSkolAdminSeznam('zpracovana');
}

function spravaSkolAdminSeznamNecertifikujeme()
{
  spravaSkolAdminSeznam('necertifikujeSe');
}

function spravaSkolAdminSeznamProsle()
{
  spravaSkolAdminSeznam('proslaCertifikace');
}
function spravaSkolAdminSeznamRecertifikace()
{
  spravaSkolAdminSeznam('recertifikaceKeSchvaleni');
}


function spravaSkolAdminSeznam($faze='',$pouzeDotaz=0)
{
if(!$faze)$faze='rozpracovana';
//'rozpracovana', 'necertifikujeSe', 'zpracovana

if($_GET['page']=='spravaSkol')$spravaSkol='spravaSkol';
elseif($_GET['page']=='spravaSkol2')$spravaSkol='spravaSkol2';
elseif($_GET['page']=='spravaSkol3')$spravaSkol='spravaSkol3';
elseif($_GET['page']=='spravaSkol4')$spravaSkol='spravaSkol4';
else $spravaSkol='spravaSkol5';

if ($_GET['skola'] && $_GET['archiv']==1)$res.=archiv_skoly($_GET['skola']);

elseif ($_GET['skola'])$res.=spravaSkolAdminDetail($_GET['skola']);

else

{

//************** hromadne akce *********************
if(isset($_POST['skoly']) and strlen($_POST['skoly'])>0)
{
//print_r($_POST['skoly']);exit; 
$skoly = array();
parse_str($_POST['skoly'], $skoly);
//$skoly=unserialize($_POST['skoly']);
//print_r($skoly);
foreach ($skoly as $skola)
{
//echo $skola;
if($_POST['hromadnaAkce']=='zobrazitNaMape') //zmena smyslu ze zapisu platby pouze na zverejneni na mape
{
$sql="UPDATE skoly SET datumZverejneni=NOW(),zobrazeno=1 WHERE id='$skola'";
db_dotaz($sql);
generujXML();//vygeneruje nove xml s daty skol pro google mapu
}
                         
if($_POST['hromadnaAkce']=='skrytZMapy')//skryvani z mapy, platby se resi mimo system
{
$sql="UPDATE skoly SET zobrazeno=0 WHERE id='$skola'";
db_dotaz($sql);
generujXML();//vygeneruje nove xml s daty skol pro google mapu
}

if($_POST['hromadnaAkce']=='zapsatPlatbu') //zapis platby
{
$sql="UPDATE skoly_meta SET faktura_zaplacena='ano' WHERE id_skoly='$skola'";
db_dotaz($sql);
//echo $sql;
}



if($_POST['hromadnaAkce']=='zrusitPlatbu')//zruseni platby
{
$sql="UPDATE skoly_meta SET faktura_zaplacena='' WHERE id_skoly='$skola'";
db_dotaz($sql);
}



if($_POST['hromadnaAkce']=='doZpracovanych')
{
$sql="UPDATE skoly SET faze='zpracovana' WHERE id='$skola'";
db_dotaz($sql);
}

if($_POST['hromadnaAkce']=='doNecertifikujeme')
{
$sql="UPDATE skoly SET faze='necertifikujeSe' WHERE id='$skola'";
db_dotaz($sql);
}


if($_POST['hromadnaAkce']=='doRozpracovanych')
{
$sql="UPDATE skoly SET faze='rozpracovana' WHERE id='$skola'";
db_dotaz($sql);
}

if($_POST['hromadnaAkce']=='smazatSkolu')
{     echo "smazana";exit;
$sql="DELETE FROM skoly WHERE id='$skola'";
db_dotaz($sql);
$sql="DELETE FROM odpovedi_dotaznik WHERE id_skoly='$skola'";
db_dotaz($sql);
generujXML();//vygeneruje nove xml s daty skol pro google mapu
}
}
}

//************ jednotlive akce **************

if($_POST['akce']=='znovuOdeslatMailUpozorneni')
{
     if($_SERVER['HTTP_HOST'])$domena=$_SERVER['HTTP_HOST'];else $domena="rodicevitani.cz";
    $url='http://'.$domena."/recertifikace/?page=recertifikace&skola={$_POST['skola']}&h=".hashSkoly($_POST['skola']);

mail_upozorneni_obnoveni_certifikace($_POST['skola'],$url);

}

if($_POST['akce']=='zobrazitNaMape') //zmena smyslu ze zapisu platby pouze na zverejneni na mape
{
$sql="UPDATE skoly SET datumZverejneni=NOW(),zobrazeno=1 WHERE id='{$_POST['skola']}'";
db_dotaz($sql);
generujXML();//vygeneruje nove xml s daty skol pro google mapu
}


if($_POST['akce']=='skrytZMapy')//skryvani z mapy, platby se resi mimo system
{
$sql="UPDATE skoly SET zobrazeno=0 WHERE id='{$_POST['skola']}'";
db_dotaz($sql);
generujXML();//vygeneruje nove xml s daty skol pro google mapu
}

if($_POST['akce']=='zapsatPlatbu') //zapis platby
{
$sql="UPDATE skoly_meta SET faktura_zaplacena='ano' WHERE id_skoly='{$_POST['skola']}'";
db_dotaz($sql);
//echo $sql;
}



if($_POST['akce']=='zrusitPlatbu')//zruseni platby
{
$sql="UPDATE skoly_meta SET faktura_zaplacena='' WHERE id_skoly='{$_POST['skola']}'";
db_dotaz($sql);
}



if($_POST['akce']=='doZpracovanych')
{
$sql="UPDATE skoly SET faze='zpracovana' WHERE id='{$_POST['skola']}'";
db_dotaz($sql);
}

if($_POST['akce']=='doNecertifikujeme')
{
$sql="UPDATE skoly SET faze='necertifikujeSe' WHERE id='{$_POST['skola']}'";
db_dotaz($sql);
}


if($_POST['akce']=='doRozpracovanych')
{
$sql="UPDATE skoly SET faze='rozpracovana' WHERE id='{$_POST['skola']}'";
db_dotaz($sql);
}

if($_POST['akce']=='smazatSkolu')

{

$sql="DELETE FROM skoly WHERE id='{$_POST['skola']}'";

db_dotaz($sql);

//echo $sql."<br />";

$sql="DELETE FROM odpovedi_dotaznik WHERE id_skoly='{$_POST['skola']}'";

db_dotaz($sql);

//echo $sql."<br />";

generujXML();//vygeneruje nove xml s daty skol pro google mapu



}

if($_POST['akce']=='nahratFotku')
{
$uploads_dir = '../wp-content/uploads/skolyFoto';

foreach ($_FILES["fotka"]["error"] as $key => $error) {

    if ($error == UPLOAD_ERR_OK) {

        $typ=substr($_FILES["fotka"]["name"][$key],-4);

        $tmp_name = $_FILES["fotka"]["tmp_name"][$key];

        $name = $_POST['skola'].$typ;

        //move_uploaded_file($tmp_name, "$uploads_dir/$name");

        zpracuj_fotku($_POST['skola'],$tmp_name);

    }

}

}

switch ($faze)
{
case 'rozpracovana':{break;}
case 'zpracovana':{break;}
case 'necertifikujeSe':{break;}
}

//if($rozpracovane)$podm="WHERE zaplaceno='0'";else $podm="WHERE certifikovana='1' AND zaplaceno='1'";
$podm="WHERE faze='$faze'";


$ord="ORDER BY s.id";

if($_POST['nazev_filtr']) {$filtr.=" AND nazev LIKE '%{$_POST['nazev_filtr']}%' ";}
if($_POST['kraj_filtr']) {$filtr.=" AND region = '{$_POST['kraj_filtr']}' ";}

$sql="SELECT nazev,zobrazeno,datumZverejneni,s.id,certifikovana,datum_certifikace,prvni_email,faktura_odeslana,faktura_zaplacena,obalka_odeslana,poznamka_meta,naplnovani_kriteria,tipy_na_plneni,cislo,adresa,ic_skoly,email,pocet_samolepek,cedule_anglicka,kniha,archiv.id as archivId FROM skoly s JOIN skoly_meta ON skoly_meta.id_skoly=s.id LEFT JOIN (SELECT id FROM skoly_archiv )as archiv ON archiv.id=s.id $podm $filtr $ord";
//echo $sql; 
$seznam=db_dotaz($sql);
if($pouzeDotaz)return $seznam;
vyhledavaci_filtr();
switch ($faze)
{
case 'rozpracovana':{$res="<h2>Správa škol - rozpracované registrace</h2><a href='/wp-content/plugins/export-excel/excel.php?faze=rozpracovane'>Export pro Excel</a>&nbsp;&nbsp;&nbsp;<a href='/wp-content/plugins/export-excel/excel.php?faze=kompletni'>Export pro Excel - kompletní</a>";break;}
case 'zpracovana':{$res="<h2>Správa škol - zveřejněné školy</h2><a href='/wp-content/plugins/export-excel/excel.php'>Export pro Excel</a>&nbsp;&nbsp;&nbsp;<a href='/wp-content/plugins/export-excel/excel.php?faze=kompletni'>Export pro Excel - kompletní</a>";break;}
case 'necertifikujeSe':{$res="<h2>Správa škol - necertifikujeme</h2>&nbsp;&nbsp;&nbsp;<a href='/wp-content/plugins/export-excel/excel.php?faze=kompletni'>Export pro Excel - kompletní</a>";break;}
case 'proslaCertifikace':{$res="<h2>Správa škol - prošlá certifikace</h2>&nbsp;&nbsp;&nbsp;<a href='/wp-content/plugins/export-excel/excel.php?faze=kompletni'>Export pro Excel - kompletní</a>";break;}
case 'recertifikaceKeSchvaleni':{$res="<h2>Správa škol - recertifikace čekající na schválení</h2>&nbsp;&nbsp;&nbsp;<a href='/wp-content/plugins/export-excel/excel.php?faze=kompletni'>Export pro Excel - kompletní</a>";break;}

}


if($seznam)

{
$hromadnaAkce="<div>
<form action='' method='post' id='hromadnaAkceForm'>
  <input type='hidden' name='hromadnaAkce' id='hromadnaAkce' />
  <input type='hidden' name='skoly' id='vybraneSkoly' />
  <input type='button' value='Zveřejnit na mapě' onclick=\"getAllChecked();jQuery('#hromadnaAkce').val('zobrazitNaMape');jQuery('#hromadnaAkceForm').submit();\" />
  <input type='button' value='Smazat' onclick=\"if(confirm('Skutečně si přejete tuto školu smazat? Údaje o škole a odpovědi z dotazníku budou nenávratně smazány.')){
  getAllChecked();jQuery('#hromadnaAkce').val('smazatSkolu');jQuery('#hromadnaAkceForm').submit();}\" />
  <input type='button' value='Skrýt z mapy' onclick=\"getAllChecked();jQuery('#hromadnaAkce').val('skrytZMapy');jQuery('#hromadnaAkceForm').submit();\" />
  <input type='button' value='Zapsat platbu' onclick=\"getAllChecked();jQuery('#hromadnaAkce').val('zapsatPlatbu');jQuery('#hromadnaAkceForm').submit();\" />
   
  <input type='button' value='Do zveřejněných' onclick=\"getAllChecked();jQuery('#hromadnaAkce').val('doZpracovanych');jQuery('#hromadnaAkceForm').submit();\" />
<input type='button' value='Necertifikujeme' onclick=\"getAllChecked();jQuery('#hromadnaAkce').val('doNecertifikujeme');jQuery('#hromadnaAkceForm').submit();\" />
<input type='button' value='Do rozpracovaných' onclick=\"getAllChecked();jQuery('#hromadnaAkce').val('doRozpracovanych');jQuery('#hromadnaAkceForm').submit();\" />
  
</form>
</div>
";
$res.="
<script>
function getAllChecked()
{
  jQuery('#vybraneSkoly').val(jQuery('.hromadnaAkce:checked').serialize());
}
</script>";
$res.=$hromadnaAkce."<table id='seznamSkol'>
                                                        
<tr><th></th><th>Číslo</th><th>Fakt. zaplacena</th><th class='nazev'>Název školy</th><th>Adresa<th>IČ</th><th>Email</th></th><th>Certifikována</th><th>Rok certifikace</th><th>Zveřejněna</th><th>Datum zveřejnění<br />(certifikace)</th><th>1.Email</th><th>Fakt. odesl.</th><th>Obálka odesl.</th><th class='pozn'>Pozn.</th><th>Počet sad</th><th>Cedule angl.</th><th>Kniha</th><th>Akce</th></tr>

";

                                                                       



  foreach($seznam as $i=>$s)

  {

  if($i%2)$cl=" class='licha'";else $cl=" class='suda'";

  $zverejneno=$s[1]?'Ano':'Ne';

  //$certifikovana =$s[4]?'Ano':'Ne';
  if($s[4]==1)$certifikovana ='Ano';
  elseif($s[4]==0)$certifikovana ='Ne';
  elseif($s[4]==-1)$certifikovana ='Čekání na obnovu';

  if(!$s[1]){

  $akce="<form method=\"post\" action=\"?page=$spravaSkol\"><input type=\"hidden\" name='skola' value=\"{$s[3]}\" /><input type=\"hidden\" name='akce' value=\"zobrazitNaMape\" /><input type=\"submit\" value=\"Zveřejnit\" /></form>";

  $akce.="<form method=\"post\" action=\"?page=$spravaSkol\"><input type=\"hidden\" name='skola' value=\"{$s[3]}\" /><input type=\"hidden\" name='akce' value=\"smazatSkolu\" /><input type=\"submit\" value=\"Smazat školu\" onclick='return confirm(\"Skutečně si přejete tuto školu smazat? Údaje o škole a odpovědi z dotazníku budou nenávratně smazány.\");' /></form>";



  }

  else {
  $akce="<form method=\"post\" action=\"?page=$spravaSkol\"><input type=\"hidden\" name='skola' value=\"{$s[3]}\" /><input type=\"hidden\" name='akce' value=\"skrytZMapy\" /><input type=\"submit\" value=\"Skrýt z mapy\" /></form>";
  }
  //podle typu vypisu
  if($spravaSkol=='spravaSkol'){
  $akce.="<form method=\"post\" action=\"?page=$spravaSkol\"><input type=\"hidden\" name='skola' value=\"{$s[3]}\" /><input type=\"hidden\" name='akce' value=\"doZpracovanych\" /><input type=\"submit\" value=\"Do zveřejněných\" /></form>";
  $akce.="<form method=\"post\" action=\"?page=$spravaSkol\"><input type=\"hidden\" name='skola' value=\"{$s[3]}\" /><input type=\"hidden\" name='akce' value=\"doNecertifikujeme\" /><input type=\"submit\" value=\"Necertifikujeme\" /></form>";
  }
  if($spravaSkol=='spravaSkol3'){
  $akce.="<form method=\"post\" action=\"?page=$spravaSkol\"><input type=\"hidden\" name='skola' value=\"{$s[3]}\" /><input type=\"hidden\" name='akce' value=\"doRozpracovanych\" /><input type=\"submit\" value=\"Do rozpracovaných\" /></form>";
   }
  if($spravaSkol=='spravaSkol2'){
  $akce.="<form method=\"post\" action=\"?page=$spravaSkol\"><input type=\"hidden\" name='skola' value=\"{$s[3]}\" /><input type=\"hidden\" name='akce' value=\"doRozpracovanych\" /><input type=\"submit\" value=\"Do rozpracovaných\" /></form>";
   } 
  $akce.="<span class='fotkaUploadBut' onclick=\"jQuery('#fotka{$s[3]}').toggle('slow');\"></span><div id='fotka{$s[3]}' class='fotkaUpload'><form method=\"post\" action=\"?page=$spravaSkol\" enctype=\"multipart/form-data\"><input type=\"hidden\" name='skola' value=\"{$s[3]}\" /><input type=\"hidden\" name='akce' value=\"nahratFotku\" /><input type=\"file\" name='fotka[]' size='9' /><input type=\"submit\" value='Nahrát' /></form>";

  

  if($s[1])$datum=date('d.m.Y',strtotime($s[2]));else $datum='';
    if(!$s[8]) $zaplaceno = "<form method=\"post\" action=\"?page=$spravaSkol\"><input type=\"hidden\" name='skola' value=\"{$s[3]}\" /><input type='submit' value='Zaplaceno' /><input type='hidden' name='akce' value='zapsatPlatbu'/></form>"; else $zaplaceno = $s[8];
   
    if(!$s[20])$rok_certifikace='1';
    else
    { 
    $sql="SELECT (COUNT(*)+1) FROM skoly_archiv WHERE id='".$s[3]."'";
    //echo $sql;
     $rokc=db_dotaz($sql);
     $rok_certifikace=$rokc[0][0];
    }
    //$zaplaceno=' style="background:red;color:white;"';else $zaplaceno='';
    $res.= "<tr$cl><td><form action=''><input type='checkbox' name='hromadnaAkce{$s[3]}' class='hromadnaAkce' value='{$s[3]}' /></form></td><td>{$s[13]}</td><td>$zaplaceno</td><td><a href=\"?page=$spravaSkol&amp;skola=".$s[3]."\">".$s[0]."</a></td><td>{$s[14]}</td><td>{$s[15]}</td><td>{$s[16]}</td><td>$certifikovana"; if($s[4]==-1)$res.="<br /><form method='post' action=''><input type='hidden' name='akce' value='znovuOdeslatMailUpozorneni' /><input type='hidden' name='skola' value='{$s[3]}' /><input type='submit' value='Odeslat upozornění' /></form>";$res.="</td><td>$rok_certifikace</td><td>".$zverejneno."</td><td>".$datum."</td>
    <td>{$s[6]}</td><td>{$s[7]}</td><td>{$s[9]}</td><td>{$s[10]}</td><td>{$s[17]}</td><td>{$s[18]}</td><td>{$s[19]}</td>
    <td>$akce</td></tr>";

  }

}

$res.="</table>";

}

echo $res;



}

/**
 * vraci hash pro danou skolu
 */ 
function hashSkoly($skola)
{
  return md5("hash-$skola");
}

function dotaznikRecertifikace($content)
{
$skola=$_GET['skola'];
if(is_numeric($skola))
{
$sql="SELECT certifikovana FROM skoly WHERE id='$skola'";
$s=db_dotaz($sql);
if($s[0][0]==-1 and hashSkoly($skola)==$_GET['h'])
$content.=spravaSkolAdminDetail($skola,0,1);
else $content="Neplatná adresa stránky!";     
}
return $content;
}


function spravaSkolAdminDetail($skola,$pouzeData=0,$opakovanaCertifikace=0,$archivni_data=0,$archiv_rok=0)
{

$data=array();
if($archivni_data)$archiv='_archiv';else $archiv='';
if($_GET['page']!='recertifikace')$selectRoku=archiv_select($skola);
if(is_numeric($_GET['rok']) and $archivni_data)$rok=" AND rok='{$_GET['rok']}'";else $rok='';
$sql="SELECT * FROM skoly$archiv WHERE id='$skola' $rok";
$s=db_dotaz($sql);
 
$data['skola']=$s[0];
//if($s[10]==-1)$opakovanaCertifikace=true;
$sql="SELECT a1,a2,a3,a4,a5,a6,a7 FROM odpovedi_dotaznik$archiv WHERE id_skoly='$skola' $rok";
$a=db_dotaz($sql);

$data['povinne']=$a[0];

$sql="SELECT b1,b2,b3,b4,b5,b6,b7,b8,b9,b10,b11,b12,b13,b14,b15,b16,b17 FROM odpovedi_dotaznik$archiv WHERE id_skoly='$skola' $rok";
$b=db_dotaz($sql);

$data['volitelne']=$b[0];

$sql="SELECT datum_certifikace,prvni_email,faktura_odeslana,faktura_zaplacena,obalka_odeslana,poznamka_meta,naplnovani_kriteria,tipy_na_plneni,cislo FROM skoly_meta$archiv WHERE id_skoly='$skola'";
$data['metadata']=db_dotaz($sql);
$sql="SELECT varianta FROM odpovedi_dotaznik$archiv WHERE id_skoly='$skola' $rok";
$varianta=db_dotaz($sql);
$data['varianta']=$varianta[0][0];

if($pouzeData)return $data;

if($_POST['akce']=='kontrola' or $_GET['page']=='recertifikace'){return $selectRoku.dotaznikRodiceVitani('',$data); }//v pripade ulozeni dat v administraci
//if($_GET['page']=='recertifikace')
return "<h2>Detail školy {$s[0][1]}</h2>".$selectRoku.dotaznikRodiceVitani('',$data);

}



function initSpravaSkol()

{

add_menu_page( 'Správa škol', 'Správa škol', 'administrator', 'spravaSkol','spravaSkolAdminSeznam' );
//add_submenu_page( 'spravaSkol','Správa škol - rozpracované', 'Správa škol - rozpracované', 'administrator', 'spravaSkol1','spravaSkolAdminSeznamRozpracovane');

add_submenu_page( 'spravaSkol','Správa škol - zveřejněné', 'Zveřejněné', 'administrator', 'spravaSkol2','spravaSkolAdminSeznamZpracovane' );
add_submenu_page( 'spravaSkol','Správa škol - necertifikujeme', 'Necertifikujeme', 'administrator', 'spravaSkol3','spravaSkolAdminSeznamNecertifikujeme' );
add_submenu_page( 'spravaSkol','Správa škol - prošlé', 'Prošlé', 'administrator', 'spravaSkol4','spravaSkolAdminSeznamProsle' );
add_submenu_page( 'spravaSkol','Správa škol - recertifikace čekající na schválení', 'Recertifikace ke schválení', 'administrator', 'spravaSkol5','spravaSkolAdminSeznamRecertifikace' );

//odeslat_upozorneni_skonceni_certifikace();
}



function dotaznikStyle()

{

//echo '<link rel="stylesheet" type="text/css" media="all" href="http://rodicevitani.cz/wp-content/themes/rodicevitanicz/style.css" />';

echo "<style type='text/css'>

#dotaznik input[type=\"text\"],#dotaznik textarea, #dotaznik select{width:600px;}



h3 span.odrazka {background: none repeat scroll 0 0 #73A534;color: white;padding: 3px;}

#dotaznik {font-size:1.1em;}
#dotaznik #krok-3 label,#dotaznik #krok-0 label{font-weight:bold;}
#dotaznik span.info{color:#888888;}

#seznamSkol{width:2500px;}

#seznamSkol th{background:#73A534;color:white;padding:5px;}

#seznamSkol th.akce{width:180px;}
#seznamSkol th.nazev{width:200px;}
#seznamSkol th.pozn{width:400px;}

#seznamSkol td form{float:left;}

#seznamSkol td{border: 1px solid; padding: 5px;}

#seznamSkol tr.licha{background:#ececec;}

.fotkaUpload{display:none;width:210px;}

.fotkaUploadBut{float:left;display:block;width:25px;height:25px;background:url('".get_bloginfo( 'template_url' )."/images/fotka.png') #acacac;cursor:pointer;}


.komentar_kriteria{position:relative;background:url('".get_bloginfo( 'template_url' )."/images/napoveda.png');width:25px;height:25px;display:block;float:right;}
.komentar_text{display:none;font-size:0.8em;font-weight:normal;position:absolute;padding:5px;right:25px;top:0;background:white;border:1px solid green;width:450px;}
</style>";



echo '<link rel="stylesheet" type="text/css" media="screen" href="http://rodicevitani.cz/wp-content/themes/rodicevitanicz/jquery-ui.custom.css" />';

}



function fotkaSkoly($id,$velikost='')

{

 $dir=FOTKY_DIR;

 

  if(file_exists($_SERVER["DOCUMENT_ROOT"].$dir.$id.'.jpg'))return 'http://'.$_SERVER['HTTP_HOST'].$dir.$id.'.jpg';

  elseif(file_exists($_SERVER["DOCUMENT_ROOT"].$dir.$id.'.png'))return 'http://'.$_SERVER['HTTP_HOST'].$dir.$id.'.png';

  elseif(file_exists($_SERVER["DOCUMENT_ROOT"].$dir.$id.'.gif'))return 'http://'.$_SERVER['HTTP_HOST'].$dir.$id.'.gif';

  else return '';   

}



function zpracuj_fotku($skola,$tmpfile)

{

    $def = getimagesize($tmpfile);

		if ($def === false || !isset($def[2]) || !in_array($def[2], array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF)) || $def[0] == 0 || $def[1] == 0) {

			unlink($tmpfile);

			

			return 'Byla nahrána fotografie v nedporovaném formátu. Podporovány jsou formáty JPEG, PNG a GIF.';

		}



		



		$src = imagecreatefromstring(file_get_contents($tmpfile));



		$max = max($def[0], $def[1]);



		

	$ratio = 40 / $max;

		if ($max <= 40) {

			$thm = imagecreatetruecolor($def[0], $def[1]);

			imagecopyresampled($thm, $src, 0, 0, 0, 0, $def[0], $def[1], $def[0], $def[1]);

		} else {

			$thm = imagecreatetruecolor(round($def[0] * $ratio), round($def[1] * $ratio));

			imagecopyresampled($thm, $src, 0, 0, 0, 0, round($def[0] * $ratio), round($def[1] * $ratio), $def[0], $def[1]);

		}

		imagejpeg($thm, '..'.FOTKY_DIR . $skola . '_tn.jpg', 85);

    

		$ratio = 250 / $max;

		if ($max <= 140) {

			$thm = imagecreatetruecolor($def[0], $def[1]);

			imagecopyresampled($thm, $src, 0, 0, 0, 0, $def[0], $def[1], $def[0], $def[1]);

		} else {

			$thm = imagecreatetruecolor(round($def[0] * $ratio), round($def[1] * $ratio));

			imagecopyresampled($thm, $src, 0, 0, 0, 0, round($def[0] * $ratio), round($def[1] * $ratio), $def[0], $def[1]);

		}

		imagejpeg($thm, '..'.FOTKY_DIR . $skola . '.jpg', 85);



		unlink($tmpfile);



		return true;

	

}


function vyhledavaci_filtr()
{ 
if(isset($_POST['kraj_filtr']))$kraj=$_POST['kraj_filtr'];else $kraj='';
if(isset($_POST['nazev_filtr']))$nazev=$_POST['nazev_filtr'];else $nazev='';
$res="<div id='filtr'><form action='' method='post'>";
$res.="<label for=''>Název</label>&nbsp;&nbsp;<input type='text' value='$nazev' name='nazev_filtr' />&nbsp;&nbsp;&nbsp;";

$res.="<label for=''>Kraj</label>&nbsp;&nbsp;<select name=\"kraj_filtr\">";
$res.="<option value=\"0\" $sel>-- žádný --</option>";
if($kraj=="1")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"1\" $sel>Jihočeský</option>";
if($kraj=="2")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"2\" $sel>Jihomoravský</option>";
if($kraj=="3")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"3\" $sel>Karlovarský</option>";
if($kraj=="4")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"4\" $sel>Královéhradecký</option>";
if($kraj=="5")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"5\" $sel>Liberecký</option>";
if($kraj=="6")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"6\" $sel>Moravskoslezský</option>";
if($kraj=="7")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"7\" $sel>Olomoucký</option>";
if($kraj=="8")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"8\" $sel>Pardubický</option>";
if($kraj=="9")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"9\" $sel>Plzeňský</option>";
if($kraj=="10")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"10\" $sel>Středočeský</option>";
if($kraj=="11")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"11\" $sel>Praha</option>";
if($kraj=="12")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"12\" $sel>Ústecký</option>";
if($kraj=="13")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"13\" $sel>Vysočina</option>";
if($kraj=="14")$sel="selected=\"selected\""; else $sel="";$res.="<option value=\"14\" $sel>Zlínský</option>";
$res.="</select>";
$res.="&nbsp;&nbsp;<input type='submit' value='Filtrovat' />";

$res.="</form></div>";
echo $res;
}

/**
 * vytvori duplikat zaznamu skoly
 */ 
function vytvorit_duplikat($skola)
{
//nacist data z tabulky skoly
//vytvorit duplikatni zaznam, do archivu nastavit rok podle data certifikace

$rok = zjistit_rok_certifikace($skola);

$sql="SELECT * FROM skoly WHERE id='$skola'";

$values=db_dotaz($sql);
if($values)
{
$atributy='';
//$rok=$values[0][count($values[0])-1];
foreach($values as $val)
{
//print_r($val);
//echo $i;exit;
foreach($val as $i=>$v)
{
if($i>0)$atributy.=",";
$atributy.="'{$v}'";
//echo $atributy."*";
}
}
$atributy.=",'$rok'";
//echo $atributy;exit;
$sql="INSERT INTO skoly_archiv VALUES($atributy)";
db_dotaz($sql);
$sql="UPDATE skoly SET certifikovana='-1' WHERE id='$skola'";
db_dotaz($sql);
}

//nacist data z tabulky odpovedi_dotaznik
//vytvorit duplikatni zaznam, nastavit cedule na 0, knihu na 0
$sql="SELECT * FROM odpovedi_dotaznik WHERE id_skoly='$skola'";
$values=db_dotaz($sql);
if($values)
{
$atributy='';
foreach($values as $val)
{
foreach($val as $i=>$v)
{

if($i>0)$atributy.=",";
$atributy.="'{$v}'";
}
}

$sql="Update odpovedi_dotaznik set varianta='".AKTUALNI_VARIANTA."' WHERE  id_skoly='$skola'";
db_dotaz($sql);//zmenit variantu dotazniku na novou


//echo $atributy."*";exit;
$atributy.=",'$rok'";
$sql="INSERT INTO odpovedi_dotaznik_archiv VALUES($atributy)";
db_dotaz($sql);
}

//nacist data z tabulky skoly_meta, nakopirovat do archivu, aktualni zaznam smazat a vlozit pouze vybrana data
//datum zverejneni zvysit o rok
$sql="SELECT * FROM skoly_meta WHERE id_skoly='$skola'";

$values=db_dotaz($sql);
if($values)
{

$atributy='';
foreach($values as $val)
{
foreach($val as $i=>$v)
{

if($i>0)$atributy.=",";
$atributy.="'{$v}'";
}
}
$atributy.=",'$rok'";
$sql="INSERT INTO skoly_meta_archiv VALUES($atributy)";
db_dotaz($sql);

$sql="DELETE FROM skoly_meta WHERE id_skoly='$skola'";
db_dotaz($sql);

$sql="INSERT INTO skoly_meta (`id_skoly`,`datum_certifikace`,`cislo`) VALUES('{$values[0][0]}','{$values[0][1]}','{$values[0][2]}')";
db_dotaz($sql);

}

}

/**
 *  nastavi certifikaci dane skoly jako proslou
 */
 function nastavit_proslou_certifikaci($skola)
 {
 $sql="UPDATE skoly SET certifikace='-1' WHERE id='$skola'";
 db_dotaz($sql);

$teloMailu=""; 
$headers = 'From: www.rodicevitani.cz <certifikace@eduin.cz>' . "\r\n";
add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));//aby to posilalo html
wp_mail($_POST['email'], "Certifikace školy pozbyla platnost", $teloMailu, $headers);
 
 } 

 /**
  * vraci rok, kdy byla provedena certifikace
  * je nutne zvolit mezi datem certifikace v meta a mezi datem zverejneni  
  */   
 function zjistit_rok_certifikace($skola)
 {
    $sql="SELECT YEAR(datumZverejneni) FROM skoly WHERE id='$skola'";
    $rok=db_dotaz($sql);
    return $rok[0][0];
 }

 /**
  * vypise detail skoly s daty z archivu pro zvoleny rok
  */   
 function archiv_skoly($skola)
 {
// vytvorit_duplikat($skola);
 //$skola=$_GET['skola'];
 if(is_numeric($skola))
 {
 /*$sql="SELECT DISTINCT YEAR(datum_certifikace) FROM skoly_meta_archiv WHERE id_skoly='$skola' ORDER BY datum_certifikace ASC";
 $roky=db_dotaz($sql);
 
 if(is_array($roky) and !empty($roky))
 {
 if(!isset($_GET['rok']))$_GET['rok']=$roky[count($roky)-1][0];//nastavime default na nejvyssi rok, pokud neni rok zvolen
 $selectRoku="<div id='selectRoku'>";
 $url='?page='.$_GET['page']."&amp;skola=$skola";
 foreach($roky as $rok)
   {
     $selectRoku.="<a href='$url&amp;rok={$rok[0]}&amp;archiv=1'>{$rok[0]}</a>";
   }
  $selectRoku.="<a href='$url'>{$rok[0]}</a>"; 
 $selectRoku.="</div>";
 */
 //$selectRoku=archiv_select($skola);
 //if($selectRoku)
 //{  
 return spravaSkolAdminDetail($skola,0,0,1,$_GET['rok']);
 //}
 //else echo "Tato škola nemá archivní záznam!";
 }
 else echo "Tato škola neexistuje!";
 }

function komentar_kriteria($komentar)
{
return "<span class='komentar_kriteria' onmouseover=\"$('div',this).show();\" onmouseout=\"$('.komentar_text').hide();\"><div class='komentar_text'>$komentar</div></span>";
}

/**
 * vraci seznam s roky archivovanych zaznamu k dane skole + odkaz na aktualni zaznamy
 */ 
function archiv_select($skola)
{
$selectRoku='';
 $sql="SELECT DISTINCT YEAR(datumZverejneni) FROM skoly_archiv WHERE id='$skola' ORDER BY datumZverejneni ASC";
 $roky=db_dotaz($sql);

 if(is_array($roky) and !empty($roky))
 {
 if(!isset($_GET['rok']))$_GET['rok']=$roky[count($roky)-1][0];//nastavime default na nejvyssi rok, pokud neni rok zvolen
 $selectRoku="<div id='selectRoku'><span>Archiv záznamů: </span>";
 $url='?page='.$_GET['page']."&amp;skola=$skola";
 foreach($roky as $i=>$rok)
   {
    if($i>0) $selectRoku.=" | ";
    //echo $_GET['rok'].'**';
    if(isset($_GET['archiv']) and $_GET['archiv']==1 and $_GET['rok']==$rok[0])$selectRoku.='<strong>'.$rok[0].'</strong>';
    else
     $selectRoku.="<a href='$url&amp;rok={$rok[0]}&amp;archiv=1'>{$rok[0]}</a>";
     
   }
  if(isset($_GET['archiv']))$selectRoku.=" | <a href='$url'>Aktuální záznamy</a>";else $selectRoku.=" | <strong>Aktuální záznamy</strong>";
 $selectRoku.="</div>";  
 
}
return $selectRoku;
}

/**
 * $data - db zaznam skoly nebo id
 * $url - url recertifikace 
 */ 
function mail_upozorneni_obnoveni_certifikace($data,$url)
{
if(is_numeric($data))
{
   $sql="SELECT id,nazev,email2,datumZverejneni,email_reditel FROM skoly JOIN skoly_meta sm ON sm.id_skoly=skoly.id  WHERE certifikovana='-1' AND skoly.id='$data'";
   $skola_z=db_dotaz($sql);
   $skola=$skola_z[0];
}
else $skola=$data;

   $teloMailu = "
<p>Dobrý den,</p>
<p> těší nás, že se vaše škola cíleně zaměřuje na spolupráci s rodiči a stala se v uplynulém školním roce součástí sítě škol nesoucí značku Rodiče vítáni. Budeme rádi, když s námi bude spolupracovat i nadále. Protože <strong>".date("d. m. Y",strtotime(date("Y-m-d", strtotime($skola[3])) . " +1 year"))
."</strong>končí platnost vaší roční certifikace, chceme vás upozornit na to, <strong>jak si certifikaci značkou Rodiče vítáni obnovit</strong>.</p>
<p><strong>Profil vaší školy</strong> naleznete na tomto odkazu <a href='$url'>$url</a>, kde si prosím <strong>zkontrolujte a případně upravte</strong> (doplňte či odeberte)
<br />- základní kritéria, volitelná kritéria,
<br />- kontaktní údaje (ředitel/ka, kontakní osoba, rodičovská organizace),
<br />- popis vaší školy ad.</p>
<p>Uvedený odkaz je platný pouze pro vaši recertifikaci.</p>
<p>Obnovená certifikace začne platit až po ukončení té původní, recertifikaci můžete provést tedy klidně hned!</p>
<p>Přečtěte si prosím <a href=\"http://www.rodicevitani.cz/wp-content/uploads/2012/06/RV_kriteria_certifikace_uprava_komentare_1306121.pdf\">nové komentáře</a> ke každému kritériu. Vysvětlujeme v nich, co považujeme za kvalitní naplnění kritéria a co ne. A neváhejte plnění svých kritérií upravit podle současné situace ve škole.</p>
<p>Budete-li mít jakékoliv otázky k obnovení certifikace či nabídce pro školy, obraťte se na nás.</p>
<p>Těšíme se na další spolupráci!</p>
<p>S pozdravem,</p>
<p>
Kateřina Kubešová<br />
manažerka značky Rodiče vítáni<br />
EDUin, o.p.s. - Vzdělávání je i naše věc<br />
 +420 732 911 524<br />
katerina.kubesova@eduin.cz<br />
www.rodicevitani.cz<br />
</p>
<p>
<b><a href=\"http://www.rodicevitani.cz/pro-skoly/nabidka-pro-certifikovane-skoly/\">Co nabízíme pro školy</a> v novém školním roce:</b> Konference pro školy Rodiče vítáni (11.10. 2012) - nový program Extra třída - inspirativní články a videa - semináře - diskusní fórum
</p>
";

//echo $teloMailu;exit;

$teloAminMailu = "
<p>Dobrý den,<br /><br />škola {$skola[1]} byla vyzvána k obnovení certifikace značky Rodiče vítáni.<br />
<p><strong>Profil školy k recertifikaci</strong> naleznete na tomto odkazu <a href='$url'>$url</a></p>
  
</p>";                                                                                                                                                                          
$headers = 'From: www.rodicevitani.cz <certifikace@eduin.cz>' . "\r\n";
add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));//aby to posilalo html
if($skola)
{
  wp_mail('marek.drahovzal@seznam.cz', "Oznámení o výzvě k obnovení certifikace školy {$skola[1]}", $teloMailu, $headers);
  wp_mail('certifikace@eduin.cz', "Oznámení o výzvě k obnovení certifikace školy {$skola[1]}", $teloAminMailu, $headers);
  wp_mail(array($skola[2],$skola[4]), "Rodiče vítáni – certifikace vaší školy brzy skončí", $teloMailu, $headers);//kontaktni osobe a rediteli
}
//wp_mail($skola[4], "Rodiče vítáni – certifikace vaší školy brzy skončí", $teloMailu, $headers);//rediteli

}

/**
 *  odesila upozorneni na obnoveni certifikace s odkazem pro danou skolu
 */ 
function odeslat_upozorneni_obnoveni_certifikace() 
{
  //vyhledat skoly, kterym se blizi skonceni certifikatu
    $sql="SELECT id,nazev,email2,datumZverejneni,email_reditel FROM skoly JOIN skoly_meta sm ON sm.id_skoly=skoly.id  WHERE faze='zpracovana' AND (DATEDIFF (NOW(),datumZverejneni)>".(365 - POCET_DNI_UPOZORNENI_RECERTIFIKACE1)." AND DATEDIFF (NOW(),datumZverejneni)<366 AND certifikovana='1')";
   $skoly=db_dotaz($sql);

//logData($sql);  
  
   if($skoly) foreach($skoly as $skola)
   {
   //provest archivaci
   vytvorit_duplikat($skola[0]);
    //vygenerovat url pro obnoveni certifikace
     if($_SERVER['HTTP_HOST'])$domena=$_SERVER['HTTP_HOST'];else $domena="rodicevitani.cz";
    $url='http://'.$domena."/recertifikace/?page=recertifikace&skola={$skola[0]}&h=".hashSkoly($skola[0]);
    //odeslat mail
    mail_upozorneni_obnoveni_certifikace($skola,$url);
/* $teloMailu = "
 
<p>Dobrý den,<br /><br />brzy vyprší platnost vašeho certifikátu pro značku Rodiče vítáni.
<br />
Opakovanou certifikaci můžete provést kliknutím na následující odkaz 
<a href='$url'>$url</a>
</p>";                                                                                                                                                                          
*/


   }
}

/**
 *  odesila upozorneni na skonceni certifikace a skryti z mapy
 */ 
function odeslat_upozorneni_skonceni_certifikace() 
{
  //vyhledat skoly, kterym skoncila platnost certifikatu 
   $sql="SELECT id,nazev,email2,email_reditel FROM skoly JOIN skoly_meta sm ON sm.id_skoly=skoly.id WHERE faze!='proslaCertifikace' AND DATEDIFF(NOW(), datumZverejneni)>365 AND certifikovana=-1";
   $skoly=db_dotaz($sql);
//logData("skonceni - ".$sql);  
   if($skoly) foreach($skoly as $skola)
   {
  if($_SERVER['HTTP_HOST'])$domena=$_SERVER['HTTP_HOST'];else $domena="rodicevitani.cz";
    $url='http://'.$domena."/recertifikace/?page=recertifikace&skola={$skola[0]}&h=".hashSkoly($skola[0]);
    
  //presunout do proslych a skryt z mapy
   $sql="UPDATE skoly SET faze='proslaCertifikace',zobrazeno='0' WHERE id='{$skola[0]}'";
   db_dotaz($sql);
  generujXML();//vygeneruje nove xml s daty skol pro google mapu
  //odeslat informaci o skonceni certifikatu skole i adminovi
/*   $teloMailu = "
  <p>Dobrý den,<br /><br />právě vypršela platnost vašeho certifikátu pro značku Rodiče vítáni.
  <br />
  Opakovanou certifikaci můžete provést kliknutím na následující odkaz 
  <a href='$url'>$url</a>
  <br /><br />Váš web ;-)<br />www.rodicevitani.cz
  </p>";                                                                                                                                                                          
*/
  $teloMailu = "
<p>Dobrý den,</p>
<p>těší nás, že se vaše škola cíleně zaměřuje na spolupráci s rodiči a stala se v uplynulém školním roce součástí sítě škol nesoucí značku Rodiče vítáni. <strong>Certifikace vaší školy včerejším dnem vypršela</strong>, a proto jsme profil vaší školy skryli z mapy aktivních škol. Vaši certifikaci si však snadno můžete obnovit.</p>
<p><strong>Profil vaší školy</strong> naleznete na tomto odkazu <a href='$url'>$url</a>, kde si prosím <strong>zkontrolujte a případně upravte</strong> (doplňte či odeberte)
<br />- základní kritéria, volitelná kritéria,
<br />- kontaktní údaje (ředitel/ka, kontakní osoba, rodičovská organizace),
<br />- popis vaší školy ad.</p>
<p>Uvedený odkaz je platný pouze pro vaši recertifikaci.</p>
<p>Na základě roční zkušenosti a pro lepší porozumění kritériím jsme pro vás také ke každému kritériu připravili <a href=\"http://www.rodicevitani.cz/wp-content/uploads/2012/06/RV_kriteria_certifikace_uprava_komentare_1306121.pdf\"><strong>komentář</strong></a>. V něm vysvětlujeme, co považujeme za jeho kvalitní naplnění a co ne. <strong>Prosím prečtěte si kritéria certifikace podrobně</strong> a neváhejte je upravit podle současné situace ve škole.</p>
<p>Budete-li mít jakékoliv otázky k obnovení certifikace či nabídce pro školy neváhejte se na nás obrátit.</p>
<p>Těšíme se na další spolupráci!</p>
<p>S pozdravem,</p>
<p>
Kateřina Kubešová<br />
manažerka značky Rodiče vítáni<br />
EDUin, o.p.s. - Vzdělávání je i naše věc<br />
 +420 732 911 524<br />
katerina.kubesova@eduin.cz<br />
www.rodicevitani.cz<br />
</p>
<p>
<b><a href=\"http://www.rodicevitani.cz/pro-skoly/nabidka-pro-certifikovane-skoly/\">Co nabízíme pro školy</a> v novém školním roce:</b> Konference pro školy Rodiče vítáni (11.10. 2012) - nový program Extra třída - inspirativní články a videa - semináře - diskusní fórum
</p>
";
  
  $teloAminMailu = "
  <p>Dobrý den,<br /><br />škole {$skola[1]} skončila platnost certifikátu značky Rodiče vítáni a ve stanovené lhůtě neprovedla její obnovení. <br />
  <p><strong>Profil školy k recertifikaci</strong> naleznete na tomto odkazu <a href='$url'>$url</a></p>
  <br /><br />Váš web ;-)<br />www.rodicevitani.cz
  </p>";                                                                                                                                                                          
  $headers = 'From: www.rodicevitani.cz <certifikace@eduin.cz>' . "\r\n";
  add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));//aby to posilalo html
  wp_mail(array($skola[2],$skola[3]), "Rodiče vítáni - oznámení o ukončení platnosti certifikace", $teloMailu, $headers);//kontaktni osobe
  //wp_mail($skola[3], "Rodiče vítáni - oznámení o ukončení platnosti certifikace", $teloMailu, $headers);//rediteli
  
  wp_mail('marek.drahovzal@seznam.cz', "Rodiče vítáni - oznámení o ukončení platnosti certifikace {$skola[1]}", $teloMailu, $headers);
  wp_mail('certifikace@eduin.cz', "Rodiče vítáni - oznámení o skončení platnosti certifikace školy {$skola[1]}", $teloAminMailu, $headers);
//logData($skola[2]. "Oznámení o skončení platnosti certifikace". $teloMailu. $headers); 

  } exit;
}

wp_unschedule_event(wp_next_scheduled('obnoveni_certifikace'),'obnoveni_certifikace');
wp_unschedule_event(wp_next_scheduled('vyprseni_certifikace'),'vyprseni_certifikace');

if ( ! wp_next_scheduled('obnoveni_certifikace') ) {
wp_schedule_event( time(), 'hourly', 'obnoveni_certifikace' ); // hourly, daily and twicedaily
}
add_action( 'obnoveni_certifikace', 'odeslat_upozorneni_obnoveni_certifikace' );



if ( ! wp_next_scheduled('vyprseni_certifikace') ) {
wp_schedule_event( time(), 'hourly', 'vyprseni_certifikace' ); // hourly, daily and twicedaily
}
add_action( 'vyprseni_certifikace', 'odeslat_upozorneni_skonceni_certifikace' );


add_action('admin_menu','initSpravaSkol');

add_filter('the_content','dotaznikRodiceVitani');
add_filter('the_content','dotaznikRecertifikace');

add_filter('admin_head','dotaznikStyle');
//add_filter('the_content','dotaznikRodiceVitani2');

//echo date("d.m.Y H:i:s",wp_next_scheduled('vyprseni_certifikace'));
//echo date("d.m.Y H:i:s",wp_next_scheduled('obnoveni_certifikace'));

//wp_unschedule_event(wp_next_scheduled('obnoveni_certifikace'),'obnoveni_certifikace');
//wp_unschedule_event(wp_next_scheduled('vyprseni_certifikace'),'vyprseni_certifikace');

//logData('test');

