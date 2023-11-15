import $ from "jquery";

function vertical_Tabs() {
  function initializeTabbedInterface() {
    const $tabLinks = $("#tabs-section .tab-link");
    const $tabBodies = $("#tabs-section .tab-body");
    let timerOpacity;

    if ($(window).width() > 992) {
      // Toggle Class
      const init = () => {
        // Menu Click or Hover
        $tabLinks.on("click mouseover", toggleTab);
      };

      const toggleTab = function (e) {
        e.preventDefault();
        e.stopPropagation();

        // Clear Timers
        clearTimeout(timerOpacity);

        // Toggle Class Logic
        // Remove Active Classes
        $tabLinks.removeClass("active");
        $tabBodies.removeClass("active active-content");

        // Add Active Classes
        $(this).addClass("active");
        $($(this).attr("href")).addClass("active");

        // Opacity Transition Class
        timerOpacity = setTimeout(() => {
          $($(this).attr("href")).addClass("active-content");
        }, 50);
      };

      init();

      window.onload = function () {
        function setMaxHeight() {
          var heights = []; // Array to store heights of each block

          // Loop through each .content_right block
          $(".tab-body").each(function () {
            // Get the height of each block
            var currentHeight = $(this).outerHeight();

            // Store the height in the array
            heights.push(currentHeight);

            // Log the height of each block
            console.log("Height: " + currentHeight);
          });

          // Find the maximum height from the array
          var maxHeight = Math.max.apply(null, heights);
          // Log the height of each block
          console.log("maxHeight: " + maxHeight);
          // Set the CSS variable --highest_block with the maxHeight value
          document.documentElement.style.setProperty(
            "--highest_block",
            maxHeight + "px"
          );
        }

        // Set max height on initial load
        setMaxHeight();

        // Listen for window resize event and recalculate max height
        window.addEventListener("resize", function () {
          setMaxHeight();
        });
      };
    } else {
      $("#tab-list li:first-child .link-body").addClass("active");
      $("#tabs-section .tab-link").click(function (e) {
        e.preventDefault();
        $("#tabs-section .tab-link").removeClass("active");
        $(this).addClass("active");
        $(this).parent("li").find(".link-body").slideToggle();
        $(this).parent("li").prevAll("li").find(".link-body").slideUp();
        $(this).parent("li").nextAll("li").find(".link-body").slideUp();
      });
    }
  }

  // Initialize when the document is ready
  $(document).ready(initializeTabbedInterface);

  // Initialize when the window is resized
  $(window).resize(initializeTabbedInterface);
}

export { vertical_Tabs };
