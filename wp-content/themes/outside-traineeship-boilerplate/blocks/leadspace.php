<?php
    $leadspace_content = get_field('leadspace_content');   
    $heading = $leadspace_content['heading'];
    $image= $leadspace_content['background_image'];
?>
<?php if(!empty($heading) || !empty($image)): ?>
    <section id="leadspace" class="container m-0 p-0 leadspace">

        <!-- Background Image -->
        <?php if ($image): ?>
            <img class="leadspace__image" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
        <?php endif; ?>

        <div class="leadspace__overlay bg-overlay-20"></div>

        <!-- Heading -->
        <?php if ($heading): ?>
            <h1 class="leadspace__heading d1"><?php echo $heading;?></h1> 
        <?php endif; ?>

    </section>
<?php endif?>