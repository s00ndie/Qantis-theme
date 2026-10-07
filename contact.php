<?php
/*
Template Name: Contact
*/
?>
<?php $accentkleur = get_field('accentkleur'); ?>
<?php get_header();
/*echo '<pre>';
var_dump(get_fields());
echo '</pre>';*/
?>

<main>
    <?php get_template_part('template-parts/propositie-nav'); ?>
    <?php get_template_part('template-parts/hero'); ?>
    <?php get_template_part('template-parts/cta')?>
    <?php get_template_part('template-parts/contact-pagina')?>
    <?php get_template_part('template-parts/extra'); ?>
    <?php get_template_part('template-parts/kaart') ?>
</main>
<?php get_footer() ?>