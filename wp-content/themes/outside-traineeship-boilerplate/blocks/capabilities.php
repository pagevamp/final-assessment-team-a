<?php
    $capabilities       = get_field('capabilities');
    if(!empty($capabilities)):
        $heading            = esc_html($capabilities['heading'] ?? '');
        $details            = $capabilities['details'] ?? '';
?>

        <section id="capabilities" class="capabilities bg-texture" aria-labelledby="capabilities-heading">
            <?php if (!empty($heading)): ?>
                <h2 id="capabilities-heading" class="text-section-title h2">
                    <?php echo esc_html($heading); ?>
                </h2>
            <?php endif; ?>
            <?php if (!empty($details)): ?>
                <div class="capabilities__container w-100 d-flex flex-column">
                    <?php foreach ($details as $detail):
                        $service_list   = $detail['service_list'];
                        $title          = $service_list['title'];
                        $services       = $service_list['services'];
                    ?>
                        <div class="capabilities__services w-100 d-sm-flex">
                            <?php if (!empty($title)): ?>
                                <p class="h4 w-100"><?php echo esc_html($title); ?></p>
                            <?php endif; ?>

                            <?php if(!empty($services)): ?>
                                <ul class="w-100">
                                    <?php foreach($services as $service): ?>
                                        <li class="align-middle">
                                            <p class="text-lg"><?php echo esc_html($service['service']); ?></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

    <?php endif; ?>