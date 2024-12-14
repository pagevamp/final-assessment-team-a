// import Player from '@vimeo/player';

document.addEventListener('DOMContentLoaded', function() {
    const iframe = document.getElementById('vimeo-player');
    const player = new Vimeo.Player(iframe);
    const playButton = document.getElementById('play-button');
    const pauseButton = document.getElementById('pause-button');

    // Play button functionality
    playButton.addEventListener('click', () => {
        player.play();
    })

    // Pause button functionality
    pauseButton.addEventListener('click', () => {
        player.pause();
    })
})