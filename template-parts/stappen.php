<?php
$stap = get_field('stappen');
$afbeelding = get_field('afbeelding');
?>

<?php if ($stap) { ?>
    <section class="section-stappen">
        <div class="inner">
            <div class="hoe-grid">
                <p class="s-tag">
                    <?php echo get_field('section_tag'); ?>
                </p>
                <h2 class="s-titel">
                    <?php echo get_field('titel'); ?>
                </h2>
                <p class="s-sub">
                    <?php echo get_field('subtekst'); ?>
                </p>
                <div class="hoe-img">
                    <?php if ($afbeelding) { ?>
                        <img src="<?php echo get_field('afbeelding') ?>" alt="">
                    <?php } ?>
                </div>

                <div class="steps">
                    <?php $nummer = 1; ?>
                    <?php foreach ($stap as $stappen) { ?>
                        <div class="step">
                            <div class="step-num">
                                <?php echo $nummer; ?>
                            </div>
                            <div class="step-body">
                                <h4>
                                    <?php echo $stappen['titel']; ?>
                                </h4>
                                <p>
                                    <?php echo $stappen['tekst']; ?>
                                </p>
                            </div>
                        </div>
                        <?php $nummer++; ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>