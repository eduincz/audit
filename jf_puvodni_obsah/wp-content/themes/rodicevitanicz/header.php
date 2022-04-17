<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package rodicevitanicz
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php
 if (strpos($_SERVER['REQUEST_URI'], 'profil-skoly/')!==false) {
    if (function_exists( 'spravaSkolAdminDetail')) $data=spravaSkolAdminDetail($_GET['id'],1);
    $nazevSkoly = $data['skola'][1];
    echo "$nazevSkoly | Rodice vítáni";
 } 
 else 
 {
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
  }
	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=2" />
<!--[if lte IE 6]><style type="text/css" media="all">@import "<?php bloginfo('template_directory'); ?>/style-ie6.css?v=1";</style><![endif]-->
<!--[if IE 7]><style type="text/css" media="all">@import "<?php bloginfo('template_directory'); ?>/style-ie7.css?v=1";</style><![endif]-->
<!--[if gte IE 8]><style type="text/css" media="all">@import "<?php bloginfo('template_directory'); ?>/style-ie8.css?v=1";</style><![endif]-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'template_url' );?>/jquery-ui.custom.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js" type='text/javascript'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type='text/javascript'></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'template_url' );?>/pluginy.css?3" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="/favicon.ico" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type="text/javascript">

//nastaveni delky iframu s diskuzi
function setIframeHeight1()
{
  if( document.getElementById("news_iframe").contentDocument!=null )
  { 
    if( document.getElementById("news_iframe").contentDocument.getElementById('onlyCol')==null )
    {
      setTimeout( 'setIframeHeight1()', 500 );
    }
    else
    {
      var h = document.getElementById("news_iframe").contentDocument.getElementById('onlyCol');
      var w = h.offsetHeight;
      document.getElementById("news_iframe").style.height = w+'px';
    }
  }
  else
  {
    if( document.getElementById("news_iframe").contentWindow.document.getElementById("onlyCol")==null )
    {
      setTimeout( 'setIframeHeight1()', 500 );
    }
    else
    {
      var h = document.getElementById("news_iframe").contentWindow.document.getElementById("onlyCol");
      var w = h.offsetHeight;
      document.getElementById("news_iframe").style.height = w+'px';
    }
  }
}

function setIframeHeight2()
{
  if( document.getElementById("post_iframe").contentDocument!=null )
  { 
    if( document.getElementById("post_iframe").contentDocument.getElementById('onlyCol')==null )
    {
      setTimeout( 'setIframeHeight2()', 500 );
    }
    else
    {
      var h = document.getElementById("post_iframe").contentDocument.getElementById('onlyCol');
      var w = h.offsetHeight;
      document.getElementById("post_iframe").style.height = w+'px';
    }
  }
  else
  {
    if( document.getElementById("post_iframe").contentWindow.document.getElementById("onlyCol")==null )
    {
      setTimeout( 'setIframeHeight2()', 500 );
    }
    else
    {
      var h = document.getElementById("post_iframe").contentWindow.document.getElementById("onlyCol");
      var w = h.offsetHeight;
      document.getElementById("post_iframe").style.height = w+'px';
    }
  }
}

setTimeout( 'setIframeHeight1()', 100 );
setTimeout( 'setIframeHeight2()', 100 );


//GA
   var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25146132-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">

<?php get_sidebar(); ?>

<div id="mainwrapper">

  
  <div id="header">
		<div id="masthead">

			<div id="access">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php// wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>

<?php

        //menu 1. urovne -------------------------------------------------------
/*        echo "<div id='hmenu'><ul>";
        wp_list_categories( $args = array( 'depth'  => 1, 'child_of' => 0, 'title_li' => '', 'exclude' => 14) );
        echo "</ul></div><hr class='clear' />";*/

        //menu 2. urovne  ------------------------------------------------------
/*        $nazevPrvniKategorie = '';
        //zjisteni rodicovskych kategorií
        if(is_category()) { //kdyz jsem ve výpisu kategorie
            $cat = get_category_by_path(get_query_var('category_name'),false);
            $currentCatId = $cat->cat_ID;
            $categories = get_category_parents( get_query_var('cat') , false , '|' );
            $poleKategorii = explode("|", $categories);
            $nazevPrvniKategorie = $poleKategorii[0];
            $idKategoriePrviUrovne =  get_cat_ID($nazevPrvniKategorie);
        }  elseif (is_page() || is_single()) {    //kdyz jsme na strance nebo postu
            $poleObjCat = get_the_category( );
            $prvniKategorie = $poleObjCat[0]; //POKUD je zarazen do vice kategorii, je asi nahoda, kde to bude
            if ($prvniKategorie->name=='home') $prvniKategorie = $poleObjCat[1];
            if (is_object($prvniKategorie)) {
                  $nazevPrvniKategorie = $prvniKategorie->name;
                  $idKategoriePrviUrovne =  $prvniKategorie->term_id;
            }
        }
*/
        $catSlugs = array();
        $catIds = array();
        if(is_category()) { //kdyz jsem ve výpisu kategorie
            foreach(explode('|', get_category_parents(get_query_var('cat'), false , '|', true)) as $catSlug) {
            	$catSlugs[] = $catSlug;
        		$catIds[$catSlug] = get_category_by_slug($catSlug)->term_id;
            }
        }  elseif (is_single()) { //kdyz jsme na postu
            foreach(get_the_category() as $cat) {
	            foreach(explode('|', get_category_parents($cat->term_id, false , '|', true)) as $catSlug) {
	            	if(!in_array($catSlug, $catSlugs)) {
		            	$catSlugs[] = $catSlug;
		        		$catIds[$catSlug] = get_category_by_slug($catSlug)->term_id;
	            	}
	            }
            }
        }  elseif (is_page()) { //kdyz jsme na stránce

        	$pageCatMapping = array(
        		'mapa-skol/pro-rodice' => 'mapa',
        		'mapa-skol/pro-skoly' => 'mapa-pro-skoly',
        		'dotaznik' => 'certifikace'
        	);

			$p = $wp_query->post;
        	$pageSlug = '';
        	while(!empty($p)) {
        		$pageSlug = $p->post_name.'/'.$pageSlug;
				$p = empty($p->post_parent) ? null : get_page($p->post_parent);
        	}
        	$pageSlug = rtrim($pageSlug, '/');

        	if(array_key_exists($pageSlug, $pageCatMapping)) {
	            foreach(explode('|', get_category_parents(get_category_by_slug(
	            	$pageCatMapping[$pageSlug])->term_id, false , '|', true)) as $catSlug
	            ) {
	            	if(!in_array($catSlug, $catSlugs)) {
		            	$catSlugs[] = $catSlug;
		        		$catIds[$catSlug] = get_category_by_slug($catSlug)->term_id;
	            	}
	            }
        	}
        }

