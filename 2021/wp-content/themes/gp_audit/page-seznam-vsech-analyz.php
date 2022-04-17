<?php
acf_form_head();
get_header();

$args = array( 'post_type' => 'cpt_analyza',
'posts_per_page'   => -1);

$posts = get_posts($args);
?>

			<div class="hp-analysis" id="hp-analysis">
				<div class="container">
					
					<div class="row">
						<div class="col m12">
							<h2 class="analysis-main-heading">
								Analýzy 2021
							</h2>
						</div>
					</div>
					<div class="row">
						<?php foreach($posts as $post){
							$postId = $post->ID;
							$nazev = get_post_meta( intval($postId), 'nazev')[0];
							$first_text = substr(get_post_meta(intval($postId), 'uvodni_text', true), 0, 240);
							$sources = wpautop(get_post_meta(intval($postId), 'zdroje', true));
							$rok = get_post_meta(intval($postId), 'rok', true);
							if($rok === '2021'){
								echo "<div class=\"col m4\">
								<div class=\"analysis-block analysis-small-block analysis-hp-block\">
									<h4 class=\"analysis-heading analysis-hp-heading\">
										".$nazev."
									</h4>
									<a href=\"https://audit.eduin.cz/2021/analyza-obecna-detail/?analyza_id=".$postId."\" class=\"btn btn-primary more-button homepage-blue\">Více</a>
								</div>
							</div>";
							}	
						}
						?>
					</div>
					
					<div class="row">
						<div class="col m12">
							<h2 class="analysis-main-heading">
								Analýzy 2020
							</h2>
						</div>
					</div>
					<div class="row">
						<?php foreach($posts as $post){
							$postId = $post->ID;
							$nazev = get_post_meta( intval($postId), 'nazev')[0];
							$first_text = substr(get_post_meta(intval($postId), 'uvodni_text', true), 0, 240);
							$sources = wpautop(get_post_meta(intval($postId), 'zdroje', true));
							$rok = get_post_meta(intval($postId), 'rok', true);
							if($rok !== '2021'){
								echo "<div class=\"col m4\">
								<div class=\"analysis-block analysis-small-block analysis-hp-block\">
									<h4 class=\"analysis-heading analysis-hp-heading\">
										".$nazev."
									</h4>
									<a href=\"https://audit.eduin.cz/2021/analyza-obecna-detail/?analyza_id=".$postId."\" class=\"btn btn-primary more-button homepage-blue\">Více</a>
								</div>
							</div>";
							}	
						}
						?>
					</div>
				</div>
			</div>

<?php
ob_start();
get_footer();
?>
