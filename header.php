<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jewellery
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="main_header">
	<div class="header_wrapper">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link" rel="home">
			<?php
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
				if (has_custom_logo()) {
				echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
				} else {
				echo get_bloginfo('name');
				}
			?>
		</a>

		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-header',
					'menu_id'        => 'header-menu',
					'menu_class'     => 'menu_list',
				)
			);
		?>

		<div class="woocommerce-login-register">
			<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'login' ) ); ?>" class="woocommerce-login-link"><?php esc_html_e( 'Login', 'woocommerce' ); ?></a>
			<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'register' ) ); ?>" class="woocommerce-register-link"><?php esc_html_e( 'Register', 'woocommerce' ); ?></a>
		</div>
	</div>
</header>