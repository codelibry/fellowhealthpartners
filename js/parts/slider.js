import $ from "jquery";
import "slick-carousel";

function sliders() {

  

  $(".hero").each(function () {
    let slider = $(this).find(".hero__main__list--img");
    // let sliderBg = $(this).find(".hero__main__list--bg");
    // Function to set the CSS variable --header_header with the header height
    function setHeaderHeightVariable() {
      var headerHeight = $("#masthead").outerHeight(); // Replace with your actual header selector
      document.documentElement.style.setProperty(
        "--header_header",
        headerHeight + "px"
      );
    }

    // Set the initial header height variable
    setHeaderHeightVariable();

    // Update the variable when the window is resized
    $(window).resize(function () {
      setHeaderHeightVariable();
    });

    let swapper = $('.text-swapper');

    //let next = swapper.find('.text-swapper--next');
    let current = swapper.find('.text-swapper--current');

    slider.on("init", function () {
      $(window).trigger("heightChanges");
      //current.html($('.slick-slide[data-slick-index="' + currentSlide + '"] .title_block').html());
      current.html(slider.find('.slick-active .title_block__wrapper').html());
    });

    // sliderBg.on("init", function () {
    //   $(window).trigger("heightChanges");
    // });

    slider.slick({
      dots: true,
      arrows: false,
      // infinite: true,
      cssEase: "linear",
      autoplay: true,
      //vertical: true, // Set vertical to true
      speed: 300,
      fade: true,
      autoplaySpeed: 5000,
      slidesToShow: 1,
      slidesToScroll: 1,
      pauseOnHover: false,
      appendDots: $(".dots_block"),
      customPaging: function (slider, i) {
        var thumb = $(slider.$slides[i]).data();
        return "0" + (i + 1);
      },
      dotsClass: "dots_block-list",
    });

    // sliderBg.slick({
    //   dots: false,
    //   arrows: false,
    //   speed: 300,
    //   fade: true,
    //   cssEase: 'linear',
    //   autoplay: true,
    //   autoplaySpeed: 5000,
    //   pauseOnHover: false,
    //   slidesToShow: 1,
    //   slidesToScroll: 1

    // });  

    // Count text

    

    //current.html(next.html);

    // Add the "next-slide" class to the next slide
    slider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
      $('.slick-slide').removeClass('next-slide'); // Remove the class from all slides
      $('.slick-slide[data-slick-index="' + nextSlide + '"]').addClass('next-slide'); // Add the class to the next slide
      //next.html($('.slick-slide[data-slick-index="' + nextSlide + '"] .title_block__wrapper').html());
      current.html($('.slick-slide[data-slick-index="' + nextSlide + '"] .title_block__wrapper').html());
      console.log('nextSlide' + nextSlide);
    });

    slider.on('afterChange', function(event, slick, currentSlide) {
      // Use the slickGoTo method to set the same slide in the second slider
      //console.log('goto');
      //sliderBg.slick('slickGoTo', currentSlide);
    });


    
      
  


  });


  $(document).ready(function () {
    // Slick Carousel
    var testimonialsCarousel = $(".blockquote_slider__list");
    testimonialsCarousel.each(function () {
      var carousel = $(this);

      carousel.slick({
        slidesToShow: 1,
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000,
        cssEase: "linear",
        focusOnSelect: true,
        pauseOnHover: true,
      });
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
            // console.log(slider.css("margin-left"));
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
            // console.log(slider.css("margin-left"));
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
