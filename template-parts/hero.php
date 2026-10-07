<?php
$hero_image = get_field("hero_photo");

$primaire_button = get_field('primaire_button');
$secondary_button = get_field('secondary_button');

$primary_link = $primaire_button['hero_primary_button_link'] ?? '';
$secondary_link = $secondary_button['hero_secondary_button_link'] ?? '';
$hero_titel_color = get_field('hero_titel_color') ?? '';
$hero_titel_rest = get_field('hero_titel_rest') ?? '';

if (is_array($primary_link)) {
    $primary_link = $primary_link['url'] ?? '';
}

if (is_array($secondary_link)) {
    $secondary_link = $secondary_link['url'] ?? '';
}
?>

<section class="hero" style="--hero-image: url('<?php echo esc_url($hero_image['url']); ?>')">

    <div class="hero-content">

        <span class="hero-tag">
            <?php echo esc_html(get_field('hero_tag')); ?>
        </span>
        <div class="hero-titels">
            <h1>
                    <?php echo esc_html(get_field('hero_titel')); ?>
            </h1>
                <?php if (!empty($hero_titel_color) && !empty($hero_titel_rest)) { ?>
                <h1 class="titel-color">
                                    <?php echo esc_html(get_field('hero_titel_color')); ?>
                </h1>
                <h1>
                                    <?php echo esc_html(get_field('hero_titel_rest')); ?>
                </h1>
                        <?php } ?>
        </div>

        <p class="hero-sub">
            <?php echo esc_html(get_field('hero_subtekst')); ?>
        </p>

        <?php if (!empty($primaire_button['hero_primary_button_text']) && !empty($primary_link)): ?>

            <a href="<?php echo esc_url($primary_link); ?>" class="btn-accent">
                <?php echo esc_html($primaire_button['hero_primary_button_text']); ?>
            </a>

        <?php endif; ?>

        <?php if (!empty($secondary_button['hero_secondary_button_text']) && !empty($secondary_link)): ?>

            <a href="<?php echo esc_url($secondary_link); ?>" class="btn-ghost">
                <?php echo esc_html($secondary_button['hero_secondary_button_text']); ?>
            </a>

        <?php endif; ?>

    </div>

</section>