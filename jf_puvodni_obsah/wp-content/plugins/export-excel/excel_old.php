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
$sql="SELECT cislo as '��slo',nazev as 'N�zev �koly',adresa as 'Adresa',kontaktni_osoba as 'Kontaktn� osoba',ic_skoly as 'I� �koly',telefon as 'Telefon',email as 'E-mail �koly',web as 'Web',certifikovana as 'Certifikov�na',region as 'Kraj',popis as 'Popis �koly',zobrazeno as 'Zobrazena',datumZverejneni as 'Datum zve�ejn�n�',email2 as 'E-mail profil',email_reditel as 'E-mail �editel/ka',telefon_reditel as 'Telefon �editel/ka',telefon_kontakt as 'Tel. kontaktn� os.',jmeno_reditele as 'Jm�no �editele/ky',pocet_samolepek as 'Po�et zna�ek',poznamka as 'Pozn�mka �kola',kde_se_dozvedel as 'Kde se dozv�d�l',facebook as 'Facebook',cedule_anglicka as 'Cedule anglick�',kniha as 'Po�et knih',datum_certifikace as 'Datum certifikace',prvni_email as 'Prvn� email',faktura_odeslana as 'Faktura odesl�na',faktura_zaplacena as 'Faktura zaplacena',obalka_odeslana as 'Ob�lka odesl�na',poznamka_meta as 'Pozn�mka metadata',tipy_na_plneni  as 'Tipy na pln�n�'
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
    //if($a6){$slouc='';foreach($a6 as $a)$slouc.=" - ".$vety[$a]." - Spl�ujeme \n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    if($a6){$slouc="";foreach($a6 as $a)$slouc.="Spl�ujeme \n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    
    $a7=unserialize($data['povinne'][6]);
    if($i==0)$header[]='A7';
    //if($a7){$slouc='';foreach($a7 as $a)$slouc.=" - ".$vety[$a]." - Spl�ujeme \n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
     if($a7){$slouc="";foreach($a7 as $a)$slouc.="Spl�ujeme \n"; $nova_data[$i][]=$slouc;$slouc='';}else $nova_data[$i][]='';
    
    
    $b=$data['volitelne'];
    if(is_array($b))
    foreach($b as $j=>$vol){
    $nova_data[$i][]=$vety[$vol];
    if(!in_array('B17',$header))$header[]='B'.($j+1);
    }
    

}
  
//$excel = new excel_xml();


//$header = array("��slo","N�zev �koly","Adresa","I�","Email","Certifikov�na","Zve�ejn�na","Datum zve�ejn�n�","1.Email","Fakt. odesl.","Fakt. zaplacena","Ob�lka odesl.","Pozn.","Po�et sad","Cedule angl.","Kniha");

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
case 'rozpracovane':{generujXLS('Rozpracovan�','rozpracovana');break;}
case 'necertifikujeSe':{generujXLS('�koly kter� necertifikujeme','necertifikujeSe');break;}
default:{generujXLS('Certifikovan� zve�ejn�n� �koly','zpracovana');}
}
