
import Swiper from 'swiper/core';
import { Pagination, Navigation } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener("DOMContentLoaded", () => {
  new Swiper('.history-swiper', {
    modules: [Pagination, Navigation],
    pagination: {
      el: '.swiper-pagination',
      
    },
    navigation: {
      nextEl: '.btn-swiper-next',
      prevEl: '.btn-swiper-prev',
    },
  });

});

