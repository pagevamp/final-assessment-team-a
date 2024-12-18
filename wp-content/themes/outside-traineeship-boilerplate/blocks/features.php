<?php
    $features = get_field('features');

    if (!empty($features)) :

        // ?? - null coalescing (conditional-operator)
        $alternate = $features['alternate'] ?? false;
        $content = $features['content'] ?? [];
        $title = $content['title'] ?? '';
        $paragraphs = $content['paragraphs'] ?? '';
        $button = $content['buttons'] ?? '';
        $button_label = $button['button_label'];
        $button_link = $button['button_link'];
        $button_type = $button['button_type'];
        $image = $features['feature_image'];

        if (!empty($title) || !empty($body) || !empty($button) || !empty($image)) :
            $sectionClass = $alternate ? "features bg-texture" : "features";
            $containerClass = $alternate ? "features__maincontainer left" : "features__maincontainer right";
            $buttonClass = $button_type === 'primary' ? "btn-primary" : ($button_type === 'secondary' ? "btn-secondary" : "btn-tertiary");
?>

            <section id="features" class="<?php echo $sectionClass; ?> ">
                <div class="<?php echo $containerClass;  ?>">

                    <div class="features__imagecontainer">
                    <?php if (!empty($image)): ?>
                        <img src="<?php echo $image['url']; ?>" class="features__image img-padding" alt="<?php echo $image['alt']; ?>">
                    <?php endif; ?>
                    </div>

                    <div class="features__content text-center">

                        <?php if (!empty($title)): ?>
                            <h2 class="h2 text-section-title"><?php echo $title; ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($paragraphs)): ?>
                            <?php foreach ($paragraphs as $paragraph): ?>
                                <p class="body__content"><?php echo $paragraph['paragraph']; ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if (!empty($button)): ?>
                            <a href="<?php echo $button_link; ?>" class="text-decoration-none" target="_blank">

                                <button class="lg features__button <?php echo $buttonClass; ?>">
                                    <?php echo $button_label; ?>
                                </button>

                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php endif;
    endif;
?>
