<?php
$waarom = get_field('waarom');
$items = is_array($waarom) ? ($waarom['repeater'] ?? []) : [];
?>

<?php if (!empty($waarom)) { ?>
    <section class="waarom">
        <div class="waar-inner">
            <p class="s-tag"><?php echo esc_html($waarom['tag'] ?? ''); ?></p>
            <h2 class="s-titel"><?php echo esc_html($waarom['label'] ?? ''); ?></h2>
            <p class="s-sub"><?php echo esc_html($waarom['tekst'] ?? ''); ?></p>

            <?php if (!empty($items)) : ?>
                <div class="waar-grid">
                    <?php foreach ($items as $object) : ?>
                        <article class="waar-art">
                            <h1 class="waar-number"><?php echo esc_html($object['num'] ?? ''); ?></h1>
                            <h3 class="field-lab"><?php echo esc_html($object['label'] ?? ''); ?></h3>
                            <p class="tarieven-tekst"><?php echo esc_html($object['tekst'] ?? ''); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php } ?>