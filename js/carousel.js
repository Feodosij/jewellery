jQuery(document).ready(function($){
    $('.carousel-container').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: '<button class="slick-prev">Previous</button>',
        nextArrow: '<button class="slick-next">Next</button>'
    });
});