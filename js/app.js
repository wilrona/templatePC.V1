/**
 * Created by online2 on 12/07/2017.
 */

jQuery(document).ready(function() {

    jQuery('#owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        items: 4,
        nav:false,
        dots: true,
        center: true,
        autoplay:true,
        // autoplayTimeout:3000,
        // autoplayHoverPause:true,
        // smartSpeed: 5000
    });

    jQuery(".dotdot").dotdotdot({
        //	configuration goes here
        watch: true
    });

    jQuery('#owl-carousel-post').owlCarousel({
        loop:true,
        margin:0,
        items: 1,
        nav:false,
        dots: true,
        center: true,
        autoplay:true
    });



});











