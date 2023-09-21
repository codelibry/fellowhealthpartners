(function ($) {

    $('.js-hero-unit-images').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: true,
        asNavFor: '.js-hero-unit-slider'
    });

    $('.js-hero-unit-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.js-hero-unit-images',
        dots: true,
        arrows: true,
        focusOnSelect: true,
        fade: true,
        autoplay: true,
        autoplaySpeed: 5000,
        appendArrows: $('.js-hero-slider-arrows'),
        appendDots: $('.js-hero-slider-dots')
    });

    $('.js-scroll-down').on('click', function (e) {
        var target = $(this).attr('href');
        var offset = 0;
        $('html,body').stop().animate({scrollTop: $(target).offset().top - offset}, 1000);
        e.preventDefault();
    });


    var testimonialsCarousel = $('.js-testimonials-carousel');
    testimonialsCarousel.each(function () {
        var carousel = $(this);
        var dots = carousel.parent().find('.js-testimonials-carousel-dots');
        var arrows = carousel.parent().find('.js-testimonials-carousel-arrows');

        carousel.slick({
            slidesToShow: 1,
            mobileFirst: true,
            dots: true,
            arrows: true,
            appendDots: dots,
            appendArrows: arrows,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }
            ]
        })
    });


    $(document).ready(function () {

        function bs_fix_vc_full_width_row() {

            var $elements = $('[data-vc-full-width="true"]');
            $.each($elements, function (key, item) {
                var $el = $(this);
                var width = $('#page').width();
                var paddings = width - $el.width();
                var padding = paddings / 2;
                var offset = 0;

                $el.css({
                    'left': (padding - offset) * -1 + 'px',
                    'padding-left': padding + 'px',
                    'padding-right': padding + 'px',
                    'width': width + 'px'
                })
            })
        }

        // Fixes rows in RTL
        $(document).on('vc-full-width-row', function () {
            bs_fix_vc_full_width_row();
        });

        // Run one time because it was not firing in Mac/Firefox and Windows/Edge some times
        bs_fix_vc_full_width_row();

    });


    $(function () {
        $('.js-popup').magnificPopup({
            type: 'inline',
            preloader: false,
            modal: false
        });
        $(document).on('click', '.popup-modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
    });


    let loadMoreButtons = $('.template-testimonials .load-more');
    loadMoreButtons.each(function () {
        let button = $(this);
        let sliceNumber = 4;
        let hiddenCells = null;

        button.on('click', function (e) {

            e.preventDefault();
            e.stopImmediatePropagation();
            hiddenCells = button.parents('.template-testimonials').find('.testimonials-grid__item:hidden');
            hiddenCells.slice(0, sliceNumber).slideDown();

            $('html,body').stop().animate({scrollTop: $(hiddenCells[0]).offset().top}, 1000);
            if (!button.parents('.template-testimonials').find('.testimonials-grid__item:hidden').length) {
                button.fadeOut("slow");
            }
        });
    });


    function movePortalLink() {

        if ($(window).width() < 992) {

            if ($('.mega-toggle-blocks-left .button').length == 0) {
                if ($('.site-header__info .button').length) {
                    $('.mega-toggle-blocks-left').append($('.site-header__info .button').clone())
                }
            }
        }
    }

    movePortalLink();

    $(window).on('resize', movePortalLink);


//  var clients = $('#wide_clients_slider li').length;
//  $('#wide_clients_slider').bxSlider({
//    minSlides: 1,
//    maxSlides: 5,
//    slideWidth: 200,
//    slideMargin: 57.5,
//    tickerHover: true,
//    ticker: true,
//    speed: clients * 1850,
//    onSliderLoad: function () {
//      // do funky JS stuff here
//      $("#wide_clients_slider .item").removeClass('abs');
//    },
//  });
//  $('#slick-clients').slick();

    function filterPosts() {
        const filterBlock = $('#post-filters');
        const filterBtn = filterBlock.find('.post-filters__button');
        const posts = $('.post-item');
        const showMoreBtn = $('.show-more-btn');
        const showMoreCount = showMoreBtn.find('.btn__count');

        filterBtn.on('click', function () {
            const self = $(this);
            const filterTarget = self.data('target');
            const filterTitles = $('.post-filters__titles .filter-title')
            const filteredPosts = $('.post-item.filter-show-post');

            if(!filteredPosts.length > 3) {
                showMoreBtn.addClass('btn-d-none');
            } else {
                showMoreBtn.removeClass('btn-d-none');
            }

            filterBtn.each(function () {
                $(this).removeClass('filter-active')
            })

            filterTitles.each(function () {
                $(this).removeClass('title-active')
            })
            let count = 0;
            posts.each(function () {
                $(this).removeClass('show-post');

                if (filterTarget === 'all') {
                    if (count < 3) {
                        $(this).addClass('show-post');
                    }
                    $(this).addClass('filter-show-post');

                    count++;
                } else if ($(this).hasClass('category-' + filterTarget)) {
                    if (count < 3) {
                        $(this).addClass('show-post');
                    }
                    $(this).addClass('filter-show-post');

                    count++;
                } else {
                    $(this).removeClass('filter-show-post');
                    $(this).removeClass('show-post');
                }
            })

            let showPosts = $('.post-item.filter-show-post:not(.show-post)');

            showMoreCount.html(`(${showPosts.length})`)

            self.addClass('filter-active')

            if (self.hasClass('filter-active')) {
                $(`.title-${filterTarget}`).addClass('title-active')
            }
        })
    }

    filterPosts();

    function showMore() {
        const showMoreBtn = $('.show-more-btn');

        showMoreBtn.on('click', function () {
            const hiddenPosts = $('.filter-show-post:not(.show-post)');

            hiddenPosts.each(function (index) {
                if(index < 3) {
                    $(this).addClass('show-post');
                }

                showMoreBtn.find('.btn__count').html(`(${$('.filter-show-post:not(.show-post)').length})`);

                if (!$('.filter-show-post:not(.show-post)').length) {
                    showMoreBtn.addClass('btn-d-none')
                }
            })



        })
    }

    showMore();
})(jQuery);