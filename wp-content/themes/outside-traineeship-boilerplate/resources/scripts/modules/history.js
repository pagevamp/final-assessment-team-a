document.addEventListener("DOMContentLoaded", () => {
    let mainSwipers = document.querySelectorAll('.historyswiper');
    let swiperInstances = {}; // Object to keep track of Swiper instances
  
    // Function to initialize or destroy Swipers based on screen width
    const handleSwiper = () => {
      mainSwipers.forEach((mainSwiper) => {
        let swiperId = mainSwiper.id;
  
      
          // Initialize Swiper if not already initialized
          if (!swiperInstances[swiperId]) {
            swiperInstances[swiperId] = new Swiper(`#${swiperId}`, {
              
            });
          }
        
      });
    };
  
    // Run on initial load
    handleSwiper();
  
    // Attach resize event listener
    window.addEventListener('resize', handleSwiper);
});