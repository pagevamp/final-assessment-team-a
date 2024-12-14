// import Player from '@vimeo/player';

document.addEventListener('DOMContentLoaded', function () {
    const iframe = document.getElementById('vimeo-player');
    const player = new Player(iframe);

    const playpauseButton = document.querySelector('.btn-play-pause span');
    const videoContainer = document.querySelector('.gallery__video-container');
    const controls = document.querySelector('.gallery__controls');
    const videoOverlay = document.querySelector('.overlay');

    let isPlaying = false; 

    playpauseButton.addEventListener('click', () => {
        if (isPlaying) {
            player.pause();
            playpauseButton.classList.replace("icon-pause", "icon-play");
        } else {
            player.play();
            playpauseButton.classList.replace("icon-play", "icon-pause");
        }
        isPlaying = !isPlaying; 
    });

    videoContainer.addEventListener('mouseenter', () => {
        controls.style.opacity = '1';
        videoOverlay.style.opacity = '1';
    });

    videoContainer.addEventListener('mouseleave', () => {
        if(isPlaying){
            controls.style.opacity = '0';
            videoOverlay.style.opacity = '0';
        } 
    });
});
