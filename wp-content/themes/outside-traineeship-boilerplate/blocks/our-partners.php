<?php
    $partners = get_field('partners');
    if(!empty($partners)):
        $partners_logo = $partners['partners_logo'] ?? '';
?>

        <section id="partners" class="partners" aria-labelledby="partners-header">
            <h2 id="partners-header" class="partners__header text-section-title h2">Our Partners</h2>

            <div id="vertical-net" class="partners__container" aria-hidden="true">
            </div>
            <div class="partners__container">
                <?php foreach ($partners_logo as $partner_logo): ?>
                    <div class="partners__image-container">
                        <?php if (isset($partner_logo)): ?>
                            <img src="<?php echo $partner_logo['logo']['url']; ?>" alt="<?php echo $partner_logo['logo']['alt']; ?>">
                        <?php else: ?>
                            <label for="view-all" class="btn-tertiary text-sm" aria-label="View All Partners"><input id="view-all" type="checkbox" hidden>View All Partners</label>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <div class="partners__image-container">
                    <a href="#" class="text-decoration-none btn-tertiary" aria-label="View All Partners">View All Partners
                    </a>
                </div>
            </div>
            <div id="vertical-net" class="partners__container" aria-hidden="true">
            </div>

        </section>
    <?php endif; ?>