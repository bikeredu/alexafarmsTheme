/**
 * Custom JS.
 *
 * Custom JS scripts.
 *
 * @since 1.0.0
 */
$(document).ready(function() {
    $('.menu-mobile').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('open');
        $('.menu-principal-container').toggleClass('open');
    });

    



    // var category = $('.single .block-post .category-article').text();
    // $('.single #menu-categorias-menu li').each(function(index) {
    //     if ($(this).find('a').text() == category) {
    //         $(this).addClass('current-menu-item');
    //     }
    // });

    // function validateEmail($email) {
    //     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    //     return emailReg.test($email);
    // }
    // $('.form-subscribe .btn-subscribe').on('click', function(e) {
    //     if ($('.field-mail').val() == '' || !validateEmail($('.field-mail').val())) {
    //         $(".modal#data-incorrect").addClass('active');

    //     } else {
    //         window.location.href = "/blogemi/newsletter/?mail=" + $('.field-mail').val();
    //     }
    // });


    // $('.modal .btn-close, .modal .btn-blue').on('click', function(e) {
    //     e.preventDefault();
    //     $(this).parent().parent().removeClass('active');
    // });
    // $('.modal#data-correct .btn-close, .modal .btn-blue').on('click', function(e) {
    //     e.preventDefault();
    //     $(this).parent().parent().removeClass('active');
    //     window.location.href = "/blogemi/afiliate-ya/";
    // });
    // $('#mailpoet_form_2 .mailpoet_radio_label').eq(1).addClass('active');
    // $('#mailpoet_form_2 .mailpoet_radio').on('click', function(e) {
    //     e.preventDefault();
    //     $('#mailpoet_form_2 .mailpoet_radio_label').removeClass('active');
    //     if ($(this).is(':checked')) {
    //         $(this).parent().addClass('active');
    //     }
    // });
    // $('.mailpoet_checkbox').attr('data-parsley-required-message', 'Debe aceptar los términos y condiciones');
    // $('.mailpoet_text').attr('data-parsley-required-message', 'Este campo es obligatorio');
    // $('input[type="email"]').attr('data-parsley-error-message', 'Por favor ingrese un email valido');
    // $('.mailpoet_checkbox_label input').on('change', function(e) {
    //     if ($(this).is(':checked')) {
    //         $(this).parent().addClass('active');
    //     } else {
    //         $(this).parent().removeClass('active');
    //     }
    // });
    // $('.mailpoet_checkbox_label input').on('click', function(e) {
    //     $(this).parent().removeClass('active');
    //     if ($('.mailpoet_checkbox_label input').is(':checked')) {
    //         $(this).parent().addClass('active');
    //     } else {
    //         $(this).parent().removeClass('active');
    //     }
    // });
    // $('.wpcf7-acceptance input').on('click', function(e) {
    //     $(this).parent().parent().removeClass('active');
    //     if ($('.wpcf7-acceptance input').is(':checked')) {
    //         $(this).parent().parent().addClass('active');
    //     } else {
    //         $(this).parent().parent().removeClass('active');
    //     }
    // });
    // $('.btn-mobile-cat').on('click', function(e) {
    //     $(this).parent().toggleClass('active');
    // });
    // $('.ico_menu').on('click', function(e) {
    //     $('.menu_mobile').show();
    //     $('.menu_mobile > a').on('click', function(e) {
    //         $('.menu_mobile').hide();
    //     });
    // });
    // $('.menu_mobile nav>ul>li>a.sub_mobile').on('click', function(e) {
    //     $('.menu_mobile nav>ul>li>div').removeClass('active');
    //     $(this).parent().find('div').addClass('active');
    // });
    // // var $obj = $('.menu-categories');
    // // var top = $obj.offset().top - parseFloat($obj.css('marginTop').replace(/auto/, 0));

    // // $(window).scroll(function (event) {
    // //   // what the y position of the scroll is
    // //   var y = $(this).scrollTop();

    // //   // whether that's below the form
    // //   if (y > top) {
    // //     // if so, ad the fixed class
    // //     $obj.addClass('fixed');
    // //   } else {
    // //     // otherwise remove it
    // //     $obj.removeClass('fixed');
    // //   }
    // // });
    // if ($('.page-id-14').is(':visible')) {
    //     $.urlParam = function(name) {
    //         var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    //         if (results == null) {
    //             return null;
    //         } else {
    //             return decodeURI(results[1]) || 0;
    //         }
    //     }
    //     if ($.urlParam('mail') != '') {
    //         var dec = decodeURIComponent($.urlParam('mail'));
    //         $('input[type="email"]').val(dec);
    //     }
    // }
    // if ($('.page-id-119').is(':visible') && $('.wpcf7-mail-sent-ok').is(':visible')) {
    //     $(".modal#data-correct").addClass('active');
    // }



    //Parallax

    $('.hero-image .img-parallax').each(function() {

        var img = $(this);
        var imgParent = $(this).parent();

        function parallaxImg() {

            var speed = img.data('speed');
            var imgY = imgParent.offset().top;
            var winY = $(document).scrollTop();
            var winH = $(document).height();
            var parentH = imgParent.innerHeight();


            // The next pixel to show on screen      
            var winBottom = winY + winH;

            console.log(winBottom);

            // If block is shown on screen
            if (winBottom > imgY && winY < imgY + parentH) {
                // Number of pixels shown after block appear
                var imgBottom = ((winBottom - imgY) * speed);
                // Max number of pixels until block disappear
                var imgTop = winH + parentH;
                // Porcentage between start showing until disappearing
                var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
            }
            img.css({
                top: imgPercent + '%',
                transform: 'translate(-50%, -' + imgPercent + '%)'
            });
        }
        $(document).on({
            scroll: function() {
                parallaxImg();
            },
            ready: function() {
                parallaxImg();
            }
        });
    });

});