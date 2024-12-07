<?php
$partners = get_field('partners');
$partners_logo = $partners['partners_logo'];
?>

<section id="partners" class="partners" aria-labelledby="partners-header">
    <h2 id="partners-header" class="partners__header text-section-title h2">Our Partners</h2>

    <div class="container-mobile" role="region" aria-labelledby="mobile-partners">
        <h3 id="mobile-partners" class="sr-only">Mobile View Partners Container</h3>
        <div class="partners__container" aria-hidden="true">
            <div></div>
            <div class="grid-block"></div>
            <div class="grid-block"></div>
            <div></div>
        </div>
        <?php for ($i = 0; $i < count($partners_logo); $i += 2): ?>
            <div class="partners__container">
                <div class="grid-end" aria-hidden="true"></div>
                <div class="partners__image-container">
                    <?php if (isset($partners_logo[$i])): ?>
                        <img src="<?php echo $partners_logo[$i]['logo']['url']; ?>" alt="<?php echo $partners_logo[$i]['logo']['alt']; ?>">
                    <?php else: ?>
                        <button class="btn-tertiary text-sm text-lg-lg text-primary" aria-label="View All Partners">View All Partners</button>
                    <?php endif; ?>
                </div>
                <div class="partners__image-container">
                    <?php if (isset($partners_logo[$i + 1])): ?>
                        <img src="<?php echo $partners_logo[$i + 1]['logo']['url']; ?>" alt="<?php echo $partners_logo[$i + 1]['logo']['alt']; ?>">
                    <?php else: ?>
                        <button class="btn-tertiary text-sm text-lg-lg text-primary" aria-label="View All Partners">View All Partners</button>
                    <?php endif; ?>
                </div>
                <div class="grid-end" aria-hidden="true"></div>
            </div>
        <?php endfor; ?>
        <div class="partners__container" aria-hidden="true">
            <div></div>
            <div class="grid-block"></div>
            <div class="grid-block"></div>
            <div></div>
        </div>
    </div>

    <div class="container-tablet" role="region" aria-labelledby="tablet-partners">
        <h3 id="tablet-partners" class="sr-only">Tablet View Partners Container</h3>
        <div class="partners__container" aria-hidden="true">
            <div></div>
            <div class="grid-block"></div>
            <div class="grid-block"></div>
            <div class="grid-block"></div>
            <div></div>
        </div>
        <?php for ($i = 0; $i < count($partners_logo); $i += 3): ?>
            <div class="partners__container">
                <div class="grid-end" aria-hidden="true"></div>
                <div class="partners__image-container">
                    <?php if (isset($partners_logo[$i])): ?>
                        <img src="<?php echo $partners_logo[$i]['logo']['url']; ?>" alt="<?php echo $partners_logo[$i]['logo']['alt']; ?>">
                    <?php else: ?>
                        <button class="btn-tertiary text-sm text-lg-lg text-primary" aria-label="View All Partners">View All Partners</button>
                    <?php endif; ?>
                </div>
                <div class="partners__image-container">
                    <?php if (isset($partners_logo[$i + 1])): ?>
                        <img src="<?php echo $partners_logo[$i + 1]['logo']['url']; ?>" alt="<?php echo $partners_logo[$i + 1]['logo']['alt']; ?>">
                    <?php else: ?>
                        <button class="btn-tertiary text-sm text-lg-lg text-primary" aria-label="View All Partners">View All Partners</button>
                    <?php endif; ?>
                </div>
                <div class="partners__image-container">
                    <?php if (isset($partners_logo[$i + 2])): ?>
                        <img src="<?php echo $partners_logo[$i + 2]['logo']['url']; ?>" alt="<?php echo $partners_logo[$i + 2]['logo']['alt']; ?>">
                    <?php else: ?>
                        <button class="btn-tertiary text-sm text-lg-lg text-primary" aria-label="View All Partners">View All Partners</button>
                    <?php endif; ?>
                </div>
                <div class="grid-end" aria-hidden="true"></div>
            </div>
        <?php endfor; ?>
        <div class="partners__container" aria-hidden="true">
            <div></div>
            <div class="grid-block"></div>
            <div class="grid-block"></div>
            <div class="grid-block"></div>
            <div></div>
        </div>
    </div>

    <div class="container-desktop" role="region" aria-labelledby="desktop-partners">
        <h3 id="desktop-partners" class="sr-only">Desktop View Partners Container</h3>
        
            <div class="partners__container" aria-hidden="true">
                <div></div>
                <div class="grid-block"></div>
                <div class="grid-block"></div>
                <div class="grid-block"></div>
                <div class="grid-block"></div>
                <div></div>
            </div>
            <div class="grid-row-control">
            <?php for ($i = 0; $i < count($partners_logo); $i += 4): ?>
                <div class="partners__container">
                    <div class="grid-end" aria-hidden="true"></div>
                    <div class="partners__image-container">
                        <?php if (isset($partners_logo[$i])): ?>
                            <img src="<?php echo $partners_logo[$i]['logo']['url']; ?>" alt="<?php echo $partners_logo[$i]['logo']['alt']; ?>">
                        <?php else: ?>
                            <label for="view-all" class="btn-tertiary text-sm text-lg-lg text-primary" aria-label="View All Partners"><input id="view-all" type="checkbox" hidden>View All Partners</label>
                        <?php endif; ?>
                    </div>
                    <div class="partners__image-container">
                        <?php if (isset($partners_logo[$i + 1])): ?>
                            <img src="<?php echo $partners_logo[$i + 1]['logo']['url']; ?>" alt="<?php echo $partners_logo[$i + 1]['logo']['alt']; ?>">
                        <?php else: ?>
                            <label for="view-all" class="btn-tertiary text-sm text-lg-lg text-primary" aria-label="View All Partners"><input id="view-all" type="checkbox" hidden>View All Partners</label>
                        <?php endif; ?>
                    </div>
                    <div class="partners__image-container">
                        <?php if (isset($partners_logo[$i + 2])): ?>
                            <img src="<?php echo $partners_logo[$i + 2]['logo']['url']; ?>" alt="<?php echo $partners_logo[$i + 2]['logo']['alt']; ?>">
                        <?php else: ?>
                            <label for="view-all" class="btn-tertiary text-sm text-lg-lg text-primary" aria-label="View All Partners"><input id="view-all" type="checkbox" hidden>View All Partners</label>
                        <?php endif; ?>
                    </div>
                    <div class="partners__image-container">
                        <?php if (isset($partners_logo[$i + 3])): ?>
                            <img src="<?php echo $partners_logo[$i + 3]['logo']['url']; ?>" alt="<?php echo $partners_logo[$i + 3]['logo']['alt']; ?>">
                        <?php else: ?>
                            <label for="view-all" class="btn-tertiary text-sm text-lg-lg text-primary" aria-label="View All Partners"><input id="view-all" type="checkbox" hidden>View All Partners</label>
                        <?php endif; ?>
                    </div>
                    <div class="grid-end" aria-hidden="true"></div>
                </div>
            <?php endfor; ?>
            </div>
            <div class="partners__container" aria-hidden="true">
                <div></div>
                <div class="grid-block"></div>
                <div class="grid-block"></div>
                <div class="grid-block"></div>
                <div class="grid-block"></div>
                <div></div>
            </div>
        
    </div>

</section>