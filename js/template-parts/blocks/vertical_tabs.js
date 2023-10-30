import $ from "jquery";

function vertical_Tabs() {
  // Variables
  const tabLinks = document.querySelectorAll("#tabs-section .tab-link");
  const tabBodies = document.querySelectorAll("#tabs-section .tab-body");
  let timerOpacity;

  // Toggle Class
  const init = () => {
    // Menu Click or Hover
    tabLinks.forEach((link) => {
      link.addEventListener("click", toggleTab);
      link.addEventListener("mouseover", toggleTab);
    });
  };

  const toggleTab = function (e) {
    e.preventDefault();
    e.stopPropagation();

    // Clear Timers
    window.clearTimeout(timerOpacity);

    // Toggle Class Logic
    // Remove Active Classes
    tabLinks.forEach((link) => link.classList.remove("active"));
    tabBodies.forEach((body) => {
      body.classList.remove("active");
      body.classList.remove("active-content");
    });

    // Add Active Classes
    this.classList.add("active");
    document.querySelector(this.getAttribute("href")).classList.add("active");

    // Opacity Transition Class
    timerOpacity = setTimeout(() => {
      document
        .querySelector(this.getAttribute("href"))
        .classList.add("active-content");
    }, 50);
  };

  // Document Ready
  document.addEventListener("DOMContentLoaded", function () {
    init();
  });
}

export { vertical_Tabs };
