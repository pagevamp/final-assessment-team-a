<?php
    $testimonials = get_field('testimonials');
?>

<section id="testimonials" class="testimonials bg-texture" aria-labelledby="testimonials-heading">

    <h2 id="testimonials-heading" class="visually-hidden">Client Testimonials</h2>

    <?php if(!empty($testimonials)):?>
        <div class="swiper" aria-live="polite" tabindex="0">
            <div class="swiper-wrapper">

                <!-- Fetching the data -->
                <?php foreach ($testimonials['testimonial'] as $testimonial):
                    $image = $testimonial['client_logo'];
                    $testimonial_content = $testimonial['testimonial_content'];
                    $name = $testimonial['client_name'];
                    $company = $testimonial['client_company'];                    
                ?>

                    <div class="swiper-slide" role="group" aria-roledescription="slide">

                       <div class="testimonials__item">
                            <?php if ($image): ?>
                                <img 
                                    src="<?php echo $image['url']; ?>" 
                                    class="testimonials__logo" 
                                    alt="<?php echo $name; ?>'s company logo" 
                                    tabindex="0">
                            <?php endif; ?>

                            <div class="testimonials__content" tabindex="0">
                                <span class="icon-quote text-primary" aria-hidden="true"></span>
                                <h5 class="h5">"<?php echo $testimonial_content; ?>"</h5>
                                <div class="testimonials__info">
                                    <p class="c2 text-neutral-500 text-md-neutral-100 testimonials__name" tabindex="0"><?php echo $name; ?></p>
                                    <p class="text-sm-all text-neutral-200 testimonials__company" tabindex="0"><?php echo $company; ?></p>
                                </div>
                            </div>
                       </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <span class="text-lg text-neutral-100 progress-number left-number" id="left-number">01</span>
            <span class="text-lg text-neutral-100 progress-number right-number" id="right-number">04</span>

            <div class="swiper-pagination" aria-hidden="true">
            </div>
            
            <div class="swiper-navigation">
                <button class="btn-primary-prev bg-primary icon-arrow-left text-white" aria-label="Previous slide"></button>
                <button class="btn-primary-next bg-primary icon-arrow-right text-white" aria-label="Next slide"></button>
            </div>
        </div>
    <?php endif; ?>
</section>
