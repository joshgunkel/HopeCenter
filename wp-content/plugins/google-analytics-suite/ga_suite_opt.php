<?php
/*
 * This class contains all optoins and option pages!
 */
class GA_Suite_Opt{

function __construct(){
	require("admin_ajax.php");
	$admajx=new AdminAjax();
	add_action('admin_enqueue_scripts', array(&$this,'options_init'));
	add_action('admin_menu', array(&$this,'options_add_page'));
	add_action('admin_init', array(&$this,'plg_admin_init'));
    add_filter( 'plugin_action_links_' . GA_Suite_PLGBN , array(&$this, 'filter_plugin_actions') );
	/*__________________________________________________________________*/

}


	function plg_admin_init(){
		register_setting( "ga-suite-opt-grp", "gasuite-opt2719", array(&$this,'options_val'));
	}
	public static function e_val($opt){
		echo( (empty($opt)) ?  '' : htmlentities($opt));
		return ;
	}
	public static function is_checked($opt){
		echo ( empty($opt) ?  '': 'checked ');
		return ;
	}

	public static function is_selected($opt,$val){
		echo ( !empty($opt) && $opt==$val ?  '': 'selected="selected" ');
		return ;
	}

	// Init plugin options to white list our options
	function options_init($hook){

		
		if (isset($_GET['page']) && strtolower($_GET['page'])=='ga-suite-settings'){
		wp_register_style('gasuite-css', plugins_url("admin/style.css",__FILE__));
		wp_enqueue_style( 'gasuite-css');
	
		wp_register_style('gasuite-tabs-css', plugins_url("admin/tabs.css",__FILE__));
		wp_enqueue_style( 'gasuite-tabs-css');

		wp_register_script('gasuite-adm-helper', plugins_url("admin/helper.js",__FILE__));
		wp_enqueue_script( 'gasuite-adm-helper');


		wp_register_script( 'gasuite-tabs', plugins_url("admin/tabs.js",__FILE__));
		wp_enqueue_script(  'gasuite-tabs' );
		}
	}


	// Add menu page
	// 
	function options_add_page() {
		global $submenu;
		//add_menu_page('GA Suite', 'GA Suite', "manage_options", "ga-suite-slug-tld", array(&$this,'tld_page'));
		add_submenu_page("options-general.php", "GA Suite Settings", "GA Suite Settings", 'manage_options', "ga-suite-settings", array(&$this,'options_do_page'));
	   
	}

