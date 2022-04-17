<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package rodicevitanicz
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
	<div id="navig2-above" class="navig2">
<?php if ( $paged > 0 ) : ?>
		<span class="navig2-arrow navig2-previous"></span><br />
		<span class="navig2-btn"><?php previous_posts_link('Novější příspěvky'); ?></span>
<?php endif; ?>
	</div><!-- #navig2-above -->

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display posts in the Gallery category. */ ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(array('post-list')); ?>>
<?php
echo '<a href="'.get_permalink().'" class="post-tb">';


if(has_post_thumbnail($id = get_the_ID()))
  echo get_the_post_thumbnail($id,array(202,113),array('class'=>'align wp-post-image tfe tfe'));
else
  //echo '<img width="202" height="113" src="'.get_bloginfo('template_directory').'/images/no_thumb.gif" class="align wp-post-image tfe tfe wp-post-image" alt="bez náhledu" />';
echo '</a>';



?>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

			<div class="entry-summary">
        <div class='publishDate'><?php the_time('d.m.Y');?></div>
				<?php echo preg_replace('/ <a href="[^"]*">Celý příspěvek <span class="meta-nav">&rarr;<\/span><\/a>/i', '', apply_filters('the_excerpt', get_the_excerpt())); ?>
			</div><!-- .entry-summary -->

			<div class="post-buttons">
				<!--<span class="button more"><a href="<?php the_permalink(); ?>">Více</a>-->
        </span><span class="space">&nbsp;</span><span class="button share"><a href="<?php the_permalink(); ?>">Více</a></span>
			</div>

			<div style="clear: left;"></div>
			

		</div><!-- #post-## -->

		<?php //comments_template( '', true ); ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
				<div id="navig2-below" class="navig2">
<?php if ( $wp_query->max_num_pages > 1 && $paged < $wp_query->max_num_pages ) : ?>
					<span class="navig2-btn"><?php next_posts_link('Starší příspěvky'); ?></span><br />
					<span class="navig2-arrow navig2-next"></span>
<?php endif; ?>
				</div><!-- #navig2-below -->
