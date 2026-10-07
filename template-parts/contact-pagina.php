<?php
$under_hero = get_field('under_hero');
$proposities = get_field('proposities');
$thuisbasis = get_field('thuisbasis');
$over = get_field('over');
$opdrachten = get_field('opdrachten');

?>

<section>
    <?php if ($under_hero) { ?>
        <section class="under-hero">

            <div class="prop-strip">
                <?php foreach ($under_hero as $item) { ?>
                    <a href='<?php echo $item['meer_over']['url'] ?>' class="ps-item">
                        <p class="ps-num">
                            <?php echo $item['number'] ?>
                        </p>
                        <h3 class="ps-title">
                            <?php echo $item['label'] ?>
                        </h3>
                        <p class="ps-desc">
                            <?php echo $item['info'] ?>
                        </p>
                        <div class="ps-tags">
                            <?php foreach ($item['list'] as $it) { ?>
                                <p class="ps-tag">
                                    <?php echo $it['item'] ?>
                                </p>
                            <?php } ?>
                        </div>
                        <div class="ps-link">
                            <p>
                                <?php echo $item['meer_over']['title']; ?>
                                <span class="ps-arrow"><?php echo $item['arrow'] ?></span>
                            </p>
                        </div>
                    </a>
                <?php } ?>
            </div>

        </section>
    <?php } ?>

    <?php if ($proposities) { ?>
        <section class="proposities-contact">
            <div class="inner">
                <p class="section-tag">
                    <?php echo $proposities['tag'] ?>
                </p>
                <h3 class="section-title">
                    <?php echo $proposities['label'] ?>
                </h3>
                <p class="section-sub">
                    <?php echo $proposities['tekst'] ?>
                </p>
                <div class="prop-grid">
                    <?php foreach ($proposities['propositie'] as $item) { ?>
                        <div class="prop-card">
                            
                            <div class="prop-head">
                                <p class="prop-num">
                                    <?php echo $item['num_tag'] ?>
                                </p>
                                <h3>
                                    <?php echo $item['titel'] ?>
                                </h3>
                                <p>
                                    <?php echo $item['tekst'] ?>
                                </p>
                            </div>
                            <div class="prop-list">
                                <?php foreach ($item['list'] as $it) { ?>
                                    <p>
                                        <?php echo $it['item'] ?>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="prop-link">
                                <a href="<?php echo $item['meer']['url'] ?>">
                                    <?php echo $item['meer']['title']; ?>
                                    <span class="arrow"><?php echo $item['arrow'] ?></span>
                                </a>
                            </div>
                            
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if ($thuisbasis) { ?>
        <section class="thuisbasis">
            <div class="inner">
                <div class='thuisbasis-inner'>
                    <div class="alkmaar-grid">
                        <div class="alkmaar-img">
                            <img src="<?php echo esc_url($thuisbasis['image']['url']); ?>" alt="">
                        </div>
                        <div class="alkmaar-text">
                            <p class="section-tag">
                                <?php echo $thuisbasis['tag'] ?>
                            </p>
                            <h2 class="section-title">
                                <?php echo $thuisbasis['label'] ?>
                            </h2>
                            <p class="thuisbasis-p">
                                <?php echo $thuisbasis['tekst'] ?>
                            </p>
                            <p class="thuisbasis-p">
                                <?php echo $thuisbasis['tekst2'] ?>
                            </p>
                            <div class="alkmaar-stats">
                                <?php foreach ($thuisbasis['block'] as $item) { ?>
                                    <div class="stat-box">
                                        <h3 class="stat-num">
                                            <?php echo $item['hoofd'] ?>
                                        </h3>
                                        <p class="stat-label">
                                            <?php echo $item['info'] ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if ($over) { ?>
        <section class="contact-over">
            <div class="inner">
                <div class="over-grid">
                    <div class="over-text">
                        <p class="section-tag">
                            <?php echo $over['tag'] ?>
                        </p>
                        <h3 class="section-title">
                            <?php echo $over['titel'] ?>
                        </h3>
                        <p class="ov-text">
                            <?php echo $over['tekst'] ?>
                        </p>
                        <a href="<?php echo $over['link']['url'] ?>"
                            class="btn-outline"><?php echo $over['link']['title'] ?></a>
                    </div>
                    <div class="over-img">
                        <img src="<?php echo esc_url($over['image']['url']) ?>" alt="" class="ov-img">
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if ($opdrachten) { ?>
        <section class="section contact-opdrachten">
            <div class="inner">
                <div class="opd-header">
                    <h2>
                        <?php echo $opdrachten['label'] ?>
                    </h2>
                    <a href="#">
                        <?php echo $opdrachten['bekijk'] ?>
                    </a>
                </div>
                <div class="opd-grid">

                    <?php foreach ($opdrachten['opdracht'] as $item) { ?>
                        <a href="#" class="opd-card">
                            <div class="opd-img">
                                <div class="opd-tags">
                                    <p class="tag">
                                        <?php echo $item['niveau'] ?>
                                    </p>
                                    <p class="tag">
                                        <?php echo $item['uuren'] ?>
                                    </p>
                                </div>
                                <img src="<?php echo $item['image']['url'] ?>" alt="">
                            </div>
                            <div class="opd-body">
                                <h3>
                                    <?php echo $item['label'] ?>
                                </h3>
                            </div>
                        </a>
                    <?php } ?>

                </div>
            </div>
        </section>
    <?php } ?>
    <!--Andere manier om opdrachten te toevoegen -->
    <?php /*get_template_part('template-parts/opdracht');*/ ?>
</section>