import { Offcanvas } from 'bootstrap';

const header = () => {
    const offcanvasEl = document.querySelector('header .offcanvas');
    if (!offcanvasEl) {
        return;
    }
    new Offcanvas(offcanvasEl);
}
header();
export default header;

