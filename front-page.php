<?php
/**
 * 
 * Description: Displays a full-width front page. The front page template provides an optional
 * featured section that allows for highlighting a key message. It can contain up to 2 widget areas,
 * in one or two columns. These widget areas are dynamic so if only one widget is used, it will be
 * displayed in one column. If two are used, then they will be displayed over 2 columns.
 * There are also four front page only widgets displayed just beneath the two featrued widgets. Like the
 * featured widgets, they will be displayed in anywhere from one to four columns, depending on
 * how many widgets are active.
 * 
 * The front page template also displays EDD featured products and featured posts 
 * depending on the settings from Theme Customizer 
 *
 * @package Tatva
 * @since Tatva 1.0
 */
get_header();
?>
        <?php
        // Count how many banner sidebars are active so we can work out how many containers we need

        $featuredSidebars = 0;

        for ($x = 1; $x <= 2; $x++) {

            if (is_active_sidebar('home-featured' . $x)) {

                $featuredSidebars++;
            }
        }

        // If there's one or more one active sidebars, create a row and add them
        if ($featuredSidebars > 0) {
            ?>

        <div id="bannercontainer">

            <div class="banner row">
            <?php
            // Work out the container class name based on the number of active banner sidebars
            $containerClass = "grid_" . 12 / $featuredSidebars . "_of_12";

            // Display the active banner sidebars
            for ($x = 1; $x <= 2; $x++) {
                if (is_active_sidebar('home-featured' . $x)) {
                    ?>
                    <div id="<?php echo 'home-featured' . $x; ?>" class="col <?php echo $containerClass ?>">
                        <div class="widget-area" role="complementary">
                            <?php dynamic_sidebar('home-featured' . $x); ?>
                        </div> <!-- /.widget-area -->
                    </div> <!-- /.col.<?php echo $containerClass ?> -->
                <?php }
            }
            ?>
            </div> <!-- /.banner.row -->

        </div> <!-- /#bannercontainer -->
<?php } ?>

<?php
// display front page widgets
get_sidebar('front');

// Call template file to display featured products on front page
// This has been done in parts for better code organization. 
get_template_part('content', 'eddfront');

// Display featured posts on front page
get_template_part('content', 'frontposts');

get_footer();
?>