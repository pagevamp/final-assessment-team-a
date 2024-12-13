<?php
$leadership = get_field('our_leadership');
$heading    = $leadership['heading'];
$leaders    = $leadership['leaders'];
?>

<section id="leadership" class="leadership container" aria-labelledby="leadership-heading">
    <?php if (!empty($heading)): ?>
        <h2 id="leadership-heading" class="text-section-title h2">
            <?php echo $heading; ?>
        </h2>
    <?php endif; ?>

    <?php if (!empty($leaders)): ?>
        <div class="leadership__container d-grid" role="list">
            <?php foreach ($leaders as $leader):
                $leader_image       = $leader['leader_image'];
                $leader_image_url   = $leader_image['url'];
                $leader_image_alt   = $leader_image['alt'];
                $leader_name        = $leader['name'];
                $leader_designation = $leader['designation'];
            ?>
                <div class="w-100 leader" role="listitem">
                    <div class="w-100 leader__image-container">
                        <img class="w-100 leader__image" src="<?php echo htmlspecialchars($leader_image_url); ?>" alt="<?php echo htmlspecialchars($leader_image_alt); ?>" loading="lazy">
                    </div>
                    <div class="leader__details">
                        <?php if (!empty($leader_name)): ?>
                            <p class="sh1 text-neutral-600" tabindex="0"><?php echo htmlspecialchars($leader_name); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($leader_designation)): ?>
                            <p class="c3 text-primary" tabindex="0"><?php echo htmlspecialchars($leader_designation); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>