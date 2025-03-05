$(window).on('load', function () {
    $('#preloader .inner').fadeOut();
    $('#preloader').delay(550).fadeOut('slow');
    $('body').delay(550).css({ 'overflow': 'visible' });
});