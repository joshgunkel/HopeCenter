<?php
/*
   Plugin Name: Google Analytics Suite
   Plugin URI: http://wordpress.org/extend/plugins/google-analytics-suite/
   Description:  Easily gather actionable and decision-enabling data: with the check of a box.
   Version: 1.1
   Author: Arevico
   Author URI: http://wordpress.org/extend/plugins/google-analytics-suite/
   Copyright: 2012, Arevico
*/


/** define the plugin basename*/
define("GA_Suite_PLGBN", plugin_basename(__FILE__));

/** These functions should be globally accessible*/
class GA_Shared_Opt{

  /* Retrieve option set*/
    public static function getOptions(){
    $defaults=array();
    return get_option("gasuite-opt2719",$defaults);
  }

}

class GA_Suite_Main {

function __construct(){
	if (is_admin()){
		require('ga_suite_opt.php');
		$ga_opt = new GA_Suite_Opt();
	
	} 
        $options=GA_Shared_Opt::getOptions();
  if (!is_admin() || (is_admin() && !empty($options['tadmin'])) ){
    add_action('wp_enqueue_scripts', array(&$this,'add_scripts_frontend'));
    }
  }
	function add_scripts_frontend() {
      $options=GA_Shared_Opt::getOptions();
    	wp_enqueue_script( 'jquery' );
    	wp_register_script( 'arevico-ga-suite', plugins_url('js/tracker.js',__FILE__));
    	wp_enqueue_script( 'arevico-ga-suite' );

      //prepare edownloads
      if (!empty($options['edownloads'])){$options['edownloads']=explode(',', $options['edownloads']);}
      //prepared

      wp_localize_script('arevico-ga-suite','ga_suite_opt',$options);
    }    
 	

}

//lets do everything we need to do
$new_gasuitemaindo13213=new GA_Suite_Main();
?>
