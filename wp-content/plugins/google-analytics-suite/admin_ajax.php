<?php
class AdminAjax{

function __construct(){
	add_action('wp_ajax_guess_adsense_id', array(&$this,"guess_adsense_id"));
}

 function  guess_adsense_id(){
 	$posts_array = get_posts(array( 
 	'numberposts'     => 20,
    'offset'          => 0,
    'orderby'         => 'post_date',
    'order'           => 'DESC',
    'post_type'       => '',
    'post_status'     => 'publish',
    'suppress_filters' => false ) ); 
    //google_ad_client.*?=.*?(?:"|')(.*?)(?:"|')
	$matches=array();
	foreach($posts_array as $post) : setup_postdata($post); 
		if (preg_match('/google_ad_client.*?=.*?(?:"|\')(.*?)(?:"|\')/i', get_the_content(), $matches)){
			die ($matches[1]);
		}
	
	endforeach;
	
	die();
}

}
?>