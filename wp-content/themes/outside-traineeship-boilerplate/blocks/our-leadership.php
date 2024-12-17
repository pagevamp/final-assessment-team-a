<?php
    $leadership = get_field('our_leadership');
    if(!empty($leadership)):
        $heading    = $leadership['heading'];
        $leaders    = $leadership['leaders'];
?>

        <section id="leadership" class="leadership" aria-labelledby="leadership-heading">
        <?php if (!empty($heading)): ?>
            <h2 id="leadership-heading" class="text-section-title h2">
                <?php echo $heading; ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($leaders)): ?>
            <div class="leadership__container d-grid" role="list">
                <?php foreach ($leaders as $leader):
                    $leader_image       = $leader['leader_image'];
                    $leader_name        = $leader['name'];
                    $leader_designation = $leader['designation'];
                ?>
                    <div class="w-100 leader" role="listitem">
                        <?php if(!empty($leader_image)): ?>
                            <div class="w-100 leader__image-container">
                                <img class="w-100 leader__image" src="<?php echo esc_html($leader_image['url']); ?>" alt="<?php echo esc_attr($leader_image['url']); ?>" loading="lazy">
                            </div>
                        <?php endif; ?>
                        <div class="leader__details">
                            <?php if (!empty($leader_name)): ?>
                                <p class="sh1 text-neutral-600" tabindex="0"><?php echo esc_html($leader_name); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($leader_designation)): ?>
                                <p class="c3 text-primary" tabindex="0"><?php echo esc_html($leader_designation); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        </section>
    <?php endif;
    