<?php
$contact_section    = get_field('contact_section');
$title              = $contact_section['title'];
$subtitle           = $contact_section['subtitle'];
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
            <?php if ($title): ?>
                <h2 class="h2 mb-l"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($subtitle): ?>
                <p class="text-sm-all subtitle"><?php echo $subtitle; ?></p>
            <?php endif; ?>
        </div>
        <div class="contact__form mt-xl mt-sm-0">
            <form class="needs-validation" action="#" method="POST" id="form" novalidate>
                <div class="names d-sm-flex">
                    <label for="first_name" class="form-label w-sm-50 me-l">
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control text-md text-neutral-600" required>
                        <span id="first-name-error" class="error-message text-sm text-primary"></span>
                    </label>

                    <label for="last_name" class="form-label w-sm-50">
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control text-md text-neutral-600" required>
                        <span id="last-name-error" class="error-message text-sm text-primary"></span>
                    </label>
                </div>
                <label for="email" class="form-label ">
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control text-md text-neutral-600" required>
                    <span id="email-error" class="error-message text-sm text-primary"></span>
                </label>
                <label for="phone" class="form-label">
                    <input type="number" id="phone" name="phone" placeholder="Phone Number" class="form-control text-md text-neutral-600" required>
                    <span id="phone-error" class="error-message text-sm text-primary"></span>
                </label>
                <label for="move_in_date" class="form-label position-relative">
                    <input type="date" id="move_in_date" name="move_in_date" placeholder="Move In Date" class="form-control text-md text-neutral-600" required>
                    <span id="move-in-date-error" class="error-message text-sm text-primary"></span>
                    <span id="move_in_date_placeholder" class="placeholder text-md text-neutral-600">Move In Date *</span>
                </label>
                <label for="unit_type" class="form-label">
                    <select name="unit_type" id="unit_type" placeholder="Unit Type" class="form-select text-md text-neutral-600" required>
                        <option value="">Unit Type</option>
                        <option value="lorem">Lorem</option>
                        <option value="ipsum">Ipsum</option>
                        <option value="dollar">Dollar</option>
                    </select>
                    <span id="unit-type-error" class="error-message text-sm text-primary"></span>
                </label>
                <label for="studio" class="form-check-label d-block text-md text-neutral-600">
                    <input type="radio" id="studio" name="room_type" class="form-check-input" value="studio" required> Studio
                </label>
                <label for="1bedroom" class="form-check-label d-block text-md text-neutral-600">
                    <input type="radio" id="bedroom-1" name="room_type" class="form-check-input" value="bedroom-1"> 1 Bedroom
                </label>
                <label for="2bedroom" class="form-check-label d-block text-md text-neutral-600">
                    <input type="radio" id="bedroom-2" name="room_type" class="form-check-input" value="bedroom-2"> 2 Bedroom
                    <span id="room-type-error" class="error-message text-sm text-primary"></span>
                </label>
                <button class="btn-primary btn-lg" type="submit" id="submit-btn">Submit</button>
            </form>
        </div>
    </div>
</section>