<?php
/*
  /**
 * The main front page file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * 
 */
?>
<?php get_header(); ?>
<!--Start Contetn wrapper-->
<div class="grid_24 content_wrapper">
    <!--Start Content-->
    <div class="content">
        <div class="slider_wrapper">
            <div id="main" class="container">
        <?php
        
            global $wpdb;
            $mainblog = $wpdb->blogid;

            if ($mainblog == 1) {
            echo do_shortcode( '[metaslider id=345]' );
            }
            if ($mainblog == 2) {
            echo do_shortcode( '[metaslider id=230]' );
            }
            if ($mainblog == 4) {
	        echo do_shortcode( '[metaslider id=9]' );
            }
        ?>
            </div>
        </div>
        <!--Start Slider Wrapper-->
        <?php /*
        <div class="slider_wrapper">
            <div id="main" class="container">
                <?php if (inkthemes_get_option('inkthemes_featureimg') != '') { ?>
                    <img src="<?php echo inkthemes_get_option('inkthemes_featureimg'); ?>"/>
                <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/slideimg.jpg"/>
                <?php } ?>

            </div>
            <div class="slider_shadow"></div>
        </div>
              */ ?>
        <!--End Slider wrapper-->
        <div class="clear"></div>
        <!--Start Feature content-->
        <div class="feature_content">
            <div class="one_third_long">
            <?php

                if ($mainblog == 4) {
	            	echo '<h2>Hours and Location</h2>';
					echo '<p>3027 Prospect Ave.<br>Kansas City, MO 64128</p>';
					echo '<p>Phone: 816-861-6500<br>Fax: 816-861-6503</p>';
					echo '<p>Monday - Tuesday: 8:30AM - 6:00PM<br>Wednesday - Friday: 8:30AM - 5:00PM<br>Second Saturdays: 8:30AM - 12:00PM</p>';
					echo '<h2>For Appointments Call:</h2>';
					echo '<p>816-861-6500 ext 1</p>';
					echo '<p><a href="http://hfcckc.org/subsidy-calculator/">Check your eligibility to receive tax credits to buy health insurance</a></p>';
                }
                announcements_html();
