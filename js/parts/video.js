import $ from "jquery";
import Plyr from "plyr";

function videoBlock() {
  $(".video-block").each(function () {
    const player = new Plyr(".player-main", {
      hideControls: false,
      captions: { active: true },
    });
    player.toggleControls(false);

    player.on("play", (event) => {
      player.toggleControls(true);
    });
  });
}

export { videoBlock };
