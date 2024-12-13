<?php
    $leadspace_content = get_field('leadspace_content');   
    $heading = $leadspace_content['heading'];
    $image= $leadspace_content['background_image'];
?>
<?php if(!empty($heading) || !empty($image)): ?>
    <section id="leadspace" class="leadspace">

       <div class="container h-100 p-0 m-0 mw-100">
         <!-- Background Image -->
            <?php if ($image): ?>
                <img class="leadspace__image" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
            <?php endif; ?>

            <div class="leadspace__overlay bg-overlay-20"></div>

            <!-- Heading -->
            <?php if ($heading): ?>
                <h1 class="leadspace__heading d1"><?php echo $heading;?></h1> 
            <?php endif; ?>
       </div>

    </section>
<?php endif?>