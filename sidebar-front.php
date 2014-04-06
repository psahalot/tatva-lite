<?php
/**
 * The sidebar containing the front page widget areas.
 * If there are no active widgets, the sidebar will be hidden completely.
 *
 * @package Tatva
 * @since Tatva 1.0
 */
?>
	<?php
	// Count how many front page sidebars are active so we can work out how many containers we need
	$homepageSidebars = 0;
	for ( $x=1; $x<=4; $x++ ) {
		if ( is_active_sidebar( 'sidebar-homepage' . $x ) ) {
			$homepageSidebars++;
		}
	}

	// If there's one or more one active sidebars, create a row and add them
	if ( $homepageSidebars > 0 ) { ?>
        <div id="home-sidebar-container">
		<div id="secondary" class="home-sidebar row">
			<?php
			// Work out the container class name based on the number of active front page sidebars
			$containerClass = "grid_" . 12 / $homepageSidebars . "_of_12";

			// Display the active front page sidebars
			for ( $x=1; $x<=4; $x++ ) {
				if ( is_active_sidebar( 'sidebar-homepage'.  $x ) ) { ?>
					<div id="<?php echo 'home-widget'.$x; ?>" class="col <?php echo $containerClass?>">
						<div class="home-widgets" role="complementary">
							<?php dynamic_sidebar( 'sidebar-homepage'.  $x ); ?>
						</div> <!-- #widget-area -->
					</div> <!-- /.col.<?php echo $containerClass?> -->
				<?php }
			} ?>
		</div> <!-- /#secondary.row -->
        </div> <!-- /#home-sidebar-container -->

	<?php } ?>
        <?php 
        // check if home page testimonial sidebar is active
        
        if (is_active_sidebar('homepage-testimonial')) { ?>
        
        <div id="home-testimonial-container">
                <div id="home-testimonial" class="home-testimonial-widget row">
                        <div class="home-testi-widget col grid_12_of_12" role="complementary" >
                            <?php dynamic_sidebar ('homepage-testimonial'); ?>
                        </div> <!-- /.widget-area -->
                </div> <!-- /.home-testimonial -->
        </div> <!-- /#home-testimonial-container -->
            
        <?php } ?>
        
        <?php 
        // check if home page CTA sidebar is active
        
        if (is_active_sidebar('homepage-cta')) { ?>
        <div id="home-cta-container">
                <div id="home-cta" class="row">
                        <div class="home-cta-widget col grid_12_of_12" role="complementary" >
                            <?php dynamic_sidebar ('homepage-cta'); ?>
                        </div> <!-- /.home-cta-widget -->
                </div> <!-- /#home-cta -->
        </div> <!-- /#home-cta-container -->
            
        <?php } ?>
