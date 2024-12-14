import { Offcanvas } from 'bootstrap';


const header = () => {
    const offcanvasEl = document.querySelector('header .offcanvas');
    console.log('I am a function');
    if (!offcanvasEl) {
        return;
    }
    console.log('i am running')
    new Offcanvas(offcanvasEl);

}
header();
export default header;

