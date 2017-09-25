/*Menu Animation*/
function myFunction(x) {
    x.classList.toggle("change");
}

$(document).ready(function(){
    $('.reviews-list').slick({
        autoplay: false
    });
    
    $('.memes-list').slick({
        autoplay: true
    });

    $('.nav-icon').on('click', function() {
        $(this).toggleClass('change');
        $('.primary-header-nav').toggleClass('show-transition')
    });

    $('.t-bar .t-bar__header h2').on('click', function() {
        var tab_id = $(this).attr('data-tab');
        $('.t-bar .t-bar__header h2').removeClass('current');
        $('.movie-list').removeClass('current');
        $(this).addClass('current');
        $("."+ tab_id + "-movie-list").addClass('current');
    });
});