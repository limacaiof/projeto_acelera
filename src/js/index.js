// Menu mobile 
$(document).ready(function() {

    $('.hamburger').click(function() {
        $(this).toggleClass('active');
        $('.menu').toggleClass('active');
    })
});