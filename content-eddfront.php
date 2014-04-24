<?php
/**
 * The template for displaying EDD featured products on Front Page 
 *
 * @package Tatva
 * @since Tatva 1.0
 */
?>

<?php
// check if EDD is active

if (class_exists('Easy_Digital_Downloads')) {

    // check if user has enabled featured products for front page
    if (get_theme_mod('tatva_edd_front_featured_products')) {
        ?>

        <div id="maincontentcontainer">

            <div id="primary" class="site-content row" role="main">

                <div class="col grid_12_of_12">
                        <?php if (get_theme_mod('tatva_edd_front_featured_title')) : ?>
                        <h3 class="featured-edd-title">
                        <?php echo get_theme_mod('tatva_edd_front_featured_title'); ?>
                        </h3>   
                    <?php endif; ?>

                    <?php
                    $per_page = intval(get_theme_mod('tatva_edd_store_front_count'));
                    $product_args = array(
                        'post_type' => 'download',
                        'posts_per_page' => $per_page,
                    );
                    $products = new WP_Query($product_args);
                    ?>
                    <?php if ($products->have_posts()) : $i = 1; ?>
            <?php while ($products->have_posts()) : $products->the_post(); ?>
                            <div class="col grid_4_of_12 home-product">
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="home-product-title"><?php the_title(); ?></h3>
                                </a>
                                <div class="product-image">
                                    <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('product-image-thumb'); ?>
                                    </a>
                                    <div class="home-product-info">
                                            <?php if (function_exists('edd_price')) { ?>
                                            <div class="product-buttons">
                                                
                                                <a href="<?php the_permalink(); ?>" class="product-details-link"><?php _e('View Details','tatva'); ?></a>
                                            </div><!--end .product-buttons-->
                <?php } ?>
                                    </div> <!--end .home-product-info -->
                                </div> <!--end .product-image -->
                            </div><!--end .product-->
                            <?php $i+=1; ?>
                        <?php endwhile; ?>
        <?php else : ?>

                        <h2 class="center"><?php esc_html_e('Not Found', 'tatva'); ?></h2>
                        <p class="center"><?php esc_html_e('Sorry, but you are looking for something that is not here', 'tatva'); ?></p>
                        <?php get_search_form(); ?>

        <?php endif; ?>

                </div> <!-- /.col.grid_12_of_12 -->

                <p class="tatva-store-button"><a class="cta-button" href="<?php echo esc_url(get_theme_mod('tatva_edd_store_link_url')); ?>"><?php echo get_theme_mod('tatva_edd_store_link_text'); ?></a></p>

            </div><!-- /#primary.site-content.row -->

        </div><!-- /#maincontentcontainer -->

    <?php } // end featured products on front page check  ?>

<?php } // end EDD Check   ?> 