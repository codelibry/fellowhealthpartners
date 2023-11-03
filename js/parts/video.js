import $ from "jquery";

function videoBlock() {
  $(".video-block").each(function () {
    jQuery(document).on("click tap", ".player-main .vid", function () {
      console.log("playing");
      jQuery("#video-iframe")
        .attr("src", jQuery(this).attr("video-url") + "&autoplay=1")
        .fadeIn(0);
    });
  });
}

export { videoBlock };
