import $ from "jquery";

function horizontal_Tabs() {
  // Show the first tab and hide the rest
  $("#tabs-nav li:first-child").addClass("active");
  $(".tab-content").hide();
  $(".tab-content:first").show();

  // Click function
  $("#tabs-nav li").click(function () {
    $("#tabs-nav li").removeClass("active");
    $(this).addClass("active");
    $(".tab-content").hide();

    var tabNumber = $(this).find("div").data("tab");
    $("#" + tabNumber).fadeIn();
    return false;
  });

  $(".images_list a").click(function () {
    // e.preventDefault(); // Prevent the default action of the link click

    var hash = this.hash; // Get the hash value of the clicked link
    var tabNumber = hash.substring(1); // Extract the tab number from the hash

    // Check if the hash matches tabNumber
    if ($("#" + tabNumber).length && $("#" + tabNumber).is(":hidden")) {
      // Switch active block and fadeIn corresponding tab content
      $("#tabs-nav li").removeClass("active");
      // Add 'active' class to the corresponding nav item
      $("#tabs-nav li")
        .find("div[data-tab='" + tabNumber + "']")
        .parent()
        .addClass("active");
      // $("#tabs-nav li:first-child").addClass("active");
      $(".tab-content").hide();
      // $(".tab-content:first").show();
      $("#" + tabNumber).fadeIn();
    }
  });
}

export { horizontal_Tabs };
