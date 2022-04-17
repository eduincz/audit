<?php
/**
 * The template for displaying the footer.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
/**
 * generate_before_footer hook.
 *
 * @since 0.1
 */
do_action( 'generate_before_footer' );
?>

<div <?php generate_do_element_classes( 'footer' ); ?>>
	<?php
	/**
	 * generate_before_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'generate_before_footer_content' );

	/**
	 * generate_footer hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked generate_construct_footer_widgets - 5
	 * @hooked generate_construct_footer - 10
	 */
	//do_action( 'generate_footer' );
	echo "<div class=\"container\">  <div class=\"partners row\">   <div class=\"col m12\">    <h4 class=\"partners-heading\">Partneři EDUin, o .p .s.</h4>   </div>  </div>  <div class=\"row\">   <div class=\"col\">    <a href=\"https://www.livesport.eu\" target=\"_blank\">    <img src=\"https://audit.eduin.cz/2020/wp-content/uploads/2021/06/LIVESPORT_LOGO_RED_RGB.png\" class=\"partner-logo\" alt=\"\" />    </a><br /> <p style=\"text-align:center\">generální partner</p>   </div>
	<div class=\"col\">    <a href=\"https://www.nadacecs.cz\" target=\"_blank\">    <img src=\"https://audit.eduin.cz/2020/wp-content/uploads/2021/11/logo_NCS_podklad_RGB-1.svg\" class=\"partner-logo\" alt=\"\" />    </a>   </div><div class=\"col\">    <a href=\"https://www.blizksobe.cz\" target=\"_blank\">    <img src=\"https://audit.eduin.cz/2020/wp-content/uploads/2022/03/BKS_LOGO-oq1c3l458wzpu31q73slvj6fp1wqk3hb1wzx4dn3sw.png\" class=\"partner-logo\" alt=\"\" />    </a>   </div></div> </div>";
	

	echo "<footer>
	<div class=\"container\">
	<div class=\"row\">
	<div class=\"col m12\">
	<div class=\"footer-content\">
		<a href=\"https://www.eduin.cz\" target=\"_blank=\" class=\"footer-logo\"><img src=\"https://audit.eduin.cz/2020/wp-content/uploads/2021/06/EDUin_logo_RGB_cerne.png\" alt=\"\" /></a><br />
		<div class=\"block-address\">
			<p>
				oficiální adresa:
				<br />
				EDUin, o. p. s., Bucharova 2928/14a
				<br />
				158 00 Praha 5 - Stodůlky
				<br /><br />
				kontaktní adresa:
				<br />
				EDUin, o. p. s., Staroměstské náměstí 4/1
				<br />
				110 00 Praha 1
			</p>
		</div>
		<div class=\"socials\">
			<div class=\"row\">
				<a href=\"https://www.facebook.com/eduin.cz/\" target=\"_blank\"><img src=\"https://audit.eduin.cz/2020/wp-content/uploads/2020/12/Snimek-obrazovky-2020-12-13-v-17.25.25.png\" alt=\"\" /></a>
				<a href=\"https://www.instagram.com/eduin.cz/?hl=en\" target=\"_blank\"><img src=\"https://audit.eduin.cz/2020/wp-content/uploads/2020/12/Snimek-obrazovky-2020-12-13-v-17.25.48.png\" alt=\"\" /></a>
				<a href=\"https://www.youtube.com/c/eduin\" target=\"_blank\"><img src=\"https://audit.eduin.cz/2020/wp-content/uploads/2020/12/Snimek-obrazovky-2020-12-13-v-17.25.39.png\" alt=\"\" /></a>
				<a href=\"https://twitter.com/eduinops\" target=\"_blank\"><img src=\"https://audit.eduin.cz/2020/wp-content/uploads/2020/12/Snimek-obrazovky-2020-12-13-v-17.25.55.png\" alt=\"\" /></a>
			</div>
		</div>
		<div class=\"row\">
		<div class=\"lesser-footer\">
			<p>
			<a href=\"https://www.eduin.cz\" target=\"_blank\">EDUin</a> © 2020 - <a href=\"https://www.eduin.cz/oou/\" target=\"_blank\">zásady zpracování osobních údajů</a> - Tyto stránky využívají platformu Wordpress
			</p>
		</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</footer>";
	
	
	/**
	 * generate_after_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'generate_after_footer_content' );
	?>
</div><!-- .site-footer -->

<?php
/**
 * generate_after_footer hook.
 *
 * @since 2.1
 */
do_action( 'generate_after_footer' );

wp_footer();
?>

</body>
</html>
