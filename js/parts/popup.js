import $ from "jquery";

function popup() {
  $(function () {
    $(".js-popup").magnificPopup({
      type: "inline",
      preloader: false,
      modal: false,
    });
    $(document).on("click", ".popup-modal-dismiss", function (e) {
      e.preventDefault();
      $.magnificPopup.close();
    });
  });
}

export { popup };
