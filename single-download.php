<?php
/**
 * The Template for displaying all single downloads - EDD.
 *
 * @package Tatva
 * @since Tatva 1.0
 */

get_header(); ?>

<div id="maincontentcontainer">

	<div id="primary" class="site-content row" role="main">

			<div class="col grid_8_of_12">

                            <div class="main-content">
                                
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                            
                                            <div class="product-content">
                                                  <h1 class="entry-title"><?php the_title(); ?></h1>

                                                    <?php the_post_thumbnail('product-image-large'); ?>
                                                    <?php the_content(); ?>
                                                  
                                            </div> <!-- /.product-content -->

                                            <footer class="product-meta">   
                                                    <div class="product-categories">
                                                            <?php the_terms( $post->ID, 'download_category', '<span class="product-categories-title">Categories:</span> ', ', ', '' ); ?>
                                                    </div><!--end product-categories-->
								
                                                    <div class="product-tags">
                                                            <?php the_terms( $post->ID, 'download_tag', '<span class="product-tags-title">Tags:</span> ', ', ', '' ); ?>
                                                    </div><!--end .product-tags-->
                                                   
                                            </footer> <!-- /.product-meta -->
                                        </article> <!-- /#post -->

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template( '', true );
					}
					?>

					<?php tatva_content_nav( 'nav-below' ); ?>

				<?php endwhile; // end of the loop. ?>
                                
                            </div> <!-- /.main-content -->

			</div> <!-- /.col.grid_8_of_12 -->
			<?php get_sidebar(); ?>

	</div> <!-- /#primary.site-content.row -->

</div> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>
