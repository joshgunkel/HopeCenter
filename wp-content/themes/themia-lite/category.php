<?php
/**
 * The template for displaying Category Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
?>
<?php get_header(); ?>
<!--Start Contetn wrapper-->
<div class="grid_24 content_wrapper">
    <div class="grid_15 alpha">
        <!--Start side content-->
        <div class="side_content">
            <h1><?php printf(__('%s', 'themia'), '' . single_cat_title('', false) . ''); ?></h1>
            <?php get_template_part('loop', 'index'); ?>
<?php inkthemes_pagination(); ?>
        </div>
        <!--End side content-->
    </div>
<?php get_sidebar(); ?>
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<?php get_footer(); ?>
