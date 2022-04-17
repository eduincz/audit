<?php  

acf_form_head();
get_header(); 

$udalostId = htmlspecialchars($_GET['udalost_id']); 
$nazev = get_post_meta($udalostId, 'nazev', true);
$textovePole = get_post_meta($udalostId, 'textove_pole', true);
$komentar = get_post_meta($udalostId, 'komentar', true);
$zdroje = [];
$tagy = [];
$tags_string = '';
$tags_hashes = '';
$datumClear = get_post_meta($udalostId, 'datum', true);
$langDate = date_i18n('j. F Y', strtotime($datumClear)) . '<br>';
$mesic = date_i18n('F', strtotime($datumClear));
$datum = $langDate;


$odkazHtml = '';
$total_number_of_rows = get_post_meta( $udalostId, "odkazy", true );
for( $i = 0; $i < $total_number_of_rows; $i++ ) {
	$odkaz = [];
	$odkaz['text'] = get_post_meta( $udalostId, 'odkazy_' . $i . '_text_odkazu', true );
	$odkaz['url'] = get_post_meta( $udalostId, 'odkazy_' . $i . '_adresa_odkazu', true );
	$odkazHtml .= '- <a href="'.$odkaz['url'].'">'.$odkaz['text'].'</a><br />';
}

$zdroje = '';
if($odkazHtml !== ''){
	$zdroje = "<div class=\"event-text col s12\">
											  <ul class=\"collapsible\">
												<li>
												  <div class=\"collapsible-header\"><strong>Zdroje</strong></div>
												  <div class=\"collapsible-body\"><p>
													".$odkazHtml."
												</p></div>
												</li>
											  </ul>
											  </div>";
}

$komentarString = '';

$zdrojeHtml = $odkazHtml;
$zdrojePrvni = $zdrojeHtml;

foreach(get_post_meta($udalostId, 'tagy', true) as $tag){
	if($tag === 'Inkluze'){
		$tag = 'inkluze';
	}
	if($tag === 'Covid'){
		$tag = 'covid';
	}
	if($tag === 'Financování'){
		$tag = 'finance';
	}
	if($tag === 'Financování'){
		$tag = 'finance';
	}
	if($tag === 'Maturity'){
		$tag = 'maturity';
	}
	if($tag === 'Neformální vzdělávání'){
		$tag = 'neformalni';
	}
	if($tag === 'Nerovnosti ve vzdělávání'){
		$tag = 'nerovnosti';
	}
	if($tag === 'Technologie'){
		$tag = 'technologie';
	}
	if($tag === 'Učitelé pedagogičtí pracovníci'){
		$tag = 'ucitele';
	}
	if($tag === 'Mateřské školy'){
		$tag = 'materske';
	}
	if($tag === 'Základní školy'){
		$tag = 'zakladni';
	}
	if($tag === 'Střední školy'){
		$tag = 'stredni';
	}
	if($tag === 'Vysoké školy'){
		$tag = 'vysoke';
	}
	if($tag === 'Zákony'){
		$tag = 'legislativa';
	}

	$tags_string .= ' '.$tag;
	$tags_hashes .= ' #'.$tag;
	array_push($tagy,$tag);
}
?>   

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<strong><?php echo $datum; ?></strong><br />
			<h2 class="partners-heading">
				<?php echo $nazev; ?>
			</h2>
			<p>
				<?php echo $textovePole; ?>
			</p>
			<?php if($zdrojePrvni !== ''){?>
			<h3 style="color: rgb(41,182,126)">
				Zdroje
			</h3>
			<p>
				<?php echo $zdrojePrvni;?>
			</p>
			<?php } ?>
			<?php if($komentar !== ''){?>
			<h3 style="color: rgb(41,182,126)">
				Komentář
			</h3>
			<p>
				<?php echo $komentar;?>
			</p>
			<?php } ?>
			<p style="color: rgb(41,182,126)">
				<?php echo $tags_hashes; ?>
			</p>
		</div>
	</div>
</div>

<?php 
get_footer(); 
?>  
