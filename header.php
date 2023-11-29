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

		<div id="top-cart" class="top-cart">
			<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>">
				<i class="fas fa-shopping-cart"><span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span> </i>
				
				<?php
					$total_price = WC()->cart->get_cart_total(); ?>
					<span><?php echo $total_price; ?></span>
						
			</a>
		</div>

	</div>
</header>