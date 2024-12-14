<?php
$histories          = get_field('history');
$heading            = $histories['heading'];
$relationship_posts = $histories['histories-history-relationship'];

$post_ids           = array();

foreach ($relationship_posts as $relationship_post) {
    //$post_ids . array_push($relationship_post->ID);
    print_r($relationship_post->ID);
    $post_ids[] = $relationship_post->ID;
}
?>

<pre>
    <?php print_r($histories); print_r($post_ids);?>
</pre>



<section id="history" class="history">
    <?php
    $args = [
        'post_type'         => 'history',
        'posts_per_page'    => -1,
        'post__in'          => $post_ids,
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();

            $post_id = get_the_ID();
            $image_url = get_the_post_thumbnail_url($post_id);
            $years = get_the_terms($post_id, 'history-year');
            $paragraphs = get_field('history_paragraphs', $post_id);

            echo '<h2>' . get_the_title() . '</h2>';
            ?>
            <pre>
                <?php print_r($paragraphs); ?>
            </pre>
<?php
        }
        wp_reset_postdata();
    } else {
        echo 'No posts found';
    }
    ?>
</section>