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
	$( document ).ready(function() {
		$('.search-button').on('click', function(){
			var search = $('#search').val();
			var fromMonth = $('#from-month').val();
			var toMonth = $('#to-month').val();
			
			var tags = '';
			
			$( ".event-new-selected" ).each(function( index ) {
				tags = tags + ',' + $( this ).data('tag');
			});
			
			var url = window.location.href.split('?')[0];
			var newUrl = url + '?search=' + search + '&fromMonth=' + fromMonth + '&toMonth=' + toMonth+ '&tags=' + tags;
			window.location.replace(newUrl);
		});
		
		$('.event-new').on('click', function(e) {
		  $(this).toggleClass("event-new-selected");
		  e.preventDefault();
		});
		
		$('.show-more').on('click', function(e) {
		  	e.preventDefault();
			var max = $(this).data('max');
			var current = $(this).data('current');
			
			for(var i = current; i < current + 20; i++){
				if(i <= max){
					var className = '.event-'+i;
					$(className).removeClass('event-hidden');	
				}
			}
			
			
			var newCurrent = current + 20;
			if(newCurrent > max){
				$(this).hide();
			}
			else{
				$(this).data('current', newCurrent);
			}
		});
	});
	
</script>

<?php

	$tagsArray = explode(',',$tags);
	array_shift($tagsArray);

	$search = $_GET['search'];
	$search = filter_var($search);	
	$fromMonth = $_GET['fromMonth'];
	$fromMonth = filter_var($fromMonth);	
	$toMonth = $_GET['toMonth'];
	$toMonth = filter_var($toMonth);

	$tags = $_GET['tags'];
	$tags = filter_var($tags);

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
				
				//Filtering
				if($search === '' && $fromMonth === '' && $toMonth === '' && $tags === ''){
					$filteredParsedPosts = $parsedPosts;
				}
				else{
					foreach($parsedPosts as $parsedPost){
						// Fulltext search
						$searchCorrect = true;
						$fromCorrect = true;
						$toCorrect = true;
						$tagsCorrect = true;
						
						if($search !== ''){
							$searchCorrect = false;
							if(strpos($parsedPost['name'], $search) !== false) {
								$searchCorrect = true;
							}
							else{
								foreach($parsedPost['tagy'] as $tag){
									if($tag === 'search'){
										$searchCorrect = true;
									}
								}
								
							}
						}
						
						
						if($fromMonth !== ''){
							$fromCorrect = false;
							$datum = (string)$parsedPost['datum_clear'];
							$year = (int)substr($datum, 0, 4);
							$month = (int)substr($datum, 4, 2);
							$fromYear = (int)substr($fromMonth, 0, 4);
							$newFromMonth = (int)substr($fromMonth, 5, 2);
							
							if(is_int($fromYear) === false){
								$fromCorrect = false;
							}
							
							if(($year > $fromYear || ($year === $fromYear && $month >= $newFromMonth)) === true){
								$fromCorrect = true;
							}
						}
						
						
						if($toMonth !== ''){
							$toCorrect = false;
							$datum = (string)$parsedPost['datum_clear'];
							$year = (int)substr($datum, 0, 4);
							$month = (int)substr($datum, 4, 2);
							$toYear = (int)substr($toMonth, 0, 4);
							$newToMonth = (int)substr($toMonth, 5, 2);
							
							if(is_int($toYear) === false){
								$toCorrect = false;
							}
							
							if(($year < $toYear || ($year === $toYear && $month <= $newToMonth)) === true){
								$toCorrect = true;
							}
						}
						
						
						if($tags !== ''){
							$tagsCorrect = false;
							$tagsArray = explode(',',$tags);
							array_shift($tagsArray);
							foreach($parsedPost['tagy'] as $tag){
								if(in_array($tag, $tagsArray)){
									$tagsCorrect = true;
								}
							}
							
						}
						
						
						if($searchCorrect === true && $fromCorrect === true && $toCorrect === true && $tagsCorrect === true){
							$filteredParsedPosts[] = $parsedPost;
						}
					}
				}
				

			?>
			
			<div id="primary">
				<main id="main events">
					<div class="container">
						<div class="col m12">
							<h2 class="events-page-heading">
								Přehled událostí
							</h2>
						</div>
					</div>
					<div class="container">
						<div class="events-inputs">
						<div class="row first-search-row">
						<div class="col xl6 m6 s12">
							<input id="search" class="events-input" placeholder="hledat" value="<?php echo $search; ?>" />
						</div>
						<div class="col xl3 m3 s12 calendar-filter">
							<label for="from-month">Měsíc od:</label>
							<input id="from-month" type="month" name="from-month" min="2020-01" max="2021-12" value="<?php echo $fromMonth; ?>">
						</div>
						<div class="col xl3 m3 s12 calendar-filter">
							<label for="to-month">Měsíc do:</label>
							<input id="to-month" type="month" name="to-month" min="2020-01" max="2021-12" value="<?php echo $toMonth; ?>">
						</div>
							
							</div>
							<div class="row">
					
						<div class="col xl2 l2 m3 s4">
							<a href="#" class="event event-new filter-inkluze <?php if(in_array('inkluze', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="inkluze">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_inkluze.svg" alt="" />
									<span class="event-img-block-new-text">inkluze</span>
								</div>
							</a>
						</div>
							<div class="col xl3 l3 m3 s4">
							<a href="#" class="event event-new filter-technologie <?php if(in_array('technologie', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="technologie">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_technologie.svg" alt="" />
									<span class="event-img-block-new-text">technologie</span>
								</div>
							</a>
							</div>
						<div class="col xl2 l3 m3 s4">
							<a href="#" class="event event-new filter-finance <?php if(in_array('finance', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="finance">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_financovani.svg" alt="" />
									<span class="event-img-block-new-text">financování</span>
								</div>
							</a>
						</div>
						<div class="col xl2 l2 m3 s4">
							<a href="#" class="event event-new filter-maturity <?php if(in_array('maturity', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="maturity">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_maturity.svg" alt="" />
									<span class="event-img-block-new-text">maturity</span>
								</div>
							</a>
						</div>
						<div class="col xl3 l4 m4 s4">
							<a href="#" class="event event-new filter-neformalni <?php if(in_array('neformalni', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="neformalni">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_neformalni_vzdelavani.svg" alt="" />
									<span class="event-img-block-new-text">neformální vzdělávání</span>
								</div>
							</a>
						</div>
						<div class="col xl4 l4 m3 s4">
							<a href="#" class="event event-new filter-nerovnosti <?php if(in_array('nerovnosti', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="nerovnosti">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_nerovnosti.svg" alt="" />
									<span class="event-img-block-new-text">nerovnosti ve vzdělávání</span>
								</div>
							</a>
						</div>
								
						<div class="col xl2 m3 s4">
							<a href="#" class="event event-new  filter-covid <?php if(in_array('covid', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="covid">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_covid.svg" alt="" />
									<span class="event-img-block-new-text">covid</span>
								</div>
							</a>
						</div>
						<div class="col xl2 m3 s4">
							<a href="#" class="event event-new filter-ucitele <?php if(in_array('ucitele', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="ucitele">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_ucitele.svg" alt="" />
									<span class="event-img-block-new-text">učitelé</span>
								</div>
							</a>
						</div>
						<div class="col xl2 m3 s4">
							<a href="#" class="event event-new filter-materske <?php if(in_array('materske', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="materske">
								
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_MS.svg" alt="" />
									<span class="event-img-block-new-text">mateřské</span>
								</div>
							</a>
						</div>
						<div class="col xl2 m3 s4">
							<a href="#" class="event event-new filter-zakladni <?php if(in_array('zakladni', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="zakladni">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_ZS.svg" alt="" />
									<span class="event-img-block-new-text">základní</span>
								</div>
							</a>
						</div>
						<div class="col xl2 m3 s4">
							<a href="#" class="event event-new filter-stredni <?php if(in_array('stredni', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="stredni">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_SS.svg" alt="" />
									<span class="event-img-block-new-text">střední</span>
								</div>
							</a>
						</div>
						<div class="col xl2 m3 s4">
							<a href="#" class="event event-new filter-vysoke <?php if(in_array('vysoke', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="vysoke">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_VS.svg" alt="" />
									<span class="event-img-block-new-text">vysoké</span>
								</div>
							</a>
						</div>
						<div class="col xl2 l3 m3 s4">
							<a href="#" class="event event-new filter-legislativa <?php if(in_array('legislativa', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="legislativa">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_zakony.svg" alt="" />
									<span class="event-img-block-new-text">legislativa</span>
								</div>
							</a>
						</div>
						<div class="col xl4 m3 s4">
							<a href="#" class="event event-new filter-prijimaci <?php if(in_array('prijimaci', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="prijimaci">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_prijimci_zkousky.svg" alt="" />
									<span class="event-img-block-new-text">přijímací zkoušky</span>
								</div>
							</a>
						</div>
						<div class="col xl2 m3 s4">
							<a href="#" class="event event-new filter-kurikulum <?php if(in_array('kurikulum', $tagsArray) === true){
									echo 'event-new-selected';
								}?>" data-tag="kurikulum">
								<div class="event-img-block event-img-block-new">
									<img src="https://audit.eduin.cz/2020/wp-content/uploads/2021/12/ikona_RVP_SVP.svg" alt="" />
									<span class="event-img-block-new-text">RVP, ŠVP</span>
								</div>
							</a>
						</div>
							<div class="row">
								<br /><br />
								<button class="search-button">
									VYHLEDAT DLE KRITÉRIÍ
								</button>
								
								<a href="https://audit.eduin.cz/2020/udalosti-nove/" class="reset-button">
									RESETOVAT
								</a>
								<br />
							</div>
							</div>
							
					</div>
						<div class="row">
							<div class="events-list">
								<?php
						
								
								

								$filteredParsedPosts = array_reverse($filteredParsedPosts);
								foreach($filteredParsedPosts as $post){
									$eventHidden = '';
									echo "<div class=\"row\">
									<a href=\"https://audit.eduin.cz/2020/udalost-detail/?udalost_id=".$post['id']."\" class=\"event-list-item ".$eventHidden." event-".$cnt." ".$post['tags_string']." ".$post['mesic']."\">
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
								}
								?>
							</div>
						</div>
					</div>
				</main>
			</div>



<?php
get_footer();
?>
