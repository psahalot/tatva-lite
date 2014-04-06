<?php
/**
 *
 * 
 * A custom template for displaying EDD category archive 
 * grid format.
 * 
 */
get_header();
?>

<div id="maincontentcontainer">

    <div id="primary" class="site-content row" role="main">

        <div class="col grid_12_of_12">

            <div class="main-content">


                <?php if (have_posts()) : $i = 1; ?>
                    <header class="archive-header">
                        <h1 class="archive-title"><?php printf(esc_html__('Product Category Archives: %s', 'tatva'), '<span class="cat-archive">' . single_cat_title('', false) . '</span>'); ?></h1>

                        <?php if (category_description()) { // Show an optional category description ?>
                            <div class="archive-meta"><?php echo category_description(); ?></div>
                        <?php } ?>
                    </header>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col grid_4_of_12 store-product">
                            <a href="<?php the_permalink(); ?>">
                                <h2 class="title"><?php the_title(); ?></h2>
                            </a>
                            <div class="product-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('product-image'); ?>
                                </a>
                                <?php if (function_exists('edd_price')) { ?>
                                    <div class="product-price">
                                        <?php
                                        if (edd_has_variable_prices(get_the_ID())) {
                                            // if the download has variable prices, show the first one as a starting price
                                            echo 'Starting at: ';
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
                                        <?php echo edd_get_purchase_link(get_the_ID(), 'Add to Cart', 'button'); ?>
            <?php } ?>
                                    <a href="<?php the_permalink(); ?>">View Details</a>
                                </div><!--end .product-buttons-->
                        <?php } ?>
                        </div><!--end .product-->
                        <?php $i+=1; ?>
    <?php endwhile; ?>

                    <div class="pagination">
                        <?php
                        global $wp_query;

                        $big = 999999999; // need an unlikely intege					
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $wp_query->max_num_pages
                        ));
                        ?>
                    </div>
<?php else : ?>

                    <h2 class="center"><?php esc_html_e('Not Found', 'tatva'); ?></h2>
                    <p class="center"><?php esc_html_e('Sorry, but you are looking for something that is not here', 'tatva'); ?></p>
                    <?php get_search_form(); ?>

<?php endif; ?>
            </div><!--end .main-content-->
        </div> <!-- end .grid-12 -->
    </div> <!-- /#primary -->
</div><!--end #maincontentcontainer-->

<?php get_footer(); ?>