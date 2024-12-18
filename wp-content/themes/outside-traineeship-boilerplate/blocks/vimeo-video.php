<?php
$video = get_field('video');
if (!empty($video)):
?>
    <section id="gallery" class="gallery">
        <div class="gallery__video-container">
            <iframe id="vimeo-player" class="gallery__video" src="<?php echo $video['vimeo_link']['url']; ?>&controls=0" data-src="<?php echo $video['vimeo_link']['url']; ?>&controls=0" frameborder="0" allow="autoplay"></iframe>
            <div class="overlay bg-overlay-50"></div>

            <div class="gallery__controls">
                <div class="btn-play-pause">
                    <span class="icon-play"></span>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>