<?php



/*

Plugin Name: Prehled skol rodice vitani

Description: Pridava prehled skol a detail skoly na stranku, ktera ma v custom fields klic detailSkolyRodiceVitani 

Author: Shad1w

Version: 0.1



*/



$pocet_na_stranku_clanky=100;

$pocet_stranek_clanky=10;



 if(!$wpdb)require_once( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );




//echo print_r($_GET);


$sql="SELECT * FROM vety_dotaznik";

$vetydata=db_dotaz($sql);

foreach($vetydata as $v)$vety[$v[0]]=$v[1];



if($_POST['akce']=='ajaxPrehledSkolKraje')

 {

  zobrazPrehledSkol($_POST['kraj'],1,$_POST['strana']);

 }

if($_POST['akce']=='ajaxVyhledavaniSkol')
 {
  zobrazPrehledSkol(0,1,$_POST['strana'],$_POST['hledej']);
 }

if($_POST['akce']=='ajaxNaseptavacSkol')
 {
  naseptavacSkol($_POST['hledej']);
 }

function zkratit_vetu($veta,$pocet_znaku)

{

$veta=strip_tags($veta);

if($pocet_znaku>=mb_strlen($veta))return $veta;

//if(id_uzivatele()==3)echo mb_strpos($veta," ",$pocet_znaku);



$pozice=mb_strpos($veta," ",$pocet_znaku);

if ($pozice==0)$pozice=$pocet_znaku;

return mb_substr($veta,0,$pozice)."..."; 

}



 

function zobrazDetailSkoly($skola)

{

global $vety;



$data=spravaSkolAdminDetail($skola,1);


$res="<div id='detailSkolyWrap'>";

$res.="<h3>".$data['skola'][1]."</h3>";



$res.="<div id='adrPopisWrap'>";

$res.="<div id='adresa'>";

$res.="<span>Adresa: </span><br />".$data['skola'][2]."<br />";

$res.="<span>Jméno ředitele/ředitelky: </span><br />".$data['skola'][19]."<br />";

$res.="<span>Telefon: </span><br />".$data['skola'][5]."<br />";

$res.="<span>E-mail: </span><br />".$data['skola'][6]."<br />";
if(!empty($data['skola'][7]) && strpos('http://',$data['skola'][7])===false) $www='http://'.$data['skola'][7];else $www=$data['skola'][7]; 
$res.="<span>Web: </span><br /><a href='$www' target='_blank'>".$data['skola'][7]."</a><br />";

if ($data['skola'][23])$res.="<span>Facebook: </span><br /><div id='fbdetail'><a href='{$data['skola'][23]}' target='_blank'>".mb_substr($data['skola'][23],0,60,'utf-8')." ...</a></div><br />";



$res.="</div>";



$res.="<div id='popis'>";
$foto=fotkaSkoly($data['skola'][0]);
if($foto)$res.="<img src='".$foto."' style='float:left;margin:5px;' />";
$res.=$data['skola'][12];

$res.="</div>";

$res.="</div>";


$res.="<div id='povinne'>";

$res.="<h4>Škola splňuje</h4>";

$res.="<ul>";
/*
if($data['povinne'])foreach ($data['povinne'] as $p)
{
  $dp=unserialize($p);
  if($dp)foreach($dp as $dp1)$res.="<li>".$vety[$dp1]."</li>";
}
*/
if($data['povinne'])foreach ($data['povinne'] as $p)
{
  $dp=unserialize($p);
  if($dp)foreach($dp as $dp1)$splnujePovinne[]=$dp1;
}

//print_r($splnujePovinne);
$povinne=povinneParametry();
//print_r($povinne);
if($povinne)foreach($povinne as $p)
{ 
 if(in_array($p['id'], $splnujePovinne))$class="class='splnuje'";else $class='';
     $res.="<li $class>".$p['veta']."</li>";
}

$res.="</ul>";

$res.="</div>";

$res.="<div id='volitelne'>";

$res.="<h4>Škola dále splňuje</h4>";

$res.="<ul>";
$volitelne=volitelneParametry();
$splnujeVolitelne= $data['volitelne'];
/*if($data['volitelne'])foreach ($data['volitelne'] as $p)

{

 if($p)$res.="<li>".$vety[$p]."</li>";

} */

if($volitelne)foreach ($volitelne as $v)
{
  if(in_array($v['id'], $splnujeVolitelne))$class="class='splnuje'";else $class='';
     $res.="<li $class>".$v['veta']."</li>";

}


$res.="</ul>";



$res.="</div>";



$res.="</div>";





return $res;

}



