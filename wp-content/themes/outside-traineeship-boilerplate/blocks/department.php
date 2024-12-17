<?php
    $department = get_field('department');  
    $department_details = $department['department_details'];
?>

<section id="department" class="department" aria-labelledby="department-section">
    <?php if(!empty($department_details)): ?>

        <?php foreach ($department_details as $department_detail): 
            $heading = $department_detail['heading'];  
            $caption = $department_detail['subtext'];  
            $image = $department_detail['image'];    
        ?>

            <div class="container p-0 department__details">
                <!-- Background Image -->
                <img class="department__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($heading); ?>">
                
                <div class="department__overlay bg-overlay-50"></div>

                <div class="department__content">
                    <!-- Heading -->
                    <div class="department__content-head">
                        <h1 class="department__heading h1"><?php echo esc_html($heading);?></h1> 

                        <!-- Subtext -->
                        <p class="department__caption c3"><?php echo esc_html($caption); ?></p>
                    </div>

                    <!-- Button -->
                    <div class="department__button">
                        <a class="btn-primary text-decoration-none" href="#" aria-label="More about <?php echo esc_attr($heading);?>"></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    <?php endif?>
</section>
