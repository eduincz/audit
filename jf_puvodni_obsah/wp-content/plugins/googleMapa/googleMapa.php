<?php

class googleMapa
{
 // private $googleMapApiKey='ABQIAAAAccJf9tFZORjVYtHF0ejbvxR0Yy9fUAraYAoX7gi9bcpaha1kyBS7FZy8zFrpaaV3m67qpJjmINgZtA';  //zde je unikatni klic google mapy pro domenu
   private $googleMapApiKey='AIzaSyChg-Z25eX0nVF0q-GTiZTtFXYPfrePz2o';
  

  function __construct ()
  {
  
  }

  public   function parseToXML($htmlStr) 
  { 
  $xmlStr=str_replace('<','&lt;',$htmlStr); 
  $xmlStr=str_replace('>','&gt;',$xmlStr); 
  $xmlStr=str_replace('"','&quot;',$xmlStr); 
  $xmlStr=str_replace("'",'&#39;',$xmlStr); 
  $xmlStr=str_replace("&",'&amp;',$xmlStr); 
  return $xmlStr; 
  } 


  public function generujXMLzDatabaze()
  {       
    global $wpdb;

 
    $sql="SELECT nazev,adresa,jmeno_reditele,ic_skoly,telefon,email,web,geoLat,geoLng,id,region FROM skoly WHERE geoLat!='' AND geoLng!='' AND (certifikovana='1' OR certifikovana='-1') AND zobrazeno='1'";
    //echo $sql;
    $data=db_dotaz($sql);
    if($data)
    {
    $res.="<markers>";
    foreach($data as $d)
    {
    $nazev=$this->parseToXML($d[0]);
    $adresa=$this->parseToXML($d[1]);
    $reditel=$this->parseToXML($d[2]);
    $icSkoly=$this->parseToXML($d[3]);
    $telefon=$this->parseToXML($d[4]);
    $email=$this->parseToXML($d[5]);
    $web=$this->parseToXML($d[6]);
    $region=$this->parseToXML($d[10]);
    $idSkoly = $d[9];
    
    $dotaz = "SELECT post_id FROM `{$wpdb->prefix}postmeta` WHERE `meta_key` = 'wantZddorsPrislusnostKProfiluSkoly' AND `meta_value` = '$idSkoly'";
    $results = $wpdb->get_results($dotaz);
    if (count($results)) {   
        $urlPrispevkuSProfilem = $this->parseToXML( get_permalink($results[0]->post_id) );
    } else $urlPrispevkuSProfilem = "";
    

    
    if(mb_substr($d[3],-1,1,'UTF-8')=='á')$typ='zena';else $typ='muz';
    		$res.="<marker lat=\"$d[7]\" lng=\"$d[8]\" nazev=\"$nazev\" adresa=\"$adresa\" reditel=\"$reditel\" icSkoly=\"$icSkoly\" telefon=\"$telefon\" email=\"$email\" web=\"$web\" id=\"$d[9]\" region='$region' urlPrispevkuSProfilem=\"$urlPrispevkuSProfilem\" />\n";
    		
    }
    $res.="</markers>";
    }
    //header("Content-type: text/xml");
    return $res;

  
  }
  

