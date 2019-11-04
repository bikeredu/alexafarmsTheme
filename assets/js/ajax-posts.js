$(document).ready(function() {
    $('.results-roses').html('');
    var getPost = function(id) {
        $('.menu-categories li').addClass('block');
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
    var term = $('.menu-categories li:first-child').attr('dataid');
    $('.menu-categories li:first-child').addClass('active');
    getPost(term);
    $('body').on('click','.menu-categories li', function() {
        $('.menu-categories li').removeClass('active');
        term = $(this).attr('dataid');
        $(this).addClass('active');
        getPost(term);
    });
});