function nahledSkoly($id,$nazev,$popis,$region,$email,$adresa)

{

$res="<div class='detailSkolyWrap'>";

$res.="<div class='skola'><a href=\"/profil-skoly/?id=$id\" >$nazev</a></div>";


//$res.="<span><strong>Email:</strong><a href=\"mailto:$email\"> $email</a></span>";

//$res.="<p><strong>Adresa:</strong><br />$adresa</p>";

//$res.="<p>".zkratit_vetu($popis,100)."</p>";
$res.="<div onclick=\"GEvent.trigger(spendliky[$id], 'click');$(window).scrollTop(parseInt($('#mapa').position().top-30)); \" title='Zobrazit na mapě' class='zobrazitNaMape'></div>";

//$res.="<div><a href=\"/profil-skoly/?id=$id\">Detail</a></div>";

$res.="</div>";

return $res;

}



/**

 *   vraci tabulku se seznamem skol podle kraje

 */

function zobrazPrehledSkol($kraj=0,$ajax=0,$strana=1,$hledani='')

{

global $pocet_na_stranku_clanky,$pocet_stranek_clanky,$wpdb;

      
if($hledani) $search=" AND nazev LIKE '%".$wpdb->escape($hledani)."%' ";else $search="";
if($kraj)$pod=" AND region='$kraj' ";else $pod='';



if($strana)$zacit_od=$pocet_na_stranku_clanky*($strana-1); else $zacit_od="0";

$str="LIMIT $zacit_od,$pocet_na_stranku_clanky";                                       



$sql="SELECT SQL_CALC_FOUND_ROWS id,nazev,popis,region,email,adresa FROM skoly WHERE zobrazeno='1' $pod $search ORDER BY nazev ASC $str";



$skoly=db_dotaz($sql);



if($skoly)

{ 
if($hledani)
$res.="<h3>Nalezené školy <span onclick=\"$('#searchResult').hide('slow').html('');$('#hledanaSkola').val('');\">Nové hledání</span></h3>"; 
else
$res.="<h3>Školy v tomto kraji: <span style='color:#73A534'>".nazev_kraje($kraj)."</span></h3>"; 

/*$res.="<table id=\"prehledSkol\" cellspacing='5'><tr>";

  foreach($skoly as $i=>$s)

  {

   $res.="<td>".nahledSkoly($s[0],$s[1],$s[2],$s[3],$s[4],$s[5])."</td>";

   if(($i+1)%2==0)$res.="</tr><tr>";
  }
for ($j=0;$j<($i+1)%2;$j++)$res.="<td></td>";  

$res.="</tr></table>";*/
$res.="<table id=\"prehledSkol\" cellspacing='5'>";
  foreach($skoly as $i=>$s)
  {
   $res.="<tr><td>".nahledSkoly($s[0],$s[1],$s[2],$s[3],$s[4],$s[5])."</td></tr>";
  }
$res.="</table>";  
$res.=strankovani($ajax,$kraj,$strana,$hledani);
}
else $res="<div id='noSearchResult'>Nebyla nalezena žádná odpovídající škola</div>";
if ($ajax){echo $res;exit;}

return $res;

}





function strankovani($ajax=0,$kraj=0,$stranka=1,$hledani='')

{

// strankovani vypisu odpovidajicich clanku

// 

global $pocet_na_stranku_clanky,$pocet_stranek_clanky;

$pocet=db_dotaz("SELECT FOUND_ROWS()");

$pocet=$pocet[0][0];

$pocet_stranek=ceil($pocet/$pocet_na_stranku_clanky);

if($hledani)$funkce="Search";else $funkce="Prehled";
//if($ajax)
//{
 
  $str=" 
  <script>
  function posliAjaxStraknovaniSearch(strana)
  { 
  $.post('".plugins_url()."/prehledSkol.php',{ { akce:'ajaxVyhledavaniSkol', hledej: 
  $('#hledanaSkola').val(), strana: strana } ,function(data) {
  $('#searchResult').html(data);});
  }
  </script>
  ";
 
  $str.=" 
  <script>
  function posliAjaxStraknovaniPrehled(strana)
  {
  $.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: '$kraj', strana: strana  } ,function(data) {
     $('#seznamSkolKraje').html(data);
    });
  }
  </script>
  ";

