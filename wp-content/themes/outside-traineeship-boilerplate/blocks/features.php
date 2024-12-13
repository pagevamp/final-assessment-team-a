<?php
    $features = get_field('features');

    // checking if the features is empty 
    if (!empty($features)) :

        // ?? - null coalescing (conditional-operator)
        $alternate = $features['alternate'] ?? false;
        $content = $features['content'] ?? [];
        $title = $content['title'] ?? '';
        $body = $content['body'] ?? '';
        $button_label = $content['button_label'] ?? '';
        $button_link = $content['button_link'] ?? '#';
        $image = $features['feature_image'] ?? '';
        $page = $features['page'] ?? '';

        if (!empty($title) || !empty($body) || !empty($button_label) || !empty($image)) :
            $sectionClass = $alternate ? "features bg-texture" : "features";
            $containerClass = $alternate ? "features__maincontainer left" : "features__maincontainer right";
            $buttonClass = $page === 'home' ? "btn-secondary" : ($page === 'about' ? "btn-tertiary" : "");
            $aboutClass = $page == 'about' ? "img-padding" : "";
?>

<section id="features" class="<?php echo $sectionClass; ?> ">
        <div class="<?php echo $containerClass;  ?>">

            <div class="features__imagecontainer">
            <?php if (!empty($image)): ?>
                <img src="<?php echo $image['url']; ?>" class="features__image <?php echo $aboutClass; ?>" alt="<?php echo $image['alt']; ?>">
            <?php endif; ?>
            </div>

            <div class="features__content text-center">

                <?php if (!empty($title)): ?>
                    <h2 class="h2 text-section-title"><?php echo $title; ?></h2>
                <?php endif; ?>

                <?php if (!empty($body)): ?>
                    <p class="body__content"><?php echo $body; ?></p>
                <?php endif; ?>

                <?php if (!empty($button_label) || !empty($button_link)): ?>
                    <a href="<?php echo $button_link; ?>" class="text-decoration-none" target="_blank">

                        <button class="lg features__button <?php echo $buttonClass; ?>">
                            <?php echo $button_label; ?>
                        </button>

                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php
        endif;
    endif;
?>
