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

	<div id="primary" <?php if($URL === '/2021/my-account/'){ ?>class="account-page" <?php } ?>>
<?php
if(strpos($URL,'/2020/') !== false){
	echo "<script>window.location.replace('https://audit.eduin.cz/2021/')</script>";
	
}
if(strpos($URL,'/2021/?updated=true') !== false){
	echo "<script>alert('D??kujeme za registraci e-mailu.');</script>";
	echo "<script>window.location.replace('https://audit.eduin.cz/2021/')</script>";
	
}
if(strpos($URL,'/2021/homepage-vyvoj/') !== false){?>
		<main id="main">
			<div class="hp-claim" id="hp-claim">
				<div class="container">
				<div class="row">
					<div class="col m6">
						<img class="claim-image" src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/audit_ilu_HP_01.png" alt="claim-image" />
					</div>
					<div class="col m6">
						<h3 class="claim-heading">
							V??te, co se d??je v ??esk??m vzd??l??v??n??? Audit za rok 2021 reflektuje nerovnosti ve vzd??l??v??n??, p??ij??mac?? zkou??ky i ??skal?? p??i zav??d??n?? syst??mov??ch zm??n.
						</h3>
						<a class="btn btn-primary homepage-blue" href="#hp-why-audit">
							????st d??l
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
								ONLINE PREZENTACE AUDITU 28. B??EZNA 2022
							</p>
						</div>
						<div class="col m3">
							<a class="acf-button button button-primary button-large" href="https://fb.me/e/2YfguWsMB" target="_blank">Ud??lost na Facebooku</a>
						</div>
					</div>
					<br /><br />
					<div class="row">
						<div class="col m6">
							<p class="online-text">DEJTE MI V??D??T, A?? BUDE AUDIT ZVE??EJN??N??</p>
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
								Ud??losti 2020
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col m2">
							<div class="event-block">
								<div class="event-image">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_covid_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#finance
								</p>
								<p class="event-text">
									Konsenzus ve vzd??l??vac?? politice
								</p>
								<p class="event-date">
									1. 1. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								<div class="event-image">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_financovani_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#finance
								</p>
								<p class="event-text">
									Cut-off sk??re a omezov??n?? pro maturitn?? obory na ??rovn?? kraj??
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								
								<div class="event-image">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_inkluze_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#finance
								</p>
								<p class="event-text">
									Strategie 2030+, pozastaven?? revize kurikula a dlouhodob?? z??m??r vzd??l??v??n?? 2019-2023
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								
								<div class="event-image">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_maturity_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#corona
								</p>
								<p class="event-text">
									Konsenzus ve vzd??l??vac?? politice
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								<div class="event-image">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_MS_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#finance
								</p>
								<p class="event-text">
									Cut-off sk??re a omezov??n?? pro maturitn?? obory na ??rovn?? kraj??
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
						<div class="col m2">
							<div class="event-block">
								
								<div class="event-image">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_nerovnosti_bila.png" alt="event-icon" />
								</div>
								<p class="event-block">
									#vzdelani
								</p>
								<p class="event-text">
									Strategie 2030+, pozastaven?? revize kurikula a dlouhodob?? z??m??r vzd??l??v??n?? 2019-2023
								</p>
								<p class="event-date">
									23. 5. 2020
								</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col m12">	
							<a class="btn btn-green" href="https://audit.eduin.cz/2021/udalosti-2020/">
								Seznam ud??lost??
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
								Anal??zy
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj u??itelstv??: Platy u??itel??, vyjedn??v??n?? s odbory atp. (Data, z??vazky, dlouhodob?? c??le, pom??r tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2021/analyza/" class="btn btn-primary more-button">V??ce</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj u??itelstv??: Platy u??itel??, vyjedn??v??n?? s odbory atp. (Data, z??vazky, dlouhodob?? c??le, pom??r tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2021/analyza/" class="btn btn-primary more-button">V??ce</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj u??itelstv??: Platy u??itel??, vyjedn??v??n?? s odbory atp. (Data, z??vazky, dlouhodob?? c??le, pom??r tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2021/analyza/" class="btn btn-primary more-button">V??ce</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj u??itelstv??: Platy u??itel??, vyjedn??v??n?? s odbory atp. (Data, z??vazky, dlouhodob?? c??le, pom??r tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2021/analyza/" class="btn btn-primary more-button">V??ce</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj u??itelstv??: Platy u??itel??, vyjedn??v??n?? s odbory atp. (Data, z??vazky, dlouhodob?? c??le, pom??r tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2021/analyza/" class="btn btn-primary more-button">V??ce</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block">
								<h4 class="analysis-heading">
									Rozvoj u??itelstv??: Platy u??itel??, vyjedn??v??n?? s odbory atp. (Data, z??vazky, dlouhodob?? c??le, pom??r tarif nadtarif)
								</h4>
								<p class="analysis-text">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 	aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="https://audit.eduin.cz/2021/analyza/" class="btn btn-primary more-button">V??ce</a>
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
								Audit vzd??l??vac??ho syst??mu
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col m7">
							<br />
							<p class="why-subtext">
								Audit vzd??l??vac??ho syst??mu ??esk?? republiky komplexn?? hodnot?? aktu??ln?? stav vzd??l??vac??ho syst??mu a zm??ny ve vzd??l??vac?? 	politice.<br /><br />

Audit p??ipravuje odborn?? t??m EDUin a je nez??visle oponov??n. Vznik?? na z??klad?? dostupn??ch dat z ve??ejn?? sf??ry a akademick??ho prost??ed??. Souborn?? text auditu se skl??d?? z p??ehledu ud??lost?? p??edchoz??ho roku a tematick??ch anal??z.
V??echny audity publikovan?? od roku 2014 najdete na tomhle webu.
							</p>
						</div>
						<div class="col m5">
							<div class="why-sub-image">
								<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/audit_ilu_HP_02.png" alt="why-subimage" />
							</div>
						</div>
					</div>
					<div class="row citate-block">
						<div class="col m4">
							<img src="https://audit.eduin.cz/2021/wp-content/uploads/2020/06/IMG_4790_1-scaled.jpg" alt="why-img" />
						</div>
						<div class="col m8">
							<div class="why-citate">
								<h5>
									Audit vzd??l??vac??ho syst??mu ji?? 7 let reflektuje slabiny a pozoru-hodn?? m??sta ??esk??ho vzd??l??v??n?? a vyb??z?? v??echny jeho akt??ry k dialogu a inovac??m, kter?? pot??ebujeme.
								</h5>
								<p>
									Honza Dol??nek, v??konn?? ??editel EDUin
								</p>
							</div>
						</div>
					</div>
					<div class="row citate-block">
						<div class="col m8">
							<div class="why-citate">
								<h5>Koronavirov?? doba zv??raznila ji?? tak velk?? rozd??ly v kvalit?? poskytovan??ho vzd??l??v??n??. N???? vzd??l??vac?? syst??m mus?? o to v??ce pracovat na sn????en?? t??chto rozd??l?? dan??ch socioekonomickou situac?? v rodin??ch tak, jak je to teoreticky pops??no ve Strategii 2030+. Jej?? implementace do praxe proto mus?? b??t jednou z hlavn??ch priorit na??eho vzd??l??vac??ho syst??mu.
								</h5>
								<p>
									profesor Ji???? Draho??, sen??tor
								</p>
							</div>
						</div>
						<div class="col m4">
							<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/jiri-drahos.jpg" alt="why-img" />
						</div>
					</div>
				</div>

			<?php } ?>
			</div> 
		
		<?php if($URL === '/2021/homepage-2020/'){?>
		<main id="main">
			<div class="hp-claim" id="hp-claim">
				<div class="container">
				<div class="row">
					<div class="col m6">
						<img class="claim-image" src="https://audit.eduin.cz/2021/wp-content/uploads/2021/02/audit_hp_teas.png" alt="claim-image" />
					</div>
					<div class="col m6">
						<h3 class="claim-heading">
							V??te, co se d??je v ??esk??m vzd??l??v??n??? Audit za rok 2021 reflektuje nerovnosti ve vzd??l??v??n??, p??ij??mac?? zkou??ky i ??skal?? p??i zav??d??n?? syst??mov??ch zm??n.
						</h3>
						<a class="btn btn-primary homepage-blue" href="#hp-events">
							????st d??l
						</a>
					</div>
				</div>
					
					
				</div>
			</div>
			<div class="events" id="hp-events">
					<div class="container">
						<div class="col m12">
							<h2 class="events-page-heading events-hp-heading">
								Ud??losti 2020
							</h2><br /><br />
						</div>
					</div>
					<div class="container">
					<div class="row">
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2021/udalosti-2020/#inkluze" class="event filter-inkluze">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_inkluze_modra.png" alt="" /><br />
								</div>
								<h4>inkluze</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2021/udalosti-2020/#covid" class="event filter-covid">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_covid_modra.png" alt="" /><br />
								</div>
								<h4>covid</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2021/udalosti-2020/#finance" class="event filter-financovani">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_financovani_modra.png" alt="" /><br />
								</div>
								<h4>financov??n??</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2021/udalosti-2020/#maturity" class="event filter-maturity">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_maturity_modra.png" alt="" /><br />
								</div>
								<h4>maturity</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2021/udalosti-2020/#technologie" class="event filter-technologie">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_technologie_modra.png" alt="" /><br />
								</div>
								<h4>technologie</h4>
							</a>
						</div>
						<div class="col l2 m4 s6">
							<a href="https://audit.eduin.cz/2021/udalosti-2020/#nerovnosti" class="event filter-nerovnosti">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_nerovnosti_modra.png" alt="" /><br />
								</div>
								<h4>nerovnosti ve vzd??l??v??n??</h4>
							</a>
						</div>
					</div>
						<div class="row">
							<br />
							<a class="btn btn-primary more-button homepage-blue" href="https://audit.eduin.cz/2021/udalosti-2020/">
								Seznam ud??lost??
							</a>
						</div>
						</div>
			</div>
			
			<div class="hp-analysis" id="hp-analysis">
				<div class="container">
					
					<div class="row">
						<div class="col m12">
							<h2 class="analysis-main-heading">
								Anal??zy 2020
							</h2>
						</div>
					</div>
					<div class="row">
						<div class="col m4">
							<div class="analysis-block analysis-hp-block analysis-hp-block-special">
								<h4 class="analysis-heading analysis-hp-heading">
									??koly jsou u?? v digit??lu. Technologie mohou zlep??it vzd??l??v??n?? po covidu
								</h4>
								<p class="analysis-text">
									B??hem roku 2020 pandemie Covid-19 naru??ila vzd??l??v??n??, jak ho zn??me, rovnou dvakr??t. U??itel??, rodi??e a ????ci proch??z?? transformuj??c??m obdob??m, kter?? je z??rove?? p????le??itost?? pro ??esk?? ??kolstv??. Co z n??hl?? digitalizace ve vzd??l??v??n?? p??etrv???
								</p>
								<a href="https://audit.eduin.cz/2021/skoly-jsou-uz-v-digitalu-technologie-mohou-zlepsit-vzdelavani-po-covidu/" class="btn btn-primary more-button homepage-blue">V??ce</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block analysis-hp-block analysis-hp-block-special">
								<h4 class="analysis-heading analysis-hp-heading">
									Testov??n?? a zkou??ky ve ??kolstv??: Jak funguj?? a co zp??sobuj??
								</h4>
								<p class="analysis-text">
									Co v??echno je dobr?? zv????it p??edt??m, ne?? rozsad??me d??ti do lavic a nech??me hroty tu??ek v z??znamov??ch ar????ch rozhodnout, jak?? je jejich m??sto ve sv??t??? Mus??me se pt??t po ????elu testov??n??, v????mat si vedlej???? dopady testov??n?? a vyu????vat testy jako n??stroj zp??tn?? vazby.
								</p>
								<a href="https://audit.eduin.cz/2021/testovani-a-zkousky-ve-skolstvi-jak-funguji-a-co-zpusobuji/" class="btn btn-primary more-button homepage-blue">V??ce</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block analysis-hp-block analysis-hp-block-special">
								<h4 class="analysis-heading analysis-hp-heading">
									V??me, jak dob??e p??ipravovat u??itele - ale po????d to syst??mov?? ned??l??me
								</h4>
								<p class="analysis-text">
									V roce 2020 rodi??e p????mo na obrazovk??ch po????ta???? vid??li siln?? i slab?? str??nky ??esk??ch u??itel??. Nastal ??as syst??mov?? zm??nit jejich p????pravu. P????klady dobr?? praxe lze naj??t na n??kter??ch pedagogick??ch fakult??ch a v inovativn??ch programech. 
								</p>
								<a href="https://audit.eduin.cz/2021/vime-jak-dobre-pripravovat-ucitele-ale-porad-to-systemove-nedelame/" class="btn btn-primary more-button homepage-blue">V??ce</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block analysis-hp-block analysis-hp-block-special">
								<h4 class="analysis-heading analysis-hp-heading">
									??koly a ministerstvo pot??ebuj?? prov??zat. Pomoci m????e nov?? ??rove?? vzd??l??vac??ho syst??mu
								</h4>
								<p class="analysis-text">
									V decentralizovan??m syst??mu vzd??l??v??n?? nen?? explicitn?? stanovena odpov??dnost za vzd??l??vac?? v??sledky ????k??, ani za odstra??ov??n?? nerovnost?? a zaji??t??n?? stejn??ch p????le??itost?? ve vzd??l??v??n??. Zm??nit to m????e pl??novan?? zaveden?? tzv. st??edn??ho ??l??nku, jeho?? konkr??tn?? podoba se v roce 2020 diskutovala v odborn??ch kruz??ch.
								</p>
								<a href="https://audit.eduin.cz/2021/skoly-a-ministerstvo-potrebuji-provazat-pomoci-muze-nova-uroven-vzdelavaciho-systemu/" class="btn btn-primary more-button homepage-blue">V??ce</a>
							</div>
						</div>
						<div class="col m4">
							<div class="analysis-block analysis-hp-block analysis-hp-block-special">
								<h4 class="analysis-heading analysis-hp-heading">
									 ????ci, na kter?? jsme zapomn??li, pot??ebuj?? jin?? odborn?? ??koly a celo??ivotn?? profesn?? vzd??l??v??n?? 
								</h4>
								<p class="analysis-text">
									Na odborn??ch ??kol??ch ??? a  p??edev????m na u????ovsk??ch oborech ??? se potk??vaj?? ????ci, kte???? nev?????? v to, ??e mohou ve vzd??l??v??n?? usp??t. ??asto si si vol?? ??zce specializovan?? obory, ve kter??ch po vystudov??n?? nepracuj??, a mnohdy nejsou rozv??jeny ani jejich z??kladn?? gramotnosti. 
								</p>
								<a href="https://audit.eduin.cz/2021/zaci-na-ktere-jsme-zapomneli-potrebuji-jine-odborne-skoly-a-celozivotni-profesni-vzdelavani/" class="btn btn-primary more-button homepage-blue">V??ce</a>
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
								Sledujeme a reflektujeme ud??losti a t??mata, kter?? h??bou vzd??l??v??n??m. <br /><br />

P??ipravujeme Audit ka??d?? rok ve spolupr??ci s dal????mi odborn??ky. Pracujeme na z??klad?? dostupn??ch dat z ve??ejn?? sf??ry a akademick??ho prost??ed?? a nech??v??me jej nez??visle oponovat.  <br /><br />

Audit nab??z?? p??ehled ud??lost?? p??edchoz??ho roku a n??kolik analytick??ch text??, kter?? bl????e rozeb??raj?? d??le??it?? a o??ehav?? t??mata.  <br /><br />

V??echny ro??n??ky od roku 2014 najdete publikovan?? zde na tomto webu. <br /><br />

							<a class="btn btn-primary more-button homepage-blue" href="https://audit.eduin.cz/2021/co-je-audit/">V??ce</a>

							</p>
						</div>
					</div>
				</div>

			<?php } ?>
			</div> 


			<?php if(strpos($URL,'/2021/archiv/') !== false){?>
			
			<div id="primary">
				<main id="main">
					<div class="container">
						<div class="row">
							<div class="col m12 archive-links">
								<p>
									Zde naleznete v??echny p??edchoz?? ro??n??ky Auditu vzd??l??vac??ho syst??mu.
								</p>
								<a href="https://audit.eduin.cz/2021/homepage-2020/" target="_blank">Audit vzd??l??vac??ho syst??mu 2020</a><br />
								<a href="https://audit.eduin.cz/2019/" target="_blank">Audit vzd??l??vac??ho syst??mu 2019</a><br />
								Audit vzd??l??vac??ho syst??mu 2018: <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2018.pdf">anal??za</a>, <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2018.pdf">infografika</a><br />
								Audit vzd??l??vac??ho syst??mu 2017: <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2017.pdf">anal??za</a>, <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2017.pdf">infografika</a><br />
								Audit vzd??l??vac??ho syst??mu 2016: <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2016.pdf">anal??za</a>, <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2016.pdf">infografika</a><br />
								Audit vzd??l??vac??ho syst??mu 2015: <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2015.pdf">anal??za</a>, <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2015.pdf">infografika</a><br />
								Audit vzd??l??vac??ho syst??mu 2014: <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/Audit_vzdelavaci_system_ANALYZA_2014.pdf">anal??za</a>, <a href="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/INFOGRAFIKA_audit-2014.pdf">infografika</a><br />
							</div>
						</div>
					</div>
				</main>
			</div>
			</div> 
			
			<?php } ?>


			<?php if(strpos($URL,'/2021/udalosti-2020/') !== false){?>
		
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_inkluze_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_inkluze_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_covid_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_covid_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_financovani_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_financovani_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_maturity_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_maturity_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_neformalni_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_neformalni_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_nerovnosti_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_nerovnosti_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_technologie_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_technologie_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_ucitele_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_ucitele_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_MS_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_MS_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_ZS_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_ZS_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_SS_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_SS_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_VS_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_VS_bila.png');
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
						M.toast({html: 'Vyb??r aktualizov??n'});
						if($(this).hasClass('event-filtered') ) {
							$(this).removeClass('event-filtered');
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_zakony_modra.png');
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
							$(this).find('img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_zakony_bila.png');
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
						$('.months-select').val('V??echny');
						$(".event-list-item").show();
						$('.filter-covid img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_covid_modra.png');
						$('.filter-inkluze img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_inkluze_modra.png');
						$('.filter-maturity img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_maturity_modra.png');
						$('.filter-finance img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_financovani_modra.png');
						$('.filter-maturity img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_maturity_modra.png');
						$('.filter-neformalni img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_neformalni_modra.png');
						$('.filter-nerovnosti img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_nerovnosti_modra.png');
						$('.filter-technologie img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_technologie_modra.png');
						$('.filter-ucitele img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_ucitele_modra.png');
						$('.filter-materske img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_MS_modra.png');
						$('.filter-zakladni img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_ZS_modra.png');
						$('.filter-stredni img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_SS_modra.png');
						$('.filter-vysoke img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_VS_modra.png');
						$('.filter-legislativa img').attr('src','https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_zakony_modra.png');
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
					  if ($(this).is(':checked')) {
						monthsArray.push('??nor');
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
						  var removeItem = '??nor';
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
					  if ($(this).is(':checked')) {
						monthsArray.push('B??ezen');
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
						  var removeItem = 'B??ezen';
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Kv??ten');
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
						  var removeItem = 'Kv??ten';
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
					  if ($(this).is(':checked')) {
						monthsArray.push('??erven');
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
						  var removeItem = '??erven';
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
					  if ($(this).is(':checked')) {
						monthsArray.push('??ervenec');
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
						  var removeItem = '??ervenec';
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
					  if ($(this).is(':checked')) {
						monthsArray.push('Z??????');
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
						  var removeItem = 'Z??????';
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
					  if ($(this).is(':checked')) {
						monthsArray.push('????jen');
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
						  var removeItem = '????jen';
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
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
					  M.toast({html: 'Vyb??r dle m??s??ce aktualizov??n'});
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
						if(selectedMonth === 'V??echny'){
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
						if($tag === 'Financov??n??'){
							$tag = 'finance';
						}
						if($tag === 'Financov??n??'){
							$tag = 'finance';
						}
						if($tag === 'Maturity'){
							$tag = 'maturity';
						}
						if($tag === 'Neform??ln?? vzd??l??v??n??'){
							$tag = 'neformalni';
						}
						if($tag === 'Nerovnosti ve vzd??l??v??n??'){
							$tag = 'nerovnosti';
						}
						if($tag === 'Technologie'){
							$tag = 'technologie';
						}
						if($tag === 'U??itel?? pedagogi??t?? pracovn??ci'){
							$tag = 'ucitele';
						}
						if($tag === 'Mate??sk?? ??koly'){
							$tag = 'materske';
						}
						if($tag === 'Z??kladn?? ??koly'){
							$tag = 'zakladni';
						}
						if($tag === 'St??edn?? ??koly'){
							$tag = 'stredni';
						}
						if($tag === 'Vysok?? ??koly'){
							$tag = 'vysoke';
						}
						if($tag === 'Z??kony'){
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
								P??ehled ud??lost?? roku 2020
							</h2><br /><br />
						</div>
					</div>
					<div class="container">
					<div class="row">
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-inkluze">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_inkluze_modra.png" alt="" /><br />
								</div>
								<h4>inkluze</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-covid">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_covid_modra.png" alt="" /><br />
								</div>
								<h4>covid</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-finance">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_financovani_modra.png" alt="" /><br />
								</div>
								<h4>financov??n??</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-maturity">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_maturity_modra.png" alt="" /><br />
								</div>
								<h4>maturity</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-neformalni">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_neformalni_modra.png" alt="" /><br />
								</div>
								<h4>neform??ln?? vzd??l??v??n??</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-nerovnosti">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_nerovnosti_modra.png" alt="" /><br />
								</div>
								<h4>nerovnosti ve vzd??l??v??n??</h4>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-technologie">
							
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_technologie_modra.png" alt="" /><br />
								</div>
								<h4>technologie</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-ucitele">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_ucitele_modra.png" alt="" /><br />
								</div>
								<h4>u??itel??, pedagogi??t?? pracovn??ci</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-materske">
								
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_MS_modra.png" alt="" /><br />
								</div>
								<h4>mate??sk?? ??koly</h4>
							</a>
						</div>
						<div class="col l1 m4 s4">
							<a href="#" class="event filter-zakladni">
								
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_ZS_modra.png" alt="" /><br />
								</div>
								<h4>z??kladn?? ??koly</h4>
							</a>
						</div>
						<div class="col l1 m4 s4">
							<a href="#" class="event filter-stredni">
								
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_SS_modra.png" alt="" /><br />
								</div>
								<h4>st??edn?? ??koly</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-vysoke">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_VS_modra.png" alt="" /><br />
								</div>
								<h4>vysok?? ??koly</h4>
							</a>
						</div>
						<div class="col l2 m4 s4">
							<a href="#" class="event filter-legislativa">
								<div class="event-img-block">
									<img src="https://audit.eduin.cz/2021/wp-content/uploads/2021/01/ikona_zakony_modra.png" alt="" /><br />
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
										<span>??nor</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="brezen-check" type="checkbox" />
										<span>B??ezen</span>
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
										<span>Kv??ten</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="cerven-check" type="checkbox" />
										<span>??erven</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="cervenec-check" type="checkbox" />
										<span>??ervenec</span>
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
										<span>Z??????</span>
									  </label>
									</p>
								</div>
								<div class="col m1">
									<p>
									  <label>
										<input class="rijen-check" type="checkbox" />
										<span>????jen</span>
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
										<option value="V??echny" selected>V??echny</option>
										<option value="Leden">Leden</option>
										<option value="??nor">??nor</option>
										<option value="B??ezen">B??ezen</option>
										<option value="Duben">Duben</option>
										<option value="Kv??ten">Kv??ten</option>
										<option value="??erven">??erven</option>
										<option value="??ervenec">??ervenec</option>
										<option value="Srpen">Srpen</option>
										<option value="Z??????">Z??????</option>
										<option value="????jen">????jen</option>
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
								Kliknut??m na ikony v horn?? ????sti aktivujete filtr, kter?? zobraz?? ud??losti t??kaj??c?? se dan??ho t??matu
							</h3>
						</div>
						<div class="row">
							<div class="events-list">
								<?php foreach($parsedPosts as $post){
									echo "<div class=\"row\">
									<a href=\"https://audit.eduin.cz/2021/udalost-detail/?udalost_id=".$post['id']."\" class=\"event-list-item ".$post['tags_string']." ".$post['mesic']."\">
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
		
			<?php if(strpos($URL,'/2021/vime-jak-dobre-pripravovat-ucitele-ale-porad-to-systemove-nedelame/') !== false ||
					strpos($URL,'/2021/testovani-a-zkousky-ve-skolstvi-jak-funguji-a-co-zpusobuji/') !== false ||
					 strpos($URL,'/2021/zaci-na-ktere-jsme-zapomneli-potrebuji-jine-odborne-skoly-a-celozivotni-profesni-vzdelavani/') !== false ||
					strpos($URL,'/2021/skoly-jsou-uz-v-digitalu-technologie-mohou-zlepsit-vzdelavani-po-covidu/') !== false ||
					strpos($URL,'/2021/skoly-a-ministerstvo-potrebuji-provazat-pomoci-muze-nova-uroven-vzdelavaciho-systemu/') !== false){?>
		
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
					$postArray['rok'] = get_post_meta($post->ID, 'rok', true);
					$postArray['active'] = '';
					if($postArray['name'] === 'V??me, jak dob??e p??ipravovat u??itele, ale po????d to syst??mov?? ned??l??me'){
						$postArray['link'] = 'https://audit.eduin.cz/2021/vime-jak-dobre-pripravovat-ucitele-ale-porad-to-systemove-nedelame/';
						if($URL === "/2021/vime-jak-dobre-pripravovat-ucitele-ale-porad-to-systemove-nedelame/"){
							$image = 'https://audit.eduin.cz/2021/wp-content/uploads/2021/02/audit_ilu_04.png';
							$postArray['active'] = 'analysis-active';
						}
					}
					if($postArray['name'] === '??koly jsou u?? v digit??lu. Technologie mohou zlep??it vzd??l??v??n?? po covidu'){
						$postArray['link'] = 'https://audit.eduin.cz/2021/skoly-jsou-uz-v-digitalu-technologie-mohou-zlepsit-vzdelavani-po-covidu/';
						if($URL === "/2021/skoly-jsou-uz-v-digitalu-technologie-mohou-zlepsit-vzdelavani-po-covidu/"){
							$image = 'https://audit.eduin.cz/2021/wp-content/uploads/2021/02/audit_ilu_02.png';
							$postArray['active'] = 'analysis-active';
						}
					}
					if($postArray['name'] === 'Testov??n?? a zkou??ky ve ??kolstv??: jak funguj?? a co zp??sobuj??'){
						$postArray['link'] = 'https://audit.eduin.cz/2021/testovani-a-zkousky-ve-skolstvi-jak-funguji-a-co-zpusobuji/';
						if($URL === "/2021/testovani-a-zkousky-ve-skolstvi-jak-funguji-a-co-zpusobuji/"){
							$image = 'https://audit.eduin.cz/2021/wp-content/uploads/2021/02/audit_ilu_01.png';
							$postArray['active'] = 'analysis-active';
						}
					}
					if($postArray['name'] === '????ci, na kter?? jsme zapomn??li, pot??ebuj?? jin?? odborn?? ??koly a celo??ivotn?? profesn?? vzd??l??v??n??'){
						$postArray['link'] = 'https://audit.eduin.cz/2021/zaci-na-ktere-jsme-zapomneli-potrebuji-jine-odborne-skoly-a-celozivotni-profesni-vzdelavani/';
						if($URL === "/2021/zaci-na-ktere-jsme-zapomneli-potrebuji-jine-odborne-skoly-a-celozivotni-profesni-vzdelavani/"){
							$image = 'https://audit.eduin.cz/2021/wp-content/uploads/2021/02/audit_ilu_03.png';
							$postArray['active'] = 'analysis-active';
						}
					}
					if($postArray['name'] === '??koly a ministerstvo pot??ebuj?? prov??zat. Pomoci m????e nov?? ??rove?? vzd??l??vac??ho syst??mu'){
						$postArray['link'] = 'https://audit.eduin.cz/2021/skoly-a-ministerstvo-potrebuji-provazat-pomoci-muze-nova-uroven-vzdelavaciho-systemu/';
						if($URL === "/2021/skoly-a-ministerstvo-potrebuji-provazat-pomoci-muze-nova-uroven-vzdelavaciho-systemu/"){
							$image = 'https://audit.eduin.cz/2021/wp-content/uploads/2021/02/audit_ilu_05.png';
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
						$activePost['rok'] = get_post_meta($post->ID, 'rok', true);
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
									foreach($parsedPosts as $post){
										if($post['rok'] !== '2021'){
										echo "<div class=\"row\">
											<a class=\"analysis-link-special ".$post['active']."\" href=\"".$post['link']."\">".$post['name']."</a><br /><br />
										</div>";
										}
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
										<strong>D??lka ??ten??: </strong><?php echo $activePost['length'] ?><br />
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
		
			<?php if($URL === '/2021/analyza/'){?>
			
			<div id="primary">
				<main id="main">
					<div class="analysis-teaser">
					<div class="container">
						<div class="row">
							<div class="col m12">
								<img src="https://audit.eduin.cz/2021/wp-content/uploads/2020/12/Snimek-obrazovky-2020-12-20-v-18.42.43.png" alt="analysis-teaser" />
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
										<a class="analysis-link" href="https://audit.eduin.cz/2021/analyza/">Anal??za 1</a><br /><br />
									</div>
									<div class="row">
										<a class="analysis-link" href="https://audit.eduin.cz/2021/analyza/">Anal??za 2</a><br /><br />
									</div>
									<div class="row">
										<a class="analysis-link" href="https://audit.eduin.cz/2021/analyza/">Anal??za 3</a><br /><br />
									</div>
									<div class="row">
										<a class="analysis-link" href="https://audit.eduin.cz/2021/analyza/">Anal??za 4</a><br /><br />
									</div>
									<div class="row">
										<a class="analysis-link" href="https://audit.eduin.cz/2021/analyza/">Anal??za 5</a><br /><br />
									</div>
								</div>
								<div class="col m9 s12">
									<h3 class="analysis-heading">
										Spole??n?? vzd??l??v??n??: Spor o inkluzivn?? vyhl????ku a motivace k jej??mu p??ijet??
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
