<?php
    $department = get_field('department');  
    $department_details = $department['department_details'];
?>

<section id="department" class="department">
    <?php if(!empty($department_details)): ?>

        <?php foreach ($department_details as $department_detail): 
            $heading = $department_detail['heading'];  
            $caption = $department_detail['subtext'];  
            $image = $department_detail['image'];    
        ?>

            <div class="department__details">
                <!-- Background Image -->
                <img class="department__image" src="<?php echo $image['url'];?>" alt="<?php echo $image['url'];?>">
                
                <div class="department__overlay bg-overlay-50"></div>

                <div class="department__content">
                    <!-- Heading -->
                    <div class="department__content-head">
                        <h2 class="department__heading h2"><?php echo $heading;?></h2> 

                        <!-- Subtext -->
                        <p class="department__caption c3"><?php echo $caption ?></p>
                    </div>

                    <!-- Button -->
                    <div class="department__button">
                        <button class="btn-primary"></button>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    <?php endif?>
</section>
