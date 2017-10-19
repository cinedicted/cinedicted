/*Menu Animation*/
function toggleMenu(x) {
    x.classList.toggle("change");
}

jQuery(document).ready(function(){
    
    jQuery('.hamburger').on('click', function() {
        jQuery(this).toggleClass('change');
        jQuery('.menu-items').slideToggle("fast");
    });
    
    jQuery('.reviews-list').slick({
        autoplay: false
    });
    
    jQuery('.poll-list').slick({
        autoPlay:false
    })
    
    jQuery('.memes-list').slick({
        autoplay: false,
        dots:true
    });
    jQuery('.trailers-story').click(function () {
        jQuery('#myModal').modal('show');
    });
    jQuery('.nav-icon').on('click', function() {
        jQuery(this).toggleClass('change');
        jQuery('.primary-header-nav').toggleClass('show-transition')
    });

    jQuery('.t-bar .t-bar__header h2').on('click', function() {
        var tab_id = jQuery(this).attr('data-tab');
        jQuery('.t-bar .t-bar__header h2').removeClass('current');
        jQuery('.movie-list').removeClass('current');
        jQuery(this).addClass('current');
        jQuery("."+ tab_id + "-movie-list").addClass('current');
    });
    
    jQuery('.search-icon').on('click', function() {
        jQuery(".search-box").slideToggle("fast");
    });
    
    jQuery('.close-search').on('click', function() {
        jQuery(".search-box").slideToggle("fast");
    });
    
    jQuery('.rating').each(function() {
        var ratingVal = jQuery(this).text();
        var setWidth = ((parseFloat(ratingVal)/5) * 100);
        jQuery(this).siblings('.rating-filled').css('width', setWidth);
    })
    
    jQuery(document).scroll(function (e) {
        if (jQuery(window).scrollTop() > 600) {
           jQuery('.fixed-newsletter').show();
        }
        else{
            jQuery('.fixed-newsletter').hide();
        }
    });
});
