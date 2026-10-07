<?php
$propositie_page = get_page_by_path('propositie');
$excluded_ids = $propositie_page ? array($propositie_page->ID) : array();

$proposities = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => 3,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-propositie.php',
    'post__not_in' => $excluded_ids,
    'orderby' => 'menu_order',
    'order' => 'ASC',
));

$dot_colors = array('#1782C4','#E86A2C','#1A9E5C');
$i = 0;
?>

<nav class="propositie-nav">

    <?php if ($proposities->have_posts()): ?>

        <?php while ($proposities->have_posts()):
            $proposities->the_post(); 
            $color = isset($dot_colors[$i]) ? $dot_colors[$i] : '#ffffff';
            
            $number = sprintf('%02d', $i + 1) ?>
            <a href="<?php the_permalink(); ?>" class="<?php echo get_the_ID() === get_queried_object_id() ? 'active' : ''; ?>">
                <span class="nav-dot" style="background-color: <?php echo $color; ?>;"></span>
                <span class="nav-number"><?php echo $number; ?></span>
                <span class="nav-dash">&mdash;</span>
                <?php the_title(); ?>
            </a>

        <?php $i++; endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php endif; ?>

</nav>