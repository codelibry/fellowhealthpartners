import $ from "jquery";

function models_images() {
  $(document).ready(function () {
    $(".images_block__inner li:lt(7)").show();
    var items = $(".images_block__inner li").length;
    var shown = 7;
    // console.log(items);
    $(".more").click(function () {
      shown = $(".images_block__inner li:visible").length + 3;
      if (shown < items) {
        $(".images_block__inner li:lt(" + shown + ")").show(300);
      } else {
        $(".images_block__inner li:lt(" + items + ")").show(300);
        $(".more").hide();
      }
    });
  });
}

export { models_images };
