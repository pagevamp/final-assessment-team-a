<?php
/*
Template Name: About-Page Template
*/

get_header();

get_template_part('blocks/homeSection/leadspace');
the_content();

$args = [
    'post_type'         => 'history',
    'posts_per_page'    => -1,
];
$query = new WP_Query($args);
?>

<section id="history" class="history bg-texture">
    <h2 class="text-section-title h2">Our History</h2>

    <div id="project-swiper" class="swiper historyswiper">
        <div class="swiper-wrapper">
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();

                    $heading = get_the_title();

                    $post_id = get_the_ID();

                    $image_url = get_the_post_thumbnail_url($post_id);

                    $category = get_the_terms($post_id, 'history-year');

                    $contents = get_field('history_content');

                    $paragraphs = $contents['paragraphs'];
            ?>
                    <div class="history__container swiper-slide">
                        <?php if ($heading): ?>
                            <p class="history__heading text-xl text-primary"><?php echo $heading ?></p>
                        <?php endif; ?>

                        <?php if ($image_url): ?>
                            <div class="image-container">
                                <img src="<?php echo $image_url; ?>" alt="<?php echo $heading; ?>">
                            </div>
                        <?php endif; ?>

                        <?php if ($contents !== []): ?>
                            <div class="history__content">
                                <p class="text-neutral-600">
                                    <?php echo $paragraphs[0]['paragraph']; ?>
                                </p>
                            </div>
                            <a href="#" class="text-sm text-primary">Continue Reading</a>

                        <?php endif; ?>
                    </div>

                <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo "<p class='h3 mx-auto'>No posts found<p>";
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