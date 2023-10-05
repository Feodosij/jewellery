<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jewellery
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-widget-area">
			<div class="footer-widget">
				<?php dynamic_sidebar('Footer-sidebar-info'); ?>
			</div>
			<div class="footer-widget">
				<?php dynamic_sidebar('Footer-sidebar-posts'); ?>
			</div>
			<div class="footer-widget">
				<?php dynamic_sidebar('Footer-sidebar-ourstores'); ?>
			</div>
			<div class="footer-widget">
				<?php dynamic_sidebar('Footer-sidebar-links'); ?>
			</div>
		</div>

	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