//}
//else $str="";
$str.="<div id=\"strankovani\"><div id=\"nalezeno_skol\">Celkem: $pocet</div>";

if(!$hledani)//strankovani u vzhledavani funguje spatne, nedari se najit duvod, proto se zatim rusi

{
if($pocet_stranek>1)

{

 if ($stranka<5 or $pocet_stranek<=10)$od=1;else $od=$stranka-4;

 if (($pocet_stranek-$stranka)<5 && $pocet_stranek>10 ){$od=$pocet_stranek-($pocet_stranek_clanky-1);}

  $str.="Strana: ";

  if($stranka>1)$str.="<span><a href=\"#pg=1\" onclick='posliAjaxStraknovani$funkce(1);false;'><<</a></span><span><a href=\"#pg=".($stranka-1)."\" onclick='posliAjaxStraknovani$funkce(".($stranka-1).");false;'><</a></span>"; 

if($pocet_stranek>$pocet_stranek_clanky)$pocet_str=$pocet_stranek_clanky;else $pocet_str=$pocet_stranek;

for($i=0;$i<$pocet_str;$i++)

  {

   if($stranka==($i+$od))

    $str.="<span id=\"vybrana_stranka\">".($i+$od)."</span>";

    else

    $str.="<span><a href=\"#pg=".($i+$od)."\" onclick='posliAjaxStraknovani$funkce(".($i+$od).");false;'>".($i+$od)."</a></span>"; 

  

  }

  if($stranka<$pocet_stranek)$str.="<span><a href=\"#pg=".($stranka+1)."\"  onclick='posliAjaxStraknovani$funkce(".($stranka+1).");false;'>></a></span><span><a href=\"#pg=$pocet_stranek\"  onclick='posliAjaxStraknovani$funkce(".($pocet_stranek).");false;'>>></a></span>";

}

$str.="</div><br clear=\"all\" />";
}

return $str;

}




add_filter('the_content','zobrazDetail');



function zobrazDetail($content)

{

if(get_post_custom_values('detailSkolyRodiceVitani', get_the_id()))

{
  if($_GET['id'])$res.=zobrazDetailSkoly($_GET['id']);
  //else $res.=zobrazPrehledSkol();
}

return $content.$res;

}

function povinneParametry()
{
$sql="SELECT id,veta FROM vety_dotaznik WHERE otazka LIKE 'a%'";
$povinne=db_dotaz($sql);
foreach($povinne as $i=>$p) {
$pov[$i]['id']=$p[0];
$pov[$i]['veta']=$p[1];
}
return $pov; 

}

function volitelneParametry()
{
$sql="SELECT id,veta FROM vety_dotaznik WHERE otazka LIKE 'b%'";
$volitelne=db_dotaz($sql);
foreach($volitelne as $i=>$v) {
$vol[$i]['id']=$v[0];
$vol[$i]['veta']=$v[1];
}
return $vol; 

}

function naseptavacSkol($hledej)
{
global $wpdb;
$search=" AND nazev LIKE '%".$wpdb->escape($hledej)."%' ";
$sql="SELECT SQL_CALC_FOUND_ROWS id,nazev,popis,region,email,adresa FROM skoly WHERE zobrazeno='1' $search ORDER BY nazev ASC limit 15";

$nalezene=db_dotaz($sql);
if($nalezene)
{
$result="<ul>";
foreach($nalezene as $n)
  $result.="<li><a href=\"javascript:;\" onclick=\"
  $('#hledanaSkola').val($(this).html());
  $('#hledatSkoluButton').trigger('click');\">".$n[1]."</a></li>";
$result.="</ul>";
echo $result;
}
}

function nazev_kraje($kraj)
{
if($kraj=="1")return "Jihočeský";
if($kraj=="2")return "Jihomoravský";
if($kraj=="3")return "Karlovarský";
if($kraj=="4")return "Královéhradecký";
if($kraj=="5")return "Liberecký";
if($kraj=="6")return "Moravskoslezský";
if($kraj=="7")return "Olomoucký";
if($kraj=="8")return "Pardubický";
if($kraj=="9")return "Plzeňský";
if($kraj=="10")return "Středočeský";
if($kraj=="11")return "Praha";
if($kraj=="12")return "Ústecký";
if($kraj=="13")return "Vysočina";
if($kraj=="14")return "Zlínský";

}
