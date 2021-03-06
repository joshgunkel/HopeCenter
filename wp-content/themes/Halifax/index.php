<?php get_header(); ?>

<div id="slider" class="sixteen columns">
<div class="flexslider">
	<ul class="slides">
	   			<?php $count = of_get_option('w2f_slide_number');
				$slidecat =of_get_option('w2f_slide_categories');
				$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
	           	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();	?>
	 	
		 		<li>
		 			
				<?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 940, 400, true ); //resize & crop the image
				?>
				
				<?php if($image) : ?>
					<a href="<?php the_permalink(); ?>"><img class="slide-image" src="<?php echo $image ?>"/></a>
				<?php endif; ?>
		 			
		 			
				
				
		<?php endwhile; endif; ?>

    		
	  </li>
	</ul>
</div>	
</div>	
<div class="clear"></div>		
	
	
	
<div id="full-content" class=" cf">

<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="one-third column mason" id="post-<?php the_ID(); ?>">
	<div class="tenpad">
			<?php
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
				$image = aq_resize( $img_url, 460, 0, true ); //resize & crop the image
			?>
			
		 <?php if($image) : ?>	<a href="<?php the_permalink(); ?>"><img class="scale-with-grid" src="<?php echo $image ?>"/></a>	<?php endif; ?>
	
		 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?>	</a></h2>
	
		<?php wpe_excerpt('wpe_excerptlength_index', 'wpe_excerptmore'); ?>

		<div class="masonmeta">
			<span class="comments-link">  <?php comments_popup_link( __( 'Leave a comment', 'Fabthemes.com' ), __( '1 Comment', 'Fabthemes.com' ), __( '% Comments', 'Fabthemes.com' ) ); ?></span>
			<span class="smore"> <a href="<?php the_permalink() ?>"> Read More </a> </span>
		</div>
	</div>
</div> <!-- post end -->

<?php endwhile; ?>

</div>

	<?php getpagenavi(); ?>
	
<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

	<h1 class="entry-title"><?php _e( 'Nothing Found', '_s' ); ?></h1>
	<?php if ( is_home() ) { ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', '_s' ), admin_url( 'post-new.php' ) ); ?></p>

		<?php } elseif ( is_search() ) { ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '_s' ); ?></p>
			<?php get_search_form(); ?>

		<?php } else { ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '_s' ); ?></p>
			<?php get_search_form(); ?>

		<?php } ?>


<?php endif; ?>





<?php get_footer(); ?>
