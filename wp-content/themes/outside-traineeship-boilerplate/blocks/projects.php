<?php
$projects               = get_field('projects');
if (!empty($projects)):
    $title                  = $projects['heading'];
    $relationship_posts     = $projects['projects_relationship'];
    $filter                 = $projects['filter'];
    $post_ids               = array();

    foreach ($relationship_posts as $relationship_post) {
        $post_ids[] = $relationship_post->ID;
    }
?>

    <section id="recent__projects" class="recent__projects" aria-labelledby="projects-title">
        <?php if (!empty($title)): ?>
            <h2 id="projects-title" class="text-section-title h2">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>


        <?php
        $page = isset($_POST['page']) ? absint($_POST['page']) : 1;
        $posts_per_page = isset($_POST['posts_per_page']) ? absint($_POST['posts_per_page']) : 3;

        $screenWidth = isset($_POST['screen']) ? absint($_POST['screen']) : 16;

        // Set the variable based on screen size
        if ($screenWidth <= 700) {
            $variable = 3;
        } else {
            $variable = 16;
        }

        $args = [
            'post_type'      => 'project',
            'posts_per_page' => $variable,
            'post__in'       => $post_ids,
            'paged'          => $page,
        ];

        $query = new WP_Query($args);

        if ($filter): ?>
            <div id="project-filter" class="project-filter mx-auto">
                <!-- Buttons for Desktop View -->
                <div class="filter-buttons w-100 d-none d-md-flex justify-content-center">
                    <button class="filter-btn text-sm" data-filter="all">All Projects</button>
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

                <div class="filter-dropdown d-md-none d-flex justify-content-between align-items-center">
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



        <div id="project-lists" class="project-lists" role="region" aria-label="Recent Projects Carousel">
            <div class="project-wrapper position-relative align-items-stretch w-100">
                <?php if ($query->have_posts()):
                    while ($query->have_posts()) :
                        $query->the_post();
                        $heading = get_the_title();
                        $post_id = get_the_ID();
                        $image_url = get_the_post_thumbnail_url($post_id);
                        $categories = get_the_terms($post_id, 'project-type');
                ?>


                        <a href="/project" class="projects__container w-100 text-decoration-none" role="group">
                            <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                                <p class="projects__heading c3 text-primary mb-sm-0"><?php echo esc_html($categories[0]->name); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($heading)): ?>
                                <p class="projects__category sh2 text-neutral-600 mb-sm-0">
                                    <?php echo esc_html($heading); ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($image_url)): ?>
                                <div class="image-container">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($heading); ?>">
                                </div>
                            <?php endif; ?>
                         </a>
                    <?php
                    endwhile;

                    $total_pages = $query->max_num_pages; 
                    if ($total_pages != 1): ?>
                        <div class="pagination position-absolute d-flex">
                            <button class="prev-page <?php echo ($page > 1) ? '' : 'opacity-0'; ?>" data-page="<?php echo $page - 1; ?>" <?php echo ($page > 1) ? '' : 'disabled'; ?>>
                                <span class="icon-chevron-down"></span>
                            </button>

                            <?php
                            $visible_pages = 5;
                            $mobile_visible_pages = 3;

                            if ($screenWidth <= 700) {
                                $visible_pages = $mobile_visible_pages;
                            }

                            $start_page = max(1, $page - floor($visible_pages / 2));
                            $end_page = min($total_pages, $start_page + $visible_pages - 1);

                            if ($start_page > 1): ?>
                                <button class="pagination-link text-sm border-1 border-neutral-100" data-page="1">1</button>
                                <span class="pagination-ellipsis">...</span>
                            <?php endif; ?>

                            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                                <button class="pagination-link text-sm border-1 border-neutral-100 <?php echo ($i == $page ? 'active' : ''); ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></button>
                            <?php endfor; ?>

                            <?php if ($end_page < $total_pages): ?>
                                <span class="pagination-ellipsis">...</span>
                                <button class="pagination-link text-sm border-1 border-neutral-100" data-page="<?php echo $total_pages; ?>"> <?php echo $total_pages; ?></button>
                            <?php endif; ?>

                            <button class="next-page <?php echo ($page < $total_pages) ? '' : 'opacity-0'; ?>" data-page="<?php echo $page + 1; ?>" <?php echo ($page < $total_pages) ? '' : 'disabled'; ?>>
                                <span class="icon-chevron-down"></span>
                            </button>
                        </div>
                    <?php endif; ?>

                <?php wp_reset_postdata();
                else :
                    echo 'No posts found';
                endif;
                ?>
            </div>

        </div>
    </section>
<?php endif; ?>