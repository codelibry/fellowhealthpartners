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
