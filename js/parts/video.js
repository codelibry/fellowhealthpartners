import $ from "jquery";
import Plyr from "plyr";

function videoBlock() {
  $(".video-block").each(function () {
    const acfPosterImage = customjs_ajax_object.getAcfPosterImage;

    const player = new Plyr(".player-main", {
      hideControls: false,
      captions: { active: true },
    });

    player.toggleControls(false);

    player.on("play", (event) => {
      player.toggleControls(true);
    });
    setTimeout(() => {
      player.poster = acfPosterImage;
    }, 0);
  });
}

export { videoBlock };
