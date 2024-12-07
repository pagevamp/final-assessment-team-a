const swiper = new Swiper(".swiper", {
  // loop: true,
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar",
    },
    navigation: {
      nextEl: ".btn-primary-next",
      prevEl: ".btn-primary-prev",
    },
    on: {
      slideChange: function() {
        // Get the current index (starts from 0)
        let currentIndex = this.realIndex + 1; 

        // Update the progress numbers
        document.getElementById('left-number').innerText = String(currentIndex).padStart(2, '0');         
      }
    }
});