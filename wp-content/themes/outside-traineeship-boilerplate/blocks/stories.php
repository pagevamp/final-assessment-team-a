<?php
    $stories = get_field('stories');   
    $subheading = $stories['subheading'];
    $content= $stories['content'];
    $button_link= $stories['button_link'];
    $button_label= $stories['button_label'];
?>


<section id="stories" class="stories">
    <?php if(!empty($stories)): ?>
        <div class="stories__content">
            <p class="c1 text-neutral-200"> <?php echo $subheading; ?></p>
            <h5 class="h5 text-neutral-600"> <?php echo $content;?></h5>
            <button class="btn-primary"><?php echo $button_label?></button>
        </div>
    <?php endif?>
</section>