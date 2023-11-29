<?php
/**
 * The template for displaying ads products on home page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 2,
    'product_cat' => 'ads',
    'orderby' => 'date',
    'order' => 'DESC',
);
$ads = new WP_Query($args);

if ($ads->have_posts()) {
    ?>
    <div class="product_ads-container">
        <?php while ($ads->have_posts()) {
            $ads->the_post(); ?>
            <div class="product_ads-item">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
                <div class="product_ads-item-content">
                    <div class="title"><?php the_title(); ?></div>
                    <div class="description">
                        Started now shortly had for assured hearing expense led juvenile.
                    </div>
                    <span>shop now</span>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
}
wp_reset_postdata();
