<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Tatva
 * @since Tatva 1.0
 */
?>
<?php if(is_active_sidebar('sidebar-main')) { ?>
	<div class="col grid_4_of_12">

		<div id="secondary" class="sidebar" role="complementary">
			<?php
			do_action( 'before_sidebar' );
                        
                        if (is_singular('download') || is_post_type_archive('download')) {
                            if (is_active_sidebar('sidebar-shop')) {
                                dynamic_sidebar('sidebar-shop');  
                            }
                        }

			if ( is_active_sidebar( 'sidebar-main' ) ) {
				dynamic_sidebar( 'sidebar-main' );
			}
			?>

		</div> <!-- /#secondary.widget-area -->

	</div> <!-- /.col.grid_4_of_12 -->
<?php } ?>
