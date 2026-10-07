<?php

$cta = get_field('cta');
$text = get_field('cta_text');
$tarievenblok = get_field('tarievenblok');
$cta = is_array($cta) ? $cta : [];
$text = is_array($text) ? $text : [];

$button_link = $cta['buttonlink'] ?? '';

if (is_array($button_link)) {
    $button_link = $button_link['url'] ?? '';
}

$has_cta_content = !empty($text['tag'])
    || !empty($text['label'])
    || !empty($text['tekst'])
    || !empty($cta['titel'])
    || !empty($cta['tekst'])
    || !empty($cta['buttontekst'])
    || !empty($button_link)
    || !empty($tarievenblok);

?>
<?php if ($has_cta_content) { ?>

<section class="qaas">
    <div>
        <p class="s-tag"><?php echo $text['tag'] ?? '' ?></p>
        <h3 class="s-titel"><?php echo $text['label'] ?? '' ?></h3>
        <p class="s-sub"><?php echo $text['tekst'] ?? '' ?></p>
    </div>

    <?php if (!empty($tarievenblok)) { ?>
        <section class="tarievenblok">
            <div class="tarieven-grid">
                <?php foreach ($tarievenblok as $item) { ?>
                    <article class="tarieven">
                        <?php if (!empty($item['badge'])) { ?>
                            <p class="tarieven-badge"><?php echo esc_html($item['badge']); ?></p>
                        <?php } ?>
                        <?php if (!empty($item['titel'])) { ?>
                            <h3 class="field-label"><?php echo esc_html($item['titel']); ?></h3>
                        <?php } ?>
                        <?php if (!empty($item['tekst'])) { ?>
                            <p class="tarieven-tekst"><?php echo esc_html($item['tekst']); ?></p>
                        <?php } ?>
                        <?php if (!empty($item['prijsvermelding'])) { ?>
                            <p class="tarieven-prijs"><?php echo esc_html($item['prijsvermelding']); ?></p>
                        <?php } ?>
                    </article>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

    <?php if (!empty($cta['titel']) || !empty($cta['tekst']) || !empty($cta['buttontekst']) || !empty($button_link)) { ?>
        <div class="cta">
            <h1 class="s-titel">
                <?php echo esc_html($cta['titel']); ?>
            </h1>

            <p class="s-sub">
                <?php echo esc_html($cta['tekst']); ?>
            </p>

            <?php if (!empty($cta['buttontekst']) && !empty($button_link)): ?>

                <a href="<?php echo esc_url($button_link); ?>">
                    <?php echo esc_html($cta['buttontekst']); ?>
                </a>

            <?php endif; ?>
        </div>
    <?php } ?>
</section>
<?php } ?>