	function filter_plugin_actions($links) {

		$settings_link[0] = '<a href="' . admin_url("options-general.php?page=ga-suite-settings")  .'"><u>Settings</u></a>';

		$links = $settings_link + $links; // ... or after other links
	   return $links;
	}
	function tld_page(){

	}
	function options_do_page() {
		?>

	<div class="wrap">
		<style>
		#setting-error-settings_updated{display:none;}
		</style>
		<div style="background-color: #F7F7FF;border: 1px solid #DDDDDD;padding: 10px;">
			 <strong>Receive Free WordPress Plugin Recommendations and Business Tips:</strong><br />
			<form target="_blank" method="post" action="http://arevico.us2.list-manage1.com/subscribe/post?u=e23c318ca9665b7616c745ccb&id=b621dd3a4d" style="padding-top:5px;" id="arvsubsribe"><input name="EMAIL" type="text" value="<?php echo(get_bloginfo('admin_email')); ?>">
				<div class="tile" style="background:#1BA1E2;" style="float:left;margin-left:10px;" onclick="javascript:jQuery('#arvsubsribe').submit();">Subscribe</div></form>
			you can unsubcribe whenever you wish, we dont rent or sell your information.
    <div style="clear:both;"></div>
</div>
		<?php
			if (!empty($_GET['settings-updated'])){
				?>
				<br />
					<div style="background-color: #F7F7FF;
    border: 1px solid #DDDDDD;padding: 10px;"><b>Settings Updated Successfully!</b></div>
		<?php	}
		?>
		<form method="post" action="options.php">
    <?php settings_fields("ga-suite-opt-grp" ); 
     $o=GA_Shared_Opt::getOptions();
     ?>
		<br />
		<div style="overflow:auto;">
		
<div class="tabbed" style="height:300px;">
	<span class="sltabhead slactive">General</span><span class="sltabhead">Advanced</span>

	<div class="sltab" style="display:block;">
		
		<div class="labelleft">Account UA</div>
		<div class="optionright"><input name="gasuite-opt2719[id]" type="text" placeholder="UA-0000000-0" value="<?php self::e_val($o["id"]); ?>"/>
			<span class="tile" style="background:#1BA1E2;"><a target="_blank" href="http://arevico.com/how-to-get-the-google-analytics-id/" style="text-decoration:underline;color:white;"> authorize / find it</a> </span>
					<br /><br />Enter if Adsense and Analytics are linked.
		</div>
	<div class="cb"></div>
	<div class="labelleft">Adsense ID</div>

		<div class="optionright"> <input name="gasuite-opt2719[aid]" type="text" placeholder="pub-xxxxxxxxxxxxxxxx" value="<?php self::e_val($o["aid"]); ?>" />
			<span id="ttf" class="tile" style="background:#1BA1E2;"> try to find</span>
		<br />&nbsp;
		</div>
	<div class="cb"></div>	

	<div class="labelleft">What to track</div>

		<div class="optionright" style="padding: 5px 0;">
			<span class="chklbl"/><input name="gasuite-opt2719[pageview]" type="checkbox" value="1" <?php self::is_checked($o["pageview"]); ?>/> Pageviews</span>
			<span class="chklbl"><input name="gasuite-opt2719[outlink]" type="checkbox" value="1" <?php self::is_checked($o["outlink"]); ?>/> Outlinks</span>
			<span class="chklbl"><input name="gasuite-opt2719[download]" type="checkbox" value="1" <?php self::is_checked($o["download"]); ?>/> Downloads</span>
			<span class="chklbl"><input name="gasuite-opt2719[scroll]" type="checkbox" value="1" <?php self::is_checked($o["scroll"]); ?>/> Scroll Depth</span> <br />
 			<span class="chklbl"><input name="gasuite-opt2719[pagespeed]" type="checkbox" value="1" <?php self::is_checked($o["pagespeed"]); ?>/> Pagespeed</span>
 		</div>
	<div class="cb"></div>	
		<div class="labelleft">Who to track</div>

		<div class="optionright" style="padding: 5px 0;">
			<span class="chklbl"><input name="gasuite-opt2719[tadmin]" type="checkbox" <?php self::is_checked($o["tadmin"]); ?>/> Admins</span>
		</div>
		<div class="cb"></div>
	
	<div class="labelleft">Privacy settings</div>

		<div class="optionright" style="padding: 5px 0;">
			<span class="chklbl"><input name="gasuite-opt2719[tanon]" type="checkbox" <?php self::is_checked($o["tanon"]); ?>/> Anonymize IP</span>
			<span class="chklbl"><input name="gasuite-opt2719[dnt]" type="checkbox" <?php self::is_checked($o["dnt"]); ?>/> Respect do-not-track</span><br />
			
		</div>
	<div class="cb"></div>

	</div>
	

	<!-- Custom stuf-->
	

	<!-- Advanced stuf-->
	<div class="sltab">

		<div class="labelleft">Download extensions</div>
		<div class="optionright" style="padding: 5px 0;">
			<span class="chklbl"><input name="gasuite-opt2719[edownloads]" type="text" value="pdf,zip,rar,exe" /<?php self::e_val($o["edownloads"]); ?>></span><br />
		</div>
	<div class="cb"></div>
	

	</div>


</div>

<div style="width:600px;">
<div class="dsubmit">
	<input type="submit" class="msubmit" value="SAVE SETTINGS" /><div class="cb"></div>
</div>
</div>	

		</div>
	</form>

	</div>
	<?php
}

function options_val($input) {
	return $input;
}

}
?>