/*                 echo '<br>'; */
                events_html();
			?>
            </div>
            <div class="one_third">
                <div class="wrap">
                    <h2>
                        <?php if (inkthemes_get_option('inkthemes_headline1') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_headline1')); ?>
                        <?php } else { ?>
                            <?php _e('Four Different Skins', 'themia'); ?>
                        <?php } ?>
                    </h2>
                    <?php if (inkthemes_get_option('inkthemes_img1') != '') { ?>
                        <a href="<?php echo inkthemes_get_option('inkthemes_link1'); ?>" > <img src="<?php echo inkthemes_get_option('inkthemes_img1'); ?>" alt="feature image"/></a>
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/featureimg-1.png"/>
                    <?php } ?>
                    <p>
                        <?php if (inkthemes_get_option('inkthemes_feature1') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_feature1')); ?>
                        <?php } else { ?>
                            <?php _e('Our affiliate program pays out some of the biggest commissions available in the  mium WordPress', 'themia'); ?>
                        <?php } ?>
                    </p>
                    <a href="<?php echo inkthemes_get_option('inkthemes_link1'); ?>" class="read_more"><?php _e('read more.....', 'themia'); ?></a> </div>
            </div>
            <div class="one_third last">
                <div class="wrap">
                    <h2>
                        <?php if (inkthemes_get_option('inkthemes_headline2') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_headline2')); ?>
                        <?php } else { ?>
                            <?php _e('Amazing Shortcodes', 'themia'); ?>
                        <?php } ?>
                    </h2>
                    <?php if (inkthemes_get_option('inkthemes_img2') != '') { ?>
                        <a href="<?php echo inkthemes_get_option('inkthemes_link2'); ?>" ><img src="<?php echo inkthemes_get_option('inkthemes_img2'); ?>" alt="feature image"/></a>
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/featureimg-2.png"/>
                    <?php } ?>
                    <p>
                        <?php if (inkthemes_get_option('inkthemes_feature2') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_feature2')); ?>
                        <?php } else { ?>
                            <?php _e('Our affiliate program pays out some of the biggest commissions available in the  mium WordPress.', 'themia'); ?>
                        <?php } ?>
                    </p>
                    <a href="<?php echo inkthemes_get_option('inkthemes_link2'); ?>" class="read_more"><?php _e('read more.....', 'themia'); ?></a> </div>
            </div>
            <div class="one_third">
                <div class="wrap">
                    <h2>
                        <?php if (inkthemes_get_option('inkthemes_headline3') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_headline3')); ?>
                        <?php } else { ?>
                            <?php _e('Full Localisation Support', 'themia'); ?>
                        <?php } ?>
                    </h2>
                    <?php if (inkthemes_get_option('inkthemes_img3') != '') { ?>
                        <a href="<?php echo inkthemes_get_option('inkthemes_link3'); ?>" ><img src="<?php echo inkthemes_get_option('inkthemes_img3'); ?>" alt="feature image"/></a>
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/featureimg-3.png"/>
                    <?php } ?>
                    <p>
                        <?php if (inkthemes_get_option('inkthemes_feature3') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_feature3')); ?>
                        <?php } else { ?>
                            <?php _e('Our affiliate program pays out some of the biggest commissions available in the  mium WordPress.', 'themia'); ?>
                        <?php } ?>
                    </p>
                    <a href="<?php echo inkthemes_get_option('inkthemes_link3'); ?>" class="read_more"><?php _e('read more.....', 'themia'); ?></a> </div>
            </div>
            <div class="one_third last">
                <div class="wrap">
                    <h2>
                        <?php if (inkthemes_get_option('inkthemes_headline4') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_headline4')); ?>
                        <?php } else { ?>
                            <?php _e('Full Localisation Support', 'themia'); ?>
                        <?php } ?>
                    </h2>
                    <?php if (inkthemes_get_option('inkthemes_img4') != '') { ?>
                        <a href="<?php echo inkthemes_get_option('inkthemes_link4'); ?>" ><img src="<?php echo inkthemes_get_option('inkthemes_img4'); ?>" alt="feature image"/></a>
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/featureimg-4.png"/>
                    <?php } ?>
                    <p>
                        <?php if (inkthemes_get_option('inkthemes_feature4') != '') { ?>
                            <?php echo stripslashes(inkthemes_get_option('inkthemes_feature4')); ?>
                        <?php } else { ?>
                            <?php _e('Our affiliate program pays out some of the biggest commissions available in the  mium WordPress.', 'themia'); ?>
                        <?php } ?>
                    </p>
                    <a href="<?php echo inkthemes_get_option('inkthemes_link4'); ?>" class="read_more"><?php _e('read more.....', 'themia'); ?></a> </div>
            </div>
	    <div class="two_third last">
                        <?php if (inkthemes_get_option('inkthemes_img99') != '') { ?>
                        <img src="<?php echo inkthemes_get_option('inkthemes_img99'); ?>" width="600" height="381" alt="feature image"/>
                        <?php } ?>
    			<?php if (inkthemes_get_option('inkthemes_video') != '') { ?>
				</br><iframe src="http://player.vimeo.com/video/<?php echo inkthemes_get_option('inkthemes_video'); ?>?byline=0&amp;portrait=0" width="600" height="381" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			<?php } ?>
			<br>
            <!-- <iframe frameborder="0" src="http://kff.org/wp-content/themes/vip/kff/static/subsidy-calculator-widget.html" width="100%" height="1000"></iframe> -->
            </div>
        </div>
        <div class="clear"></div>
        <!--End Feature content-->
    </div>
    <!--End Content-->
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<!--End Container-->
<!--Start Testimonial bg-->
<!--End Testimonial bg-->
<?php get_footer(); ?>
