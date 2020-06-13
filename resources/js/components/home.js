module.exports = function () {
    var html = $("html, body");
    $('.navbar-nav .nav-link').on('click', function() {
        html.animate({scrollTop: $('.' + $(this).attr('id')).offset().top}, '1000');
        if (window.innerWidth < 768) {
            $('.collapse').collapse('toggle');
        }
    });
/*     $(".custom-radio input").on("click", function() {
        $('.schedule-group').fadeOut(0)
        $('.'+ $(this).attr('id')).fadeIn(0);
    });
    $(".custom-radio input").first().trigger('click'); */
    $('.custom-select').on('change', function() {
        $('.schedule-group').fadeOut(0);
        $('.'+ $(this).val()).fadeIn(0);
    })
    $('.custom-select').trigger('change')
}