?><div id="hmenu">

	<ul>
		<li class="item1<?= in_array('pro-rodice', $catSlugs) ? ' selected' : '' ?>"><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/rubrika/pro-rodice/" title="Zobrazit všechny příspěvky zařazené do rubriky Pro rodiče">Pro rodiče</a></li>
		<li class="space space1">&nbsp;</li>
		<li class="item2<?= in_array('pro-skoly', $catSlugs) ? ' selected' : '' ?>"><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/rubrika/pro-skoly/" title="Zobrazit všechny příspěvky zařazené do rubriky Pro školy">Pro školy</a></li>
		<li class="space space2">&nbsp;</li>
		<li class="item3<?= in_array('pro-media', $catSlugs) ? ' selected' : '' ?>"><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/rubrika/pro-media/" title="Zobrazit všechny příspěvky zařazené do rubriky Pro média">Pro média</a></li>
	</ul>

	<form method="get" action="<?php bloginfo('home'); ?>/" class="search-box">
	<div>
	<input type="text" onblur="if(this.value=='')this.value='Hledej…';" onclick="if(this.value=='Hledej…')this.value='';" value="<?php echo wp_specialchars(empty($s) ? 'Hledej…' : $s, 1); ?>" title="Hledat klíčová slova" maxlength="128" name="s" />
	<input type="image" title="Vyhledat" src="<?php bloginfo('template_directory'); ?>/images/searchbtn.gif" />
	</div>
	</form>

</div><!-- #hmenu -->


<? if (($proRodice = in_array('pro-rodice', $catSlugs)) || in_array('pro-skoly', $catSlugs)) {
/*              echo "<div id='hmenu'><ul>";
              wp_list_categories( $args = array( 'depth'  => 1, 'child_of' => $idKategoriePrviUrovne, 'title_li' => '') );
              echo "</ul></div><hr class='clear' />";*/
//        	print_r(get_categories(array( 'depth'  => 1, 'child_of' => $idKategoriePrviUrovne)));
?>
<table id="hmenu2" class="hmenu2-<?= $proRodice ? 1 : 2 ?>">
<tr><?
$level2 = $proRodice ? $catIds['pro-rodice'] : $catIds['pro-skoly'];
foreach($cats = get_categories(array( 'child_of' => $level2, 'hide_empty' => 0, 'exclude' => '57,59')) as $cat) {               //depth nelze nastavit u get_categories
	$uri = 'http://'.$_SERVER['HTTP_HOST']; 
	if($cat->slug == 'mapa') {
		$uri .= '/mapa-skol/pro-rodice/';
	} elseif($cat->slug == 'mapa-pro-skoly') {
		$uri .= '/mapa-skol/pro-skoly/';
	} elseif($cat->slug == 'certifikace') {
		$uri .= '/dotaznik/';
	} elseif($cat->slug == 'diskuse-pro-rodice') {
		$uri .= '/diskuze/';   
	} else {
		$uri .= '/rubrika/'.get_category_parents($cat->term_id, false , '/', true);
	}
?>
	<td style="width: <?= 1 / count($cats) * 100 ?>%;"<?= in_array($cat->slug, $catSlugs) ? ' class="selected"' : '' ?>><a href="<?= $uri ?>" title="Zobrazit všechny příspěvky zařazené do rubriky <?= $cat->name?>"><?= $cat->name?></a></td>
<? } ?>
	<td class="space">&nbsp;</td>
</tr>
</table><? } ?>

			</div><!-- #access -->
		</div><!-- #masthead -->
	</div><!-- #header -->


  
  <!-- iframe diskuze -->
  <div style='position:relative; left: 650px; top: 100px; height: 1420px; width:235px; border:0px solid silver;'>
    
      <h3 style="padding:0px; margin: 0px;"><a class='arrowDown' href="/diskuze/">Z DISKUSE</a></h3>
   
    <div class="boxIframe">
      <iframe id="news_iframe" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 220px; height:180px;" src="/diskuze/news.php"></iframe>
    </div>
    <div class="boxIframe">
      <iframe id="post_iframe" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 220px; height:180px;" src="/diskuze/news_post.php"></iframe>
    </div>
  
  </div>
  <div style="margin-top:-1420px">&nbsp;</div><?//vraci obsah zpatky nahoru, kde je jakoby panel diskuze?>
   
  
  
	<div id="main">

