<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');

function id_skoly($email)
{
$sql = "SELECT id FROM skoly WHERE email='$email'";
$id=db_dotaz($sql);
return $id[0][0];
}

function generujXLS($nazev,$faze)
{
db_dotaz("SET NAMES 'cp1250'");
/*
$sql="SELECT cislo,nazev,adresa,ic_skoly,email,zobrazeno,certifikovana,datumZverejneni,prvni_email,faktura_odeslana,faktura_zaplacena,obalka_odeslana,poznamka_meta,pocet_samolepek,cedule_anglicka,kniha 
FROM skoly JOIN skoly_meta ON skoly_meta.id_skoly=skoly.id WHERE faze='$faze' ORDER BY id";
*/
$sql="SELECT cislo as 'Èíslo',nazev as 'Název školy',adresa as 'Adresa',kontaktni_osoba as 'Kontaktní osoba',ic_skoly as 'IÈ školy',telefon as 'Telefon',email as 'E-mail školy',web as 'Web',certifikovana as 'Certifikována',region as 'Kraj',popis as 'Popis školy',zobrazeno as 'Zobrazena',datumZverejneni as 'Datum zveøejnìní',email2 as 'E-mail profil',email_reditel as 'E-mail øeditel/ka',telefon_reditel as 'Telefon øeditel/ka',telefon_kontakt as 'Tel. kontaktní os.',jmeno_reditele as 'Jméno øeditele/ky',pocet_samolepek as 'Poèet znaèek',poznamka as 'Poznámka škola',kde_se_dozvedel as 'Kde se dozvìdìl',facebook as 'Facebook',cedule_anglicka as 'Cedule anglická',kniha as 'Poèet knih',datum_certifikace as 'Datum certifikace',prvni_email as 'První email',faktura_odeslana as 'Faktura odeslána',faktura_zaplacena as 'Faktura zaplacena',obalka_odeslana as 'Obálka odeslána',poznamka_meta as 'Poznámka metadata',tipy_na_plneni  as 'Tipy na plnìní'
FROM skoly JOIN skoly_meta ON skoly_meta.id_skoly=skoly.id WHERE faze='$faze' ORDER BY id";

$data_skol=db_dotaz($sql);

global $wpdb;
$header=$wpdb->get_col_info('name');

$filename = 'prehled.csv'; 


$vety_dotazniku=db_dotaz("SELECT id,veta FROM vety_dotaznik");
  if($vety_dotazniku)foreach($vety_dotazniku as $v)
  {
    $vety[$v[0]]=$v[1];
  }


foreach($data_skol as $i=>$ds)
{  
    $nova_data[$i]=$ds;
    $nova_data[$i][9]=iconv("utf-8", "windows-1250//IGNORE", nazev_kraje($nova_data[$i][9]));
    $nova_data[$i][8]=$nova_data[$i][8]?'Ano':'Ne'; //certifikovana
    $nova_data[$i][11]=$nova_data[$i][11]?'Ano':'Ne'; //zobrazena
    $data=spravaSkolAdminDetail(id_skoly($ds[6]),1);
    
    $a1=unserialize($data['povinne'][0]);
    if($i==0)$header[]='A1';
    if($a1){$slouc='';foreach($a1 as $a)$slouc.=" - ".$vety[$a]."\n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    
    $a2=unserialize($data['povinne'][1]);
    if($i==0)$header[]='A2';
    if($a2){$slouc='';foreach($a2 as $a)$slouc.=" - ".$vety[$a]."\n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    
    $a3=unserialize($data['povinne'][2]);
    if($i==0)$header[]='A3';
    if($a3){$slouc='';foreach($a3 as $a)$slouc.=" - ".$vety[$a]."\n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    
    $a4=unserialize($data['povinne'][3]);
    if($i==0)$header[]='A4';
    if($a4){$slouc='';foreach($a4 as $a)$slouc.=" - ".$vety[$a]."\n";$nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    
    $a5=unserialize($data['povinne'][4]);
    if($i==0)$header[]='A5';
    if($a5){$slouc='';foreach($a5 as $a)$slouc.=" - ".$vety[$a]."\n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    
    $a6=unserialize($data['povinne'][5]);
    if($i==0)$header[]='A6';
    //if($a6){$slouc='';foreach($a6 as $a)$slouc.=" - ".$vety[$a]." - Splòujeme \n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    if($a6){$slouc="";foreach($a6 as $a)$slouc.="Splòujeme \n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    
    $a7=unserialize($data['povinne'][6]);
    if($i==0)$header[]='A7';
    //if($a7){$slouc='';foreach($a7 as $a)$slouc.=" - ".$vety[$a]." - Splòujeme \n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
     if($a7){$slouc="";foreach($a7 as $a)$slouc.="Splòujeme \n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    
    
    $b=$data['volitelne'];
    if(is_array($b))
    foreach($b as $j=>$vol){
    $nova_data[$i][]=$vety[$vol];
    if(!in_array('B17',$header))$header[]='B'.($j+1);
    }
    

}
  
//$excel = new excel_xml();


//$header = array("Èíslo","Název školy","Adresa","IÈ","Email","Certifikována","Zveøejnìna","Datum zveøejnìní","1.Email","Fakt. odesl.","Fakt. zaplacena","Obálka odesl.","Pozn.","Poèet sad","Cedule angl.","Kniha");

//$excel->add_row($header);
//foreach($data as $d)$excel->add_row($d);

//$excel->create_worksheet('Users');
//$excel->download($filename);
header( 'Content-Type: text/csv' );
header( 'Content-Disposition: attachment;filename='.$filename);
$buffer = fopen('php://output', 'w');
fputcsv($buffer, $header, ';', '"');
if($nova_data)foreach ($nova_data as $fields) fputcsv($buffer, $fields, ';', '"');
fclose($buffer);

echo $csv;

}

switch($_GET['faze'])
{
case 'rozpracovane':{generujXLS('Rozpracované','rozpracovana');break;}
case 'necertifikujeSe':{generujXLS('Školy které necertifikujeme','necertifikujeSe');break;}
default:{generujXLS('Certifikované zveøejnìné školy','zpracovana');}
}
