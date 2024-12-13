<?php
$video = get_field('video');
?>

<section id="gallery" class="gallery">
    <div class="gallery__video-container">
        <iframe id="vimeo-player" class="gallery__video" src="<?php echo $video['vimeo_link']['url']; ?>&controls=0" data-src="<?php echo $video['vimeo_link']['url']; ?>&controls=0" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        <div class="gallery__controls">
            <button id="play-button" class="btn-primary">
                <span class="icon-play"></span>
            </button>
            <button id="pause-button" class="btn-primary">
                <span class="icon-pause"></span>
            </button>
        </div>
    </div>
</section>