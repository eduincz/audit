<?php  
$udalostId = htmlspecialchars($_GET['udalost_id']); 
$nazev = get_post_meta( $udalostId, 'nazev', true ); 
var_dump($udalostId);
var_dump($nazev);   
?>   

<?php 
get_footer(); 
?>  
