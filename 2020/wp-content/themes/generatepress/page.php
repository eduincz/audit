<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GeneratePress
 */
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
	var logoImageNewSrc = 'https://audit.eduin.cz/2020/wp-content/uploads/2021/12/Audit_logo2021_zkracene.png';

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
		
		document.addEventListener('DOMContentLoaded', function() {
			var options = '';
			var elems = document.querySelectorAll('.collapsible');
			var instances = M.Collapsible.init(elems, options);
		  });
		
		// Select all links with hashes
		$('a[href*="#"]')
		  // Remove links that don't actually link to anything
		  .not('[href="#"]')
		  .not('[href="#0"]')
		  .click(function(event) {
			// On-page links
			if (
			  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
			  && 
			  location.hostname == this.hostname
			) {
			  // Figure out element to scroll to
			  var target = $(this.hash);
			  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			  // Does a scroll target exist?
			  if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				$('html, body').animate({
				  scrollTop: target.offset().top
				}, 1000, function() {
				  // Callback after animation
				  // Must change focus!
				  var $target = $(target);
				  $target.focus();
				  if ($target.is(":focus")) { // Checking if the target was focused
					return false;
				  } else {
					$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
					$target.focus(); // Set focus again
				  };
				});
			  }
			}
		  });
	</script>

	<div id="primary" <?php if($URL === '/2020/my-account/'){ ?>class="account-page" <?php } ?>>
