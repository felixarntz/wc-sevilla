<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$main_navigation_active = wp_rig()->is_primary_nav_menu_active() || wp_rig()->is_social_nav_menu_active();

?>
<div id="site-headerbar" class="site-headerbar nav--toggle-sub nav--toggle-small">
	<?php
	if ( $main_navigation_active ) {
		?>
		<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false">
			<?php
			echo wp_rig()->get_svg_icon( 'bars', [ 'title' => __( 'Open Menu', 'wp-rig' ) ] ); // phpcs:ignore WordPress.Security.EscapeOutput
			echo wp_rig()->get_svg_icon( 'close', [ 'title' => __( 'Close Menu', 'wp-rig' ) ] ); // phpcs:ignore WordPress.Security.EscapeOutput
			?>
		</button>
		<?php
	}

	if ( ! has_header_image() || ! is_front_page() ) {
		get_template_part( 'template-parts/header/branding' );
	}

	if ( $main_navigation_active ) {
		get_template_part( 'template-parts/header/main_navigation' );
	}
	?>
</div>
