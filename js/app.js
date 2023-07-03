$(function(){
    console.log('slider');
    $('.slideshow').slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
});