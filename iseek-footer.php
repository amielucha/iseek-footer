<?php
/*
 * Plugin Name: iSeek Footer
 * Plugin URI: http://iseek.ie/
 * Description: Adds "Website Crafted by iSeek" to the website's footer.
 * Version: 0.1
 * Author: Slawek Amielucha
 * Author URI: http://amielucha.com
 * Text Domain: iseek-footer
 */

// Print footer content
function iseek_print_footer() { ?>
	<svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
		<title>iSeek Logo</title>
		<style>
			.iseek-color { fill: <?php echo ( get_theme_mod( 'iseek_footer_logo_color' ) ) ? get_theme_mod( 'iseek_footer_logo_color' ) : '#0073aa' ?>; stroke: none; }
		</style>
		<defs>
			<symbol viewBox="0 0 156.8 62.4" id="iSeekLogo">
				<g class="iseek-color">
					<path d="M6.6,27.1c3.1,0,5.7-2.6,5.7-5.7c0-3.1-2.6-5.7-5.7-5.7c-3.1,0-5.7,2.6-5.7,5.7 C0.8,24.5,3.4,27.1,6.6,27.1z"/>
					<polygon points="1.9,61 1.9,61.8 10.9,61.8 10.9,56.5 10.9,32.8 1.9,32.8"/>
					<path d="M46.4,41.1c-1.8-2.9-5.1-4.6-8.9-5.7l-2.8-0.8c-1.9-0.6-4.9-1.6-4.9-4c0-2.4,2.7-3.5,4.7-3.5 c2.7,0,5.3,1.1,7.3,2.8l4.4-8.5c-3.8-2.1-9-3.5-13.2-3.5c-8.5,0-14.6,5.6-14.6,14.2c0,8.2,4.5,10,11.4,11.9c1.5,0.4,3.8,1,5.3,2.2 c0.8,0.7,1.4,1.5,1.4,2.6c0,3-2.7,4.3-5.3,4.3c-2.5,0-4.7-0.8-6.7-2.1c-1.1-0.7-2.1-1.4-3-2.3l-2.5,4.7l-2.2,4.1 c4.3,3,9.5,4.8,14.8,4.8c4.3,0,8.7-1.2,12-4c3.4-2.9,4.4-7.2,4.4-11.4C47.9,44.6,47.3,42.7,46.4,41.1z"/>
					<path d="M81.9,47.4c0-9.3-5-15.3-14.1-15.9c-0.5,0-0.8-0.1-1.3-0.1c-6,0-10.9,2.4-13.5,6.7 c-1.5,2.3-2.3,5.2-2.3,8.6c0,9.9,7.1,15.6,16.6,15.6c6.6,0,13-2.6,14.6-9.6h-9.8c-1.1,2-2.7,2.5-4.9,2.5c-4.2,0-6.4-2.5-6.4-6.5 h21V47.4z M61.1,41.8c0.6-2,3.1-4.5,6-4.5c2.7,0,5.3,2.5,5.8,4.5H61.1z"/>
					<path d="M100.8,31.5c-9.3,0-15.9,5.8-15.9,15.3c0,9.9,7.1,15.3,16.6,15.3c6.6,0,13-3.1,14.6-9.9h-9.8 c-1.1,1.9-2.7,2.6-4.9,2.6c-4.2,0-6.4-2.2-6.4-6.4h21.4v-1.1C116.5,37.6,110.8,31.5,100.8,31.5z M95.2,42.6c0.6-3,3.1-4.5,6-4.5 c2.7,0,5.3,1.8,5.8,4.5H95.2z"/>
					<path d="M141.5,45.7l14.4-13.3h-13.9l-10.6,10.4V16.3c-3.7,1.1-7.1,2.7-10.2,4.8v40.1h10.2V49.4l11.1,11.7h14.3 L141.5,45.7z"/>
				</g>
			</symbol>
		</defs>
	</svg>

	<style type="text/css">
		.iseek-footer-wrapper {
			padding: 1rem 0;
			font-size: small;
			text-align: center;
			background-color: <?php echo ( get_theme_mod( 'iseek_footer_background_color' ) ) ? get_theme_mod( 'iseek_footer_background_color' ) : 'inherit' ?>;
		}

		.iseek-footer-link {
			color: <?php echo ( get_theme_mod( 'iseek_footer_text_color' ) ) ? get_theme_mod( 'iseek_footer_text_color' ) : 'inherit' ?>;
		}

		.iseek-footer-svg {
			width: 4em;
			height: 2em;
			vertical-align: text-bottom;
		}
	</style>

	<div class="iseek-footer-wrapper">
		<div class="iseek-footer-container container">
			<?php printf( __('<a href="%1$s" title="%2$s" target="_blank" class="iseek-footer-link">%3$s <svg class="iseek-footer-svg" aria-label="iSeek"><use xlink:href="#iSeekLogo"></use></svg></a>', 'iseek-footer'), 'http://www.iseek.ie', 'Seek Internet Solutions, Fermoy, Cork, Ireland', 'Website Crafted by ' ); ?>
		</div>
	</div>
<?php }
add_action( 'wp_footer', 'iseek_print_footer' );

// Customizer Setup
function iseek_footer_customize($wp_customize) {

	// Add Customizer Section
	$wp_customize->add_section( 'iseek_footer_customizer_section', array(
	    'title'          => 'iSeek Footer',
	    'priority'       => 1250,
	) );

	// Add the setting
	$wp_customize->add_setting( 'iseek_footer_logo_color', array(
	    'default'        => '#0073aa',
	) );

	// Add the color picker
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iseek_footer_logo_color', array(
	    'label'   => 'Logo Colour',
	    'section' => 'iseek_footer_customizer_section',
	    'type'    => 'color',
	) ) );

	// Add the setting
	$wp_customize->add_setting( 'iseek_footer_text_color', array(
	    'default'        => '#0073aa',
	) );

	// Add the color picker
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iseek_footer_text_color', array(
	    'label'   => 'Text Colour',
	    'section' => 'iseek_footer_customizer_section',
	    'type'    => 'color',
	) ) );

	// Add the setting
	$wp_customize->add_setting( 'iseek_footer_background_color', array(
	    'default'        => '#0073aa',
	) );

	// Add the color picker
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iseek_footer_background_color', array(
	    'label'   => 'Background Colour',
	    'section' => 'iseek_footer_customizer_section',
	    'type'    => 'color',
	) ) );
}
add_action('customize_register', 'iseek_footer_customize');
