<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package rodicevitanicz
 */

get_header(); ?>

<?
$uvod = get_page_by_path('uvodni-texty-rubrik/'.get_category_parents(get_query_var('cat'), false , '/', true));
if(!empty($uvod)) {
	$page = get_page($uvod->ID);
	if(!empty($page->post_content)) {
?><div class="category-top">
<?= $page->post_content ?>
</div>
<?
	}
}

if(have_posts()) {
?>

		<div id="container">
			<div id="content" class="posts">





				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>





			</div><!-- #content -->
		</div><!-- #container -->

<?php } get_footer(); ?>
