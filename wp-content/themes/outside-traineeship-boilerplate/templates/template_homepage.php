<?php
/*
Template Name: Home-Page Template
*/

get_header();

get_template_part('blocks/homeSection/leadspace');
the_content();

$args = [
    'post_type'         => 'project',
    'posts_per_page'    => -1,
];
$query = new WP_Query($args);
?>

<section id="projects" class="projects">
    <h2 class="text-section-title h2">Featured Projects</h2>

    <div id="project-swiper" class="swiper main-swiper">
        <div class="swiper-wrapper">
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();

                    $heading = get_the_title();

                    $post_id = get_the_ID();

                    $image_url = get_the_post_thumbnail_url($post_id);

                    $category = get_the_terms($post_id, 'project-type');
            ?>
                    <div class="projects__container swiper-slide">
                        <p class="projects__heading c1 text-primary"><?php echo $heading ?></p>
                        <p class="projects__category sh1 text-neutral-600"><?php print_r($category[0]->name) ?></p>

                        <div class="image-container">
                            <img src="<?php echo $image_url; ?>" alt="<?php echo $heading; ?>">
                        </div>
                    </div>

                <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No posts found<p>';
                ?>


            <?php endif; ?>
        </div>
        <div class="swiper-navigation">
            <button class="btn-swiper-prev btn-primary">
            </button>
            <button class="btn-swiper-next btn-primary">
            </button>
        </div>
    </div>

</section>


<?php get_footer(); ?>