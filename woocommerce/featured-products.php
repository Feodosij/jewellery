<?php
/**
 * The template for displaying featured products in carousel on home page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<?php
$args = array(
    'post_type' => 'product',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
        ),
    ),
);
$featured = new WP_Query( $args );

if ( $featured->have_posts() ) {
?>
    <div class="carousel-container">
        <?php while ( $featured -> have_posts() ) { 
            $featured -> the_post(); 
            $product = wc_get_product();
            if ( $product )  {
            ?>
                <div class="carousel-item">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                    <div class="title"><?php the_title(); ?></div>
                    <div class="description">Jewelry</div>
                    <span><?php echo '$' . $product -> get_price(); ?></span>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>
<?php wp_reset_postdata();  ?>