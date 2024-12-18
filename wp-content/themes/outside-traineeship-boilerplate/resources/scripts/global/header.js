import "../../../node_modules/bootstrap/js/dist/offcanvas";
import "bootstrap/js/dist/dropdown.js"

window.addEventListener('DOMContentLoaded', () => {
    const header = () => {
        const offcanvasEl = document.querySelector('#header .navbar');
        if (!offcanvasEl) {
            return;
        }
        new Offcanvas(offcanvasEl);
    }
    header();
});

export default header;

