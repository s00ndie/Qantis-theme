<?php
$diensten = get_field('diensten');
$top = get_field('diensten_text');
?>
<?php if ($diensten) { ?>
<section class="section">
    <div class="inner">
        <p class="s-tag"> <?php echo $top['tag']; ?></p>
        <h2 class="s-titel"><?php echo $top['label']; ?></h2>
        <p class="s-sub"><?php echo $top['tekst']; ?></p>
        <div class="diensten-grid">
            
                <?php foreach ($diensten as $dienst) { ?>
                    <div class="dienst-card">
                        <div class="dienst-icon">
                            <?php if (!empty($dienst['icoon']['url'])) { ?>
                                <img src="<?php echo esc_url($dienst['icoon']['url']); ?>" alt="">
                            <?php } ?>
                        </div>
                        <h3>
                            <?php echo esc_html($dienst['titel']); ?>
                        </h3>
                        <p>
                            <?php echo esc_html($dienst['tekst']); ?>
                        </p>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>