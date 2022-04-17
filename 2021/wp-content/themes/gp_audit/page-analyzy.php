<?php
acf_form_head();
get_header();

$nazev = get_post_meta( intval($postId), 'nazev')[0];
$first_text = get_post_meta(intval($postId), 'uvodni_text', true);
$length = get_post_meta(intval($postId), 'delka_cteni', true);
$autor = get_post_meta(intval($postId), 'autoor', true);
$link = get_post_meta(intval($postId), 'propojeni_s_jinou_analyzou', true);
$sources = wpautop(get_post_meta(intval($postId), 'zdroje', true));
$text = wpautop(get_post_meta(intval($postId), 'text', true));
?>

<div class="analysis-text-detail">
	<div class="container">
		<div class="row">
			<h1>
				TEST
			</h1>
		</div>
	</div>
</div>

<?php
ob_start();
get_footer();
?>