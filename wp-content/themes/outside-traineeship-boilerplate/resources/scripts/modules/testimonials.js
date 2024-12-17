import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const swiper = new Swiper(".testimonialswiper", {
  modules: [Pagination, Navigation],
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
// Updating te HTML
const totalSlides = swiper.slides.length;
document.getElementById('right-number').textContent = '0'+ totalSlides;