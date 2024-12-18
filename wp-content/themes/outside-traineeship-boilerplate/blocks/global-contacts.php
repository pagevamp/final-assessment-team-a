<?php
$contacts       = get_field('global_contacts');

if (!empty($contacts)):
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

    <section id="contacts-<?php echo $timestamp; ?>" class="contacts bg-texture">
        <div class="contacts__container d-sm-flex g-s w-100">
            <?php if (!empty($image)): ?>
                <figure class="contacts__image-container w-100 mb-l mb-sm-0">
                    <img class="contacts__image object-fit-cover" src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                </figure>
            <?php endif; ?>

            <div class="contacts__detail d-flex flex-column justify-content-center align-items-center w-100 text-center">
                <?php if (!empty($address)): ?>
                    <div class="contacts__info">
                        <p class="c2 text-neutral-200"><?php echo $address_title ?></p>
                        <address class="sh1 text-neutral-600"><?php echo $address_link ?></address>
                    </div>
                <?php endif; ?>

                <?php if (!empty($phone)): ?>
                    <div class="contacts__info">
                        <p class="c2 text-neutral-200">Contact</p>
                        <a href="<?php echo $phone['url']; ?>" target="<?php echo $phone['target']; ?>" title="Phone number" class="sh1 text-neutral-600 text-decoration-none">
                            <?php echo $phone['url']; ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if (!empty($email)): ?>
                    <div class="contacts__info">
                        <p class="c2 text-neutral-200">Email</p>
                        <a href="<?php echo $email['url']; ?>" target="<?php echo $email['target']; ?>" title="Email" class="sh1 text-neutral-600 text-decoration-none">
                            <?php echo $email['url']; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>