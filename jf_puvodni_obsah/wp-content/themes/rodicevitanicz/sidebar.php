<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package rodicevitanicz
 */
 $uri = $_SERVER['REQUEST_URI'];
?>

<div id="sidebar">

<div id="sidebar-logo">
<h1>Rodiče vítáni</h1>
<div><a href="/" title="Přejít na úvodní stránku"><span>&nbsp;</span></a></div>
</div>

<? /* ?><div class="box">
<h4>Vybírej a nominuj!</h4>
<span class="button-red"><a href="#">Hlasujte zde</a></span>
</div><? */ ?>

<?php //KATEGORIE PORADNY
if (strpos($uri, '/poradna/')!==false || strpos($uri, '/formular-poradny/')!==false ) {      
  echo "<div class=\"box poradnaCat\">";
  echo "<h4>PORADNA - KATEGORIE</h4>";
  //foreach($cats = get_categories(array( 'depth'  => 3, 'child_of' => 18, 'hide_empty' => 0)) as $cat) {
  //  echo "<li>{$cat->name}</li>";
  //}
  wp_list_categories( array('hide_empty' => 0, 'child_of' => 57, 'title_li' => '') );
  echo "</div>";
}

?>


<?php //STITKY budou v sekcich pro rodice a pro skoly, ale ne ve vyjmenovanych subkategoriich   
if ((strpos($uri, '/pro-skoly/')!==false && strpos($uri, '/kniha-pro-skoly/')===false  && strpos($uri, '/sluzby-pro-skoly/')===false  && $uri != '/mapa-skol/pro-skoly/' && $uri != '/rubrika/pro-skoly/') || (strpos($uri, '/pro-rodice/')!==false && strpos($uri, '/poradna/')===false  && strpos($uri, '/kniha/')===false  && $uri != '/mapa-skol/pro-rodice/' && $uri != '/rubrika/pro-rodice/') || strpos($uri, '/stitek/')!==false) {  ?>   
<div class="box tagCloud">
<?php wp_tag_cloud('smallest=1.2&largest=2.2&unit=em'); ?>
</div>
<?php }?>

<div class="box">
<h4>AKTIVNÍ ŠKOLY</h4>
<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/mapa-skol/"><img alt="Mapa" src="<?php bloginfo('template_directory'); ?>/images/map.gif" style="padding: 5px 0 5px 0;"/></a>
</div>

<div class="box" id="boxcertifikuj">
<span style='font-size: 85%;'>Chcete získat značku<br />Rodiče vítáni?</span>
<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/dotaznik/" id='certifikujteSe'>Certifikujte se!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
</div>

<div class="box" id="boxnominuj">
<span style='font-size: 85%;'>Škola vašich dětí na mapě chybí?</span>
<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/nominace-skol/" id='nominujteJi'>Nominujte ji!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
</div>

<!-- podporili nas -->
  <?php 
  if (function_exists("getSlideshow")) {
    $show = getSlideshow2('partneri_');
    if ($show !== false) {
       echo "<div class='box'><strong>Vřelé díky:</strong>";
       echo $show;
       echo "</div>";
    }
  }
  ?>
<!-- /sponzori -->

<?
$levyPanel = get_page_by_path('levy-panel');
if(!empty($levyPanel)) foreach(get_pages(array('child_of' => $levyPanel->ID)) as $page) {
?><div class="box">
<?= $page->post_content ?>
</div>
<? } ?>




<!-- sponzori -->
  <?php 
  if (function_exists("getSlideshow")) {
    $show = getSlideshow('sponzori_');
    if ($show !== false) {
       echo "<div class='box' style=''><strong>Podpořili nás:</strong>";
       echo $show;
       echo "</div>";
    }
  }
  ?>
<!-- /sponzori -->



<div class="box">
<h4>NEWSLETTER</h4>
    <?php
    if (!isset($_REQUEST["email"])) { $_REQUEST["email"] = ''; }
    if (!isset($_REQUEST["vocative"])) { $_REQUEST["vocative"] = ''; }
    if (!isset($_REQUEST["fname"])) { $_REQUEST["fname"] = ''; }
    if (!isset($_REQUEST["sname"])) { $_REQUEST["sname"] = ''; }
    ?>
    <?php if (!isset($_GET['STRING'])) {?>
    <span style='font-size:12px;'>Vložte svůj e-mail:</span>
    <form name="login" method="get" action="http://www.mailone.cz/_e_login.php" >
    
    <input type="text" name="email" value="<?php echo $_REQUEST["email"]; ?>" />
    <input type="submit" value='Objednat' />

    <input type="hidden" name="ident" value="MjIxNHxiMDI1NWM3ZGIxMTBiNTI2MDk4MDM0MDE1NzQ0MDc5N3w0OQ=="/>
    <input type="hidden" name="blink" value="aHR0cDovL3d3dy5yb2RpY2V2aXRhbmkuY3o="/>
    
    </form>
    <?php ;}  else echo "<span style='font-size:12px;color: #EF1422'>Děkujeme, na zadaný e-mail začneme zasílat newsletter.</span>"; ?>
</div>




<div class="box" style="text-align: center;">
<iframe src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FRodiceVitani&amp;width=220&amp;colorscheme=light&amp;show_faces=true&amp;border_color=white&amp;stream=true&amp;header=false&amp;height=575" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:220px; height:575px;" allowTransparency="true"></iframe>
</div>
</div>

