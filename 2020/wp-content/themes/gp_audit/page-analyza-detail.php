<?php
acf_form_head();
get_header();
$postId = $_GET['analyza_id'] ? $_GET['analyza_id'] : basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$nazev = get_post_meta( intval($postId), 'nazev')[0];
$first_text = get_post_meta(intval($postId), 'uvodni_text', true);
$length = get_post_meta(intval($postId), 'delka_cteni', true);
$autor = get_post_meta(intval($postId), 'autoor', true);
$link = get_post_meta(intval($postId), 'propojeni_s_jinou_analyzou', true);
$sources = get_post_meta(intval($postId), 'zdroje', true);
$text = wpautop(get_post_meta(intval($postId), 'text', true));

//$text = the_content($text);
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>

<script>$( document ).ready(function() {
		$('.source-toggler').click(function(event){
			$('.analysis-sources').toggleClass('source-hidden');
			event.preventDefault();
		});
	});
</script>
 
<div class="analysis-text-detail">
	<div class="container">
		<div class="row">
			<div class="col m12">
				<h3 class="analysis-heading">
					<?php echo $nazev; ?>
				</h3>
				<p class="analysis-upper-text">
					<?php echo $first_text; ?>
				</p>
				<p>
					<strong>Autor: </strong><?php echo $autor; ?><br />
					<strong>Délka čtení: </strong><?php echo $length; ?><br />
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