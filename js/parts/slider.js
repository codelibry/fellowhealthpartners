import $ from "jquery";
import "slick-carousel";

function sliders() {
  $(".hero-unit").each(function () {
    let block = $(this);
    let slider = block.find(".js-hero-unit-images");
    let slider_2 = block.find(".js-hero-unit-slider");
    slider.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      fade: true,
      asNavFor: ".js-hero-unit-slider",
    });

    slider_2.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: ".js-hero-unit-images",
      dots: true,
      arrows: true,
      focusOnSelect: true,
      fade: true,
      autoplay: true,
      autoplaySpeed: 5000,
      appendArrows: $(".js-hero-slider-arrows"),
      appendDots: $(".js-hero-slider-dots"),
    });

    slider.on("init", function () {
      $(window).trigger("heightChanges");
    });
    slider_2.on("init", function () {
      $(window).trigger("heightChanges");
    });
  });

  var testimonialsCarousel = $(".js-testimonials-carousel");
  testimonialsCarousel.each(function () {
    var carousel = $(this);
    var dots = carousel.parent().find(".js-testimonials-carousel-dots");
    var arrows = carousel.parent().find(".js-testimonials-carousel-arrows");

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
          },
        },
        {
          breakpoint: 1023,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          },
        },
      ],
    });
  });

  $("#slick-clients").each(function () {
    let block = $(this);

    block.slick({
      autoplay: false,
      autoplaySpeed: 0,
      slidesToShow: 5,
      slidesToScroll: 1,
      speed: 8000,
      cssEase: "linear",
      // appendArrows: '.slider-nav',
      arrows: false,
      autoplay: true,
      autoplaySpeed: 0,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
      ],
    });

    block.on("init", function () {
      $(window).trigger("heightChanges");
    });
  });
}

export { sliders };
