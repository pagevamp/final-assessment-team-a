<?php
    $stories = get_field('stories');   
    if (!empty($stories)) :
        $subheading = $stories['subheading'] ?? '';
        $contents = $stories['content'] ?? '';
        $button_link = $stories['button_link'] ?? '#';
        $button_label = $stories['button_label'] ?? '';
        $page = $features['page'] ?? '';
?>

        <section id="stories" class="stories" aria-labelledby="stories-heading">
            <div class="stories__content container">
                <?php if (!empty($subheading)): ?>
                    <p id="stories-heading" class="c1 text-neutral-200"><?php echo esc_html($subheading); ?></p>
                <?php endif; ?>

                <?php if (!empty($contents)): ?>
                    <?php foreach ($contents as $content): ?>
                        <p class="<?php echo (($page === 'about') ? 'sh0': 'h5'); ?> text-neutral-600" aria-label="Story paragraph">
                            <?php echo esc_html($content['paragraph']); ?>
                        </p>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (!empty($button_label)): ?>
                    <a href="<?php echo esc_url($button_link); ?>" 
                    class="<?php echo ($page !== 'home') ?? "d-none"; ?> text-decoration-none btn-primary" aria-label="Our stories">
                        <?php echo esc_html($button_label); ?> 
                    </a>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
