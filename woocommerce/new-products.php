<?php
/**
 * The template for displaying new products in carousel on home page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'product_cat' => 'new',
        'orderby' => 'date',
        'order' => 'DESC',
        
    );
    $new_product = new WP_Query( $args );

    if ( $new_product -> have_posts() ) {
    ?>
    <div class="carousel-container">
        <?php while ( $new_product -> have_posts() ) { 
            $new_product -> the_post(); 
            $product = wc_get_product();
            if ( $product ) {?>
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