  public function zobrazMapu()
  {

  
  
  
 $hash= md5(time());
$res.="
<script type='text/javascript' src='/wp-includes/js/jquery/jquery.min.js'></script>";
$res.="<script src=\"//maps.googleapis.com/maps/api/js?key=$this->googleMapApiKey&sensor=false\" type=\"text/javascript\"></script>";

$res.="
<script src=\"http://gmaps-samples-v3.googlecode.com/svn-history/r28/trunk/xmlparsing/util.js\"></script>
<script type=\"text/javascript\">
var markers=[];

var infowindow = new google.maps.InfoWindow({
   
  });
  
var mapa;
var spendliky=[];    
   function initialize_map(){
	    var map = new google.maps.Map(document.getElementById(\"mapa\"));
      var geocoder = new google.maps.Geocoder();
      mapa= map;
	    map.setCenter(new google.maps.LatLng(49.800000, 15.534668));
      map.setZoom(7);
	   

    jQuery.get('http://www.rodicevitani.cz/wp-content/plugins/googleMapa/mapa_data.xml?$hash', function(data) {
  
    jQuery(data).find('marker').each(function() {
        var marker = jQuery(this);
        markers.push(marker); 
        var point = new google.maps.LatLng(parseFloat(marker.attr(\"lat\")),
                                    parseFloat(marker.attr(\"lng\")));
        var nazev = marker.attr(\"nazev\");
        var adresa = marker.attr(\"adresa\");
        var reditel = marker.attr(\"reditel\");
        var icSkoly = marker.attr(\"icSkoly\");
        var email = marker.attr(\"email\");
        var telefon = marker.attr(\"telefon\");
        var web = marker.attr(\"web\");
        var id = marker.attr(\"id\");
        var region = marker.attr(\"region\");
        var urlPrispevkuSProfilem = marker.attr(\"urlPrispevkuSProfilem\");
    
        var marker = createMarker(point,nazev,adresa,reditel,icSkoly,email,telefon,web,id,region,urlPrispevkuSProfilem);
        marker.setMap(map);
        spendliky[id]=marker;
     });
  
  
});
}
 

function findRegionMarkers(targetRegion)
{       

for(var i=0;i<markers.length;i++) 
  {
      var region = markers[i].attr(\"region\");
    if(region==targetRegion)
    {
    var point = new google.maps.LatLng(parseFloat(markers[i].attr(\"lat\")),parseFloat(markers[i].attr(\"lng\")));
    var nazev = markers[i].attr(\"nazev\");
    var adresa = markers[i].attr(\"adresa\");
    var reditel = markers[i].attr(\"reditel\");
    var icSkoly = markers[i].attr(\"icSkoly\");
    var email = markers[i].attr(\"email\");
    var telefon = markers[i].attr(\"telefon\");
    var web = markers[i].attr(\"web\");
    var id = markers[i].attr(\"id\");
    var region = markers[i].attr(\"region\");
    var urlPrispevkuSProfilem = markers[i].attr(\"urlPrispevkuSProfilem\");
    
  var html = '<div style=\"font-size:0.7em;margin:5px;line-height:20px;width:450px;\">'
   +'<strong>'+'<a href=\"/profil-skoly?id=' + id + '\">'
   + nazev + 
   '</a></strong> <br/>'
    + '<div style=\"width:450px;\">Adresa: ' + adresa + '<br />'
+'<span><strong>Jméno ředitele/ky: </strong>'+reditel+'</span><br />'
+'<span><strong>Telefon: </strong>'+telefon+'</span><br />'
+'<span><strong>Email: </strong>'+email+'</span><br />'
+'<span><strong>Web: </strong>'+web+'</span><br />'
+'<a href=\"/profil-skoly/?id='+id+'\">Zobrazit detail</a></div>';

  document.getElementById('nearSchools').innerHTML+=html;
  }
}
}
  
    
function createMarker(point,nazev,adresa,reditel,icSkoly,email,telefon,web,id,region,urlPrispevkuSProfilem) {
   var marker = new google.maps.Marker({
      position: point
   });
   
  
  if (urlPrispevkuSProfilem != '') var odkazNaDetail = '<br /><a href=\"'+urlPrispevkuSProfilem+'\">Zobrazit profil</a>'; else var odkazNaDetail = '';
  var html = '<div style=\"width:350px;padding:5px;\"><strong>'+'<a href=\"/profil-skoly?id=' + id + '\">'
   + nazev + 
   '</a></strong> <br/>'
    + 'Adresa: ' + adresa + '<hr /><br />'
+'<span><strong>Jméno ředitele/ky: </strong>'+reditel+'</span><br />'
+'<span><strong>Telefon: </strong>'+telefon+'</span><br />'
+'<span><strong>Email: </strong>'+email+'</span><br />'
+'<span><strong>Web: </strong>'+web+'</span><br />'
+'<a href=\"/profil-skoly/?id='+id+'\">Zobrazit detail</a>'
+ odkazNaDetail
+'<a href=\"/mapa-skol/\" style=\"float:right;\">Zpět na celou mapu</a></div>'
;
  google.maps.event.addListener(marker, 'click', function() {
    var zoom=mapa.getZoom(); 
    //mapa.setCenter(marker.getLatLng());
    if(zoom!=13)mapa.setZoom(13);
    infowindow.setContent(html);
    infowindow.open(marker.get('map'), marker);
    
 
   $.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: region  } ,function(data) {
   $('#seznamSkolKraje').html(data);
  });
});
 
  return marker;
}                                            

	
	

$(document).ready(function(){
 
initialize_map();

});

</script>";

$res.="<div id='mapa' style='width:600px;height:400px;'></div>";
$res.="<div id=\"nearSchools\"></div>";

                                                                                                                
$res.="<div id=\"regions\" style=\"float:left\">";
$res.="<table width=\"600px\">";
$res.="<tr><td><a onclick=\"mapa.setCenter(new google.maps.LatLng(50.080000, 14.42));mapa.setZoom(11); $.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 11  } ,function(data) { $('#seznamSkolKraje').html(data);});\">Hlavní město Praha</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(50.0800000, 14.42));mapa.setZoom(8);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 10 } ,function(data) { $('#seznamSkolKraje').html(data);});\">Středočeský kraj</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(49.588562, 13.3760336));mapa.setZoom(9);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 9 } ,function(data) { $('#seznamSkolKraje').html(data);});\">Plzeňský kraj</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(49.2753784, 14.4816269));mapa.setZoom(9);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 1  } ,function(data) { $('#seznamSkolKraje').html(data);});\">Jihočeský kraj</a><br />";
$res.="</td><td><a onclick=\"mapa.setCenter(new google.maps.LatLng(50.1315569, 12.8742741));mapa.setZoom(10);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 3 } ,function(data) { $('#seznamSkolKraje').html(data);});\">Karlovarský kraj</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(50.6612605, 14.036478));mapa.setZoom(10);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 12 } ,function(data) { $('#seznamSkolKraje').html(data);});\">Ústecký kraj</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(50.7728351, 15.0625434));mapa.setZoom(11);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 5 } ,function(data) { $('#seznamSkolKraje').html(data);});\">Liberecký kraj</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(50.208871, 15.8242728));mapa.setZoom(11);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 4 } ,function(data) { $('#seznamSkolKraje').html(data);});\">Královéhradecký kraj</a><br />";
$res.="</td><td><a onclick=\"mapa.setCenter(new google.maps.LatLng(49.8623967, 16.1));mapa.setZoom(9);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 8 } ,function(data) { $('#seznamSkolKraje').html(data);});\">Pardubický kraj</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(49.3132421, 15.8819719));mapa.setZoom(10);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 13 } ,function(data) { $('#seznamSkolKraje').html(data);});\">Kraj Vysočina</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(49.0004698, 16.8987371));mapa.setZoom(9);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 2  } ,function(data) { $('#seznamSkolKraje').html(data);});\">Jihomoravský kraj</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(49.2194581, 17.6669));mapa.setZoom(9);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 14  } ,function(data) { $('#seznamSkolKraje').html(data);});\">Zlínský kraj</a><br />";
$res.="</td><td><a onclick=\"mapa.setCenter(new google.maps.LatLng(49.5942981, 17.2598041));mapa.setZoom(10);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 7 } ,function(data) { $('#seznamSkolKraje').html(data);});\">Olomoucký kraj</a><br />";
$res.="<a onclick=\"mapa.setCenter(new google.maps.LatLng(49.754028, 18.2610356));mapa.setZoom(10);$.post('".plugins_url()."/prehledSkol.php',{ akce:'ajaxPrehledSkolKraje', kraj: 6  } ,function(data) { $('#seznamSkolKraje').html(data);});\">Moravskoslezský kraj</a><br />";
$res.="</td></tr></table></div>";

$res.="<div id='searchWrap' >";
$res.="<div id='searchForm' >";

$res.="<form method='post' action=''>";
$res.="<input type='text' name='najit' value='' id='hledanaSkola' onkeyup=\"
$.post('".plugins_url()."/prehledSkol.php',
{ akce:'ajaxNaseptavacSkol', hledej:$('#hledanaSkola').val() } ,
function(data) {
$('#searchHint').show();
$('#searchHint').html(data);});\" />";
$res.="<input type='button' id='hledatSkoluButton' value='Vyhledat školu' onclick=\"
if($('#hledanaSkola').val()){
$.post('".plugins_url()."/prehledSkol.php',
{ akce:'ajaxVyhledavaniSkol', hledej:$('#hledanaSkola').val() } ,
function(data) {
$('#searchResult').show();
$('#searchHint').hide();

$('#searchResult').html(data);});}\" />";
$res.="</form>";  
$res.="<div id='searchHint'></div></div>

<div id='searchResult'></div>";
  
$res.="</div>";
  
  
return $res;

  }
  
  public function zjistiSouradniceZAdresy($adresa)
  {
    $data = file_get_contents(
			//sprintf('http://maps.google.com/maps/geo?output=csv&key=%s&q=%s',	$this->googleMapApiKey,	urlencode($adresa))
      sprintf('http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=%s',urlencode($adresa))
		);
    
    if ($data) {
    $data=json_decode($data);
    
      /*$data = explode(',', $data);
			if ($data[0] == 200) 
      {
		//		printf(' lat: %s, lng: %s', $data[2], $data[3]);
			return array('geoLat' => $data[2],'geoLng' => $data[3]);
				
			} */
      if($data->status=='OK')
      {
        $location = $data->results[0]->geometry->location;
    
        return array('geoLat' => $location->lat,'geoLng' => $location->lng);
			
      }
      
      else 
      {
				return false;
      }
    }
  }
}