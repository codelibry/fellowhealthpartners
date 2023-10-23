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
}

function load_projects() {
  let count_all = parseInt(
    $(".post-show-more .btn__count")
      .text()
      .match(/\((\d+)\)/)[1]
  );
  let cat_counts = {}; // Object to store category counts

  console.log("Total Post Count: " + count_all);

  // Function to subtract posts from the total count
  function subtractPostsFromTotalCount(num) {
    count_all -= num;
    $(".btn__count").text("(" + count_all + ")");
  }

  // Function to update the post count
  function updatePostCount(category_id) {
    var data = {
      action: "get_category_count",
      category: category_id,
    };

    $.ajax({
      type: "POST",
      url: "/wp-admin/admin-ajax.php",
      dataType: "html",
      data: data,
      success: function (count) {
        $(".btn__count").text("(" + count + ")");
        count = parseInt(count); // Convert to integer
        cat_counts[category_id] = count; // Update the category count
      },
      error: function (res) {
        console.warn(res);
      },
    });
  }
  $(".cat-list_item").on("click", function () {
    event.preventDefault();
    $(".cat-list_item").removeClass("active");
    $(this).addClass("active");
    var page = 1; // Set the current page to 1 when filtering by category
    var category_var = $(this).data("category");

    if (category_var === "all") {
      $(".btn__count").text("(" + count_all + ")");
    } else {
      // Update the post count when a category is selected
      updatePostCount(category_var);
    }

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
        $(".articles__row").html(res);
      },
      error: function (res) {
        console.warn(res);
      },
      complete: function () {},
    });
  });

  // Function to subtract posts from the category count
  function subtractPostsFromCatCount(category_var, num) {
    if (cat_counts[category_var] !== undefined) {
      cat_counts[category_var] -= num;
      $(".btn__count").text("(" + cat_counts[category_var] + ")");
    }
  }

  $(".post-show-more").click(function () {
    var category_var = $("#post-filters .cat-list_item.active").data(
      "category"
    ); // Get the selected category
    $(this).find("svg").addClass("rotate");
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
          $(".post-show-more").find("svg").removeClass("rotate");
          // Subtract the number of posts loaded via AJAX
          if (category_var === "all") {
            subtractPostsFromTotalCount(3); // Assuming 3 posts per page
          } else {
            // Call the function with the correct category_var
            subtractPostsFromCatCount(category_var, 3); // Assuming 3 posts per page
          }
          if (current_page == max_pages) $(".post-show-more").remove();
        } else {
          $(".post-show-more").remove();
        }
      },
    });
  });
}

export { show_more, load_projects };
