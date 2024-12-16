
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
    breakpoints: {
      700: {
        spaceBetween: 75,
      }
    },
    navigation: {
      nextEl: '.btn-swiper-next',
      prevEl: '.btn-swiper-prev',
    },
  });

  const historyCards = document.querySelectorAll('#history-card');
  const closeBtn = document.querySelector('#popup-close');
  const popUp = document.querySelector('#popup-dialog');

  historyCards.forEach(card => {
    card.addEventListener('click', () => {
      const title = card.querySelector('.history__heading').innerText;
      const slug = card.getAttribute('data-slug');
      const imageUrl = card.querySelector('.image-container img')?.src; // Get the image URL if it exists
      const paragraphs = card.querySelector('.history__content')?.innerHTML; // Get the paragraphs if they exist

      showPopup(title, slug, imageUrl, paragraphs);

      const urlParams = new URL(window.location).searchParams;
      if (urlParams.get('year') === `?year=${slug}`) {
        dialog.showModal();
      }
    });
  });

  function showPopup(title, slug, imageUrl, paragraphs) {
    console.log("was");
    popUp.showModal();
    let popupTitle = document.getElementById('popup-title');
    popupTitle.innerHTML = `${title}`;

    let popupImage = document.getElementById('popup-image');
    popupImage.src = `${imageUrl}`;

    let popupParagraph = document.getElementById('popup-paragraph');
    popupParagraph.innerHTML = `${paragraphs}`;

    const url = new URL(window.location);

    url.searchParams.set('year', `?year=${slug}`);

    window.history.pushState({}, '', url);
  }

  closeBtn.addEventListener("click", () => {
    popUp.close();
    const url = new URL(window.location);
    url.searchParams.delete('year');
    window.history.pushState({}, "", url);
  });

  // const slug = sessionStorage.getItem('popupSlug');
  // if (slug) {
  //   // Simulate a click on the corresponding history card
  //   const card = Array.from(historyCards).find(card => card.getAttribute('data-slug') === slug);
  //   if (card) {
  //     const title = card.querySelector('.history__heading').innerText;
  //     const imageUrl = card.querySelector('.image-container img')?.src; // Get the image URL if it exists
  //     const paragraphs = card.querySelector('.history__content')?.innerHTML; // Get the paragraphs if they exist

  //     openPopup(title, slug, imageUrl, paragraphs);
  //   }
  // }

});

