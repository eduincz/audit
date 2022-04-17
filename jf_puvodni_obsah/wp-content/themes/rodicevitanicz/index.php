<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package rodicevitanicz
 */

get_header(); ?>

<?
$uvod = get_page_by_path('uvodni-texty-rubrik/titulka');
if(!empty($uvod)) {
	$page = get_page($uvod->ID);
?><div class="category-top">
<?= $page->post_content ?>
</div>
<? } ?>

		<div id="container">
			<div id="content" class="posts">
			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'index' );
			 ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
