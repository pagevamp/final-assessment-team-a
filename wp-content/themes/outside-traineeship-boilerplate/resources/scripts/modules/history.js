
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
    });
  });

  function showPopup(title, slug, imageUrl, paragraphs) {
    new Promise(resolve => setTimeout(resolve, 500)); 
    popUp.showModal();
    let popupTitle = document.getElementById('popup-title');
    popupTitle.innerHTML = `${title}`;
    
    let popupImage = document.getElementById('popup-image');
    popupImage.src = `${imageUrl}`;

    let popupParagraph = document.getElementById('popup-paragraph');
    popupParagraph.innerHTML = `${paragraphs}`;
    
    window.history.pushState({ slug }, title, `/${slug}`);
  }

  closeBtn.addEventListener("click", ()=>{
    popUp.close();
    window.history.pushState({}, "", window.location.origin);
  });
  
  // // Fetch content dynamically
  // const fetchContent = async (slug) => {
  //   try {
  //     const res = await fetch(`/wp-json/wp/v2/history?slug=${slug}`);
  //     if (!res.ok) throw new Error("Failed to fetch");

  //     const [post] = await res.json(); // Destructure the first post
  //     const doc = new DOMParser().parseFromString(post.content.rendered, "text/html");

  //     return `
  //       <h2>${post.rendered}</h2>
  //       ${Array.from(doc.querySelectorAll("img")).map(img => img.outerHTML).join("")}
  //       ${Array.from(doc.querySelectorAll("p")).map(p => p.outerHTML).join("")}
  //     `;
  //   } catch (err) {
  //     console.error(err);
  //     return "<p>Content could not be loaded. Please try again later.</p>";
  //   }
  // };

  // // Open popup and load content
  // const openPopup = async (title, slug) => {
  //   window.history.pushState({ slug }, title, `/${slug}`);
  //   popupOverlay.classList.add("active");
  //   popupOverlay.setAttribute("aria-hidden", "false");
  //   popupBody.innerHTML = `<p>Loading <strong>${title}</strong>...</p>`;
  //   popupBody.innerHTML = await fetchContent(slug);
  // };

  // // Event listeners
  // document.querySelectorAll(".continue-reading").forEach(link =>
  //   link.addEventListener("click", (e) => {
  //     e.preventDefault();
  //     const { title, slug } = link.dataset;
  //     openPopup(title, slug);
  //   })
  // );

  // const closePopup = () => {
  //   popupOverlay.classList.remove("active");
  //   popupOverlay.setAttribute("aria-hidden", "true");
  //   window.history.pushState({}, "", window.location.origin);
  // };

  // closePopupBtn.addEventListener("click", closePopup);
  // popupOverlay.addEventListener("click", (e) => e.target === popupOverlay && closePopup());

  // window.addEventListener("popstate", (e) => {
  //   if (e.state?.slug) openPopup(e.state.slug, e.state.slug);
  //   else closePopup();
  // });
});

