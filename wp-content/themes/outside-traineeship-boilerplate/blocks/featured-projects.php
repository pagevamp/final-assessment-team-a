<?php
    $projects               = get_field('featured_projects');
    if(!empty($projects)) :
        $title                  = $projects['heading'] ?? '';
        $relationship_posts     = $projects['feature_projects_relationship'] ?? '';

        $post_ids               = array();

        foreach ($relationship_posts as $relationship_post) {
            $post_ids[] = $relationship_post->ID;
        }
?>

        <section id="projects" class="projects">
            <?php if (!empty($title)): ?>
                <h2 id="projects-title" class="text-section-title h2">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <div id="project-swiper" class="swiper main-swiper" role="region" aria-label="Featured Projects Carousel">
                <div class="swiper-wrapper align-items-stretch">
                    <?php
                    $args = [
                        'post_type'         => 'project',
                        'posts_per_page'    => -1,
                        'post__in'          => $post_ids,
                    ];
                    $query = new WP_Query($args);

                    if ($query->have_posts()):
                        while ($query->have_posts()) :
                            $query->the_post();

                            $heading = get_the_title();
                            $post_id = get_the_ID();
                            $image_url = get_the_post_thumbnail_url($post_id);
                            $categories = get_the_terms($post_id, 'project-type');
                    ?>
                            <div class="projects__container swiper-slide" role="group">
                                <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                                    <p class="projects__heading c1 text-primary mb-xs"><?php echo esc_html($categories[0]->name); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($heading)): ?>
                                    <p class="projects__category sh1 text-neutral-600 mb-l">
                                        <?php echo esc_html($heading); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($image_url)): ?>
                                    <div class="image-container">
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($heading); ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo 'No posts found';
                    endif;
                    ?>
                </div>
                <div class="swiper-navigation">
                    <button class="btn-swiper-prev btn-primary" aria-label="Previous project">
                    </button>
                    <button class="btn-swiper-next btn-primary" aria-label="Next project">
                    </button>
                </div>
            </div>
        </section>
    <?php endif; ?>