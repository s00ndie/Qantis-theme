<?php

$phone = get_field('telefoonnummer', 'option');
$email = get_field('e_mailadres', 'option');
$adresregels = get_field('adresregels', 'option');
$opentime = get_field('openingstijden', 'option');
$social_links = get_field('socialoverige_links', 'option');
$copy_text = get_field('footer_copyright_tekst', 'option');
$links = get_field('footer_links', 'option');
$coord_array = get_field('coordinaten', 'option');
$coord = is_array($coord_array) ? implode(',', $coord_array) : '';
$url = get_field('embed_url', 'option');

?>

<footer class="site-footer">
    <div class="footer">
        <div class="footer-tekst">
            <?php echo $copy_text; ?>
            <?php echo $adresregels; ?>
        </div>
        <div class="footer-links">
            <?php foreach ($links as $item) { ?>
                <a href="<?php echo $item['link']['url'] ?>"><?php echo $item['link']['title'] ?></a>
            <?php } ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>