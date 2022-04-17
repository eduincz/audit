<?php
acf_form_head();
get_header();
$postId = $_GET['analyza_id'] ? $_GET['analyza_id'] : basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

$args = array(
	'posts_per_page'	=> -1,
	'post_type'			=> 'analyza'
);

$loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
		if(intval($postId) === get_the_ID()){
			
			$titulek = get_post_meta( get_the_ID(), 'nazev', true );
			echo "<h1>".$titulek."</h1>";
		}
    endwhile;

ob_start();
?>	


<?php
get_footer();
?>
