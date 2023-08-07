$(function () {

    $(window).on('load', function () {
        let phones = [
            { 'mask': '+7 \\ \\ ###-###-##-##' }
        ];

        $('input[type=tel]').inputmask({
            mask: phones,
            greedy: false,
            definitions: {
                '#': {
                    validator: '[0-9]',
                    cardinality: 1
                }
            }
        });
    });


    $('#hamburger-icon').click(function () {
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
            $('.mobile-menu').addClass('active');
            $('html').addClass('ov-hidden');
        } else {
            $('.mobile-menu').removeClass('active');
            $('html').removeClass('ov-hidden');
        }
    });

    $('select').niceSelect();

    $('.profile').click(function (i) {
        $(this).addClass('active');
        var profileHide = $('.profile-hide');

        if (profileHide.css('display') != 'block') {
            profileHide.show(300);


            var firstClick = true;
            $(document).bind('click.Profile', function (i) {
                if (!firstClick && $(i.target).closest('.profile-hide').length == 0) {
                    profileHide.hide(300);
                    $('.profile').removeClass('active');
                    $(document).unbind('click.Profile');
                }

                firstClick = false;
            });
        }

        // i.preventDefault();

    });

    $('#search').autocomplete({
        minChars: 2,
        maxHeight: 410,
        lookupLimit: 13,
        lookup: contractors
    });

    $('.elem-item-list').each(function () {
        if ($(this).closest('.elem-item').attr('style') != 'display: none;') {
            var Len = $(this).find('.elem-item-box').length;
            if (Len == 2) {
                $(this).children('.add-card').addClass('add-card-2');
            } else if (Len == 1) {
                $(this).children('.add-card').addClass('add-card-1');
            }
        }

    });



    $('.btn-more').click(function (e) {
        e.preventDefault();
        $('.btn-more').removeClass('active');
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            // $('.btn-el-items').css({"opacity":"0", "visibility":"visibile"});
        } else {
            $(this).addClass('active');
            // var btnItems = $(this).siblings('.btn-el-items');
            // if (btnItems.css('opacity') == '0' && btnItems.css('visibility') == 'hidden'){
            //     btnItems.css({"opacity":"1", "visibility":"visibile"});
            // }
        }
    });

    $(document).mouseup(function (e) {
        var div2 = $(".btn-el-items");
        if (!div2.is(e.target) &&
            div2.has(e.target).length === 0) {
            $('.btn-more').removeClass('active');
            // $('.btn-el-items').css('opacity', '0');
        }
    });


    $('.date-request').datepicker({
        minDate: new Date(),
    });

    $('.date-new-event').datepicker({

    });


    $('.dates-plans').scrollbar({
        ignoreOverlay: false,
        autoScrollSize: true,
        autoUpdate: true
    });

    $('.plans-calendar').datepicker({});

    $('.end_one').click(function () {
        $('.start_one').trigger('focus');
    });

    $('.table-tr-btn').click(function () {
        $(this).closest('.table-tr').toggleClass('active');
    });

    $('.btn-filter').click(function () {
        $('.events-dates').toggleClass('active');
        $('body').toggleClass('overlay');
    });

});

function isHidden(el) {
    return (el.offsetParent === null)
}

$('.plans-request .btn-blue').click(function (e) {
    if ($('.plans-request-form').is(":visible")) {
        return
    }
    e.preventDefault();
    $('.plans-request-info').hide();
    $('.plans-request-form').show();
});

$('.plans-box__right .add-card').click(function (e) {
    if ($('.plans-request-form').is(":visible")) {
        document.getElementById('new-task-form').submit()
        return
    }
    $('.plans-request-info').hide();
    $('.plans-request-form').show();
});


$('.new-event-box__top a').click(function (e) {
    e.preventDefault();
    $('.new-event-box').hide();
});


$('body').on('click', '.pass-show', function (e) {
    e.preventDefault();
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $('#user-auth-password').attr('type', 'password');
    } else {
        $(this).addClass('active');
        $('#user-auth-password').attr('type', 'text');
    }
});

$(window).on('load', function () {

    var widthLoad = $(window).width();

    if (widthLoad < '992') {
        $(".events-dates").prepend("<a href='javascript:void(0);' class='filter-btn'></a>");
        $(".events-dates").prepend("<a href='javascript:void(0);' class='filter-remove'>Сбросить</a>");
        $(".events-dates").append("<a href='javascript:void(0);' class='filter-enter'>Применить</a>");
    }

    $('.filter-btn').click(function () {
        $('.events-dates').removeClass('active');
        $('body').removeClass('overlay');
    });

});

$(window).on('load resize', function () {
    var width = $(window).width();


    if (width > '1200') {
        $('.btn-abc').click(function () {
            $(this).toggleClass('active');
            var toggleWidth = $(".alfavite").width() == 1115 ? "0px" : "1115px";
            $('.alfavite').animate({ width: toggleWidth }, 100);
        });
    }

    if (width < '801') {
        $('.menu').insertAfter($('.header-box'));
        $('.header').addClass('load');
    }

    if (width > '800') {
        $('.menu').insertAfter($('.logo'));
    }

    if (width < '516') {
        $('.menu').not('.slick-initialized').slick({
            slidesToShow: 1,
            infinite: false,
            arrows: false,
            variableWidth: true,
            dots: false,
            swipeToSlide: true,
            slidesToScroll: 1
        });
    } else {
        $('.menu').filter('.slick-initialized').slick('unslick');
    }

    if (width < '992') {
        $('.btn-new-event').prependTo($('#tab_1'));
    } else {
        $('.btn-new-event').prependTo($('.events-dates'));
    }


});
//# sourceMappingURL=../sourcemaps/main.js.map