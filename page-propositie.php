<?php
/*
Template Name: Propositie
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
    <?php get_template_part('template-parts/waarom');?>
    <?php get_template_part('template-parts/diensten-grid'); ?>
    <?php get_template_part('template-parts/stappen'); ?>
    <?php get_template_part('template-parts/extra'); ?>
</main>
<?php get_footer() ?>