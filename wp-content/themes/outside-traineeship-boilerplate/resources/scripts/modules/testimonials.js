const swiper = new Swiper(".swiper", {
  pagination: {
    el: ".swiper-pagination",
    type: "progressbar",
  },
  navigation: {
    nextEl: ".btn-primary-next",
    prevEl: ".btn-primary-prev",
  },
  autoplay: {
    enabled: false,
  },
  breakpoints: {
    768: {
      autoplay: {
        enabled: true,
        delay: 1000,
      }
    }
  },
  on: {
    slideChange: function () {
      // Update progress numbers
      let currentIndex = this.realIndex + 1;
      document.getElementById("left-number").innerText = String(currentIndex).padStart(2, "0");
    },
  },
});