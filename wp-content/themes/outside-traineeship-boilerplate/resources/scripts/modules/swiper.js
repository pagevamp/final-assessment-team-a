document.addEventListener("DOMContentLoaded", () => {
  let mainSwipers = document.querySelectorAll('.main-swiper');
  let swiperInstances = {}; // Object to keep track of Swiper instances

  // Function to initialize or destroy Swipers based on screen width
  const handleSwiper = () => {
    mainSwipers.forEach((mainSwiper) => {
      let swiperId = mainSwiper.id;

      if (window.innerWidth < 700) {
        // Destroy Swiper if it exists
        if (swiperInstances[swiperId]) {
          swiperInstances[swiperId].destroy(true, true);
          delete swiperInstances[swiperId];
        }
      } else {
        // Initialize Swiper if not already initialized
        if (!swiperInstances[swiperId]) {
          swiperInstances[swiperId] = new Swiper(`#${swiperId}`, {
            slidesPerView: "auto",
            spaceBetween: 30,
            navigation: {
              nextEl: ".btn-swiper-next",
              prevEl: ".btn-swiper-prev",
            },
          });
        }
      }
    });
  };

  // Run on initial load
  handleSwiper();

  // Attach resize event listener
  window.addEventListener('resize', handleSwiper);
});
