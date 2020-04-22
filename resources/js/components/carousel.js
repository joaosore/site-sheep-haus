import $ from "jquery";

$(document).ready(function() {
    $('#custom-carousel').owlCarousel({
        nav: true
    });

    var imovelPhotos = $('#imovel-photos');
    if (imovelPhotos) {

        // var pswpElement = document.querySelectorAll('.pswp')[0];

        // // build items array
        // var items = [];
        // var itemsDOM = imovelPhotos.find('.item');
        // $.each(itemsDOM, function(i, val) {
        //     let url = $(val).find('img').attr('src');
        //     items.push({
        //         src: url,
        //         w: 600,
        //         h: 400
        //     })
        // })
        // console.log(items);

        // // define options (if needed)
        // var options = {
        //     // optionName: 'option value'
        //     // for example:
        //     index: 0 // start at first slide
        // };

        // // // Initializes and opens PhotoSwipe
        // var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        // gallery.init();

        imovelPhotos.owlCarousel({
            margin:10,
            nav: true,
            dots: true,

            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:2
                }
            }
        });
    }
});