<?php
    $histories          = get_field('history');
    $heading            = $histories['heading'] ?? '';
    $relationship_posts = $histories['histories-history-relationship'] ?? [];

    $post_ids           = [];

    foreach ($relationship_posts as $relationship_post) {
        $post_ids[] = $relationship_post->ID;
    }
?>

<section id="history" class="history bg-texture py-xl">
<?php if (!empty($heading)): ?>
                <h2 class="history__heading h2 text-section-title text-neutral-600"><?php echo $heading; ?></h2>
            <?php endif; ?>
    <?php
    $args = [
        'post_type'         => 'history',
        'posts_per_page'    => -1,
        'post__in'          => $post_ids,
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()): ?>
        <div class="container me-0">
            
            
            <div class="swiper history-swiper">
                <div class="swiper-wrapper">
                    <?php
                    while($query->have_posts()) :
                        $query->the_post();

                        $post_id = get_the_ID();
                        $image_url = get_the_post_thumbnail_url($post_id);
                        $paragraphs = get_field('history_paragraphs', $post_id);
    
                        
                    ?>
                        <div class="history__container swiper-slide" aria-labelledby="history-heading-<?php echo $post_id; ?>">
                            <h2 id="history-heading-<?php echo $post_id; ?>" class="history__heading text-xl text-primary">
                                <?php echo get_the_title(); ?>
                            </h2>
                        
                            <?php if ($image_url): ?>
                                <div class="image-container">
                                    <img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr(get_the_title()); ?>" aria-hidden="true">
                                </div>
                            <?php endif; ?>

                            <?php if ($paragraphs): ?>
                                <div class="history__content">
                                    <?php foreach ($paragraphs as $paragraph): ?>
                                        <p class="text-neutral-600">
                                                <?php echo $paragraph[0]['paragraph']; ?>
                                        </p>
                                        <?php if (!empty($paragraph['paragraph'])):?>
                                            <p class="text-neutral-600">
                                                <?php echo $paragraph[0]['paragraph']; ?>
                                            </p>
                                        <?php else: ?>
                                            <p class="text-neutral-600">
                                                Paragraph data is missing.
                                            </p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <a href="#" class="text-sm text-primary text-decoration-none continue-reading" aria-label="Read more about <?php echo esc_attr(get_the_title()); ?>"
                                data-title="<?php echo esc_attr(get_the_title()); ?>"
                                data-slug="<?php echo get_post_field('post_name', $post_id); ?>">
                                    Continue Reading
                                </a>
                                
                                
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    
                </div>
            </div>
        </div>
    <?php
        wp_reset_postdata();
    else:
        echo '<p>No posts found</p>';
    endif;
    ?>
    
    <div class="swiper-navigation">
        <button class="btn-swiper-prev btn-primary" aria-label="Previous history"></button>
        <button class="btn-swiper-next btn-primary" aria-label="Next history"></button>
    </div>
</section>
