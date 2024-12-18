<?php
    $working_hours = get_field('working_hours');
    if(!empty($working_hours)):
        $heading = $working_hours['heading'];
        $details = $working_hours['details'];
?>

        <section id="working-hours" class="working-hours container" aria-labelledby="working-hours-heading">
        <?php if (!empty($heading)): ?>
            <h2 id="working-hours-heading" class="text-section-title h2">
                <?php echo esc_html($heading); ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($details)): ?>
            <div class="working-hours__container w-100 d-grid text-center position-relative" role="list">
                <?php foreach ($details as $index => $detail): ?>
                    <div class="line bg-light position-absolute d-none d-sm-block" aria-hidden="true"></div>
                    <div class="working-hours__section d-flex flex-column g-m g-sm-s mx-auto" role="listitem" tabindex="0">
                        <?php if (!empty($detail['sub_heading'])): ?>
                            <p class="c3 text-primary">
                                <?php echo esc_html($detail['sub_heading']); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($detail['descriptions'])): ?>
                            <div class="description-container">
                                <?php foreach ($detail['descriptions'] as $description): ?>
                                    <p class="sh3 text-neutral-600 working-hours__desc">
                                        <?php echo esc_html($description['description']); ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($detail['information'])): ?>
                            <div class="information-container">
                                <?php foreach ($detail['information'] as $information): ?>
                                    <p class="text-sm text-neutral-500">
                                        <?php echo esc_html($information['paragraph']); ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>
