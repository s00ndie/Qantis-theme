<?php
$toon_extra_sectie = get_field('toon_extra_sectie');

$extra_tekst = get_field('extra_tekst');
$expertise = get_field('expertise');
$toepassingsgebieden = get_field('toepassingsgebieden');
$voordelen_tekst = get_field('voordelen_tekst');
$voordelenlijst = get_field('voordelen');
$quick_call = get_field('quick_call');
?>

<?php if ($toon_extra_sectie) { ?>
    <section>

        

        <?php if ($expertise) { ?>
            <section class="expertise">
                <div class="exp-inner">
                    <p class="s-tag"><?php echo $extra_tekst['tag']; ?></p>
                    <h2 class="s-titel"><?php echo $extra_tekst['titel']; ?></h2>
                    <div class="exp-grid">
                        <?php foreach ($expertise as $item) { ?>
                            <div class="exp-item">
                                <span class="exp-dot"></span>
                                <?php echo $item['label']; ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>

        <?php if ($toepassingsgebieden) { ?>
            <section class="toepassingsgebied">
                <div class="toepassing-inner">
                    <div class="toepassing-header">
                        <p class="s-tag"><?php echo get_field('section_tag') ?></p>
                        <h2 class="s-titel"><?php echo get_field('titel') ?></h2>
                        <p class="s-sub"><?php echo get_field('subtekst') ?></p>
                    </div>
                    <div class="toepassing-grid">
                        <?php foreach ($toepassingsgebieden as $item) { ?>
                            <div class="toepassing-card">
                                <h3>
                                    <?php echo $item['titel']; ?>
                                </h3>
                                <p class="toepassing-sub">
                                    <?php echo $item['tekst']; ?>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if ($voordelenlijst && $voordelen_tekst) { ?>
            <section class="voordelen">
                <div class="voor-inner">
                    <div class="left">
                        <img src="<?php echo esc_url($voordelen_tekst['afbeelding']['url']); ?>" alt="">
                    </div>

                    <div class="right">
                        <p class="s-tag"><?php echo $voordelen_tekst['tag'] ?></p>
                        <h3 class="s-titel"><?php echo $voordelen_tekst['titel'] ?></h3>
                        <p class="s-sub"><?php echo $voordelen_tekst['subtekst'] ?></p>

                        <div class='voordelen-grid'>
                            <?php foreach ($voordelenlijst as $item) { ?>
                                <div class="voordel-item">
                                    <span></span>
                                    <h4><?php echo $item['label']; ?></h4>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if ($quick_call) { ?>
            <section class="quick-call">
                <h2>
                    <?php echo $quick_call['titel']; ?>
                </h2>
                <p>
                    <?php echo $quick_call['tekst']; ?>
                </p>
                <a href="<?php echo $quick_call['buttonlink']['url'] ?>">
                    <?php echo $quick_call['buttontekst'] ?>
                </a>
            </section>
            
        <?php } ?>
    </section>
<?php } ?>
