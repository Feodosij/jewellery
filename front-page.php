<?php
/*
Template Name: Front page
*/
?>

<?php
get_header();
?>

<?php $bg_image_url = get_field('background_image');
?>
<section class="main_banner">
    <div class="container">
        <div class="content_wrapper" style="background-image: url('<?php echo $bg_image_url['url']; ?>');">
            <h4 class="banner_sub_title">Donec sollicitudin</h4>
            <h2 class="banner_title">JEWELLERY STORE</h2>
            <p class="banner_text">An sincerity so extremity he additions. Her yet there truth merit. Mrs all projecting favourable now unpleasing. Son law garden chatty temper. Oh children provided to mr elegance marriage strongly</p>
            <div class="banner_buttons">
                <a href="">shop now</a>
                <a href="">VIEW MORE</a>
            </div>
        </div>
    </div>
</section>

<!-- Futured product carousel -->
<section class="futured_product">
   <div class="container">
        <div class="carousel">
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

            if ($featured->have_posts()) :
            ?>
            <div class="carousel-container">
                <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                <div class="carousel-item">
                    <a><?php the_post_thumbnail(); ?></a>
                    <?php the_title(); ?>
                    <span><?php echo '$' . $product->get_price(); ?></span>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php wp_reset_query();  ?>
        </div>

        <div class="carousel">
            <?php
            $args = array(
                'post_type' => 'product',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                        'operator' => 'NOT IN',
                    ),
                ),
            );
            $featured = new WP_Query( $args );

            if ($featured->have_posts()) :
            ?>
            <div class="carousel-container">
                <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                <div class="carousel-item">
                    <a><?php the_post_thumbnail(); ?></a>
                    <?php the_title(); ?>
                    <span><?php echo '$' . $product->get_price(); ?></span>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php wp_reset_query();  ?>
        </div>
   </div>
</section>




<?php
get_footer();