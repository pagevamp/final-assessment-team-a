<?php
    $projects               = get_field('projects');
    $title                  = $projects['heading'];
    $relationship_posts     = $projects['projects_relationship'];
    $filter                 = $projects['filter'];
    $page_or_nav            = $projects['pagination_or_navigation'];
    $post_ids               = array();

    foreach ($relationship_posts as $relationship_post) {
        $post_ids[] = $relationship_post->ID;
    }
?>

<section id="recent__projects" class="recent__projects">
    <?php if (!empty($title)): ?>
        <h2 id="projects-title" class="text-section-title h2">
            <?php echo esc_html($title); ?>
        </h2>
    <?php endif; ?>

    <?php if($filter):?>
        
    <?php endif; ?>

    
            <?php
            $args = [
                'post_type'         => 'project',
                'posts_per_page'    => -1,
                'post__in'          => $post_ids,
            ];
            $query = new WP_Query($args);

           if ($filter): ?>
                <div id="project-filter" class="project-filter mx-auto">
                    <!-- Buttons for Desktop View -->
                    <div class="filter-buttons w-100 d-none d-sm-flex justify-content-center">
                        <button class="filter-btn text-sm text-neutral-600" data-filter="all">All Projects</button>
                        <?php
                        // Get all terms from the taxonomy
                        $taxonomy = 'project-type'; // Replace with your taxonomy slug
                        $terms = get_terms([
                            'taxonomy' => $taxonomy,
                            'hide_empty' => false,
                        ]);
            
                        if (!empty($terms) && !is_wp_error($terms)):
                            foreach ($terms as $term): ?>
                                <button class="filter-btn text-sm text-neutral-200" data-filter="<?php echo esc_attr($term->slug); ?>">
                                    <?php echo esc_html($term->name); ?>
                                </button>
                            <?php endforeach; 
                        endif; ?>
                    </div>
            
                    <div class="filter-dropdown d-sm-none d-flex justify-content-between align-items-center">
                        <p class="filter-by text-md m-0">Filter by:</p>
                        <select name="filter__categories" id="filter__categories">
                            <option value="all">All Projects</option>
                            <?php if (!empty($terms) && !is_wp_error($terms)):
                                foreach ($terms as $term): ?>
                                    <option value="<?php echo esc_attr($term->slug); ?>">
                                        <?php echo esc_html($term->name); ?>
                                    </option>
                                <?php endforeach; 
                            endif; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
            


            <div id="project-swiper" class="swiper project-swiper" role="region" aria-label="Featured Projects Carousel">
                <div class="swiper-wrapper align-items-stretch w-100">
            <?php if ($query->have_posts()):
                while ($query->have_posts()) :
                    $query->the_post();
                    $heading = get_the_title();
                    $post_id = get_the_ID();
                    $image_url = get_the_post_thumbnail_url($post_id);
                    $categories = get_the_terms($post_id, 'project-type');
            ?>


                    <div class="projects__container swiper-slide w-100" role="group">
                        <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                            <p class="projects__heading c3 text-primary mb-xs"><?php echo esc_html($categories[0]->name); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($heading)): ?>
                            <p class="projects__category sh2 text-neutral-600 mb-l">
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
            <button class="btn-primary-prev btn-primary" aria-label="Previous project">
            </button>
            <button class="btn-primary-next btn-primary" aria-label="Next project">
            </button>
        </div>
    </div>
</section>