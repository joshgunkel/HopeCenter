<?php

include_once get_template_directory() . '/functions/inkthemes-functions.php';
$functions_path = get_template_directory() . '/functions/';
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces (options,framework, seo)
/* These files build out the theme specific options and associated functions. */
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings

function inkthemes_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('inkthemes_ddsmoothmenu', get_template_directory_uri() . "/js/ddsmoothmenu.js", array('jquery'));
        wp_enqueue_script('inkthemes_tipsy', get_template_directory_uri() . '/js/jquery.tipsy.js', array('jquery'));
        wp_enqueue_script('inkthemes_ddsmoothmenuinit', get_template_directory_uri() . "/js/custom.js", array('jquery'));
    } elseif (is_admin()) {
        
    }
}

add_action('wp_enqueue_scripts', 'inkthemes_wp_enqueue_scripts');

function inkthemes_get_option($name) {
    $options = get_option('inkthemes_options');
    if (isset($options[$name]))
        return $options[$name];
}

function inkthemes_update_option($name, $value) {
    $options = get_option('inkthemes_options');
    $options[$name] = $value;
    return update_option('inkthemes_options', $options);
}

function inkthemes_delete_option($name) {
    $options = get_option('inkthemes_options');
    unset($options[$name]);
    return update_option('inkthemes_options', $options);
}

//Enqueue comment thread js
function inkthemes_enqueue_comment_reply() {
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'inkthemes_enqueue_comment_reply');

function announcements_html() {
    global $wp_query, $post;
    
    echo '<div id="announcements_div" style="width:273px;">';
	
	$temp_query = $wp_query;
	$wp_query = null;
    
    // Create a new filtering function that will add our where clause to the query
    function filter_where( $where = '' ) {
        // posts in the last 30 days
        $where .= " AND post_date > '" . date('Y-m-d', strtotime('-7 days')) . "'";
        return $where;
    }
    
    add_filter( 'posts_where', 'filter_where' );
	$wp_query = new WP_Query(array
		(								
		 'category_name'=>'announcements',
		 ) );
    remove_filter( 'posts_where', 'filter_where' );    
	
	if( $wp_query->have_posts() ) {
        echo '<h2>Announcements</h2>';
		while ($wp_query->have_posts()) {
			the_post();
            echo '<font class="header1"><a href="'.get_permalink().'">'.get_the_title().'</a></font><br>';
            $excerpt = get_the_excerpt();
            if( strlen($excerpt) > 125 )
                $excerpt = substr($excerpt, 0, 120).' [...]';
            echo $excerpt.'<br><br>';
		}
	}
	$wp_query = null; $wp_query = $temp_query ; wp_reset_query();
    
    echo '</div>';
}

function events_html() {
    if (class_exists('EM_Events')) {
        echo '<h2>Events</h2>';
		//echo EM_Events::output( array('limit'=>5,'orderby'=>'name') );
		echo EM_Events::output( array('limit'=>5) );
    }
}

/*
function hours_html() {
	echo '<p>Hours and Location</p>'
}
*/
/*function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
*/