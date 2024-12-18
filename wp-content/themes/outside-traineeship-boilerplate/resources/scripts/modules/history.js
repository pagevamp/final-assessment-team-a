import Swiper from 'swiper/core';
import { Pagination, Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener('DOMContentLoaded', () => {

  // Initialize Swiper
  new Swiper('.history-swiper', {
    modules: [Pagination, Navigation],
    slidesPerView: "auto",
    spaceBetween: 24,
    pagination: { el: '.swiper-pagination' },
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


  const popUp = document.querySelector('#popup-dialog');
  const closeBtn = document.querySelector('#popup-close');
  const historyCards = document.querySelectorAll('#history-card');

  // Function to show the popup and update the localStorage
  function showPopup(title, slug, imageUrl, paragraphs) {
    console.log("Popup Opened");
    popUp.showModal();

    let popupTitle = document.getElementById('popup-title');
    popupTitle.innerHTML = `${title}`;

    let popupImage = document.getElementById('popup-image');
    popupImage.src = `${imageUrl}`;

    let popupParagraph = document.getElementById('popup-paragraph');
    popupParagraph.innerHTML = `${paragraphs}`;

    localStorage.setItem('popupSlug', slug);

    history.pushState({ slug }, '', `?historyyear=${slug}`);
  }

  closeBtn.addEventListener('click', () => {
    popUp.close();
    localStorage.removeItem('popupSlug');
    history.replaceState(null, '', window.location.pathname);  
  });

  historyCards.forEach(card => {
    card.addEventListener('click', () => {
      const title = card.querySelector('.history__heading').innerText;
      const slug = card.getAttribute('data-slug');
      const imageUrl = card.querySelector('.image-container img')?.src;
      const paragraphs = card.querySelector('.history__content')?.innerHTML;

      showPopup(title, slug, imageUrl, paragraphs);
    });
  });

  // Check if there's a popup slug in the URL on page load
  const urlParams = new URLSearchParams(window.location.search);
  const popupSlug = urlParams.get('historyyear');  

  if (popupSlug) {
    const cardToOpen = Array.from(historyCards).find(card => card.getAttribute('data-slug') === popupSlug);

    if (cardToOpen) {
      const title = cardToOpen.querySelector('.history__heading').innerText;
      const imageUrl = cardToOpen.querySelector('.image-container img')?.src;
      const paragraphs = cardToOpen.querySelector('.history__content')?.innerHTML;

      showPopup(title, popupSlug, imageUrl, paragraphs);
    }
  }
});
