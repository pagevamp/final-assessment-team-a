import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener('DOMContentLoaded', ()=>{
    const swiper = new Swiper(".project-swiper", {
        modules: [Pagination, Navigation],
        // loop: true,
            pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        slidesPerView: "auto",
        breakpoints: {
            700: {
                slidesPerView: 6,
            },
            1000 :{
                slidesPerView: 16,
            }
        },
        
        navigation: {
            nextEl: ".btn-primary-next",
            prevEl: ".btn-primary-prev",
        },
        
    });
    console.log("hi");
      
});