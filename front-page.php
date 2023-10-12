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

<!-- Main banner -->
<section class="main_banner">
    <div class="container">
        <div class="content_wrapper" style="background-image: url('<?php echo $bg_image_url['url']; ?>');">
            <h4 class="banner_sub_title">Donec sollicitudin</h4>
            <h2 class="banner_title">JEWELLERY STORE</h2>
            <p class="banner_text">An sincerity so extremity he additions. Her yet there truth merit. Mrs all projecting favourable now unpleasing. Son law garden chatty temper. Oh children provided to mr elegance marriage strongly</p>
            <div class="buttons">
                <a href="">shop now</a>
                <a href="">VIEW MORE</a>
            </div>
        </div>
    </div>
</section>

<!-- Jewellery store banner -->
<section class="jewellery_store_banner">
    <div class="container">
        <div class="content_wrapper">
            <div class="jewellery_store_banner_image">
                <?php if( get_field('jewellery_store_image') ) {
                    $image = get_field('jewellery_store_image') ?>
                    <img src="<?php echo $image['url']; ?>" />
                <?php } ?>
            </div>
            <div class="jewellery_store_banner_content">
                <div class="subtitle">
                    <?php echo esc_html( get_field('jewellery_store_subtitle') ); ?>
                </div>

                <div class="title">
                    <?php echo esc_html( get_field('jewellery_store_title') ); ?>
                </div>
                
                <div class="second_title">
                    <?php echo esc_html( get_field('jewellery_store_second_title') ); ?>
                </div>

                <div class="description">
                    <?php echo esc_html( get_field('description') ); ?>
                </div>
                
                <?php if( have_rows('buttons') ) { ?>
                    <div class="buttons grey_button">
                        <?php while( have_rows('buttons') ) { 
                            the_row(); ?>

                            <?php $link = get_sub_field('button_shop_now');
                                if (!empty($link)) { ?>
                                    <a href="<?= $link['url'] ?>">
                                        <?php echo $link['title'] ?>
                                    </a>
                            <?php } ?>
                            <?php $link1 = get_sub_field('button_view_more');
                                if (!empty($link1)) { ?>
                                    <a href="<?= $link1['url'] ?>">
                                        <?php echo $link1['title'] ?>
                                    </a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<!-- Featured product carousel -->
<section class="featured_product">
   <div class="container">
        <div class="featured_product_header">
            <div class="subtitle">
                <?php echo esc_html( get_field('featured_product_subtitle') ); ?>
            </div>

            <div class="title">
                <?php echo esc_html( get_field('featured_product_title') ); ?>
            </div>

            <div class="description">
                <?php echo esc_html( get_field('featured_product_description') ); ?>
            </div>
                
        </div>          
        <div class="featured_product_wrapper">
            <div class="product_ads">
                <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 2,
                        'product_cat' => 'ads',
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );
                    $ads = new WP_Query( $args );

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
                    <?php } ?>
                <?php wp_reset_postdata();  ?>
            </div>

            <div class="carousel_wrapper">
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

                    if ($featured->have_posts()) {
                    ?>
                    <div class="carousel-container">
                        <?php while ($featured->have_posts()) { 
                            $featured->the_post(); ?>
                        <div class="carousel-item">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <div class="title"><?php the_title(); ?></div>
                            <div class="description">Jewelry</div>
                            <span><?php echo '$' . $product->get_price(); ?></span>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php wp_reset_postdata();  ?>
                </div>

                <div class="carousel">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'product_cat' => 'new',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        
                    );
                    $new_product = new WP_Query( $args );

                    if ($new_product->have_posts()) {
                    ?>
                    <div class="carousel-container">
                        <?php while ($new_product->have_posts()) { 
                            $new_product->the_post(); ?>
                        <div class="carousel-item">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>                            <div class="title"><?php the_title(); ?></div>
                            <div class="description">Jewelry</div>
                            <span><?php echo '$' . $product->get_price(); ?></span>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php wp_reset_postdata();  ?>
                </div>
            </div>
        </div>
   </div>
</section>

<!-- Special offer -->
<section class="special_offer">
    <div class="container">
        <div class="special_offer_wrapper">
            <div class="special_offer_video">
                <?php if (get_field('special_offer_video')) {
                     the_field('special_offer_video');
                } else { 
                    $image = get_field('stub_pictures') ?>
                    <img src="<?php echo $image['url']; ?>" />
                <?php } ?>
                
            </div>

            <div class="special_offer_content">
                <div class="subtitle">
                    <?php echo esc_html( get_field('special_offer_subtitle') ); ?>
                </div>

                <div class="title">
                    <?php echo esc_html( get_field('special_offer_title') ); ?>
                </div>

                <div class="second_title">
                    <?php echo esc_html( get_field('special_offer_second_title') ); ?>
                </div>

                <div class="buttons grey_button">
                    <?php $link = get_field('special_offer_button');
                        if (!empty($link)) { ?>
                            <a href="<?= $link['url'] ?>">
                                <?php echo $link['title'] ?>
                            </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Discount section -->
<section class="discount_section">
    <div class="container">
        <div class="discount_section_wrapper">
            <div class="discount_section_content">
                <div class="title">
                    <?php the_field('discount_title'); ?>
                </div>

                <div class="second_title">
                    <?php echo esc_html( get_field('discount_second_title') ); ?>
                </div>

                <div class="description">
                    <?php echo esc_html( get_field('discount_description') ); ?>
                    <?php echo esc_html( the_field('discount_list') ); ?>
                </div>

                <?php if( have_rows('discount_buttons') ) { ?>
                    <div class="buttons grey_button">
                        <?php while( have_rows('discount_buttons') ) { 
                            the_row(); ?>

                            <?php $link = get_sub_field('discount_button_go_to_shop');
                                if (!empty($link)) { ?>
                                    <a href="<?= $link['url'] ?>">
                                        <?php echo $link['title'] ?>
                                    </a>
                            <?php } ?>
                            <?php $link1 = get_sub_field('discount_button_view_more');
                                if (!empty($link1)) { ?>
                                    <a href="<?= $link1['url'] ?>">
                                        <?php echo $link1['title'] ?>
                                    </a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

            <div class="discount_image">
                <?php if( get_field('discount_image') ) {
                    $image = get_field('discount_image') ?>
                    <img src="<?php echo $image['url']; ?>" />
                <?php } ?>
            </div>
           
        </div>
    </div>
</section>

<!-- Blog posts -->
<section class="blog_posts_home">
    <div class="container">
        <div class="block_header">
            <h4 class="subtitle"><?php echo esc_html( get_field('blog_cart_subtitle') ); ?></h4>
            <h3 class="title"><?php echo esc_html( get_field('blog_cart_title') ); ?></h3>
            <div class="description"><?php echo esc_html( get_field('blog_cart_description') ); ?></div>
        </div>
            <div class="carousel">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'meta_key' => 'home_page_post', 
                        'meta_value' => true, 
                    );

                    $query = new WP_Query($args);
                    if ($query->have_posts()) { ?>
                        <div class="carousel-container">
                            <?php while ($query->have_posts()) { 
                                $query->the_post(); ?>
                                <div class="post_carousel">
                                    <a class="post_image" href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail();  ?>  
                                        <span class="custom-date">
                                            <span class="day"><?php echo get_the_date('d'); ?></span>
                                            <span class="month"><?php echo get_the_date('M'); ?></span>
                                        </span>
                                    </a>
                                    <div class="post_category">
                                        <?php 
                                        $categories = get_the_category(); 
                                        $category_link = get_category_link($categories[0]); ?>
                                            <a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($categories[0]->name); ?></a>
                                    </div>
                                    <div class="post_title">
                                        <?php the_title(); ?>
                                    </div>
                                    <div class="post_author">
                                        <?php echo 'Posted by ' . get_avatar(get_the_author_meta('user_email'), 20). ' ' . get_the_author(); ?>
                                    </div>
                                    <div class="post_excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <div class="continue">
                                        <a href="<?php the_permalink(); ?>">Continue reading</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
            </div>
    </div>
</section>

<?php
get_footer();