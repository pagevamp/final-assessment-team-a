console.log('App JS hello world');

import './modules/swiper';

import './global/header';

document.addEventListener('DOMContentLoaded', () => {
    // header height
    let header = document.querySelector('#header');
    let headerHeight = header.offsetHeight;

    // leadspace height
    let leadspace = document.querySelector('#leadspace');
    leadspace.style.height = `calc(100vh - ${headerHeight}px)`;

    //404
    let errorPage = document.querySelector('.error-404');
    errorPage.style.height = `calc(100vh - ${headerHeight}px)`;
});




