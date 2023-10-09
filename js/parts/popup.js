import $ from "jquery";

function popup() {
  // $(function () {
  //   $(".js-popup").magnificPopup({
  //     type: "inline",
  //     preloader: false,
  //     modal: false,
  //   });
  //   $(document).on("click", ".popup-modal-dismiss", function (e) {
  //     e.preventDefault();
  //     $.magnificPopup.close();
  //   });
  // });
}

function initPopups() {
  popupListeners();
  $(document).on("ajaxComplete", popupListeners);
}

function popupListeners() {
  $(".popup-open").click(function (e) {
    e.preventDefault();
    var image = $(this)
      .closest(".popup-item")
      .find(".popup-image img")
      .attr("src");
    var title = $(this).closest(".popup-item").find(".popup-title").html();
    var subtitle = $(this)
      .closest(".popup-item")
      .find(".popup-subtitle")
      .html();
    var text = $(this).closest(".popup-item").find(".popup-text").html();
    var contentTitle = $(this)
      .closest(".popup-item")
      .find(".popup-content-title")
      .html();
    var links = $(this)
      .closest(".popup-item")
      .find(".popup-content-links")
      .html();
    var content = $(this).closest(".popup-item").find(".popup-content").html();
    $(".popup__title").html(title);
    $(".popup__subtitle").html(subtitle);
    $(".popup__text").html(text);
    $(".popup__content-title").html(contentTitle);
    $(".popup__content").html(content);
    $(".popup-content-links").html(links);
    $(".popup__image img")
      .attr("src", image)
      .load(function () {
        $(".popup__image").addClass("active-image");
      });
    $("body").addClass("active-popup");
  });
  $(".popup__overlay, .popup__close").click(function () {
    $("body").removeClass("active-popup");
    $(".popup__image").removeClass("active-image");
  });
  $(document).keyup(function (e) {
    if (e.key === "Escape") {
      $("body").removeClass("active-popup");
      $(".popup__image").removeClass("active-image");
    }
  });
}

export { initPopups };
