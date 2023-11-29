import $ from "jquery";
import { gsap } from "gsap";

function scrollToAnchor() {
  $(
    'a[href^="#"]:not(.slider-arrow, .quote--button, .tab-link, .post-filters__button, .no-click)'
  ).click(function (e) {
    e.preventDefault();
    let href = $(this).attr("href");
    // Get the top position of the target element and subtract 100 pixels
    let targetOffset = $(href).offset().top - 100;
    // Set the scrollTop to the targetOffset
    $("html, body").scrollTop(targetOffset);
  });
}

function scrollToHash() {
  let hash = window.location.hash.substr(1);
  if (hash && $("#" + hash).length) {
    $("html, body").animate(
      { scrollTop: $("#" + hash).offset().top - 100 },
      100
    );
    $(window).on("carouselInited", function () {
      $("html, body").animate(
        { scrollTop: $("#" + hash).offset().top - 100 },
        100
      );
    });
  }
}

function requestQuoteLink() {
  $(".quote--button").on("click", function (e) {
    e.preventDefault();

    let quoteTarget = $(this).attr("href");
    let pathArray = window.location.origin + "/#request_a_quote";

    if ($(quoteTarget).length) {
      $("html, body").animate(
        { scrollTop: $(quoteTarget).offset().top - 100 },
        1000
      );
    } else {
      window.location.href = pathArray;
    }
  });
}

function smooth_scroll() {
  jQuery(document).ready(function () {
    // Scrolling for anchor links in within the same page
    jQuery(
      '.menu-item:not(.no-click) a[href*="#"]:not([href="#"]), .images_list a'
    ).click(function () {
      _hash = this.hash;
      _scroll_it(_hash);
    });

    // scrolling for anchor links coming from a different page
    var _hash = window.location.hash;
    if (_hash.length > 0) {
      window.scrollTo(0, 0);

      setTimeout(function () {
        _scroll_it(_hash);
      }, 800);
    }

    function _scroll_it(_hash) {
      jQuery("html,body").animate(
        {
          scrollTop: jQuery(_hash).offset().top - 50,
        },
        800
      );
    }
  });
}

export { scrollToAnchor, scrollToHash, requestQuoteLink, smooth_scroll };
