import $ from "jquery";

function backButton() {
    $(document).ready(function () {
      $(".button--back").each(function () {
        const backButton = $(this);
  
        if (history.length <= 1) {
          backButton.hide();
        }
  
        backButton.on('click', function () {
          history.back();
        });
      });
    });
  }

export {backButton}