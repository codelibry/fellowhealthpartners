import $ from "jquery";

function footer() {
  $("#footer-menu .menu-item-has-children .menu-item__parent").click(
    function () {
      $(this).parent().toggleClass("opened");
      $(this).parent().find(".sub-menu").slideToggle();
    }
  );
  $("#footer-menu .menu-item__parent").on("click", function () {
    event.preventDefault();
  });
}

export { footer };
