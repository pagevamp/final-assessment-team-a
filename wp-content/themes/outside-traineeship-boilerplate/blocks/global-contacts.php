<?php
$contacts       = get_field('global_contacts');
$address        = $contacts['address'];
$address_title  = $address['title'];
$address_link   = $address['link'];
$image          = $contacts['image'];
$image_url      = $image['url'];
$image_alt      = $image['alt'];
$timestamp      = time();
$social_links    = get_field('socials', 'option');
$phone            = preg_replace("(^https?://)", "", $social_links['phone_number']);;
$email            = $social_links['email'];
?>

<section id="contacts-<?php echo $timestamp; ?>" class="contacts bg-texture container-fluid">
    <div class="contacts__container">
        <figure class="contacts__image-container w-100">
            <img class="contacts__image" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
        </figure>

        <div class="contacts__detail">
            <div class="contacts__info">
                <p class="c2 text-neutral-200"><?php echo $address_title ?></p>
                <address class="sh1 text-neutral-600"><?php echo $address_link ?></address>
            </div>
            <div class="contacts__info">
                <p class="c2 text-neutral-200">Contact</p>
                <a href="<?php echo $phone['url']; ?>" target="<?php echo $phone['target']; ?>" title="Phone number" class="sh1 text-neutral-600 text-decoration-none">
                    <?php echo $phone['url']; ?>
                </a>
            </div>
            <div class="contacts__info">
                <p class="c2 text-neutral-200">Email</p>
                <a href="<?php echo $email['url']; ?>" target="<?php echo $email['target']; ?>" title="Email" class="sh1 text-neutral-600 text-decoration-none">
                    <?php echo $email['url']; ?>
                </a>
            </div>
        </div>
    </div>
</section>