<?php

acf_form_head();
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$URL =  $_SERVER['REQUEST_URI'];
get_header(); 
?>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script>
	// When the user scrolls the page, execute myFunction 
	window.onscroll = function() {myFunction()};

	// Get the header
	var header = document.getElementById("masthead");
	
	var logoImageOriginalSrc = $('#masthead img').attr('src');
	var logoImageNewSrc = 'https://audit.eduin.cz/2021/wp-content/uploads/2021/12/Audit_logo2021_zkracene.png';

	// Get the offset position of the navbar
	var sticky = header.offsetTop;

	// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
	function myFunction() {
	  if (window.pageYOffset > sticky) {
		header.classList.add("sticky");
		$('#masthead img').attr('src',logoImageNewSrc);
	  } else {
		header.classList.remove("sticky");
		$('#masthead img').attr('src',logoImageOriginalSrc);
	  }
	}
</script>

<script>
	$( document ).ready(function() {
	});
	
</script>

<main id="main">
	<div class="container">
		<h4 class="subpage-heading">
			Co je Audit vzdělávacího systému?
		</h4>
		<p class="subpage-text">
			V Auditu se ohlížíme za uplynulým rokem a z pohledu nezávislé instituce hodnotíme stav vzdělávacího systému, trendy ve vzdělávací politice a tendence, jež tuto oblast ovlivňují.
		</p>
		
		<div class="row citate-block">
			<div class="col m4">
				<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/06/IMG_4790_1-scaled.jpg" alt="why-img" />
			</div>
			<div class="col m8">
				<div class="why-citate">
					<h5>
						Audit vzdělávacího systému již od roku 2014 reflektuje slabiny a pozoruhodná místa českého vzdělávání a vybízí všechny jeho aktéry k dialogu a inovacím, které potřebujeme.
					</h5>
					<p>
						Honza Dolínek, výkonný ředitel EDUinu
					</p>
				</div>
			</div>
		</div>
		<br /><br />
		
		<h4 class="subpage-heading">
			Co je cílem Auditu?
		</h4>
		<p class="subpage-text">
			Audit přináší dva úhly pohledu. První je popisný a nabízí přehled hlavních událostí, které v uplynulém roce ovlivnily vzdělávací systém. Může být užitečný pro všechny, kdo mají zájem udržet si přehled o aktuálním dění a vývoji jednotlivých kauz. 
Na druhé straně analytické texty přinášejí hlubší pohled na uplynulý rok. Vybíráme vždy několik témat, která nám v daném roce připadají podstatná. Shrnujeme uplynulou debatu, propojujeme srozumitelně současnou situaci s poznatky z výzkumu. A nakonec upozorňujeme na to, co je dobré v tématu sledovat v aktuálním roce.
		</p>
		
		<h4 class="subpage-heading">
			Co najdete v Auditu a jak vzniká?
		</h4>
		<p class="subpage-text">
			<a href="https://audit.eduin.cz/2021/udalosti-nove/">Události</a> pokrývají významné momenty vzdělávací politiky i diskuze kolem vzdělávání v uplynulém roce. Podklady pro výběr událostí jsou veřejně dostupné materiály, zejména tiskové zprávy, nové vyhlášky a zákony, zprávy České školní inspekce a přehled o událostech ve vzdělávání, který poskytuje <a href="https://www.eduin.cz/category/beduin/">týdenní zpravodaj bEDUin</a>. Popis událostí doplňujeme krátkým komentářem, který je zasazuje do kontextu, a především seznamem relevantních zdrojů.<br /><br />
 
			V <a href="https://audit.eduin.cz/2021/seznam-vsech-analyz/">analýzách</a> rozebíráme vybraná témata, která rezonovala českým vzdělávacím systémem v uplynulém roce. Sledujeme jak témata dlouhodobá (cíle a obsah vzdělávání, nerovnosti ve vzdělávání), tak ad hoc témata, jejichž důležitost vyplyne z povahy událostí v konkrétním roce. Autoři čerpají z dostupných českých a zahraničních výzkumů, tuzemských strategických a vládních dokumentů, reflexe témat vzdělávání v tisku a také odborných debat, kterých se účastní. Každý text projde dvoustupňovou nezávislou oponenturou. Vybrané komentáře nebo doplnění oponentů najdete přímo v textech analýz.<br /><br />
 
			<div class="divider"></div>
Audit vzdělávacího systému je součástí pestré mozaiky činnosti EDUinu a doufáme, že bude přispívat ke kultivaci debaty o podobě vzdělávání v ČR.<br /><br />
			<a href="https://eduin.cz" target="_blank">EDUin</a> je obecně prospěšná společnost, která se věnuje problematice vzdělávání a jejíž snahou je informovat veřejnost o všem důležitém, co se děje ve školství a vzdělávání. EDUin, o. p. s., byla založena v květnu 2010 a realizuje a připravuje několik informačních a osvětových projektů.  <br /><br />
Pokud vás Audit oslovil, budeme rádi, když nám dáte vědět na <a href="https://www.facebook.com/eduin.cz" target="_blank">sociálních sítích EDUinu</a> nebo e-mailem.<br /><br />
		</p>
		
	</div>
</main>

<?php
get_footer();
?>

