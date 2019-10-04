<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$main_navigation_active = wp_rig()->is_primary_nav_menu_active() || wp_rig()->is_social_nav_menu_active();

if ( $main_navigation_active && wp_rig()->is_amp() ) {
	?>
	<amp-state id="siteNavigationMenu">
		<script type="application/json">
			{
				"expanded": false
			}
		</script>
	</amp-state>
	<?php
}
?>
<div id="site-headerbar" class="site-headerbar nav--toggle-sub nav--toggle-small"
	<?php
	if ( $main_navigation_active && wp_rig()->is_amp() ) {
		?>
		[class]=" siteNavigationMenu.expanded ? 'site-headerbar nav--toggle-sub nav--toggle-small nav--toggled-on' : 'site-headerbar nav--toggle-sub nav--toggle-small' "
		<?php
	}
	?>
>
	<?php
	if ( $main_navigation_active ) {
		?>
		<button class="menu-toggle" aria-controls="site-sidebar" aria-expanded="false"
			<?php
			if ( wp_rig()->is_amp() ) {
				?>
				on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } ), site-sidebar.toggle"
				[aria-expanded]="siteNavigationMenu.expanded ? 'true' : 'false'"
				<?php
			}
			?>
		>
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

	if ( $main_navigation_active && ! wp_rig()->is_amp() ) {
		get_template_part( 'template-parts/header/main_navigation' );
	}
	?>
</div>

<?php
if ( $main_navigation_active && wp_rig()->is_amp() ) {
	?>
	<amp-sidebar id="site-sidebar" class="site-sidebar" layout="nodisplay" side="left" on="sidebarClose:AMP.setState( { siteNavigationMenu: { expanded: false } } )" data-close-button-aria-label="<?php esc_attr_e( 'Close Menu', 'wp-rig' ); ?>">
		<?php get_template_part( 'template-parts/header/main_navigation' ); ?>
	</amp-sidebar>
	<?php
}
