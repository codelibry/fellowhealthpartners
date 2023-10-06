import $ from "jquery";
import "slick-carousel";

function sliders() {
  // old code
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

  // new code
  var testimonialsCarousel = $(".blockquote_slider__list");
  testimonialsCarousel.each(function () {
    var carousel = $(this);

    carousel.slick({
      slidesToShow: 1,
      mobileFirst: false,
      dots: true,
      arrows: false,
    });
  });

  function tickerSliders() {
    $(".slider").each(function () {
      const sliders = $(this).find(".tickers-block__slider");

      sliders.each(function () {
        const slider = $(this);
        const sliderwrap = $(this).find(".tickers-block__slider-wrap");

        const wrapWidth = slider[0].scrollWidth;

        slider.append(sliderwrap.clone());

        var reset = function () {
          if (slider.hasClass("slider-left-direction")) {
            let margin = slider.css("margin-left");
            slider.css("margin-left", margin);
            slider.animate(
              {
                "margin-left": "-" + (wrapWidth - parseInt(margin)) + "px",
              },
              40000,
              "linear",
              reset
            );
            console.log(slider.css("margin-left"));
            slider.append(sliderwrap.clone());
          }

          if (slider.hasClass("slider-right-direction")) {
            let margin = slider.css("margin-right");
            slider.css("margin-right", margin);
            slider.animate(
              {
                "margin-right": "-" + (wrapWidth - parseInt(margin)) + "px",
              },
              40000,
              "linear",
              reset
            );
            console.log(slider.css("margin-left"));
            slider.append(sliderwrap.clone());
          }
        };

        // slider.on('mouseenter', function () {
        //     slider.stop();
        //     // slider.css('animation-play-state', )

        // });

        slider.hover(
          function () {
            slider.clearQueue();
            slider.stop();
          },
          function () {
            reset();
          }
        );

        reset.call(sliderwrap);
      });
    });
  }
  tickerSliders();
}

export { sliders };
