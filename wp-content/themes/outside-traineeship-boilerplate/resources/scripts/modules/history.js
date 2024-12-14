
import Swiper from 'swiper/core';
import { Pagination, Navigation } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener("DOMContentLoaded", () => {
  new Swiper('.history-swiper', {
    modules: [Pagination, Navigation],
    slidesPerView: "auto",
    spaceBetween: 24,
    pagination: {
      el: '.swiper-pagination',
      
    },
    breakpoints:{
      700: {
        spaceBetween: 75,
      }
    },
    navigation: {
      nextEl: '.btn-swiper-next',
      prevEl: '.btn-swiper-prev',
    },
  });

});

