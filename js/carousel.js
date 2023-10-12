jQuery(document).ready(function($){
    $('.carousel-container').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 4000,
        prevArrow: '<button class="slick-prev"><i class="fa-solid fa-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa-solid fa-chevron-right"></i></button>',
        variableWidth: true
    });

});