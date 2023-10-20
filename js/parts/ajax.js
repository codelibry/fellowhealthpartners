import $ from "jquery";

function show_more() {
  $("#loadmore").click(function () {
    $(this).find("span").text("Loading...");
    var data = {
      action: "loadmore",
      query: posts_vars,
      page: current_page,
    };
    // send Ajax
    $.ajax({
      url: ajaxurl,
      data: data,
      type: "POST",
      success: function (data) {
        if (data) {
          $(".careers__list").append(data);
          current_page++;
          if (current_page == max_pages) $("#loadmore").remove();
        } else {
          $("#loadmore").remove();
        }
      },
    });
  });

  $(".post-show-more").click(function () {
    var category_var = $("#post-filters .cat-list_item.active").data(
      "category"
    ); // Get the selected category
    var data = {
      action: "loadmore_news",
      query: posts_vars,
      page: current_page,
      category: category_var,
    };
    // send Ajax
    $.ajax({
      url: ajaxurl,
      data: data,
      type: "POST",
      beforeSend: function () {
        console.log("show:", category_var);
      },
      success: function (data) {
        if (data) {
          $(".articles__row").append(data);
          current_page++;
          if (current_page == max_pages) $(".post-show-more").remove();
        } else {
          $(".post-show-more").remove();
        }
      },
    });
  });
}

function load_projects() {
  $(".cat-list_item").on("click", function () {
    event.preventDefault();
    $(".cat-list_item").removeClass("active");
    $(this).addClass("active");
    var page = 1; // Set the current page to 1 when filtering by category
    var category_var = $(this).data("category");
    $.ajax({
      type: "POST",
      url: "/wp-admin/admin-ajax.php",
      dataType: "html",
      data: {
        action: "filter_news",
        category: category_var,
        // page: page,
      },
      beforeSend: function () {
        // console.log(category_var);
      },
      success: function (res) {
        setTimeout(function () {
          $(".articles__row").html(res);
        }, 400); // in milliseconds
      },
      error: function (res) {
        console.warn(res);
      },
      complete: function () {},
    });
  });
}

export { show_more, load_projects };
