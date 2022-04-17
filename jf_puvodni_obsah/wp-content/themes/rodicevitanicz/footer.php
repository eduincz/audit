<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.
 *
 * @package rodicevitanicz
 */
?>
	</div><!-- #main -->

</div><!-- #mainwrapper -->

	<div id="footer">
		<div id="colophon">

			<div id="site-info">
				<div>Copyright 2011 Rodiče vítáni</div>
				<div><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/napoveda-a-pravidla/">Nápověda a pravidla</a></div>
			</div><!-- #site-info -->

			<div id="footer-menu">

				<ul>
					<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/o-projektu/">O projektu</a></li>
					<li class="space">&nbsp;</li>
					<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/partneri/">Partneři</a></li>
					<li class="space">&nbsp;</li>
					<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/odkazy/">Odkazy</a></li>
					<li class="space">&nbsp;</li>
					<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/kontakt/">Kontakt</a></li>
				</ul>

				<form method="get" action="<?php bloginfo('home'); ?>/" class="search-box">
				<div>
				<input type="text" onblur="if(this.value=='')this.value='Hledej…';" onclick="if(this.value=='Hledej…')this.value='';" value="<?php echo wp_specialchars(empty($s) ? 'Hledej…' : $s, 1); ?>" title="Hledat klíčová slova" maxlength="128" name="s" />
				<input type="image" title="Vyhledat" src="<?php bloginfo('template_directory'); ?>/images/searchbtn.gif" />
				</div>
				</form>

			</div><!-- #footer-menu -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->



<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
