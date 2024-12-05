<?php
    $leadspace_content = get_field('leadspace_content');   
    $heading = $leadspace_content['heading'];
    $image= $leadspace_content['background_image'];
?>

<section id="leadspace" class="leadspace">
    <?php if(!empty($leadspace_content)): ?>

        <!-- Background Image -->
        <img class="leadspace__image" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
        
        <div class="leadspace__overlay"></div>

        <!-- Heading -->
        <h1 class="leadspace__heading d1"><?php echo $heading;?></h1> 

    <?php endif?>
</section>
