/*Menu Animation*/
function myFunction(x) {
    x.classList.toggle("change");
}

jQuery(document).ready(function(){
    jQuery('.reviews-list').slick({
        autoplay: false
    });
    
    jQuery('.memes-list').slick({
        autoplay: true
    });
    
    jQuery('.polls-list').slick({
        autoplay: false
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
});
