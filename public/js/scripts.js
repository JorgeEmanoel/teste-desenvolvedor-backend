$('.mask').each(function (i, e) {

    var pattern = $(e).data('pattern'),
        reverse = $(e).hasClass('mask-reverse');

    $(e).mask(pattern, {reverse: reverse});

});

$('[data-toggle="tooltip"]').tooltip();
$('[data-toggle="popover"]').popover();
