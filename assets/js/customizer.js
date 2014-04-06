/**
 * Twenty Fourteen Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
        wp.customize( 'tatva_edd_store_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.tatva-store-button a' ).text( to );
		} );
	} );
        wp.customize( 'tatva_edd_store_archives_title', function( value ) {
		value.bind( function( to ) {
			$( '.edd-store-info h2' ).text( to );
		} );
	} );
         wp.customize( 'tatva_edd_store_archives_description', function( value ) {
		value.bind( function( to ) {
			$( '.store-description' ).text( to );
		} );
	} );
        wp.customize( 'tatva_edd_front_featured_title', function( value ) {
		value.bind( function( to ) {
			$( '.featured-edd-title' ).text( to );
		} );
	} );
        wp.customize( 'tatva_front_featured_posts_title', function( value ) {
		value.bind( function( to ) {
			$( '.featured-section-title' ).text( to );
		} );
	} );
        wp.customize( 'tatva_front_featured_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.feature-more-link' ).text( to );
		} );
	} );
        
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title,  .site-description' ).css( {
					'clip': 'auto',
					'position': 'static'
				} );

				$( '.site-title a' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );