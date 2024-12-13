document.addEventListener('DOMContentLoaded', () => {
    let verticalNetContainer = document.getElementById('vertical-net');

    if (window.innerWidth > 1000) {
        verticalNetContainer.innerHTML = "<div class='grid-block'></div><div class='grid-block'></div><div class='grid-block'></div><div class='grid-block'></div>";
    } else if (window.innerWidth > 700) {
        verticalNetContainer.innerHTML = "<div class='grid-block'></div><div class='grid-block'></div><div class='grid-block'></div>";
    } else {
        verticalNetContainer.innerHTML = "<div class='grid-block'></div><div class='grid-block'></div>";
    }
});