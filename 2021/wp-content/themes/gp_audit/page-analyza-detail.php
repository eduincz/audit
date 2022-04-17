<?php
acf_form_head();
get_header();
$postId = $_GET['analyza_id'] ? $_GET['analyza_id'] : basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$nazev = get_post_meta( intval($postId), 'nazev')[0];
$first_text = get_post_meta(intval($postId), 'uvodni_text', true);
$length = get_post_meta(intval($postId), 'delka_cteni', true);
$autor = get_post_meta(intval($postId), 'autoor', true);
$link = get_post_meta(intval($postId), 'propojeni_s_jinou_analyzou', true);
$sources = wpautop(get_post_meta(intval($postId), 'zdroje', true));
$text = wpautop(get_post_meta(intval($postId), 'text', true));

//$text = the_content($text);
$args = array( 'post_type' => 'cpt_analyza',
'posts_per_page'   => -1);

$posts = get_posts($args);

$defaultAnalysisId = 3020;
$nextOne = false;
foreach($posts as $post){
	$rok = get_post_meta(intval($post->ID), 'rok', true);
	if($rok === '2021'){
		if($nextOne === true){
			$defaultAnalysisId = $post->ID;
			$nextOne = false;
		}
		if($post->ID === intval($postId)){
			$nextOne = true;
		}
	}
}

$link = "https://audit.eduin.cz/2021/analyza-detail/?analyza_id=". $defaultAnalysisId;
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>

<script>$( document ).ready(function() {
		$('.source-toggler').click(function(event){
			$('.analysis-sources').toggleClass('source-hidden');
			event.preventDefault();
		});
	});
</script>

<div class="analysis-text-detail-links">
	<div class="container">
		<br />
		<div class="row">
			<a href="https://audit.eduin.cz/2021/seznam-analyz/" class="btn btn-primary more-button homepage-blue analysis-list">Seznam analýz</a>
		</div>
		<br />
		<div class="row">
			<a href="<?php echo $link; ?>" class="btn btn-primary more-button homepage-blue analysis-list">Další analýza</a>
		</div>
	</div>
</div>
 
<div class="analysis-text-detail">
	<div class="container">
		<div class="row">
			<div class="">
				<h3 class="analysis-heading">
					<?php echo $nazev; ?>
				</h3>
				<p class="analysis-upper-text">
					<?php echo $first_text; ?>
				</p>
				<p>
					<strong>Autor: </strong><?php echo $autor; ?><br />
					<?php if($length !== ''){?>
					<strong>Délka čtení: </strong><?php echo $length; ?><br />
					<?php } ?>
				</p>
				<p class="analysis-lower-text">
					<?php echo $text; ?>
				</p>

				<a class="source-toggler" href="#">Zobrazit/schovat zdroje</a><br /><br />
				<div class="analysis-sources source-hidden">
					<?php echo $sources; ?>
				</div>
			</div>
		</div>
	</div>	
</div>

<?php 
	
?>	

<?php
ob_start();
get_footer();
?>