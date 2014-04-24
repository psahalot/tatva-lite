<?php
/**
 * Template Name: Store
 * 
 * A custom template for setting up EDD store page and 
 * displaying products in grid format.
 * 
 */
get_header();
?>

<div id="maincontentcontainer">

    <div id="primary" class="site-content row" role="main">

        <div class="col grid_12_of_12">

            <div class="main-content">
                <?php if (get_theme_mod('tatva_edd_store_archives_title') || get_theme_mod('tatva_edd_store_archives_description')) : ?>
                    <div class="edd-store-info">
                        <?php if (get_theme_mod('tatva_edd_store_archives_title')) : ?>
                            <h2 class="store-title"><?php echo get_theme_mod('tatva_edd_store_archives_title'); ?></h2>
                        <?php endif; ?>
                        <?php if (get_theme_mod('tatva_edd_store_archives_description')) : ?>
                            <div class="store-description">
                                <?php echo wpautop(get_theme_mod('tatva_edd_store_archives_description')); ?>
                            </div>
                        <?php endif; ?>
                    </div> <!-- /.edd-store-info -->
                <?php endif; ?>
                <div class="product-grid row">
                    <div class="grid_12_of_12 product-listings">
                        <?php
                        $current_page = get_query_var('paged');
                        $per_page = get_theme_mod('tatva_store_archive_count');
                        $offset = $current_page > 0 ? $per_page * ($current_page - 1) : 0;
                        $product_args = array(
                            'post_type' => 'download',
                            'posts_per_page' => $per_page,
                            'offset' => $offset
                        );
                        $products = new WP_Query($product_args);
                        ?>
                        <?php if ($products->have_posts()) : $i = 1; ?>
                            <?php while ($products->have_posts()) : $products->the_post(); ?>
                                <div class="col grid_4_of_12 store-product">
                                    <a href="<?php the_permalink(); ?>">
                                        <h2 class="title"><?php the_title(); ?></h2>
                                    </a>
                                    <div class="product-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('product-image-thumb'); ?>
                                        </a>
                                        <?php if (function_exists('edd_price')) { ?>
                                            <div class="product-price">
                                                <?php
                                                if (edd_has_variable_prices(get_the_ID())) {
                                                    // if the download has variable prices, show the first one as a starting price
                                                    _e('Starting at: ','tatva');
                                                    edd_price(get_the_ID());
                                                } else {
                                                    edd_price(get_the_ID());
                                                }
                                                ?>
                                            </div><!--end .product-price-->
                                        <?php } ?>
                                    </div>
                                    <?php if (function_exists('edd_price')) { ?>
                                        <div class="product-buttons">
                                            <?php if (!edd_has_variable_prices(get_the_ID())) { ?>
                                                <?php echo edd_get_purchase_link(get_the_ID(), __('Add to Cart','tatva'), 'button'); ?>
                                            <?php } ?>
                                            <a href="<?php the_permalink(); ?>">View Details</a>
                                        </div><!--end .product-buttons-->
                                    <?php } ?>
                                </div><!--end .product-->
                                <?php $i+=1; ?>
                            <?php endwhile; ?>


                        <?php else : ?>

                            <h2 class="center"><?php esc_html_e( 'Nothing Found', 'tatva' ); ?></h2>
                            <p class="center"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tatva' ); ?></p>
                            <?php get_search_form(); ?>

                        <?php endif; ?>
                    </div> <!-- end .product-grid -->

                </div> <!-- end .product-listings -->
            </div><!--end .main-content-->
            <div class="pagination">
                <?php
                $big = 999999999; // need an unlikely intege					
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $products->max_num_pages
                ));
                ?>
            </div><!-- end .pagination-->
        </div> <!-- end .grid-12 -->

    </div> <!-- /#primary -->
</div><!--end #maincontentcontainer-->

<?php get_footer(); ?>