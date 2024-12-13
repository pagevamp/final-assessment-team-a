
import Swiper from 'swiper/core';
import { Pagination, Navigation } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener("DOMContentLoaded", () => {
    new Swiper('.historyswiper', {
        modules: [Pagination, Navigation],
       
        // calculateHeight: true,
        loop: true,
        slidesPerView: "auto",
        pagination: {
          el: '.swiper-pagination',
          
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
      console.log("hi");
});

