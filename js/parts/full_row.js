import $ from "jquery";

function full_row() {
  $(document).ready(function () {
    function bs_fix_vc_full_width_row() {
      var $elements = $('[data-vc-full-width="true"]');
      $.each($elements, function (key, item) {
        var $el = $(this);
        var width = $("#page").width();
        var paddings = width - $el.width();
        var padding = paddings / 2;
        var offset = 0;

        $el.css({
          left: (padding - offset) * -1 + "px",
          "padding-left": padding + "px",
          "padding-right": padding + "px",
          width: width + "px",
        });
      });
    }

    // Fixes rows in RTL
    $(document).on("vc-full-width-row", function () {
      bs_fix_vc_full_width_row();
    });

    // Run one time because it was not firing in Mac/Firefox and Windows/Edge some times
    bs_fix_vc_full_width_row();
  });
}
export { full_row };
