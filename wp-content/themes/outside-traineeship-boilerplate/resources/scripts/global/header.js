import "../../../node_modules/bootstrap/js/dist/offcanvas";
import "bootstrap/js/dist/dropdown.js"

window.addEventListener('DOMContentLoaded', () => {
    const header = () => {
        const offcanvasEl = document.querySelector('#header .navbar');
        console.log('I am a function');
        if (!offcanvasEl) {
            return;
        }
        console.log('i am running')
        new Offcanvas(offcanvasEl);
    }
    header();
});

export default header;