<?php
if(strpos($URL,'/2020/?updated=true') !== false){
	echo "<script>alert('Děkujeme za registraci e-mailu.');</script>";
	echo "<script>window.location.replace('https://audit.eduin.cz/2020/')</script>";
	
}
if(strpos($URL,'/2020/homepage-vyvoj/') !== false){?>
		<main id="main">
			<div class="hp-claim" id="hp-claim">
				<div class="container">
				<div class="row">
					<div class="col m6">
						<img class="claim-image" src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/audit_ilu_HP_01.png" alt="claim-image" />
					</div>
					<div class="col m6">
						<h3 class="claim-heading">
							Víte, co se děje v českém vzdělávání? Audit pro rok 2021 reflektuje nerovnosti ve vzdělávání, přijímací zkoušky i úskalí při zavádění systémových změn.
						</h3>
						<a class="btn btn-primary homepage-blue" href="#hp-why-audit">
							Číst dál
						</a>
					</div>
				</div>
					
					
				</div>
			</div>
			<div class="hp-form" id="hp-form">
				<div class="container">
					<div class="row">
						<div class="col m6">
							<p class="online-text">
								ONLINE PREZENTACE AUDITU 28. BŘEZNA 2022
							</p>
						</div>
						<div class="col m3">
							<a class="acf-button button button-primary button-large" href="https://fb.me/e/2YfguWsMB" target="_blank">Událost na Facebooku</a>
						</div>
					</div>
					<br /><br />
					<div class="row">
						<div class="col m6">
							<p class="online-text">DEJTE MI VĚDĚT, AŽ BUDE AUDIT ZVEŘEJNĚNÝ</p>
						</div>
						<div class="col m6">
							<?php acf_form (array(
							'field_groups' => array(1564),
							'form' => true,
							//'return' => 'https://www.audit.eduin.cz/2020/#hp-form',
							'post_id'		=> 'new_post',
							'post_title'    => false,
							'new_post'		=> array(
								'post_type'		=> 'cpt_emaily',
								'post_status'	=> 'publish'
							),
							'submit_value' => 'Odeslat'
							)); ?>
							<?php //echo do_shortcode('[happyforms id="1556" /]'); ?>
						<?php /* echo do_shortcode('[wpforms id="1546"]'); */ ?>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hp-events hide-block" id="hp-events">
				<div class="container">
					<div class="row">
						<div class="col m12">
							<h2 class="events-heading">
								Události 2020
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col m2">
							<div class="event-block">
								<div class="event-image">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_covid_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#finance
								</p>
								<p class="event-text">
									Konsenzus ve vzdělávací politice
								</p>
								<p class="event-date">
									1. 1. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								<div class="event-image">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_financovani_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#finance
								</p>
								<p class="event-text">
									Cut-off skóre a omezování pro maturitní obory na úrovní krajů
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								
								<div class="event-image">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_inkluze_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#finance
								</p>
								<p class="event-text">
									Strategie 2030+, pozastavení revize kurikula a dlouhodobý záměr vzdělávání 2019-2023
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								
								<div class="event-image">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_maturity_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#corona
								</p>
								<p class="event-text">
									Konsenzus ve vzdělávací politice
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								<div class="event-image">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_MS_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#finance
								</p>
								<p class="event-text">
									Cut-off skóre a omezování pro maturitní obory na úrovní krajů
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								
								<div class="event-image">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_nerovnosti_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#vzdelani
								</p>
								<p class="event-text">
									Strategie 2030+, pozastavení revize kurikula a dlouhodobý záměr vzdělávání 2019-2023
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col m12">	
							<a class="btn btn-green" href="https://audit.eduin.cz/2020/udalosti-2020/">
								Seznam událostí
							</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="hp-analysis hide-block" id="hp-analysis">
				<div class="container">
					
					<div class="row">
						<div class="col m12">
							<h2 class="analysis-main-heading">
								Analýzy
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj učitelství: Platy učitelů, vyjednávání s odbory atp. (Data, závazky, dlouhodobé cíle, poměr tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2020/analyza/" class="btn btn-primary more-button">Více</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj učitelství: Platy učitelů, vyjednávání s odbory atp. (Data, závazky, dlouhodobé cíle, poměr tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2020/analyza/" class="btn btn-primary more-button">Více</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj učitelství: Platy učitelů, vyjednávání s odbory atp. (Data, závazky, dlouhodobé cíle, poměr tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2020/analyza/" class="btn btn-primary more-button">Více</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj učitelství: Platy učitelů, vyjednávání s odbory atp. (Data, závazky, dlouhodobé cíle, poměr tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2020/analyza/" class="btn btn-primary more-button">Více</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj učitelství: Platy učitelů, vyjednávání s odbory atp. (Data, závazky, dlouhodobé cíle, poměr tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2020/analyza/" class="btn btn-primary more-button">Více</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj učitelství: Platy učitelů, vyjednávání s odbory atp. (Data, závazky, dlouhodobé cíle, poměr tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2020/analyza/" class="btn btn-primary more-button">Více</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="hp-why-audit" id="hp-why-audit">
				<div class="container">
			
					<div class="row">
						<div class="col m12">
							<h2 class="why-audit-main-heading">
								Audit vzdělávacího systému
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col m7">
							<br />
							<p class="why-subtext">
								Audit vzdělávacího systému České republiky komplexně hodnotí aktuální stav vzdělávacího systému a změny ve vzdělávací 	politice.<br /><br />

Audit připravuje odborný tým EDUin a je nezávisle oponován. Vzniká na základě dostupných dat z veřejné sféry a akademického prostředí. Souborný text auditu se skládá z přehledu událostí předchozího roku a tematických analýz.
Všechny audity publikované od roku 2014 najdete na tomhle webu.
							</p>
						</div>
						<div class="col m5">
							<div class="why-sub-image">
								<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/audit_ilu_HP_02.png" alt="why-subimage" />
							</div>
						</div>
					</div>
					<div class="row citate-block">
						<div class="col m4">
							<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/06/IMG_4790_1-scaled.jpg" alt="why-img" />
						</div>
						<div class="col m8">
							<div class="why-citate">
								<h5>
									Audit vzdělávacího systému již 7 let reflektuje slabiny a pozoru-hodná místa českého vzdělávání a vybízí všechny jeho aktéry k dialogu a inovacím, které potřebujeme.
								</h5>
								<p>
									Honza Dolínek, výkonný ředitel EDUin
								</p>
							</div>
						</div>
					</div>
					<div class="row citate-block">
						<div class="col m8">
							<div class="why-citate">
								<h5>Koronavirová doba zvýraznila již tak velké rozdíly v kvalitě poskytovaného vzdělávání. Náš vzdělávací systém musí o to více pracovat na snížení těchto rozdílů daných socioekonomickou situací v rodinách tak, jak je to teoreticky popsáno ve Strategii 2030+. Její implementace do praxe proto musí být jednou z hlavních priorit našeho vzdělávacího systému.
								</h5>
								<p>
									profesor Jiří Drahoš, senátor
								</p>
							</div>
						</div>
						<div class="col m4">
							<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/jiri-drahos.jpg" alt="why-img" />
						</div>
					</div>
				</div>

			<?php } ?>
			</div> 
		
		<?php if($URL === '/2020/'){?>
		<main id="main">
			<div class="hp-claim" id="hp-claim">
				<div class="container">
				<div class="row">
					<div class="col m6">
						<img class="claim-image" src="https://audit.eduin.cz/2020/wp-content/uploads/2021/02/audit_hp_teas.png" alt="claim-image" />
					</div>
					<div class="col m6">
						<h3 class="claim-heading">
							Víte, co se děje v českém vzdělávání? Audit pro rok 2021 reflektuje nerovnosti ve vzdělávání, přijímací zkoušky i úskalí při zavádění systémových změn.
						</h3>
						<a class="btn btn-primary homepage-blue" href="#hp-events">
							Číst dál
						</a>
					</div>
				</div>
					
					
				</div>
			</div>
			
			<div class="hp-form" id="hp-form">
				<div class="container">
					<div class="row">
						<div class="col m6">
							<p class="online-text">
								ONLINE PREZENTACE AUDITU 28. BŘEZNA 2022
							</p>
						</div>
						<div class="col m3">
							<a class="acf-button button button-primary button-large" href="https://fb.me/e/2YfguWsMB" target="_blank">Událost na Facebooku</a>
						</div>
					</div>
					<div class="row">
						<div class="col m6">
							<p class="online-text">DEJTE MI VĚDĚT, AŽ BUDE AUDIT ZVEŘEJNĚNÝ</p>
						</div>
						<div class="col m6">
							<?php acf_form (array(
							'field_groups' => array(1564),
							'form' => true,
							//'return' => 'https://www.audit.eduin.cz/2020/#hp-form',
							'post_id'		=> 'new_post',
							'post_title'    => false,
							'new_post'		=> array(
								'post_type'		=> 'cpt_emaily',
								'post_status'	=> 'publish'
							),
							'submit_value' => 'Odeslat'
							)); ?>
							<?php //echo do_shortcode('[happyforms id="1556" /]'); ?>
						<?php /* echo do_shortcode('[wpforms id="1546"]'); */ ?>
						</div>
						</div>
					</div>
				</div>
			<div class="events" id="hp-events">
					<div class="container">
						<div class="col m12">
							<h2 class="events-page-heading events-hp-heading">
								Události 2020
							</h2><br /><br />
						</div>
					</div>
					<div class="container">
					<div class="row">
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2020/udalosti-2020/#inkluze" class="event filter-inkluze">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_inkluze_modra.png" alt="" /><br />
								</div>
								<h4>inkluze</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2020/udalosti-2020/#covid" class="event filter-covid">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_covid_modra.png" alt="" /><br />
								</div>
								<h4>covid</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2020/udalosti-2020/#finance" class="event filter-financovani">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_financovani_modra.png" alt="" /><br />
								</div>
								<h4>financování</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2020/udalosti-2020/#maturity" class="event filter-maturity">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_maturity_modra.png" alt="" /><br />
								</div>
								<h4>maturity</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2020/udalosti-2020/#technologie" class="event filter-technologie">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_technologie_modra.png" alt="" /><br />
								</div>
								<h4>technologie</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2020/udalosti-2020/#nerovnosti" class="event filter-nerovnosti">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_nerovnosti_modra.png" alt="" /><br />
								</div>
								<h4>nerovnosti ve vzdělávání</h4>
							</a>
						</div>
					</div>
						<div class="row">
							<br />
							<a class="btn btn-primary more-button homepage-blue" href="https://audit.eduin.cz/2020/udalosti-2020/">
								Seznam událostí
							</a>
						</div>
						</div>
			</div>
			
			<div class="hp-analysis" id="hp-analysis">
				<div class="container">
					
					<div class="row">
						<div class="col m12">
							<h2 class="analysis-main-heading">
								Analýzy 2020
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col m4">
							<div class="analysis-block analysis-hp-block">
								<h4 class="analysis-heading analysis-hp-heading">
									Školy jsou už v digitálu. Technologie mohou zlepšit vzdělávání po covidu
								</h4>
								<p class="analysis-text">
									Během roku 2020 pandemie Covid-19 narušila vzdělávání, jak ho známe, rovnou dvakrát. Učitelé, rodiče a žáci prochází transformujícím obdobím, které je zároveň příležitostí pro české školství. Co z náhlé digitalizace ve vzdělávání přetrvá?
								</p>
								<a href="https://audit.eduin.cz/2020/skoly-jsou-uz-v-digitalu-technologie-mohou-zlepsit-vzdelavani-po-covidu/" class="btn btn-primary more-button homepage-blue">Více</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block analysis-hp-block">
								<h4 class="analysis-heading analysis-hp-heading">
									Testování a zkoušky ve školství: Jak fungují a co způsobují
								</h4>
								<p class="analysis-text">
									Co všechno je dobré zvážit předtím, než rozsadíme děti do lavic a necháme hroty tužek v záznamových arších rozhodnout, jaké je jejich místo ve světě? Musíme se ptát po účelu testování, všímat si vedlejší dopady testování a využívat testy jako nástroj zpětné vazby.
								</p>
								<a href="https://audit.eduin.cz/2020/testovani-a-zkousky-ve-skolstvi-jak-funguji-a-co-zpusobuji/" class="btn btn-primary more-button homepage-blue">Více</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block analysis-hp-block">
								<h4 class="analysis-heading analysis-hp-heading">
									Víme, jak dobře připravovat učitele - ale pořád to systémově neděláme
								</h4>
								<p class="analysis-text">
									V roce 2020 rodiče přímo na obrazovkách počítačů viděli silné i slabé stránky českých učitelů. Nastal čas systémově změnit jejich přípravu. Příklady dobré praxe lze najít na některých pedagogických fakultách a v inovativních programech. 
								</p>
								<a href="https://audit.eduin.cz/2020/vime-jak-dobre-pripravovat-ucitele-ale-porad-to-systemove-nedelame/" class="btn btn-primary more-button homepage-blue">Více</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block analysis-hp-block">
								<h4 class="analysis-heading analysis-hp-heading">
									Školy a ministerstvo potřebují provázat. Pomoci může nová úroveň vzdělávacího systému
								</h4>
								<p class="analysis-text">
									V decentralizovaném systému vzdělávání není explicitně stanovena odpovědnost za vzdělávací výsledky žáků, ani za odstraňování nerovností a zajištění stejných příležitostí ve vzdělávání. Změnit to může plánované zavedení tzv. středního článku, jehož konkrétní podoba se v roce 2020 diskutovala v odborných kruzích.
								</p>
								<a href="https://audit.eduin.cz/2020/skoly-a-ministerstvo-potrebuji-provazat-pomoci-muze-nova-uroven-vzdelavaciho-systemu/" class="btn btn-primary more-button homepage-blue">Více</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block analysis-hp-block">
								<h4 class="analysis-heading analysis-hp-heading">
									 Žáci, na které jsme zapomněli, potřebují jiné odborné školy a celoživotní profesní vzdělávání 
								</h4>
								<p class="analysis-text">
									Na odborných školách – a  především na učňovských oborech – se potkávají žáci, kteří nevěří v to, že mohou ve vzdělávání uspět. Často si si volí úzce specializované obory, ve kterých po vystudování nepracují, a mnohdy nejsou rozvíjeny ani jejich základní gramotnosti. 
								</p>
								<a href="https://audit.eduin.cz/2020/zaci-na-ktere-jsme-zapomneli-potrebuji-jine-odborne-skoly-a-celozivotni-profesni-vzdelavani/" class="btn btn-primary more-button homepage-blue">Více</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="hp-why-audit" id="hp-why-audit">
				<div class="container">
			
					<div class="row">
						<div class="col m12">
							<h2 class="why-audit-main-heading">
								Co je audit?
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col m12">
							<br />
							<p class="why-subtext">
								Sledujeme a reflektujeme události a témata, která hýbou vzděláváním. <br /><br />

Připravujeme Audit každý rok ve spolupráci s dalšími odborníky. Pracujeme na základě dostupných dat z veřejné sféry a akademického prostředí a necháváme jej nezávisle oponovat.  <br /><br />

Audit nabízí přehled událostí předchozího roku a několik analytických textů, které blíže rozebírají důležitá a ožehavá témata.  <br /><br />

Všechny ročníky od roku 2014 najdete publikované zde na tomto webu. <br /><br />

							<a class="btn btn-primary more-button homepage-blue" href="https://audit.eduin.cz/2020/co-je-audit/">Více</a>

							</p>
						</div>
					</div>
				</div>

			<?php } ?>
			</div> 


			<?php if(strpos($URL,'/2020/archiv/') !== false){?>
			
			<div id="primary">
				<main id="main">
					<div class="container">
						<div class="row">
							<div class="col m12 archive-links">
								<p>
									Zde naleznete všechny předchozí ročníky Auditu vzdělávacího systému.
								</p>
								<a href="https://audit.eduin.cz/2019/" target="_blank">Audit vzdělávacího systému 2019</a><br />
								Audit vzdělávacího systému 2018: <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2018.pdf">analýza</a>, <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2018.pdf">infografika</a><br />
								Audit vzdělávacího systému 2017: <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2017.pdf">analýza</a>, <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2017.pdf">infografika</a><br />
								Audit vzdělávacího systému 2016: <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2016.pdf">analýza</a>, <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2016.pdf">infografika</a><br />
								Audit vzdělávacího systému 2015: <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2015.pdf">analýza</a>, <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2015.pdf">infografika</a><br />
								Audit vzdělávacího systému 2014: <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2014.pdf">analýza</a>, <a href="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2014.pdf">infografika</a><br />
							</div>
						</div>
					</div>
				</main>
			</div>
			</div> 
			
			<?php } ?>


			<?php if(strpos($URL,'/2020/udalosti-2020/') !== false){?>
		
			<script>$( document ).ready(function() {
					var hidden = false;
					var filterCount = 0;
					var filtersArray = [];
					var monthsArray = [];
					var selectedMonth = "";
					
				
					var hash = window.location.hash;
					//inkluze
					//covid
					//finance
					//maturity
					//neformalni
					//nerovnosti
					//technologie
					//ucitele
					//materske
					//vysoke
					//zakladni
					//stredni
					//legislativa
					if(hash != ''){
						$(".event-list-item").hide();
						$("."+hash.substring(1)).show();
						filtersArray = [hash.substring(1)];
						filterCount = 1;
						let str = $('.filter-'+hash.substring(1)).find('img').attr('src');
						let newStr = str.replace('modra','bila');
						$('.filter-'+hash.substring(1)).find('img').attr('src',newStr);
						$('.filter-'+hash.substring(1)).addClass('event-filtered');
					}
					
					/*$(".event").on('mouseenter',function(){
						let str = $(this).find('img').attr('src');
						let newStr = str.replace('modra','bila');
						$(this).find('img').attr('src',newStr);
						$(this).addClass('event-filtered');
					});
					
					$(".event").on('mouseleave',function(){
						let str = $(this).find('img').attr('src');
						let newStr = str.replace('bila','modra');
						$(this).find('img').attr('src',newStr);
						$(this).removeClass('event-filtered');
					});*/

					
					
					$(".filter-inkluze").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_inkluze_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'inkluze';
							});
							$.each($(".inkluze"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ){
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_inkluze_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".inkluze").show();
							}
							else{
								var elements = $(".inkluze");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
									
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							
							filterCount++;
							filtersArray.push('inkluze');
						}
					  event.preventDefault();
					});
					$(".filter-covid").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_covid_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'covid';
							});
							$.each($(".covid"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_covid_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".covid").show();
							}
							else{
								var elements = $(".covid");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('covid');
						}
					  event.preventDefault();
					});
					$(".filter-finance").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_financovani_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'finance';
							});
							$.each($(".finance"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_financovani_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
					  		
							
							if(monthsArray === []){
					  			$(".finance").show();
							}
							else{
								var elements = $(".finance");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('finance');
						}
					  event.preventDefault();
					});
					$(".filter-maturity").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_maturity_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'maturity';
							});
							$.each($(".maturity"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_maturity_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".maturity").show();
							}
							else{
								var elements = $(".maturity");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('maturity');
						}
					  event.preventDefault();
					});
					$(".filter-neformalni").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_neformalni_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'neformalni';
							});
							$.each($(".neformalni"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_neformalni_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".neformalni").show();
							}
							else{
								var elements = $(".neformalni");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('neformalni');
						}
					  event.preventDefault();
					});
					$(".filter-nerovnosti").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_nerovnosti_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'nerovnosti';
							});
							$.each($(".nerovnosti"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_nerovnosti_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".nerovnosti").show();
							}
							else{
								var elements = $(".nerovnosti");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('nerovnosti');
						}
					  event.preventDefault();
					});
					$(".filter-technologie").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_technologie_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'technologie';
							});
							$.each($(".technologie"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_technologie_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".technologie").show();
							}
							else{
								var elements = $(".technologie");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('technologie');
						}
					  event.preventDefault();
					});
					$(".filter-ucitele").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_ucitele_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'ucitele';
							});
							$.each($(".ucitele"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_ucitele_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".ucitele").show();
							}
							else{
								var elements = $(".ucitele");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('ucitele');
						}
					  event.preventDefault();
					});
					$(".filter-materske").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_MS_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'materske';
							});
							$.each($(".materske"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_MS_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".materske").show();
							}
							else{
								var elements = $(".materske");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('materske');
						}
					  event.preventDefault();
					});
					$(".filter-zakladni").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_ZS_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'zakladni';
							});
							$.each($(".zakladni"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_ZS_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".zakladni").show();
							}
							else{
								var elements = $(".zakladni");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('zakladni');
						}
					  event.preventDefault();
					});
					$(".filter-stredni").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_SS_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'stredni';
							});
							$.each($(".stredni"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_SS_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".stredni").show();
							}
							else{
								var elements = $(".stredni");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('stredni');
						}
					  event.preventDefault();
					});
					$(".filter-vysoke").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_VS_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'vysoke';
							});
							$.each($(".vysoke"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_VS_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide()
							}
							
							if(monthsArray === []){
					  			$(".vysoke").show();
							}
							else{
								var elements = $(".vysoke");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('vysoke');
						}
					  event.preventDefault();
					});
					$(".filter-legislativa").click(function(event){
						M.toast({html: 'Vyběr aktualizován'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_zakony_modra.png');
							filterCount--;
							if(filterCount === 0){
								if(monthsArray === []){
									$(".event-list-item").show();
								}
								else{
									$.each(monthsArray, function( index, value ) {
										$('.'+value).show();
									});
								}
							}
							filtersArray = jQuery.grep(filtersArray, function(value) {
							  return value != 'legislativa';
							});
							$.each($(".legislativa"), function( index, value ) {
								var hide = true;
								$.each(filtersArray, function( subIndex, subValue ) {
									if($(value).hasClass(subValue)){
										if(monthsArray === []){
											hide = false;
										}
										else{
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(value).hasClass(monthValue)){
													hide = false;
												}
											});
										}
										
									}
								});
								if(hide === true){
									$(value).hide();
								}
							});
						} else {
							$(this).addClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_zakony_bila.png');
							if(filterCount === 0){
								$(".event-list-item").hide();
							}
							
							if(monthsArray === []){
					  			$(".legislativa").show();
							}
							else{
								var elements = $(".legislativa");
								$.each(elements, function( elementIndex, elementValue ) {
									var show = false;
									if(monthsArray.length === 0){
										show = true;	
									}	
									else{
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(elementValue).hasClass(monthValue)){
												show = true;
											}	
										});	
									}
										   
									if(show === true){
										$(elementValue).show();
									} else{
										$(elementValue).hide();
									}
								});
							}
							filterCount++;
							filtersArray.push('legislativa');
						}
					  event.preventDefault();
					});
					$(".filters-reset").click(function(event){
						filterCount = 0;
						selectedMonth = "";
						monthsArray = [];
						$(".event").removeClass('event-filtered');
						$('.months-select').val('Všechny');
						$(".event-list-item").show();
						$('.filter-covid img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_covid_modra.png');
						$('.filter-inkluze img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_inkluze_modra.png');
						$('.filter-maturity img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_maturity_modra.png');
						$('.filter-finance img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_financovani_modra.png');
						$('.filter-maturity img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_maturity_modra.png');
						$('.filter-neformalni img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_neformalni_modra.png');
						$('.filter-nerovnosti img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_nerovnosti_modra.png');
						$('.filter-technologie img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_technologie_modra.png');
						$('.filter-ucitele img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_ucitele_modra.png');
						$('.filter-materske img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_MS_modra.png');
						$('.filter-zakladni img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_ZS_modra.png');
						$('.filter-stredni img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_SS_modra.png');
						$('.filter-vysoke img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_VS_modra.png');
						$('.filter-legislativa img').attr('src','https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_zakony_modra.png');
						$(".leden-check").prop( "checked", false );
						$(".unor-check").prop( "checked", false );
						$(".brezen-check").prop( "checked", false );
						$(".duben-check").prop( "checked", false );
						$(".kveten-check").prop( "checked", false );
						$(".cerven-check").prop( "checked", false );
						$(".cervenec-check").prop( "checked", false );
						$(".srpen-check").prop( "checked", false );
						$(".zari-check").prop( "checked", false );
						$(".rijen-check").prop( "checked", false );
						$(".listopad-check").prop( "checked", false );
						$(".prosinec-check").prop( "checked", false );
					  	event.preventDefault();
					});
					$('.container').click(function(event){
					  $(".event-list-item").removeClass('event-full-text');
					  $(".event-list-item").find('.event-text').hide();
					})
					$(".event-list-item").click(function(event){
						if($(this).hasClass('event-full-text') ) {
							//$(this).removeClass('event-full-text');
							//$(this).find('.event-text').hide();
						} else {
							$(this).addClass('event-full-text');
							$(this).find('.event-text').show();
						}
						
    				  //event.stopPropagation();
					  //event.preventDefault();
					});
					
					//todo
					//after every change hide everything and take actual monthsArray array and display only selected combo months/category
					$('.leden-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Leden');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Leden';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					
					$('.unor-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Únor');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Únor';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.brezen-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Březen');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Březen';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.duben-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Duben');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Duben';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.kveten-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Květen');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Květen';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.cerven-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Červen');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Červen';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.cervenec-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Červenec');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Červenec';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.srpen-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Srpen');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Srpen';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.zari-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Září');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Září';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.rijen-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Říjen');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Říjen';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.listopad-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Listopad');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Listopad';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.prosinec-check').click(function() {
					  M.toast({html: 'Vyběr dle měsíce aktualizován'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Prosinec');
						  $(".event-list-item").hide();
						  if(filterCount === 0){
							  $.each(monthsArray, function( monthIndex, monthValue ) {
								  $('.'+monthValue).show();
							  });
						  }
						  else{
							  $.each(filtersArray, function( elementIndex, elementValue ) {
								  	var elements = $('.'+elementValue);
								  	$.each(elements, function( subElementIndex, subElementValue ) {
										var show = false;
										$.each(monthsArray, function( monthIndex, monthValue ) {
											if($(subElementValue).hasClass(monthValue)){
												show = true;
											}
										});				
										if(show === true){
											$(subElementValue).show();
										} else{
											$(subElementValue).hide();
										}
									});
								});
						  	}
					  }
					  else{
						  var removeItem = 'Prosinec';
						  monthsArray = jQuery.grep(monthsArray, function(value) {
							return value != removeItem;
						  });
						  if(filterCount === 0){  
							  if(monthsArray.length !== 0){
								  $.each(monthsArray, function( monthIndex, monthValue ) {
									  $('.'+monthValue).show();
								  });
							  }
							  else{ 
						  		$(".event-list-item").show();
							  }
						  }
						  else{
						  	 $(".event-list-item").hide();
							 $.each(filtersArray, function( elementIndex, elementValue ) {
									var show = false;
								 	if(monthsArray.length === 0){
										$.each(filtersArray, function( filterIndex, filterValue ) {
										  $('.'+filterValue).show();
									  });
									}
								 	else{
										var elements = $('.'+elementValue);
										$.each(elements, function( subElementIndex, subElementValue ) {
											var show = false;
											$.each(monthsArray, function( monthIndex, monthValue ) {
												if($(subElementValue).hasClass(monthValue)){
													show = true;
												}
											});	
											if(show === true){
												$(subElementValue).show();
											} else{
												$(subElementValue).hide();
											}
										});
									}
								});
						  	} 
						  }
					});
					
					$('.months-select').on('change',function(){ 
						selectedMonth = $(this).find(":selected").val();  
						if(selectedMonth === 'Všechny'){
							selectedMonth = '';
						}
						if(filterCount === 0 && selectedMonth !== ''){
							$(".event-list-item").hide();
							$('.'+selectedMonth).show();
						}
						if(filterCount === 0 && selectedMonth === ''){
							$(".event-list-item").show();
						}
						
						if(filterCount !== 0 && selectedMonth !== ''){
							//todo take all filters and its items and show only those who have selectedMonth and is currently selected
							$.each(filtersArray, function( index, value ) {
								var elements = $('.'+value);
								$.each(elements, function( elementIndex, elementValue ) {
									if($(elementValue).hasClass(selectedMonth)){
										$(elementValue).show();
									}
									else{
										$(elementValue).hide();
									}
								})
							});
						}
						
						if(filterCount !== 0 && selectedMonth === ''){
							//todo show all filters no matter which month
							$.each(filtersArray, function( index, value ) {
								$('.'+value).show();
							});
						}
						
					});
				});</script>
		
		
			<?php 
				$args = array( 'post_type' => 'cpt_udalost',
				   'posts_per_page'   => -1
				 );

				$posts = get_posts($args);
				$parsedPosts = [];
				foreach($posts as $post){
					$postArray = [];
					$postArray['id'] = $post->ID;
					$postArray['name'] = get_post_meta($post->ID, 'nazev', true);
					$postArray['textove_pole'] = get_post_meta($post->ID, 'textove_pole', true);
					$postArray['tagy'] = [];
					$postArray['tags_string'] = '';
					$postArray['tags_hashes'] = '';
					$postArray['datum_clear'] = get_post_meta($post->ID, 'datum', true);
					$langDate = date_i18n('j. F Y', strtotime($postArray['datum_clear'])) . '<br>';
					$postArray['mesic'] = date_i18n('F', strtotime($postArray['datum_clear']));
					$postArray['datum'] = $langDate;


					$odkazHtml = '';
					$total_number_of_rows = get_post_meta( $post->ID, "odkazy", true );
					for( $i = 0; $i < $total_number_of_rows; $i++ ) {
						$odkaz = [];
						$odkaz['text'] = get_post_meta( $post->ID, 'odkazy_' . $i . '_text_odkazu', true );
						$odkaz['url'] = get_post_meta( $post->ID, 'odkazy_' . $i . '_adresa_odkazu', true );
						$odkazHtml .= '- <a href="'.$odkaz['url'].'">'.$odkaz['text'].'</a><br />';
					}
					
					$zdroje = '';
					if($odkazHtml !== ''){
						$zdroje = "<div class=\"event-text col s12\">
											  <ul class=\"collapsible\">
												<li>
												  <div class=\"collapsible-header\"><strong>Zdroje</strong></div>
												  <div class=\"collapsible-body\"><p>
													".$odkazHtml."
												</p></div>
												</li>
											  </ul>
											  </div>";
					}

					foreach(get_post_meta($post->ID, 'tagy', true) as $tag){
						if($tag === 'Inkluze'){
							$tag = 'inkluze';
						}
						if($tag === 'Covid'){
							$tag = 'covid';
						}
						if($tag === 'Financování'){
							$tag = 'finance';
						}
						if($tag === 'Financování'){
							$tag = 'finance';
						}
						if($tag === 'Maturity'){
							$tag = 'maturity';
						}
						if($tag === 'Neformální vzdělávání'){
							$tag = 'neformalni';
						}
						if($tag === 'Nerovnosti ve vzdělávání'){
							$tag = 'nerovnosti';
						}
						if($tag === 'Technologie'){
							$tag = 'technologie';
						}
						if($tag === 'Učitelé pedagogičtí pracovníci'){
							$tag = 'ucitele';
						}
						if($tag === 'Mateřské školy'){
							$tag = 'materske';
						}
						if($tag === 'Základní školy'){
							$tag = 'zakladni';
						}
						if($tag === 'Střední školy'){
							$tag = 'stredni';
						}
						if($tag === 'Vysoké školy'){
							$tag = 'vysoke';
						}
						if($tag === 'Zákony'){
							$tag = 'legislativa';
						}
						
						$postArray['tags_string'] .= ' '.$tag;
						$postArray['tags_hashes'] .= ' #'.$tag;
						array_push($postArray['tagy'],$tag);
					}
					$parsedPosts[] = $postArray;
				}
	
				usort($parsedPosts, function($a, $b) {
				  $ad = new DateTime($a['datum_clear']);
				  $bd = new DateTime($b['datum_clear']);

				  if ($ad == $bd) {
					return 0;
				  }

				  return $ad < $bd ? -1 : 1;
				});

			?>
			
			<div id="primary">
				<main id="main events">
					<div class="container">
						<div class="col m12">
							<h2 class="events-page-heading">
								Přehled událostí roku 2020
							</h2><br /><br />
						</div>
					</div>
					<div class="container">
					<div class="row">
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-inkluze">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_inkluze_modra.png" alt="" /><br />
								</div>
								<h4>inkluze</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-covid">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_covid_modra.png" alt="" /><br />
								</div>
								<h4>covid</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-finance">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_financovani_modra.png" alt="" /><br />
								</div>
								<h4>financování</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-maturity">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_maturity_modra.png" alt="" /><br />
								</div>
								<h4>maturity</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-neformalni">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_neformalni_modra.png" alt="" /><br />
								</div>
								<h4>neformální vzdělávání</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-nerovnosti">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_nerovnosti_modra.png" alt="" /><br />
								</div>
								<h4>nerovnosti ve vzdělávání</h4>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-technologie">
							
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_technologie_modra.png" alt="" /><br />
								</div>
								<h4>technologie</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-ucitele">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_ucitele_modra.png" alt="" /><br />
								</div>
								<h4>učitelé, pedagogičtí pracovníci</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-materske">
								
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_MS_modra.png" alt="" /><br />
								</div>
								<h4>mateřské školy</h4>
							</a>
						</div>
						<div class="col l1 m4 s4">
							<a href="#" class="event filter-zakladni">
								
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_ZS_modra.png" alt="" /><br />
								</div>
								<h4>základní školy</h4>
							</a>
						</div>
						<div class="col l1 m4 s4">
							<a href="#" class="event filter-stredni">
								
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_SS_modra.png" alt="" /><br />
								</div>
								<h4>střední školy</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-vysoke">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_VS_modra.png" alt="" /><br />
								</div>
								<h4>vysoké školy</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-legislativa">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/01/ikona_zakony_modra.png" alt="" /><br />
								</div>
								<h4>legislativa</h4>
							</a>
						</div>
					</div>
						<div class="row">
							<div class="col m12">
								<div class="col m1">
									<p>
									  <label>
										<input class="leden-check" type="checkbox" />
										<span>Leden</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="unor-check" type="checkbox" />
										<span>Únor</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="brezen-check" type="checkbox" />
										<span>Březen</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="duben-check" type="checkbox" />
										<span>Duben</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="kveten-check" type="checkbox" />
										<span>Květen</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="cerven-check" type="checkbox" />
										<span>Červen</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="cervenec-check" type="checkbox" />
										<span>Červenec</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="srpen-check" type="checkbox" />
										<span>Srpen</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="zari-check" type="checkbox" />
										<span>Září</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="rijen-check" type="checkbox" />
										<span>Říjen</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="listopad-check" type="checkbox" />
										<span>Listopad</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="prosinec-check" type="checkbox" />
										<span>Prosinec</span>
									  </label>
									</p>
								</div>
							</div>
							<div class="col m12">
								<div class="col m6" style="display: none;">
									<select class="months-select browser-default">
										<option value="Všechny" selected>Všechny</option>
										<option value="Leden">Leden</option>
										<option value="Únor">Únor</option>
										<option value="Březen">Březen</option>
										<option value="Duben">Duben</option>
										<option value="Květen">Květen</option>
										<option value="Červen">Červen</option>
										<option value="Červenec">Červenec</option>
										<option value="Srpen">Srpen</option>
										<option value="Září">Září</option>
										<option value="Říjen">Říjen</option>
										<option value="Listopad">Listopad</option>
										<option value="Prosinec">Prosinec</option>
									</select>
								</div>
								<div class="col m12">
									<a href="#" class="btn btn-primary filters-reset">Resetovat</a>
								</div>
							</div>
						</div>
						<div class="row">
							<h3 class="events-filter-text">
								Kliknutím na ikony v horní části aktivujete filtr, který zobrazí události týkající se daného tématu
							</h3>
						</div>
						<div class="row">
							<div class="events-list">
								<?php foreach($parsedPosts as $post){
									echo "<div class=\"row\">
									<a href=\"https://audit.eduin.cz/2020/udalost-detail/?udalost_id=".$post['id']."\" class=\"event-list-item ".$post['tags_string']." ".$post['mesic']."\">
										<div class=\"event-list-item-page\">
											<div class=\"col s4\">
												<strong>".$post['datum']."</strong>
											</div>
											<div class=\"col s8\">
												<strong>".$post['name']."</strong>
											</div>
											<div class=\"event-text col s12\">
												<p>
													".$post['textove_pole']."
												</p>
											</div>
											<div class=\"col s12\">
												<p>
													".$post['tags_hashes']."
												</p>
											</div>
										</div>
									</a>
								</div>";
								}?>
							</div>
						</div>
					</div>
				</main>
			</div>
			
			<?php } ?>
		
			<?php if(strpos($URL,'/2020/vime-jak-dobre-pripravovat-ucitele-ale-porad-to-systemove-nedelame/') !== false ||
					strpos($URL,'/2020/testovani-a-zkousky-ve-skolstvi-jak-funguji-a-co-zpusobuji/') !== false ||
					 strpos($URL,'/2020/zaci-na-ktere-jsme-zapomneli-potrebuji-jine-odborne-skoly-a-celozivotni-profesni-vzdelavani/') !== false ||
					strpos($URL,'/2020/skoly-jsou-uz-v-digitalu-technologie-mohou-zlepsit-vzdelavani-po-covidu/') !== false ||
					strpos($URL,'/2020/skoly-a-ministerstvo-potrebuji-provazat-pomoci-muze-nova-uroven-vzdelavaciho-systemu/') !== false){?>
		
			<script>$( document ).ready(function() {
					$('.source-toggler').click(function(event){
						$('.analysis-sources').toggleClass('source-hidden');
						event.preventDefault();
					});
				});
			</script>
			<?php 
				$args = array( 'post_type' => 'cpt_analyza',
				   'posts_per_page'   => -1
				 );

				$posts = get_posts($args);
				$teaser = '';
				$parsedPosts = [];
				$activePost = [];
				foreach($posts as $post){
					$postArray = [];
					$postArray['name'] = get_post_meta($post->ID, 'nazev', true);
					$postArray['active'] = '';
					if($postArray['name'] === 'Víme, jak dobře připravovat učitele, ale pořád to systémově neděláme'){
						$postArray['link'] = 'https://audit.eduin.cz/2020/vime-jak-dobre-pripravovat-ucitele-ale-porad-to-systemove-nedelame/';
						if($URL === "/2020/vime-jak-dobre-pripravovat-ucitele-ale-porad-to-systemove-nedelame/"){
							$image = 'https://audit.eduin.cz/2020/wp-content/uploads/2021/02/audit_ilu_04.png';
							$postArray['active'] = 'analysis-active';
						}
					}
					if($postArray['name'] === 'Školy jsou už v digitálu. Technologie mohou zlepšit vzdělávání po covidu'){
						$postArray['link'] = 'https://audit.eduin.cz/2020/skoly-jsou-uz-v-digitalu-technologie-mohou-zlepsit-vzdelavani-po-covidu/';
						if($URL === "/2020/skoly-jsou-uz-v-digitalu-technologie-mohou-zlepsit-vzdelavani-po-covidu/"){
							$image = 'https://audit.eduin.cz/2020/wp-content/uploads/2021/02/audit_ilu_02.png';
							$postArray['active'] = 'analysis-active';
						}
					}
					if($postArray['name'] === 'Testování a zkoušky ve školství: jak fungují a co způsobují'){
						$postArray['link'] = 'https://audit.eduin.cz/2020/testovani-a-zkousky-ve-skolstvi-jak-funguji-a-co-zpusobuji/';
						if($URL === "/2020/testovani-a-zkousky-ve-skolstvi-jak-funguji-a-co-zpusobuji/"){
							$image = 'https://audit.eduin.cz/2020/wp-content/uploads/2021/02/audit_ilu_01.png';
							$postArray['active'] = 'analysis-active';
						}
					}
					if($postArray['name'] === 'Žáci, na které jsme zapomněli, potřebují jiné odborné školy a celoživotní profesní vzdělávání'){
						$postArray['link'] = 'https://audit.eduin.cz/2020/zaci-na-ktere-jsme-zapomneli-potrebuji-jine-odborne-skoly-a-celozivotni-profesni-vzdelavani/';
						if($URL === "/2020/zaci-na-ktere-jsme-zapomneli-potrebuji-jine-odborne-skoly-a-celozivotni-profesni-vzdelavani/"){
							$image = 'https://audit.eduin.cz/2020/wp-content/uploads/2021/02/audit_ilu_03.png';
							$postArray['active'] = 'analysis-active';
						}
					}
					if($postArray['name'] === 'Školy a ministerstvo potřebují provázat. Pomoci může nová úroveň vzdělávacího systému'){
						$postArray['link'] = 'https://audit.eduin.cz/2020/skoly-a-ministerstvo-potrebuji-provazat-pomoci-muze-nova-uroven-vzdelavaciho-systemu/';
						if($URL === "/2020/skoly-a-ministerstvo-potrebuji-provazat-pomoci-muze-nova-uroven-vzdelavaciho-systemu/"){
							$image = 'https://audit.eduin.cz/2020/wp-content/uploads/2021/02/audit_ilu_05.png';
							$postArray['active'] = 'analysis-active';
						}
					}
					
					if($postArray['active'] === 'analysis-active'){
						$activePost['name'] = $postArray['name'];
						$activePost['first_text'] = get_post_meta($post->ID, 'uvodni_text', true);
						$activePost['length'] = get_post_meta($post->ID, 'delka_cteni', true);
						$activePost['autor'] = get_post_meta($post->ID, 'autoor', true);
						$activePost['link'] = get_post_meta($post->ID, 'propojeni_s_jinou_analyzou', true);
						$activePost['sources'] = get_post_meta($post->ID, 'zdroje', true);
						$activePost['text'] = get_post_meta($post->ID, 'text', true);
					}
					$parsedPosts[] = $postArray;
				}																								
																															
			?>
		
			<div id="primary">
				<main id="main">
					<div class="analysis-teaser">
					<div class="container">
						<div class="row">
							<div class="col m12">
								<img src="<?php echo $image ?>" alt="analysis-teaser" />
							</div>
						</div>
					</div>
					</div>
					<div class="analysis-text">
						<div class="container">
							<div class="row">
								<div class="col m3 s12">
									<br /><br /><br />
									
				                    <?php 
									echo "<h3 class=\"analysis-link-special-heading\">2021</h3>";
				                    echo "<h3 class=\"analysis-link-special-heading\">2020</h3>";
									foreach($parsedPosts as $post){
										echo "<div class=\"row\">
											<a class=\"analysis-link-special ".$post['active']."\" href=\"".$post['link']."\">".$post['name']."</a><br /><br />
										</div>";
									}
									?>
								</div>
								<div class="col m8 s12">
									<h3 class="analysis-heading">
										<?php echo $activePost['name'] ?>
									</h3>
									<p class="analysis-upper-text">
										<?php echo $activePost['first_text'] ?>
									</p>
									<p>
										<strong>Autor: </strong><?php echo $activePost['autor'] ?><br />
										<strong>Délka čtení: </strong><?php echo $activePost['length'] ?><br />
									</p>
									<p class="analysis-lower-text">
										<?php echo $activePost['text'] ?>
									</p>
									
									<a class="source-toggler" href="#">Zobrazit/schovat zdroje</a><br /><br />
									<div class="analysis-sources source-hidden">
										<?php echo $activePost['sources'] ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
			
			<?php } ?>
		
			<?php if($URL === '/2020/analyza/'){?>
			
			<div id="primary">
				<main id="main">
					<div class="analysis-teaser">
					<div class="container">
						<div class="row">
							<div class="col m12">
								<img src="https://audit.eduin.cz/2020/wp-content/uploads/2020/12/Snimek-obrazovky-2020-12-20-v-18.42.43.png" alt="analysis-teaser" />
							</div>
						</div>
					</div>
					</div>
					<div class="analysis-text">
						<div class="container">
							<div class="row">
								<div class="col m3 s12">
									<br /><br /><br />
									<div class="row">
										<a class="analysis-link" href="https://audit.eduin.cz/2020/analyza/">Analýza 1</a><br /><br />
									</div>
									<div class="row">
										<a class="analysis-link" href="https://audit.eduin.cz/2020/analyza/">Analýza 2</a><br /><br />
									</div>
									<div class="row">
										<a class="analysis-link" href="https://audit.eduin.cz/2020/analyza/">Analýza 3</a><br /><br />
									</div>
									<div class="row">
										<a class="analysis-link" href="https://audit.eduin.cz/2020/analyza/">Analýza 4</a><br /><br />
									</div>
									<div class="row">
										<a class="analysis-link" href="https://audit.eduin.cz/2020/analyza/">Analýza 5</a><br /><br />
									</div>
								</div>
								<div class="col m9 s12">
									<h3 class="analysis-heading">
										Společné vzdělávání: Spor o inkluzivní vyhlášku a motivace k jejímu přijetí
									</h3>
									<p class="analysis-upper-text">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie ligula non imperdiet volutpat. Nulla efficitur malesuada risus sit amet pretium. Nullam nec felis aliquet, pharetra leo sit amet, consequat velit. Pellentesque finibus erat sit amet arcu volutpat posuere. Pellentesque tempor lorem sit amet velit facilisis venenatis. Nunc scelerisque luctus sapien ut hendrerit. Fusce eu ex vitae felis ullamcorper tincidunt. Quisque accumsan est nulla, at luctus mauris rhoncus vel. Curabitur scelerisque quam et urna imperdiet, et sagittis libero ullamcorper. Donec ornare ornare urna eget porta. Aenean volutpat, ante id viverra aliquet, arcu odio viverra orci, at commodo lacus orci at ligula.
									</p>
									<p class="analysis-lower-text">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie ligula non imperdiet volutpat. Nulla efficitur malesuada risus sit amet pretium. Nullam nec felis aliquet, pharetra leo sit amet, consequat velit. Pellentesque finibus erat sit amet arcu volutpat posuere. Pellentesque tempor lorem sit amet velit facilisis venenatis. Nunc scelerisque luctus sapien ut hendrerit. Fusce eu ex vitae felis ullamcorper tincidunt. Quisque accumsan est nulla, at luctus mauris rhoncus vel. Curabitur scelerisque quam et urna imperdiet, et sagittis libero ullamcorper. Donec ornare ornare urna eget porta. Aenean volutpat, ante id viverra aliquet, arcu odio viverra orci, at commodo lacus orci at ligula.
									</p>
									<p class="analysis-lower-text">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie ligula non imperdiet volutpat. Nulla efficitur malesuada risus sit amet pretium. Nullam nec felis aliquet, pharetra leo sit amet, consequat velit. Pellentesque finibus erat sit amet arcu volutpat posuere. Pellentesque tempor lorem sit amet velit facilisis venenatis. Nunc scelerisque luctus sapien ut hendrerit. Fusce eu ex vitae felis ullamcorper tincidunt. Quisque accumsan est nulla, at luctus mauris rhoncus vel. Curabitur scelerisque quam et urna imperdiet, et sagittis libero ullamcorper. Donec ornare ornare urna eget porta. Aenean volutpat, ante id viverra aliquet, arcu odio viverra orci, at commodo lacus orci at ligula.
									</p>
									<p class="analysis-lower-text">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie ligula non imperdiet volutpat. Nulla efficitur malesuada risus sit amet pretium. Nullam nec felis aliquet, pharetra leo sit amet, consequat velit. Pellentesque finibus erat sit amet arcu volutpat posuere. Pellentesque tempor lorem sit amet velit facilisis venenatis. Nunc scelerisque luctus sapien ut hendrerit. Fusce eu ex vitae felis ullamcorper tincidunt. Quisque accumsan est nulla, at luctus mauris rhoncus vel. Curabitur scelerisque quam et urna imperdiet, et sagittis libero ullamcorper. Donec ornare ornare urna eget porta. Aenean volutpat, ante id viverra aliquet, arcu odio viverra orci, at commodo lacus orci at ligula.
									</p>
									<p class="analysis-lower-text">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie ligula non imperdiet volutpat. Nulla efficitur malesuada risus sit amet pretium. Nullam nec felis aliquet, pharetra leo sit amet, consequat velit. Pellentesque finibus erat sit amet arcu volutpat posuere. Pellentesque tempor lorem sit amet velit facilisis venenatis. Nunc scelerisque luctus sapien ut hendrerit. Fusce eu ex vitae felis ullamcorper tincidunt. Quisque accumsan est nulla, at luctus mauris rhoncus vel. Curabitur scelerisque quam et urna imperdiet, et sagittis libero ullamcorper. Donec ornare ornare urna eget porta. Aenean volutpat, ante id viverra aliquet, arcu odio viverra orci, at commodo lacus orci at ligula.
									</p>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
			
			<?php }
			do_action( 'generate_before_main_content' );

			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || '0' != get_comments_number() ) :
					/**
					 * generate_before_comments_container hook.
					 *
					 * @since 2.1
					 */
					do_action( 'generate_before_comments_container' );
					?>

					<div class="comments-area">
						<?php comments_template(); ?>
					</div>

					<?php
				endif;

			endwhile;

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();

get_footer();
