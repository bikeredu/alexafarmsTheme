/**
 * Custom JS.
 *
 * Custom JS scripts.
 *
 * @since 1.0.0
 */
$(document).ready(function() {
    $('.menu-categories li').addClass('block');
    $('.menu-mobile').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('open');
        $('.menu-principal-container').toggleClass('open');
    });
    var getPost = function(id) {
        console.log('entra2');

        $('.results-roses').html('');
        $('.results-roses').append('<div class="loader"></div>');
        const headers = new Headers({
            'Content-Type': 'application/json',
            'X-WP-Nonce': ajax_var.nonce
        });
 
        fetch(ajax_var.url+id, {
            method: 'get',
            headers: headers,
            credentials: 'same-origin',
            data: {id_post: id},
        })
        .then(response => {
            $('.loader').remove();
            $('.menu-categories li').removeClass('block');
            return response.ok ? response.json() : 'Not Found...';
        }).then(json_response => {
            
            let html;
            if (typeof json_response === 'object') {
                html ='';
                json_response.forEach((element, index, data) => {
                    html += '<div class="col-6"><div class="block-rose"><img src="'+element.acf_fields.image_cover.url+'"/><h2 class="title-rose">'+ element.title.rendered +'</h2><a class="see-more" href="'+ element.link +'">See more</a></div></div>';
                });
            } else {
                html = json_response;
            }
            $('.results-roses').html(html);
        });
    }

    // var getPost = function(id) {
    //     console.log('entra');
    //     var ajaxscript = { ajax_url: '' + dcms_vars.ajaxurl + '' }
    //     $.ajax({
    //         type: 'POST',
    //         url: ajaxscript.ajax_url,
    //         dataType: "json", // add data type
    //         data: {
    //             action: 'get_ajax_posts',
    //             id_post: id
    //         },
    //         success: function(response) {
    //             console.log(response);

    //             $('.results-roses').html(response);
    //         }
    //     });
    // }
    $('.menu-categories li:first-child').trigger('click');
    $('.menu-categories li').on('click', function() {
        $('.menu-categories li').removeClass('active');
        var term = $(this).attr('dataid');
        $(this).addClass('active');
        getPost(term);
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