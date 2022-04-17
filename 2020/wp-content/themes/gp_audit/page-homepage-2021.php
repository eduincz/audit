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
	$( document ).ready(function() {
	});
	
</script>

<main id="main">
	<div class="hp-claim" id="hp-claim">
		<div class="container">
			<div class="row">
					<div class="col m6">
						<img class="claim-image" src="https://audit.eduin.cz/2020/wp-content/uploads/2021/02/audit_hp_teas.png" alt="claim-image" />
					</div>
					<div class="col m6">
						<h3 class="claim-heading">
							Víte, co se děje v českém vzdělávání? Audit pro rok 2021 reflektuje nerovnosti ve vzdělávání, přijímací zkoušky i úskalí při 								zavádění systémových změn.
						</h3>
						<a class="btn btn-primary homepage-blue" href="#hp-content">
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
							<p class="online-text">
								AUDIT VE ZKRATCE
							</p>
						</div>
						<div class="col m3">
							<a class="acf-button button button-primary button-large" href="https://audit.eduin.cz/2020/wp-content/uploads/2022/03/AUDIT2021_shrnuti_02.pdf" target="_blank">Shrnutí Auditu 2021</a>
						</div>
					</div>
					<br /><br />
					<div class="row">
						<div class="col m6">
							<p class="online-text">JAK SE VÁM AUDIT LÍBÍ?</p>
						</div>
						<div class="col m3">
							<a class="acf-button button button-primary button-large" href="https://docs.google.com/forms/d/1CH7jTCPHAicCIzzCJJU0cmAyZgHvocw3VG-v3EH5yIw/edit?usp=sharing" target="_blank">DEJTE NÁM ZPĚTNOU VAZBU</a>
						</div>
						</div>
					</div>
				</div>
	<div class="hp-content" id="hp-content">
		<div class="container">
			<div class="row">
				<div class="col m6 s12">
					<h4 class="hp-section-heading">
						Co je audit?
					</h4>
					<p>
						Audit zachycuje a hodnotí aktuální stav vzdělávacího 
						systému a změny ve vzdělávací politice v ČR v daném roce.<br /><br />

						Připravuje ho odborný tým EDUin a je nezávisle oponován. 
						Vzniká na základě dostupných dat z veřejné sféry a akademického prostředí. <br /><br />

						Audit se skládá z přehledu událostí předchozího roku a analýz, 
						které se věnují vybraným tématům. Všechny ročníky od roku 2014 najdete publikované 
						zde na tomto webu.
					</p>
					<a class="more-left btn btn-primary homepage-blue" href="https://audit.eduin.cz/2020/co-je-audit/">
						Číst dál
					</a>
				</div>
				<div class="col m6 s12">
					<div class="row">
						<div class="col m12">
							<a class="homepage-big-link" href="https://audit.eduin.cz/2020/udalosti-nove/?search=&fromMonth=2021-01&toMonth=2021-12&tags=">
								Události 2021
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col m12">
							<a class="homepage-big-link" href="#">
								Analýzy 2021
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
?>
