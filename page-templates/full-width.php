<?php
/**
 * Template Name: Full Width
 *
 * Description: Displays a full-width page, with no sidebar. This template is great for pages
 * containing large amounts of content.
 *
 * @package Tatva
 * @since Tatva 1.0
 */

get_header(); ?>

<div id="maincontentcontainer">

	<div id="primary" class="site-content row" role="main">
		<div class="col grid_12_of_12">
                    <div class="main-content">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>

			<?php endif; // end have_posts() check ?>
                        
                    </div> <!-- /.main-content -->
		</div> <!-- /.col.grid_12_of_12 -->
	</div><!-- /#primary.site-content.row -->
</div> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>
