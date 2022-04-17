<?php
//error_reporting(3);
//ini_set('display_errors', 1);     //pozor nezapinat, v Pionyru to hazi warning kvuli timelimitu
ini_set ( "memory_limit", "200M");

$cestaDoKorene = "../.."; // nastaveni pro include.php
require "../include.php";
//$kodovani = "cp1250"; // nastaveni pro spojeni.php
$config = new Config();

$configObecne = $config->getConfigObecne();

if (LDAP_VUP === true) {
  session_set_cookie_params(0, '/', 'vuppraha.cz');
  define('COOKIE_NAME', 'npi_sid');
}
session_start();
set_time_limit(180);



$configVykaz = $config->getConfigVykaz();
$adresar = ADRESAR;
$nazevInstituce = iconv("UTF-8","CP1250", $configObecne['nazevInstituce']);

//statusy placene neschopnosti
$statusyPlaceneNeschopnosti = $config->getStatusyPlaceneNeschopnosti();
$pocetStatusuPlN = count($statusyPlaceneNeschopnosti);
$statPlNRovna = $statPlNNerovna = "";
if ($pocetStatusuPlN) {
  for ($n = 0; $n < $pocetStatusuPlN; $n++) {
    //$statusyPlaceneNeschopnosti[$n] = iconv("UTF-8","CP1250", $statusyPlaceneNeschopnosti[$n]);
    $statusyPlaceneNeschopnosti[$n] = $statusyPlaceneNeschopnosti[$n];
    $statPlNRovna .= "status = '{$statusyPlaceneNeschopnosti[$n] }'";
    $statPlNNerovna .= "status != '{$statusyPlaceneNeschopnosti[$n]}'";
    if  ($n != $pocetStatusuPlN-1) {
      $statPlNRovna .= " or ";
      $statPlNNerovna .= " and ";
    }
  }
} else {
  die("chyba 221rX6");
}

//statusy dovolene 
$stutusyDovolene[] =  $dovP = iconv("CP1250","UTF-8", "dovolená - pùl dne");
$stutusyDovolene[] =  $dovC = iconv("CP1250","UTF-8", "dovolená - celý den");


unset($_SESSION['lastOdkaz']);
if (isset($_SESSION['kontrolovany'])) {
  $osoba = new Osoba($_SESSION['kontrolovany']);
} else {
  $osoba = $_SESSION['prihlaseny'];
}
if ($_GET['sm']) $_GET['smlouvy']=$_GET['sm'];
$smlouvy = $_GET['smlouvy'];
$pocetVykazu = count($smlouvy);

