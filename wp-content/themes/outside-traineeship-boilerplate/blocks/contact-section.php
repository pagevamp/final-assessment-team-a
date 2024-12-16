<?php 
    $contact_section = get_field('contact_section');
    $title            = $contact_section['title'];
    $subtitle         = $contact_section['subtitle'];
    $relationship_posts = $contact_section['contact_form_relationship'];
    $post_ids           = array();
?>

<section id="contact__section" class="contact__section my-sm-3xl">
    <?php
        $args = [
            'post_type'         => 'contact-form',
            'posts_per_page'    => -1,
            'post__in'          => $post_ids,
        ];
        $query = new WP_Query($args);
    ?>
        <div class="container p-l mt-xl mt-sm-0 d-sm-flex px-sm-2xl">
            <div class="contact__title">
                <?php if($title): ?>
                    <h2 class="h2 mb-l"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($subtitle): ?>
                    <p class="text-sm-all subtitle"><?php echo $subtitle; ?></p>
                <?php endif; ?>
            </div>
            <div class="contact__form mt-xl mt-sm-0">
                <form action="#" method="POST" id="form">
                    <div class="names d-sm-flex">
                        <label for="first_name" class="form-label w-sm-50 me-l">
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control">
                        </label> 

                        <label for="last_name" class="form-label w-sm-50">
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control">
                        </label> 
                    </div>
                    <label for="email" class="form-label ">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control ">
                    </label>
                    <label for="phone" class="form-label">
                        <input type="number" id="phone" name="phone" placeholder="Phone Number" class="form-control">
                    </label>
                    <label for="move_in_date" class="form-label">
                        <input type="date" id="move_in_date" name="move_in_date" placeholder="Move In Date" class="form-control">
                    </label>
                    <label for="unit_type" class="form-label">
                        <select name="unit_type" id="unit_type" placeholder="Unit Type" class="form-select">
                            <option value="unit">Unit Type</option>
                            <option value="lorem">Lorem</option>
                            <option value="ipsum">Ipsum</option>
                            <option value="dollar">Dollar</option>
                        </select>
                    </label>
                    <label for="room_type" class="form-label">
                        <input type="radio" id="studio" name="room" value="studio"> Studio <br>
                        <input type="radio" id="studio" name="room" value="1bedroom"> 1 Bedroom <br>
                        <input type="radio" id="studio" name="room"value="2bedroom"> 2 Bedroom <br>
                    </label>
                    <button class="btn-primary" type="submit" id="submit-btn">Submit</button>
                </form>
           </div>
        </div>
</section>