function w($sirka) {
  return ("width: {$sirka}%; ");
}
function prazdnyRadek($vyska = 12) {
  global $bez;
  return ("
    <tr>
       <td class='' style='height: {$vyska}px; $bez'></td>
       <td style='$bez'></td>
       <td style='$bez'></td>
       <td style='$bez'></td>
       <td style='$bez'></td>
       <td style='$bez'></td>
       <td style='$bez'></td>
       <td style='$bez'></td>
    </tr>
  ");
}

ob_start();
?>

<style type="text/css">
    <!--
    td  {
        border: 1px solid black;
        vertical-align: middle;
    }
    th  {
        border: 1px solid black;
        background-color: #EEEEEE;
    }

    .prazdny {height: 12px;}
    -->
</style>

<?php
for ($i=0; $i<$pocetVykazu; $i++) {

?>
 <page>

  <?php  
  
  //NASTAVENÍ OBJEKTÙ ============================================================
  if (isset($_GET['mesic'])) $_SESSION['nastavenyMesic'] = $_GET['mesic'];
  if (isset($_GET['rok'])) $_SESSION['nastavenyRok'] = $_GET['rok'];
  $datum = new Datum("1.{$_SESSION['nastavenyMesic']}.{$_SESSION['nastavenyRok']}");
  $smlouva = new Smlouva($smlouvy[$i]);
  $datumStartuUvazku = new Datum($smlouva->od);
  $datumKonceUvazku = new Datum($smlouva->do);
  $datumKonceMesice = new Datum($datum->getDatumPoslednihoDneMesice());
  $testovaciSmlouva = new Smlouva();
  $osoba = new Osoba($smlouva->idOsoby);
  $skupina = new Skupina($smlouva->idSkupiny);
  $cinnost = new Cinnost();
  if (!empty($smlouva->cisloZakazky)) {
      $idZakazky=$smlouva->cisloZakazky;
  } else {
      $idZakazky=$skupina->getIdVychoziZakazky();
  }
  $zakazka = new Zakazka($idZakazky);
  $testovaciZakazka = new Zakazka();
  $poleIdCinnosti = $cinnost -> getCinnosti($smlouva->id, $datum->getDatumPrvnihoDneMesice(), $datum->getDatumPoslednihoDneMesice(), "", "status != '$dovP' and status != '$dovC' and $statPlNNerovna ");
  $pocetCinnosti = count($poleIdCinnosti);
  $prevod = new Prevod();
  
  // <page_footer>
  // 		<span style="text-align: center; width: 100%; font-size: 80%;">strana [[page_cu]] z [[page_nb]]</span>
  // </page_footer>

  if ($zakazka->eu) {
      echo "
      <page_footer>
         <span style='text-align: center; width: 100%; font-size: 80%;'>Tento projekt je spolufinancován Evropským sociálním fondem a státním rozpoètem Èeské republiky.</span>
      </page_footer> ";
  }
  
  //zjistovani dovolene
  $dovolena = $cinnost -> getInfoOTypechCinnostiProVykaz($datum, $smlouva->id,  array(iconv("CP1250","UTF-8", 'dovolená - celý den'), iconv("CP1250","UTF-8", 'dovolená - pùl dne')), 0);
  $oddovolenkovanoHod = $prevod->getHodJakoDesetinneCislo($dovolena['trvaniSec'], 2);
  $trvaniDovoleneSec = $dovolena['trvaniSec'];
  $terminyDovolene = $dovolena['terminy'];
  $celkemDniDovolene = $dovolena['celkemDni'];

  //zjistovani placené pracovní neschopnosti
  //$vypustitPrvni3DnyA11 = 1; to platilo jen v èervenci 2010
  $vypustitPrvni3DnyA11 = 0;
  $placenaNeschopnost = $cinnost -> getInfoOTypechCinnostiProVykaz($datum, $smlouva->id,  $statusyPlaceneNeschopnosti, $vypustitPrvni3DnyA11 );
  
  //zjistovani ostatnich uvazku
  if ($configVykaz['praceNaOstatnichProjektech'] && $zakazka->eu) {
      $chciJenPracovniSmlouvy = 0;
      $ostatniUvazkyCelkemVEsf = $smlouva -> getVelikostDalsichUvazku($datum, 1, $chciJenPracovniSmlouvy);
      if (ADRESAR == 'vup')$chciJenPracovniSmlouvy = 1; //to je na pozadavek Stani
      $ostatniUvazkyCelkemNeVEsf = $smlouva -> getVelikostDalsichUvazku($datum, 0, $chciJenPracovniSmlouvy);
 }
  
  //LOGA =========================================================================
  echo "<table style='width: 100%; border: 0px solid red;'><tr>";
  
  echo "<td style='width: 20%; border: 0px solid red; text-align: right;'>";
  echo "</td>";
  
  echo "<td style='width: 60%; border: 0px solid red; text-align: center;'>";
  if (!isset($cestaDoAdresareImages)) $cestaDoAdresareImages = "../images";
  $obr = $zakazka -> getAdresuObrazku('logo na vykazu');
  if (!empty($obr)) echo  "<img src='$cestaDoAdresareImages/$obr' alt='logo' title='logo' border='0' width='340'>";
  elseif ($zakazka -> eu ) echo "<img src='$cestaDoAdresareImages/ostatni/eu_esf_msmt_op_cr.jpg' alt='eu_esf_msmt_op_cr.jpg' title='eu_esf_msmt_op_cr' border='0' width='340'>";
  else echo "<img src='$cestaDoAdresareImages/ident/$adresar/logoVelkeJako_eu_esf_msmt_op_cr.jpg' alt='eu_esf_msmt_op_cr.jpg' title='eu_esf_msmt_op_cr' border='0' width='340'>";
  echo "</td>";
  
  
  echo "<td style='width: 20%; border: 0px solid red; text-align: right;'>";
  if ($configObecne['osobniCisloNaVykaze']) echo "os. è. " . $osoba->osobniCislo;
  echo "</td>";
  echo "</tr></table>";
  
  
  //celá tabulka =================================================================
  $t = "border-top: 2px solid black; ";
  $r = "border-right: 2px solid black; ";
  $l = "border-left: 2px solid black; ";
  $b = "border-bottom: 2px solid black; ";
  $v = $t . $r . $l . $b;
  $s = "<strong>";
  $ss = "</strong>";
  $bez = "border: 0px solid red; ";
  $c = "text-align: center; ";
  $s1=10; $s2=10; $s3=20; $s4=2; $s5=16; $s6=10; $s7=10; $s8=100-$s1-$s2-$s3-$s4-$s5-$s6-$s7; //sirka sloupcu v %
  
 echo "<br>";
  
  $tab = "<table cellspacing='0' style='width: 100%; border: 0px solid red;'>";
  
  //1. dilci tabulka - nadpis
    $tab .= "<tr>";
      $tab .= "<td colspan='2' style='font-size: 120%; width: 100%; $c $bez'><strong>PRACOVNÍ VÝKAZ</strong></td>";
    $tab .= "</tr>";

    $tab .= "<tr>";
      $tab .= "<td style='width: 50%; $t $l '>Registraèní èíslo projektu</td>";
      $tab .= "<td style='width: 50%; $t $r '>" . $zakazka -> registracniCisloProjektu . "</td>";
    $tab .= "</tr>";
    
    $tab .= "<tr>";
      $tab .= "<td style='width: 50%; $l'>Název projektu</td>";
      $nazevProjektu = empty($skupina->popis) ?  $skupina->nazev : $skupina->popis;
      $tab .= "<td style='width: 50%; $r '>" . iconv("UTF-8","CP1250", $nazevProjektu) . "</td>";
    $tab .= "</tr>";

    if ($configObecne['zkratkaInstituce'] == 'NIDM' || $configObecne['zkratkaInstituce'] == iconv("CP1250","UTF-8", 'VÚP')) {
        $msmt = "MŠMT/";
        $partnera = "/partnera";
    }
    
    $tab .= "<tr>";
      $tab .= "<td style='width: 50%;$l'>Název pøíjemce{$partnera} podpory</td>";
      $tab .= "<td style='width: 50%;$r'>{$msmt}{$nazevInstituce}</td>";
    $tab .= "</tr>";

    if ($zakazka->eu) {
        $poradaniMon = "";
        $datumZacatkuMon = new Datum($skupina->monitorovackaZacatek);
        if ($datumZacatkuMon->getCasoveRazitko()>0) {
            $rozdilMesicu = $datumZacatkuMon->getPocetMesicuMeziDaty($datumZacatkuMon->getDatum(), $datum->getDatum());
            if ($skupina->monitorovackaInterval>0) $poradaniMon = $skupina->monitorovackaPoradi + (floor(($rozdilMesicu-0.1)/$skupina->monitorovackaInterval));
        }
    }
    $tab .= "<tr>";
      $tab .= "<td style='$b $l'>Poøadové èíslo Monitorovací zprávy</td>";
      $tab .= "<td style='$r $b '>$poradaniMon</td>";
    $tab .= "</tr>";

    $tab .= "</table>";
    $tab .= "<br>";
    
  //2. dilci tabulka - jmeno a prijmeni ..
  $tab .= "<table cellspacing='0' style='width: 100%; border: 0px solid red;'>";
  $typ = iconv("UTF-8","CP1250",$smlouva->typ);
  if ($typ == 'pracovní smlouva') $typ = 'ZS';
  $jmeno = iconv("UTF-8","CP1250",$osoba->getKompletniJmeno());
  $zarazeni = iconv("UTF-8","CP1250",$smlouva -> pracovniZarazeni);
  
  
  //tyto sirky jsou pouzity u tabulky Zamestnanec a u dolni tabulky dovolena je to udelano znova 
  $s1 = "width: 20%;";
  $s2 = "width: 30%;";
  $s3 = "width: 1%;";
  $s4 = "width: 34%;";
  $s5 = "width: 15%;";

    $tab .= "<tr>";
      $tab .= "<td style='$s1 $l $t'>Zamìstnanec</td>";
      $tab .= "<td style='$s2 $t $r'>" . $jmeno . "</td>";
      $tab .= "<td style='$s3 $bez'></td>";
      $tab .= "<td style='$s4 $t $l'>Druh pracovního pomìru</td>";
      $tab .= "<td style='$s5 $t $r'>" . $typ . "</td>";
    $tab .= "</tr>";
    


      if ($smlouva->velikostUvazkuV == 'hodiny za celou dobu') {
          $velikostUvazkuSec = $smlouva->velikostUvazku * 3600;
      } else {
          $vcetneSvatku = $smlouva->velikostUvazku<=1 ? 1 : 0;
          $kOdp = $smlouva->getKOdpracovaniZaMesic($datum->mesic, $datum->rok, $vcetneSvatku);
          $velikostUvazkuSec = $kOdp[0];
      }
    $velikostUvazku = $prevod->getHodJakoDesetinneCislo($velikostUvazkuSec, 2) ;
    if ($smlouva->velikostUvazku <= 1) $uvazekDesetine = str_replace(".", ",", $smlouva->velikostUvazku . "/"); else $uvazekDesetine = "";

    $tab .= "<tr>";
      $tab .= "<td style='$s1 $l '>Pracovní pozice</td>";
      $tab .= "<td style='$s2 $r'>" . $zarazeni . "</td>";
      $tab .= "<td style='$s3 $bez'></td>";
      $tab .= "<td style='$s4 $l'>Výše mìsíèního úvazku pro projekt  v hodinách</td>";
      $tab .= "<td style='$s5 $r'>" . $uvazekDesetine . $velikostUvazku  . " hodin</td>";
    $tab .= "</tr>";

    $tab .= "<tr>";
      $tab .= "<td style='$s1 $l $b'>Vykazovaný mìsíc a rok</td>";
      $tab .= "<td style='$s2 $r $b'>" . iconv("UTF-8","CP1250", $datum->getMesicSlovy()) . " " . $datum->rok . "</td>";
      $tab .= "<td style='$s3 $bez'></td>";
      if ($zakazka->eu) $label = "Další úvazek v projektech pøíjemce/partnera"; else $label = '';
      $tab .= "<td style='$s4 $l border-bottom:0px solid red;'>$label</td>";
      if ($configVykaz['praceNaOstatnichProjektech']) $uvazekVJinychEsf = strtr($ostatniUvazkyCelkemVEsf, ".", ",");
      else $uvazekVJinychEsf = "";
      $tab .= "<td style='$s5 border-bottom:0px solid red; $r '>$uvazekVJinychEsf</td>";
    $tab .= "</tr>";


      
      if ($zakazka->eu) $label = "Úvazek v další èinnosti pro pøíjemce/partnera"; else $label = '';
      if ($configVykaz['praceNaOstatnichProjektech']) $uvazekVJinychMimoEsf = strtr($ostatniUvazkyCelkemNeVEsf, ".", ",");
      else $uvazekVJinychMimoEsf = "";
   $tab .= "<tr>";
      $tab .= "<td style='$s1 $bez'></td>";
      $tab .= "<td style='$s2 $bez'></td>";
      $tab .= "<td style='$s3 $bez'></td>";
      $tab .= "<td style='$s4 border-top: $r $l $t $b'>$label</td>";
      $tab .= "<td style='$s5 $b $t $r'>$uvazekVJinychMimoEsf<span style='color:white;'>x</span></td>";
    $tab .= "</tr>";
   
    $tab .= "</table><br>";
    echo $tab;
    $tab="";
    
  //3. dilci tabulka - Pøehled odpracovaných hodin 	
    $tab .= "<table cellspacing='0' style='width: 100%; border: 0px solid red;'>";					
    $tab .= "<tr>";
      $tab .= "<th colspan='4' style='$t $l $r'>Pøehled odpracovaných hodin</th>";
    $tab .= "</tr>";
    
    //$tab .= prazdnyRadek(5);
    
    $tab .= "<tr>";
      $tab .= "<td style='$l width: 6%; font-size:12px;'>Den v mìsíci</td>";
      $tab .= "<td style='width: 5%; font-size:12px;'>Název<br />dne</td>";
      $tab .= "<td style='width: 6%; font-size:12px;'>Poèet<br />odprac.<br />hodin</td>";
      $tab .= "<td style='$r width: 83%; font-size:12px;'>Detailní popis vykonaných aktivit</td>";
    $tab .= "</tr>";
    
    
      //vytvoreni pole objektu cinnosti
      for ($n=0; $n<$pocetCinnosti; $n++) {
        $poleObjCinnosti[$n] = new Cinnost($poleIdCinnosti[$n]);
      }

    //svatky
    $altualDatumSvatku = $aktualDatumCinnosti = new Datum();
    if ($datumStartuUvazku->getCasoveRazitko() > $datum->getCasoveRazitko()) $prvniDenProSvatky = $datumStartuUvazku->getDatum(); else $prvniDenProSvatky = $datum->getDatum();
    if ($datumKonceUvazku->getCasoveRazitko() < $datumKonceMesice->getCasoveRazitko()) $posledniDenProSvatky =  $datumKonceUvazku->getDatum(); else $posledniDenProSvatky = $datumKonceMesice->getDatum();
    $datumySv = $datum ->getSvatky($prvniDenProSvatky, $posledniDenProSvatky, 1);
    $pocetSv = count($datumySv);
    $dnySvatku = $casovaRazitkaSvatku = array();
    $pocetSvatku = 0;
    $poleStatusuKdySeNepocitaSvatek = $config->getStatusyPlaceneNeschopnosti();    
    
    //overeni, zda zamìstnanec nebyl ve svátek nemocný
    //pokud byl zamestnanec ve svatek nemocny, svatek by se nemel zapocist, ale problem je v tom, ze se ve svatek do personisu nevykazuje
    //, proto se koukám jestli pøedchozí a následující pracovní den, byl dotyèný nemocný, když ano, svátek mu nedám do odpracované doby, ale do nemoci
    for ($n=0; $n<$pocetSv; $n++) {    
        $datumySvatkuObj[$n] = new Datum($datumySv[$n]);
        $predchazejiciPracovniDatum = $datumySvatkuObj[$n]->getDatumPredchazejicihoPracovnihoDne();
        $naseldujiciPracovniDatum = $datumySvatkuObj[$n]->getDatumNasledujicihoPracovnihoDne();
        if (count($cinnost->getCinnosti($smlouva->id, $predchazejiciPracovniDatum, $predchazejiciPracovniDatum, $poleStatusuKdySeNepocitaSvatek))>0) {
             if (count($cinnost->getCinnosti($smlouva->id, $naseldujiciPracovniDatum, $naseldujiciPracovniDatum, $poleStatusuKdySeNepocitaSvatek))>0) {
                $placenaNeschopnost['trvaniSec'] += $smlouva->getUvazkoDenSec();
                $placenaNeschopnost['terminy'] .= $datumySvatkuObj[$n]->den . ", ";
                $placenaNeschopnost['celkemDni']++;
                continue;
             }
        }
        
        $datumySvatku = $datumySvatkuObj[$n]->getDatum();
        $casovaRazitkaSvatku[$n] = $datumySvatkuObj[$n]->getCasoveRazitko();
        $dnySvatku[$n] = iconv("UTF-8","CP1250", $datumySvatkuObj[$n]->getDenVTydnuKratceVelkyma());
        $pocetSvatku++;
    }

   $pocetJizPridanychSvatku = $sumaSec = 0;
   for ($n=0; $n<$pocetCinnosti; $n++) {
      $cinnost = $poleObjCinnosti[$n];
      $curOdpracovanoSec = $cinnost -> odpracovanoSec;
      if ($cinnost->status == iconv("CP1250", "UTF-8", 'neplacené volno') || $cinnost->status == iconv("CP1250", "UTF-8", 'ošetøování èlena rodiny')) $curOdpracovanoSec = '';
      $sumaSec += $curOdpracovanoSec;
      $bbb = ($n+1 >= $pocetCinnosti) ? $b : ""; //dolejsi okraj tabulky cinnosti

      $cin = rozdelDlouhaSlova(iconv("UTF-8","CP1250", $cinnost -> cinnost), 35);
      $aktualDatumCinnosti ->setDatum($cinnost->datumCesky);

      //pridaniSvatku
      if ($smlouva->velikostUvazku <= 1) {
          while ($aktualDatumCinnosti->getCasoveRazitko() >= $casovaRazitkaSvatku[$pocetJizPridanychSvatku] && $pocetJizPridanychSvatku<$pocetSvatku) {
              $tab .= "<tr>";
              $tab .= "<td style='$l width: 6%;'>" . $datumySvatkuObj[$pocetJizPridanychSvatku]->den . "." . "</td>";
              $tab .= "<td style='$l width: 5%;'>" . $dnySvatku[$pocetJizPridanychSvatku] . "</td>";
              $tab .= "<td style='width: 6%;'>" . $prevod->getHodJakoDesetinneCislo($smlouva->getPocetHodinKOdpracovaniZaDen(), 2) . "</td>";
              $tab .= "<td  style='$r width: 83%;'>svátek</td>";
              $tab .= "</tr>";
              $pocetJizPridanychSvatku++;
              $sumaSec += $smlouva->getPocetHodinKOdpracovaniZaDen();
          }
      }


      $tab .= "<tr>";
      $tab .= "<td style='$l width: 6%;'>" . $cinnost -> datumDen . "." . "</td>";
      $tab .= "<td style='width: 5%;'>" . iconv("UTF-8","CP1250", $aktualDatumCinnosti->getDenVTydnuKratceVelkyma()) . "</td>";
      $tab .= "<td style='width: 6%;'>" . $prevod->getHodJakoDesetinneCislo($curOdpracovanoSec, 2) . "</td>";
      $tab .= "<td  style='$r width: 83%;'>" . $cin . "</td>";
      $tab .= "</tr>";
    }

      //pridaniSvatku, ktere mohou byt az po posledni cinnosti - tzn. musi se umistit na konec tabulky
      if ($smlouva->velikostUvazku <= 1) {
          while ($pocetJizPridanychSvatku<$pocetSvatku) {
              $tab .= "<tr>";
              $tab .= "<td style='$l width: 6%;'>" . $datumySvatkuObj[$pocetJizPridanychSvatku]->den . "." . "</td>";
              $tab .= "<td style='$l width: 4%;'>" . $dnySvatku[$pocetJizPridanychSvatku] . "</td>";
              $tab .= "<td style='width: 6%;'>" . $prevod->getHodJakoDesetinneCislo($smlouva->getPocetHodinKOdpracovaniZaDen(), 2) . "</td>";
              $tab .= "<td  style='$r width: 84%;'>svátek</td>";
              $tab .= "</tr>";
              $pocetJizPridanychSvatku++;
              $sumaSec += $smlouva->getPocetHodinKOdpracovaniZaDen();
          }
      }


    
      //4. dilci tabulka - celkem ..
      $tab .= "<tr>";
          $tab .= "<th colspan='3' style='border-right: $r $l $b'>Celkem</th>";
          $tab .= "<th style='$r $b'>";
          $tab .=  $prevod -> getHodJakoDesetinneCislo($sumaSec, 2);
          $tab .= "</th>";
      $tab .= "</tr>";
      
      $tab .= "</table>";
      echo $tab;

    
    //nova tabulka - DOVOLENA
    
    //tyto sirky jsou pouzity u tabulky dovolena 
    $s1 = "width: 20%;";
    $s2 = "width: 30%;";
    $s3 = "width: 1%;";
    $s4 = "width: 28%;";
    $s5 = "width: 21%;";
    
    
    $tab = "<table cellspacing='0' style='width: 100%; border: 0px solid red;'>";
    $tab .= prazdnyRadek();
    $tab .= "<tr>";
      $tab .= "<th colspan='2' style='$t $r $l'>Dovolená</th>";
      $tab .= "<td style='$bez'></td>";
      $tab .= "<th colspan='2' style='$t $r $l'>Pracovní neschopnost</th>";
    $tab .= "</tr>";

    //prevod svatku do spravnych jednotek; vypocet vznikl nahore a potom jeste u svatku
    $neschopnostHod = $prevod->getHodJakoDesetinneCislo($placenaNeschopnost['trvaniSec'], 2);
    $trvaniNeschopnostiSec = $placenaNeschopnost['trvaniSec'];
    $terminyNeschopnosti = $placenaNeschopnost['terminy'];
    $celkemDniNeschopnosti = $placenaNeschopnost['celkemDni'];

    $tab .= "<tr>";
      $tab .= "<td style='$s1 $l'>Termíny dovolené</td>";
      $tab .= "<td style='$s2 $r'>$terminyDovolene</td>";
      $tab .= "<td style='$s3 $bez'></td>";
      $tab .= "<td style='$s4 $l'>Termíny neschopnosti</td>";
      $tab .= "<td style='$s5 $r'>$terminyNeschopnosti</td>";
    $tab .= "</tr>";
    
    if ($zakazka -> eu) {
      $textZapojeni = "Poèet hodin dovolené odpovídajících zapojení do projektu";
      $textNeschopnost = "Poèet hodin neschopnosti odpovídajících zapojení do projektu";
      $textSoucet = "Souèet hodin souvisejících s projektem";
      $textSoucetZaProjekt = "Poèet hodin proplacených v daném mìsíci za projekt";
    } else {
      $textZapojeni = "Poèet hodin dovolené";
      $textNeschopnost = "Poèet hodin neschopnosti";
      $textSoucet = "Souèet hodin";
      $textSoucetZaProjekt = "Poèet hodin proplacených v daném mìsíci";
    }
    
     $tab .= "<tr>";
      $tab .= "<td style='$s1 $l'>Poèet dní celkem</td>";
      $tab .= "<td style='$s2 $r'>" . strtr($celkemDniDovolene, ".", ",") . "</td>";
      $tab .= "<td style='$s3 $bez'></td>";
      $tab .= "<td style='$s4 $l'>Poèet dní celkem</td>";
      $tab .= "<td style='$s5 $r'>" . strtr($celkemDniNeschopnosti, ".", ",") . "</td>";
    $tab .= "</tr>";

   $tab .= "<tr>";
      $tab .= "<td style='$s1 $l'>Poèet hodin dovolené celkem</td>";
      $tab .= "<td style='$s2 $r'>$oddovolenkovanoHod</td>";
      $tab .= "<td style='$s3 $bez'></td>";
      $tab .= "<td style='$s4 $l'>Poèet hodin celkem</td>";
      $tab .= "<td style='$s5 $r'>$neschopnostHod</td>";
    $tab .= "</tr>";
  
    $tab .= "<tr>";
      $tab .= "<td style='$s1 $l $b'>$textZapojeni</td>";
      $tab .= "<td style='$s2 $r $b'>$oddovolenkovanoHod</td>";
      $tab .= "<td style='$s3 $bez'></td>";
      $tab .= "<td style='$s4 vertical-align:top; $l $b'>$textNeschopnost</td>";
      $tab .= "<td style='$s5 $r $b'>" . $neschopnostHod . "</td>";
    $tab .= "</tr>";
    
    $tab .= prazdnyRadek();
  
  //5. dilci tabulka - Souèet hodin souvisejících s projektem ..
    $sumaVsehoSec = $trvaniNeschopnostiSec + $sumaSec + $trvaniDovoleneSec;
    $hodSovisejiciSProjektem =  $prevod -> getHodJakoDesetinneCislo($sumaVsehoSec, 2);

    //co se ma proplatit - v sablone z ministerstva to bylo maximalnì poèet hodin k odpracovani, my vsak chceme i prescasy k proplaceni
    //$sumaKProplaceni = $sumaVsehoSec > $velikostUvazkuSec ? $velikostUvazkuSec : $sumaVsehoSec; // to je podminka, podle ktere by to bylo v souladu s ministerstvem
    $prescas = new Prescas();
    $vypocetPrescasu = $prescas->getPrescasy($smlouva->idOsoby, $datum->getDatumPrvnihoDneMesice(), $datum->getDatumPoslednihoDneMesice(), $smlouva->id, 1);
    $sumaKProplaceni = $sumaVsehoSec + $vypocetPrescasu['proplatit'];

    if ($vypocetPrescasu['proplatit']>0 && $sumaVsehoSec>$velikostUvazkuSec) {
        $sumaKProplaceni = $velikostUvazkuSec + $vypocetPrescasu['proplatit'];
    } elseif ($sumaVsehoSec>$velikostUvazkuSec) {
        $sumaKProplaceni = $velikostUvazkuSec;
    } else $sumaKProplaceni = $sumaVsehoSec;
    $hodKProplaceni =  $prevod -> getHodJakoDesetinneCislo($sumaKProplaceni, 2);
        
    $tab .= "<tr>";
      $tab .= "<th colspan='3' style='$t $l  border-right: 0px solid red; '>$textSoucet</th>";
      $tab .= "<th colspan='2' style='$t $r  border-left: 0px solid red; '>";
        $tab .=  $hodSovisejiciSProjektem;
      $tab .= "</th>";
    $tab .= "</tr>";

    $tab .= "<tr>";
      $tab .= "<th colspan='3' style='$t $l $b border-right: 0px solid red; '>$textSoucetZaProjekt</th>";
      $tab .= "<th colspan='2' style='$t $r $b border-left: 0px solid red; '>";
        $tab .=  $hodKProplaceni;
      $tab .= "</th>";
    $tab .= "</tr>";
        
    if (LDAP_VUP === true) {
      $tab .= prazdnyRadek(5);
      $tab .=  "<tr><td colspan='5' style='border: 0px solid red;'>Prohlašuji, že v tomto mìsíci nepøekraèují všechny mnou uzavøené pracovnìprávní vztahy rozsah 1,5 úvazku pracovní doby u VÚP, MŠMT, jiných ostatních pøímo øízených organizací MŠMT a u subjektù øešících projekty ESF OP VK.</td></tr>";
    }
    
    //$tab .= prazdnyRadek(5);
    
    if ($configVykaz['vypisovatPodpisy']) {
      $tab .= prazdnyRadek();
      $tab .= "<tr>";
        $tab .= "<td style='$s1 $l $b $t'>Datum</td>";
        $tab .= "<td style='$s2 $r $t $b'></td>";
        $tab .= "<td style='$s3 $bez'></td>";
        $tab .= "<td style='$s4 $l $b $t'>Datum</td>";
        $tab .= "<td style='$s5 $r $t $b'></td>";
      $tab .= "</tr>";
      
      $tab .= prazdnyRadek();
      
      $tab .= "<tr style=''>";
        $tab .= "<td style='height: 25px; $s1 $t $b $l'>Podpis pracovníka</td>";
        $tab .= "<td style='$s2 $t $b $r'></td>";
        $tab .= "<td style='$s3 $bez'></td>";
        $tab .= "<td style='$s4 $t $b $l'>Podpis nadøízeného pracovníka</td>";
        $tab .= "<td style='$s5 $t $b $r'></td>";
      $tab .= "</tr>";
      
      $tab .= prazdnyRadek();
    
    }
    
  $tab .= "</table>"; 
  
  echo $tab;
  

  
  
  ?> 
  </page>
  <?php
} //konec cyklu vykazu

	$content = ob_get_clean();
	require_once('../../aplikace/pdf/html2pdf/html2pdf.class.php');
	$pdf = new HTML2PDF('P','A4','en');
        $pdf->defaultBottom = 15;
	$pdf->WriteHTML($content, isset($_GET['vuehtml']));
	$pdf->Output();
?>